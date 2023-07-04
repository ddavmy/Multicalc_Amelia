<?php

namespace app\controllers;

use core\App;
use core\Route;
use core\Router;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\calcForm;

class calcPOkoCtrl {

    private $form;
    private $pole;
    private $obwod;
    private $records;

    public function __construct() {
        $this->form = new calcForm();
    }

    public function validate() {
        $this->form->r = ParamUtils::getFromRequest('r', true);

        if (App::getMessages()->isError())
            return false;

        if($this->form->r <= 0) {
            Utils::addErrorMessage('Długość promienia musi być większa od 0');
        } elseif(!is_numeric($this->form->r)) {
            Utils::addErrorMessage('Podana wartość nie jest liczbą!');
        }

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_POkoDelete() {
        if ($this->validateEdit()) {

            try {
                App::getDB()->delete("calc__poko", [
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
                App::getDB()->insert("calc__poko", [
                    "r" => $this->form->r,
                    "pole" => $this->pole,
					"obwod" => $this->obwod,
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
            $this->records = App::getDB()->select("calc__poko", [
                "[><]figury"=>["figura_id"=>"figura_id"],
                "[><]uzytkownicy"=>["user_id"=>"user_id"]
            ], [
                "calc__poko.id",
                "calc__poko.r",
                "calc__poko.pole",
                "calc__poko.obwod",
                "figury.nazwa",
                "uzytkownicy.username"
            ], [
                "LIMIT"=>10,
                "ORDER"=>[
                    "id"=>"DESC"
                ]
            ]);
        } else {
            $this->records = App::getDB()->select("calc__poko", [
                "[><]figury"=>["figura_id"=>"figura_id"]
            ], [
                "calc__poko.id",
                "calc__poko.r",
                "calc__poko.pole",
                "calc__poko.obwod",
                "figury.nazwa"
            ], [
                "calc__poko.user_id"=>$username,
                "LIMIT"=>5,
                "ORDER"=>[
                    "id"=>"DESC"
                ]
            ]);
        }
        $this->generateView();
    }

    public function action_POkoShow(){
        $this->wynikList();
	}

    public function action_POkoCompute(){
        if ($this->validate()) {

            $this->form->r = floatval($this->form->r);
            Utils::addInfoMessage('Parametry poprawne, wykonano obliczenia');
            $pi = round(pi(),2);

            $this->pole = round($pi * $this->form->r * $this->form->r, 2);
            Utils::addWynikMessage('Pole = '.$this->pole);

            $this->obwod = round(2 * $pi * $this->form->r, 2);
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
        
        App::getSmarty()->display('calcPOko.tpl');
    }
    public function log($data) {
        $output = $data;
        if (is_array($output))
        $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
