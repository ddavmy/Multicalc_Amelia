<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\CalcForm;

class deltaCtrl {

    private $form;
    private $delta;
    private $x1;
    private $x2;
    private $records;
    // private $username = SessionUtils::load('login', true);

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new CalcForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validate() {
        //0. Pobranie parametrów z walidacją
        // $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->a = ParamUtils::getFromRequest('a', true);
        $this->form->b = ParamUtils::getFromRequest('b', true);
        $this->form->c = ParamUtils::getFromRequest('c', true);

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if($this->form->a == 0) {
            Utils::addErrorMessage('To nie jest funkcja kwadratowa!');
        }
        if($this->form->a == "") {
            Utils::addErrorMessage('Nie podano a');
        } elseif(!is_numeric($this->form->a)) {
            Utils::addErrorMessage('Pierwsza wartość nie jest liczbą!');
        }
        if($this->form->b == "") {
            Utils::addErrorMessage('Nie podano b');
        } elseif(!is_numeric($this->form->b)) {
            Utils::addErrorMessage('Druga wartość nie jest liczbą!');
        }
        if($this->form->c == "") {
            Utils::addErrorMessage('Nie podano c');
        } elseif(!is_numeric($this->form->c)) {
            Utils::addErrorMessage('Trzecia wartość nie jest liczbą!');
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

    public function action_deltaDelete() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("calc__delta", [
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
        $this->WynikList();
    }

    public function wynikSave() {
        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validate()) {
            $username = SessionUtils::load('login', true);
            // 2. Zapis danych w bazie
            try {
                //2.1 Nowy rekord
                App::getDB()->insert("calc__delta", [
                    "a" => $this->form->a,
                    "b" => $this->form->b,
                    "c" => $this->form->c,
                    "delta" => $this->delta,
					"x1" => $this->x1,
					"x2" => $this->x2,
					"user_id" => $username
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
        $this->WynikList();
    }

    public function wynikList() {
        // 1. Walidacja danych formularza (z pobraniem)
        // - W tej aplikacji walidacja nie jest potrzebna, ponieważ nie wystąpią błedy podczas podawania nazwiska.
        //   Jednak pozostawiono ją, ponieważ gdyby uzytkownik wprowadzał np. datę, lub wartość numeryczną, to trzeba
        //   odpowiednio zareagować wyświetlając odpowiednią informację (poprzez obiekt wiadomości Messages)
        // $this->validate();
        $username = SessionUtils::load('login', true);
        $role = SessionUtils::load('role', true);
        $this->log("deltaRole=".$role);
        $this->log("deltaUserID=".$username);
        if($role == 1){
            $this->records = App::getDB()->select("calc__delta", [
                "[><]uzytkownicy"=>["user_id"=>"user_id"]
            ], [
                "calc__delta.id",
                "calc__delta.a",
                "calc__delta.b",
                "calc__delta.c",
                "calc__delta.delta",
                "calc__delta.x1",
                "calc__delta.x2",
                "uzytkownicy.username"
            ], [
                "LIMIT"=>10,
                "ORDER"=>[
                    "id"=>"DESC"
                ]
            ]);
        } else {
            $this->records = App::getDB()->select("calc__delta", [
                "id",
                "a",
                "b",
                "c",
                "delta",
                "x1",
                "x2"
            ], [
                "user_id"=>$username,
                "LIMIT"=>5,
                "ORDER"=>[
                    "id"=>"DESC"
                ]
            ]);
        }

        $this->generateView();
    }

    public function action_deltaShow(){
        $this->WynikList();
	}

    public function action_deltaCompute(){
        
        if ($this->validate()) {

            $this->form->a = floatval($this->form->a);
            $this->form->b = floatval($this->form->b);
            $this->form->c = floatval($this->form->c);
            $this->x1 = 'brak';
            $this->x2 = 'brak';
            Utils::addInfoMessage('Parametry poprawne,wykonano obliczenia');
            
            $this->delta = pow($this->form->b, 2) - 4 * $this->form->a * $this->form->c;
            Utils::addWynikMessage('Δ = '.$this->delta);

                if($this->delta == 0) {
                    $this->x1 = -($this->form->b) / (2 * $this->form->a);
                    if($this->x1 == -0) {$this->x1 = abs($this->x1);}
                    Utils::addWynikMessage('x<sub>0</sub> = '.$this->x1);
                }
                else if($this->delta < 0) {
                    Utils::addWynikMessage('Delta ujemna, brak pierwiastków.');
                }else {
                    $this->x1 = round((-$this->form->b + sqrt($this->delta)) / (2 * $this->form->a), 2);
                    if($this->x1 == -0) {$this->x1 = abs($this->x1);}
                    Utils::addWynikMessage('x<sub>1</sub> = '.$this->x1);

                    $this->x2 = round((-$this->form->b - sqrt($this->delta)) / (2 * $this->form->a), 2);
                    if($this->x2 == -0) {$this->x2 = abs($this->x2);}
                    Utils::addWynikMessage('x<sub>2</sub> = '.$this->x2);
                }
        }
        $this->wynikSave();
    }

    public function generateView(){
        
        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));

        App::getSmarty()->assign('form',$this->form);
        App::getSmarty()->assign('del',$this->delta);
        App::getSmarty()->assign('x1',$this->x1);
        App::getSmarty()->assign('x2',$this->x2);
        App::getSmarty()->assign('records',$this->records);
        
        App::getSmarty()->display('calcDelta.tpl');
    }
    public function log($data) {
        $output = $data;
        if (is_array($output))
        $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
