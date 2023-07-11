<?php

namespace app\controllers;

use core\App;
use core\RoleUtils;
use core\Route;
use core\Router;
use core\SessionUtils;
use core\Utils;
use core\ParamUtils;
use app\forms\CalcForm;
use app\forms\ResultForm;

class calcFunkcjeTrygCtrl {

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
        $this->form->calcID = App::getDB()->get("calcs", "calc_id", [
            "action" => $this->form->calcName
        ]);
    }

    public function validate() {
        $this->form->dlugoscA = ParamUtils::getFromRequest('dlugoscA', true);

        if (App::getMessages()->isError()){
            return false;
        }

        if($this->form->dlugoscA < 0) {
            App::getMessages()->addMessage(new \core\Message("Kąt alfa musi być dodatni!", \core\Message::ERROR));
        } elseif($this->form->dlugoscA > 90) {
            App::getMessages()->addMessage(new \core\Message("Kąt alfa nie może przekraczać 90°", \core\Message::ERROR));
        } elseif(!is_numeric($this->form->dlugoscA)) {
            App::getMessages()->addMessage(new \core\Message("Podana wartość nie jest liczbą!", \core\Message::ERROR));
        }

        $this->getParams();
        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function FunkcjeTrygDelete() {
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
                    "dlugoscA"=>$this->form->dlugoscA,
                    "wynikA"=>$this->result->wynikA,
                    "wynikB"=>$this->result->wynikB,
                    "wynikC"=>$this->result->wynikC,
                    "wynikD"=>$this->result->wynikD,
                    "calc_id"=>$this->form->calcID,
					"user_id" => $this->form->user_id
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
                "[><]uzytkownicy"=>["user_id"=>"user_id"]
            ], [
                "calc.id",
                "calc.dlugoscA",
                "calc.wynikA",
                "calc.wynikB",
                "calc.wynikC",
                "calc.wynikD",
                "uzytkownicy.username"
            ], [
                "calc_id"=>$this->form->calcID,
                "LIMIT"=>10,
                "ORDER"=>[
                    "id"=>"DESC"
                ]
            ]);
        } else {
            $this->result->records = App::getDB()->select("calc", [
                "id",
                "dlugoscA",
                "wynikA",
                "wynikB",
                "wynikC",
                "wynikD"
            ], [
                "calc_id"=>$this->form->calcID,
                "user_id"=>$this->form->user_id,
                "LIMIT"=>5,
                "ORDER"=>[
                    "id"=>"DESC"
                ]
            ]);
        }
        $this->generateView();
    }

    public function action_Funkcje_trygonometryczne(){
        $this->getParams();
        $submit = ParamUtils::getFromRequest('submit', true);
        App::getMessages()->clear();
        if($submit == "Oblicz") {
            $this->FunkcjeTrygCompute();
        }else if($submit == "Usuń" && $this->form->role == "admin") {
            $this->FunkcjeTrygDelete();
        }else{
            $this->WynikList();
        }
	}

    public function FunkcjeTrygCompute(){
        if ($this->validate()) {
            
            $this->form->dlugoscA = floatval($this->form->dlugoscA);
            Utils::addInfoMessage('Parametr poprawny, wykonano obliczenia');
            $this->result->wynikA = round(sin(deg2rad($this->form->dlugoscA)),7);
            Utils::addWynikMessage('sin = '.$this->result->wynikA);
            $this->result->wynikB = round(cos(deg2rad($this->form->dlugoscA)),7);
            Utils::addWynikMessage('cos = '.$this->result->wynikB);
            $this->result->wynikC = round(tan(deg2rad($this->form->dlugoscA)),7);
            Utils::addWynikMessage('tg = '.$this->result->wynikC);
            if($this->form->dlugoscA == 0)  {
                $this->result->wynikD = "brak";
            } else {
                $this->result->wynikD = round(1/tan(deg2rad($this->form->dlugoscA)),7);
            }
            Utils::addWynikMessage('ctg = '.$this->result->wynikD);

        }
        $this->wynikSave();
    }

    public function generateView(){
        
        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));

        App::getSmarty()->assign('form',$this->form);
        App::getSmarty()->assign('records',$this->result->records);
        
        App::getSmarty()->display('calcFunkcjeTryg.tpl');
    }
    public function log($data) {
        $output = $data;
        if (is_array($output))
        $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
