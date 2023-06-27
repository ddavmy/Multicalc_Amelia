<?php

namespace app\controllers;

use core\App;
use core\Route;
use core\Router;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\calcForm;

class poleObwCtrl {

    private $form;
    private $pole;
    private $obwod;
    private $records;

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new calcForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validate() {
        //0. Pobranie parametrów z walidacją
        // $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->a = ParamUtils::getFromRequest('a', true);
        $this->form->b = ParamUtils::getFromRequest('b', true);

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
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

        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_poleObwDelete() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("calc__poleObw", [
                    "id" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        // 3. Przekierowanie na stronę listy osób
        $this->wynikList();
    }

    public function wynikSave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validate()) {
            $username = SessionUtils::load('login', true);
            // 2. Zapis danych w bazie
            try {
                //2.1 Nowy rekord
                App::getDB()->insert("calc__poleobw", [
                    "a" => $this->form->a,
                    "b" => $this->form->b,
                    "pole" => $this->pole,
					"obwod" => $this->obwod,
					"figura_id" => 2,
                    "user_id"=>$username
                ]);
                // Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            // App::getRouter()->forwardTo('calcShow');
        }
        $this->wynikList();
    }

    public function wynikList() {
        // 1. Walidacja danych formularza (z pobraniem)
        // - W tej aplikacji walidacja nie jest potrzebna, ponieważ nie wystąpią błedy podczas podawania nazwiska.
        //   Jednak pozostawiono ją, ponieważ gdyby uzytkownik wprowadzał np. datę, lub wartość numeryczną, to trzeba
        //   odpowiednio zareagować wyświetlając odpowiednią informację (poprzez obiekt wiadomości Messages)
        // $this->validate();
        $username = SessionUtils::load('login', true);
        if($username == 2){
            $this->records = App::getDB()->select("calc__poleobw", [
                "[><]figury"=>["figura_id"=>"figura_id"],
                "[><]uzytkownicy"=>["user_id"=>"user_id"]
            ], [
                "calc__poleobw.id",
                "calc__poleobw.a",
                "calc__poleobw.b",
                "calc__poleobw.pole",
                "calc__poleobw.obwod",
                "figury.nazwa",
                "uzytkownicy.username"
            ]);
        } else {
            $this->records = App::getDB()->select("calc__poleobw", [
                "[><]figury"=>["figura_id"=>"figura_id"]
            ], [
                "calc__poleobw.id",
                "calc__poleobw.a",
                "calc__poleobw.b",
                "calc__poleobw.pole",
                "calc__poleobw.obwod",
                "figury.nazwa"
            ], [
                "calc__poleobw.user_id"=>$username
            ]);
        }
        $this->generateView();
    }

    public function action_poleObwShow(){
        $this->wynikList();
	}

    public function action_poleObwCompute(){
        if ($this->validate()) {

            $this->form->a = floatval($this->form->a);
            $this->form->b = floatval($this->form->b);
            Utils::addInfoMessage('Parametry poprawne, wykonano obliczenia');

            $this->pole = round($this->form->a * $this->form->b,2);
            Utils::addWynikMessage('Pole = '.$this->pole);

            $this->obwod = 2 * round(($this->form->a + $this->form->b),2);
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
        
        App::getSmarty()->display('calcPoleObw.tpl');
    }
}
