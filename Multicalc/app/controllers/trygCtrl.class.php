<?php

namespace app\controllers;

use core\App;
use core\RoleUtils;
use core\Route;
use core\Router;
use core\SessionUtils;
use core\Utils;
use core\ParamUtils;
use app\forms\calcForm;

class trygCtrl {

    private $form;
    private $sin;
    private $cos;
    private $tg;
    private $ctg;
    private $username;
    private $records;

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new calcForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validate() {
        //0. Pobranie parametrów z walidacją
        // $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->alfa = ParamUtils::getFromRequest('alfa', true);

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if($this->form->alfa < 0) {
            Utils::addErrorMessage('Kąt alfa musi być dodatni!');
        } elseif($this->form->alfa > 90) {
            Utils::addErrorMessage('Kąt alfa nie może przekraczać 90°');
        } elseif(!is_numeric($this->form->alfa)) {
            Utils::addErrorMessage('Podana wartość nie jest liczbą!');
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

    public function action_trygDelete() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("calc__tryg", [
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
                App::getDB()->insert("calc__tryg", [
                    "alfa"=>$this->form->alfa,
                    "sin"=>$this->sin,
                    "cos"=>$this->cos,
                    "tg"=>$this->tg,
                    "ctg"=>$this->ctg,
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
            $this->records = App::getDB()->select("calc__tryg", [
                "[><]uzytkownicy"=>["user_id"=>"user_id"]
            ], [
                "calc__tryg.id",
                "calc__tryg.alfa",
                "calc__tryg.sin",
                "calc__tryg.cos",
                "calc__tryg.tg",
                "calc__tryg.ctg",
                "uzytkownicy.username"
            ]);
        } else {
            $this->records = App::getDB()->select("calc__tryg", [
                "id",
                "alfa",
                "sin",
                "cos",
                "tg",
                "ctg"
            ], [
                "user_id"=>$username
            ]);
        }
        $this->generateView();
    }

    public function action_trygShow(){
        $this->wynikList();
	}

    public function action_trygCompute(){
        if ($this->validate()) {
            
            $this->form->alfa = floatval($this->form->alfa);
            Utils::addInfoMessage('Parametr poprawny, wykonano obliczenia');
            $this->sin = round(sin(deg2rad($this->form->alfa)),7);
            Utils::addWynikMessage('sin = '.$this->sin);
            $this->cos = round(cos(deg2rad($this->form->alfa)),7);
            Utils::addWynikMessage('cos = '.$this->cos);
            $this->tg = round(tan(deg2rad($this->form->alfa)),7);
            Utils::addWynikMessage('tg = '.$this->tg);
            $this->ctg = round(1/tan(deg2rad($this->form->alfa)),7);
            Utils::addWynikMessage('ctg = '.$this->ctg);

        }
        $this->wynikSave();
    }

    public function generateView(){
        
        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));

        App::getSmarty()->assign('form',$this->form);
        App::getSmarty()->assign('sin',$this->sin);
        App::getSmarty()->assign('cos',$this->cos);
        App::getSmarty()->assign('tg',$this->tg);
        App::getSmarty()->assign('ctg',$this->ctg);
        App::getSmarty()->assign('records',$this->records);
        
        App::getSmarty()->display('calcTryg.tpl');
    }
    public function log($data) {
        $output = $data;
        if (is_array($output))
        $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
