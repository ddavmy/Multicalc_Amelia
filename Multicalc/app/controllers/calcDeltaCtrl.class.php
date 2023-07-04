<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\CalcForm;

class calcDeltaCtrl {

    private $form;
    private $delta;
    private $x1;
    private $x2;
    private $records;

    public function __construct() {
        $this->form = new CalcForm();
    }

    public function validate() {
        $this->form->a = ParamUtils::getFromRequest('a', true);
        $this->form->b = ParamUtils::getFromRequest('b', true);
        $this->form->c = ParamUtils::getFromRequest('c', true);

        if (App::getMessages()->isError())
            return false;

        if($this->form->a == 0) {
            App::getMessages()->addMessage(new \core\Message("To nie jest funkcja kwadratowa!", \core\Message::ERROR));
        }
        if($this->form->a == "") {
            App::getMessages()->addMessage(new \core\Message("Nie podano a", \core\Message::ERROR));
        } elseif(!is_numeric($this->form->a)) {
            App::getMessages()->addMessage(new \core\Message("Pierwsza wartość nie jest liczbą!", \core\Message::ERROR));
        }
        if($this->form->b == "") {
            App::getMessages()->addMessage(new \core\Message("Nie podano b", \core\Message::ERROR));
        } elseif(!is_numeric($this->form->b)) {
            App::getMessages()->addMessage(new \core\Message("Druga wartość nie jest liczbą!", \core\Message::ERROR));
        }
        if($this->form->c == "") {
            App::getMessages()->addMessage(new \core\Message("Nie podano c", \core\Message::ERROR));
        } elseif(!is_numeric($this->form->c)) {
            App::getMessages()->addMessage(new \core\Message("Trzecia wartość nie jest liczbą!", \core\Message::ERROR));
        }

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_calcDeltaDelete() {
        if ($this->validateEdit()) {

            try {
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
        $this->WynikList();
    }

    public function wynikSave() {
        if ($this->validate()) {
            $username = SessionUtils::load('login', true);
            try {
                App::getDB()->insert("calc__delta", [
                    "a" => $this->form->a,
                    "b" => $this->form->b,
                    "c" => $this->form->c,
                    "delta" => $this->delta,
					"x1" => $this->x1,
					"x2" => $this->x2,
					"user_id" => $username
                ]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        $this->WynikList();
    }

    public function wynikList() {
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

    public function action_calcDeltaShow(){
        $this->WynikList();
	}

    public function action_calcDeltaCompute(){
        
        if ($this->validate()) {

            $this->form->a = floatval($this->form->a);
            $this->form->b = floatval($this->form->b);
            $this->form->c = floatval($this->form->c);
            $this->x1 = 'brak';
            $this->x2 = 'brak';
            App::getMessages()->addMessage(new \core\Message("Parametry poprawne,wykonano obliczenia", \core\Message::INFO));
            
            $this->delta = pow($this->form->b, 2) - 4 * $this->form->a * $this->form->c;
            App::getMessages()->addMessage(new \core\Message("Δ = ".$this->delta, \core\Message::INFO));

                if($this->delta == 0) {
                    $this->x1 = -($this->form->b) / (2 * $this->form->a);
                    if($this->x1 == -0) {$this->x1 = abs($this->x1);}
                    App::getMessages()->addMessage(new \core\Message("x<sub>0</sub> = ".$this->x1, \core\Message::INFO));
                }
                else if($this->delta < 0) {
                    App::getMessages()->addMessage(new \core\Message("Delta ujemna, brak pierwiastków.", \core\Message::INFO));
                }else {
                    $this->x1 = round((-$this->form->b + sqrt($this->delta)) / (2 * $this->form->a), 2);
                    if($this->x1 == -0) {$this->x1 = abs($this->x1);}
                    App::getMessages()->addMessage(new \core\Message("x<sub>1</sub> = ".$this->x1, \core\Message::INFO));

                    $this->x2 = round((-$this->form->b - sqrt($this->delta)) / (2 * $this->form->a), 2);
                    if($this->x2 == -0) {$this->x2 = abs($this->x2);}
                    App::getMessages()->addMessage(new \core\Message("x<sub>2</sub> = ".$this->x2, \core\Message::INFO));
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
