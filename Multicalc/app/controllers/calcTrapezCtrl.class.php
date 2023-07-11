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

class calcTrapezCtrl {

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
        $this->form->dlugoscB = ParamUtils::getFromRequest('dlugoscB', true);
        $this->form->dlugoscC = ParamUtils::getFromRequest('dlugoscC', true);
        $this->form->dlugoscD = ParamUtils::getFromRequest('dlugoscD', true);
        $this->form->dlugoscE = ParamUtils::getFromRequest('dlugoscE', true);

        if (App::getMessages()->isError())
            return false;

        if($this->form->dlugoscA <= 0) {
            Utils::addErrorMessage('Długość boku A musi być większa od 0');
        } elseif(!is_numeric($this->form->dlugoscA)) {
            Utils::addErrorMessage('Pierwsza wartość nie jest liczbą!');
        }
        if($this->form->dlugoscB <= 0) {
            Utils::addErrorMessage('Długość boku B musi być większa od 0');
        } elseif(!is_numeric($this->form->dlugoscB)) {
            Utils::addErrorMessage('Druga wartość nie jest liczbą!');
        }
        if($this->form->dlugoscC <= 0) {
            Utils::addErrorMessage('Długość boku C musi być większa od 0');
        } elseif(!is_numeric($this->form->dlugoscC)) {
            Utils::addErrorMessage('Trzecia wartość nie jest liczbą!');
        }
        if($this->form->dlugoscD <= 0) {
            Utils::addErrorMessage('Długość boku D musi być większa od 0');
        } elseif(!is_numeric($this->form->dlugoscC)) {
            Utils::addErrorMessage('Czwarta wartość nie jest liczbą!');
        }
        if($this->form->dlugoscE <= 0) {
            Utils::addErrorMessage('Długość boku h musi być większa od 0');
        } elseif(!is_numeric($this->form->dlugoscE)) {
            Utils::addErrorMessage('Piąta wartość nie jest liczbą!');
        }

        $this->getParams();
        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function TrapezDelete() {
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
            $username = SessionUtils::load('login', true);
            try {
                App::getDB()->insert("calc", [
                    "dlugoscA" => $this->form->dlugoscA,
                    "dlugoscB" => $this->form->dlugoscB,
                    "dlugoscC" => $this->form->dlugoscC,
                    "dlugoscD" => $this->form->dlugoscD,
                    "dlugoscE" => $this->form->dlugoscE,
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
                "calc.dlugoscB",
                "calc.dlugoscC",
                "calc.dlugoscD",
                "calc.dlugoscE",
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
                "calc.dlugoscA",
                "calc.dlugoscC",
                "calc.dlugoscD",
                "calc.dlugoscE",
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

    public function action_Trapez(){
        $this->getParams();
        $submit = ParamUtils::getFromRequest('submit', true);
        App::getMessages()->clear();
        if($submit == "Oblicz") {
            $this->TrapezCompute();
        }else if($submit == "Usuń" && $this->form->role == "admin") {
            $this->TrapezDelete();
        }else{
            $this->WynikList();
        }
	}

    public function TrapezCompute(){
        if ($this->validate()) {

            $this->form->dlugoscA = floatval($this->form->dlugoscA);
            $this->form->dlugoscB = floatval($this->form->dlugoscB);
            $this->form->dlugoscC = floatval($this->form->dlugoscC);
            $this->form->dlugoscD = floatval($this->form->dlugoscD);
            $this->form->dlugoscE = floatval($this->form->dlugoscE);
            Utils::addInfoMessage('Parametry poprawne, wykonano obliczenia');

            $this->result->wynikA = round(($this->form->dlugoscA + $this->form->dlugoscC * $this->form->dlugoscE) / 2, 2);
            Utils::addWynikMessage('Pole = '.$this->result->wynikA);

            $this->result->wynikB = round($this->form->dlugoscA + $this->form->dlugoscB + $this->form->dlugoscC + $this->form->dlugoscD, 2);
            Utils::addWynikMessage('Obwod = '.$this->result->wynikB);

        }
        $this->wynikSave();
    }

    public function generateView(){
        
        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));

        App::getSmarty()->assign('form',$this->form);
        App::getSmarty()->assign('records',$this->result->records);
        
        App::getSmarty()->display('calcTrapez.tpl');
    }
    public function log($data) {
        $output = $data;
        if (is_array($output))
        $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
