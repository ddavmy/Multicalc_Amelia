<?php

namespace app\controllers;

use core\App;
use core\Route;
use core\Router;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\calcForm;

class calcPOkwCtrl {

    private $form;
    private $pole;
    private $obwod;
    private $records;

    public function __construct() {
        $this->form = new calcForm();
    }

    public function validate() {
        $this->form->a = ParamUtils::getFromRequest('a', true);

        if (App::getMessages()->isError())
            return false;

        if($this->form->a <= 0) {
            Utils::addErrorMessage('Długość boku A musi być większa od 0');
        } elseif(!is_numeric($this->form->a)) {
            Utils::addErrorMessage('Podana wartość nie jest liczbą!');
        }

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_POkwDelete() {
        if ($this->validateEdit()) {

            try {
                App::getDB()->delete("calc__pokw", [
                    "id" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        $this->wynikList();
    }

    public function wynikSave() {

        if ($this->validate()) {
            $username = SessionUtils::load('login', true);
            try {
                App::getDB()->insert("calc__pokw", [
                    "a" => $this->form->a,
                    "pole" => $this->pole,
					"obwod" => $this->obwod,
					"figura_id" => 1,
                    "user_id"=>$username
                ]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

        }
        $this->wynikList();
    }

    public function wynikList() {
        $username = SessionUtils::load('login', true);
        $role = SessionUtils::load('role', true);
        $this->log("ROLA=".$role);
        if($role == 1){
            $this->records = App::getDB()->select("calc__pokw", [
                "[><]figury"=>["figura_id"=>"figura_id"],
                "[><]uzytkownicy"=>["user_id"=>"user_id"]
            ], [
                "calc__pokw.id",
                "calc__pokw.a",
                "calc__pokw.pole",
                "calc__pokw.obwod",
                "figury.nazwa",
                "uzytkownicy.username"
            ], [
                "LIMIT"=>10,
                "ORDER"=>[
                    "id"=>"DESC"
                ]
            ]);
        } else {
            $this->records = App::getDB()->select("calc__pokw", [
                "[><]figury"=>["figura_id"=>"figura_id"]
            ], [
                "calc__pokw.id",
                "calc__pokw.a",
                "calc__pokw.pole",
                "calc__pokw.obwod",
                "figury.nazwa"
            ], [
                "calc__pokw.user_id"=>$username,
                "LIMIT"=>5,
                "ORDER"=>[
                    "id"=>"DESC"
                ]
            ]);
        }
        $this->generateView();
    }

    public function action_POkwShow(){
        $this->wynikList();
	}

    public function action_POkwCompute(){
        if ($this->validate()) {

            $this->form->a = floatval($this->form->a);
            Utils::addInfoMessage('Parametry poprawne, wykonano obliczenia');

            $this->pole = round($this->form->a * $this->form->a, 2);
            Utils::addWynikMessage('Pole = '.$this->pole);

            $this->obwod = 4 * round($this->form->a, 2);
            Utils::addWynikMessage('Obwod = '.$this->obwod);

        }
        $this->wynikSave();
    }

    public function generateView(){
        
        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));

        App::getSmarty()->assign('form',$this->form);
        App::getSmarty()->assign('pole',$this->pole);
        App::getSmarty()->assign('obwod',$this->obwod);
        App::getSmarty()->assign('records',$this->records);
        
        App::getSmarty()->display('calcPOkw.tpl');
    }
    public function log($data) {
        $output = $data;
        if (is_array($output))
        $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
