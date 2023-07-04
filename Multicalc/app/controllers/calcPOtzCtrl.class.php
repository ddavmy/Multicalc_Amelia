<?php

namespace app\controllers;

use core\App;
use core\Route;
use core\Router;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\calcForm;

class calcPOtzCtrl {

    private $form;
    private $pole;
    private $obwod;
    private $records;

    public function __construct() {
        $this->form = new calcForm();
    }

    public function validate() {
        $this->form->a = ParamUtils::getFromRequest('a', true);
        $this->form->b = ParamUtils::getFromRequest('b', true);
        $this->form->c = ParamUtils::getFromRequest('c', true);
        $this->form->d = ParamUtils::getFromRequest('d', true);
        $this->form->h = ParamUtils::getFromRequest('h', true);

        if (App::getMessages()->isError())
            return false;

        if($this->form->a <= 0) {
            Utils::addErrorMessage('Długość boku A musi być większa od 0');
        } elseif(!is_numeric($this->form->a)) {
            Utils::addErrorMessage('Pierwsza wartość nie jest liczbą!');
        }
        if($this->form->b <= 0) {
            Utils::addErrorMessage('Długość boku B musi być większa od 0');
        } elseif(!is_numeric($this->form->b)) {
            Utils::addErrorMessage('Druga wartość nie jest liczbą!');
        }
        if($this->form->c <= 0) {
            Utils::addErrorMessage('Długość boku C musi być większa od 0');
        } elseif(!is_numeric($this->form->c)) {
            Utils::addErrorMessage('Trzecia wartość nie jest liczbą!');
        }
        if($this->form->d <= 0) {
            Utils::addErrorMessage('Długość boku D musi być większa od 0');
        } elseif(!is_numeric($this->form->c)) {
            Utils::addErrorMessage('Czwarta wartość nie jest liczbą!');
        }
        if($this->form->h <= 0) {
            Utils::addErrorMessage('Długość boku h musi być większa od 0');
        } elseif(!is_numeric($this->form->h)) {
            Utils::addErrorMessage('Piąta wartość nie jest liczbą!');
        }

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_POtzDelete() {
        if ($this->validateEdit()) {

            try {
                App::getDB()->delete("calc__potz", [
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
                App::getDB()->insert("calc__potz", [
                    "a" => $this->form->a,
                    "b" => $this->form->b,
                    "c" => $this->form->c,
                    "d" => $this->form->d,
                    "h" => $this->form->h,
                    "pole" => $this->pole,
					"obwod" => $this->obwod,
					"figura_id" => 5,
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
            $this->records = App::getDB()->select("calc__potz", [
                "[><]figury"=>["figura_id"=>"figura_id"],
                "[><]uzytkownicy"=>["user_id"=>"user_id"]
            ], [
                "calc__potz.id",
                "calc__potz.a",
                "calc__potz.b",
                "calc__potz.c",
                "calc__potz.d",
                "calc__potz.h",
                "calc__potz.pole",
                "calc__potz.obwod",
                "figury.nazwa",
                "uzytkownicy.username"
            ], [
                "LIMIT"=>10,
                "ORDER"=>[
                    "id"=>"DESC"
                ]
            ]);
        } else {
            $this->records = App::getDB()->select("calc__potz", [
                "[><]figury"=>["figura_id"=>"figura_id"]
            ], [
                "calc__potz.id",
                "calc__potz.a",
                "calc__potz.b",
                "calc__potz.c",
                "calc__potz.d",
                "calc__potz.h",
                "calc__potz.pole",
                "calc__potz.obwod",
                "figury.nazwa"
            ], [
                "calc__potz.user_id"=>$username,
                "LIMIT"=>5,
                "ORDER"=>[
                    "id"=>"DESC"
                ]
            ]);
        }
        $this->generateView();
    }

    public function action_POtzShow(){
        $this->wynikList();
	}

    public function action_POtzCompute(){
        if ($this->validate()) {

            $this->form->a = floatval($this->form->a);
            $this->form->b = floatval($this->form->b);
            $this->form->c = floatval($this->form->c);
            $this->form->d = floatval($this->form->d);
            $this->form->h = floatval($this->form->h);
            Utils::addInfoMessage('Parametry poprawne, wykonano obliczenia');

            $this->pole = round(($this->form->a + $this->form->c * $this->form->h) / 2, 2);
            Utils::addWynikMessage('Pole = '.$this->pole);

            $this->obwod = round($this->form->a + $this->form->b + $this->form->c + $this->form->d, 2);
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
        
        App::getSmarty()->display('calcPOtz.tpl');
    }
    public function log($data) {
        $output = $data;
        if (is_array($output))
        $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
