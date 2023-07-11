<?php

namespace app\controllers;

use core\App;
use core\Route;
use core\Router;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\CalcForm;
use app\forms\ResultForm;

class calcKwadratCtrl {

    private $form;
    private $result;

    public function __construct() {
        $this->form = new CalcForm();
        $this->result = new ResultForm();
    }

    public function getParams() {
        
        $user = SessionUtils::loadObject('user', true);
        $this->form->user_id = $user->user_id;
        $this->form->login = $user->login;
        $this->form->role = $user->role;

        $this->form->calcName = ParamUtils::getFromCleanURL(0, true, null, null);
        $this->form->calcID = App::getDB()->get("figury", "figura_id", [
            "param1" => $this->form->calcName
        ]);
    }

    public function validate() {
        $this->form->dlugoscA = ParamUtils::getFromRequest('dlugoscA', true);
        
        if (App::getMessages()->isError()) {
            return false;
        }
            
        if($this->form->dlugoscA <= 0) {
            Utils::addErrorMessage('Długość boku A musi być większa od 0');
        } elseif(!is_numeric($this->form->dlugoscA)) {
            Utils::addErrorMessage('Podana wartość nie jest liczbą!');
        }
        
        $this->getParams();
        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function KwadratDelete() {
        if ($this->validateEdit()) {
            try {
                App::getDB()->delete("calc", [
                    "id" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug) {
                    Utils::addErrorMessage($e->getMessage());
                }
            }
        }
        $this->wynikList();
    }

    public function wynikSave() {
        if ($this->validate()) {
            try {
                App::getDB()->insert("calc", [
                    "dlugoscA" => $this->form->dlugoscA,
                    "wynikA" => $this->result->wynikA,
					"wynikB" => $this->result->wynikB,
					"figura_id" => $this->form->calcID,
                    "user_id"=>$this->form->user_id
                ]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug) {
                    Utils::addErrorMessage($e->getMessage());
                }
            }

        }
        $this->wynikList();
    }

    public function wynikList() {
        $this->getParams();
        if($this->form->role == "admin"){
            $this->result->records = App::getDB()->select("calc", [
                "[><]figury"=>["figura_id"=>"figura_id"],
                "[><]uzytkownicy"=>["user_id"=>"user_id"]
            ], [
                "calc.id",
                "calc.dlugoscA",
                "calc.wynikA",
                "calc.wynikB",
                "figury.nazwa",
                "uzytkownicy.username"
            ], [
                "calc.figura_id"=>$this->form->calcID,
                "LIMIT"=>10,
                "ORDER"=>[
                    "id"=>"DESC"
                ]
            ]);
        } else {
            $this->result->records = App::getDB()->select("calc", [
                "[><]figury"=>["figura_id"=>"figura_id"]
            ], [
                "calc.id",
                "calc.dlugoscA",
                "calc.wynikA",
                "calc.wynikB",
                "figury.nazwa"
            ], [
                "calc.figura_id"=>$this->form->calcID,
                "calc.user_id"=>$this->form->user_id,
                "LIMIT"=>5,
                "ORDER"=>[
                    "calc.id"=>"DESC"
                ]
            ]);
        }
        $this->generateView();
    }

    public function action_Kwadrat(){
        $this->getParams();
        $submit = ParamUtils::getFromRequest('submit', true);
        App::getMessages()->clear();
        if($submit == "Oblicz") {
            $this->KwadratCompute();
        }else if($submit == "Usuń" && $this->form->role == "admin") {
            $this->KwadratDelete();
        }else{
            $this->WynikList();
        }
	}

    public function KwadratCompute(){
        if ($this->validate()) {
            $this->form->dlugoscA = floatval($this->form->dlugoscA);
            Utils::addInfoMessage('Parametry poprawne, wykonano obliczenia');

            $this->result->wynikA = round($this->form->dlugoscA * $this->form->dlugoscA, 2);
            Utils::addWynikMessage('Pole = '.$this->result->wynikA);

            $this->result->wynikB = 4 * round($this->form->dlugoscA, 2);
            Utils::addWynikMessage('Obwod = '.$this->result->wynikB);

        }
        $this->wynikSave();
    }

    public function generateView(){
        
        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));

        App::getSmarty()->assign('form',$this->form);
        App::getSmarty()->assign('records',$this->result->records);
        
        App::getSmarty()->display('calcKwadrat.tpl');
    }
    public function log($data) {
        $output = $data;
        if (is_array($output))
        $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
