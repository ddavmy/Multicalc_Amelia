<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use core\Validator;
use app\forms\UserEditForm;

class userEditCtrl {

    private $records; 
    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new userEditForm();
    }

    /* Walidacja danych przed zapisem (nowe dane lub edycja).
     * Poniżej pełna, możliwa konfiguracja metod walidacji:
     *  [ 
     *    'trim' => true,
     *    'required' => true,
     *    'required_message' => 'message...',
     *    'min_length' => value,
     *    'max_length' => value,
     *    'email' => true,
     *    'numeric' => true,
     *    'int' => true,
     *    'float' => true,
     *    'date_format' => format,
     *    'regexp' => expression,
     *    'validator_message' => 'message...',
     *    'message_type' => error | warning | info,
     *  ]
     */
    public function validateSave() {
        $this->log("ValidateSaveCheck +");
        $this->log("ValidateSaveBeforeID ".$this->form->id." <-");
        $this->log("ValidateSaveBeforeROLE ".$this->form->role." <-");
        //Pobranie id z walidacją czy istnieje (isset)
        $this->form->id = ParamUtils::getFromPost('id', true, 'Błędne wywołanie aplikacji');
        // $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        $this->log("ValidateSaveAfterID ".$this->form->id." <-");

        // Używaj ParamUtils::getFromXXX('param',true,"...") do sprawdzenia czy parametr
        // został przesłany, -  czy ISTNIEJE (isset) - może być pusty, ale jest
        
        
        $v = new Validator();
        
        $this->form->username = $v->validateFromPost('username', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj imię',
            'min_length' => 2,
            'max_length' => 20,
            'validator_message' => 'Imię powinno mieć od 2 do 20 znaków'
        ]);
        if($this->form->username == "guest") {
            Utils::addErrorMessage('Nie można zmienić danych tego użytkownika!');
            return false;
        }
        $this->log("ValidateSaveAfter ".$this->form->username." <-");
        // Używaj walidatora z konfiguracją "'required' => true" aby sprawdzić,
        // czy parametr NIE JEST PUSTY (!empty)
        
        $this->form->email = $v->validateFromPost('email', [
            'trim' => true,
            'email' => true,
            'required' => true,
            'required_message' => 'Podaj email',
            'min_length' => 2,
            'max_length' => 20,
            'validator_message' => 'email powinien mieć od 2 do 20 znaków'
        ]);
        $this->log("ValidateSaveAfter ".$this->form->email." <-");
        $this->form->role = $v->validateFromPost('role', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj role'
        ]);
        $this->log("ValidateSaveAfter_ROLE ".$this->form->role." <-");
        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }
    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_userEdit() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEdit()) {
            try {
                $this->log("userEditID = ".$this->form->id." <-");
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("uzytkownicy", "*", [
                    "user_id" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->log("Record userEditID = ".$record['user_id']." <-");
                $this->log("Record userEditID = ".$record['username']." <-");
                $this->log("Record userEditID = ".$record['email']." <-");
                $this->log("Record userEditID = ".$record['role_id']." <-");
                $this->form->id = $record['user_id'];
                $this->form->username = $record['username'];
                $this->form->email = $record['email'];
                $this->form->role = $record['role_id'];
                $this->log("ValidateROLE ".$this->form->role." <-");
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_userDelete() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("uzytkownicy", [
                    "user_id" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('userShow');
    }

    public function action_userSave() {
        $this->log("userSaveCheck +");
        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {
                $this->log("userSaveID = ".$this->form->id." <-");
                $this->log("userSaveID = ".$this->form->username." <-");
                $this->log("userSaveID = ".$this->form->email." <-");
                $this->log("userSaveID = ".$this->form->role." <-");
                //2.1 Nowy rekord
                if ($this->form->id == '') {
                        App::getRouter()->forwardTo('userShow');
                    }
                    $this->log("userSaveUPDATE = ".$this->form->id." <-");
                    $this->log("userSaveUPDATE = ".$this->form->username." <-");
                    $this->log("userSaveUPDATE = ".$this->form->email." <-");
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("uzytkownicy", [
                        "username" => $this->form->username,
                        "email" => $this->form->email,
                        "role_id" => $this->form->role
                            ], [
                        "user_id" => $this->form->id
                    ]);
                // }
                Utils::addInfoMessage('Pomyślnie zmieniono dane');
                $username = SessionUtils::load('login', true);
                $usernameLogin = App::getDB()->get("uzytkownicy", [
                    "username"
                ], [
                    "user_id"=>$username
                ]);
                $usernameLogin = implode($usernameLogin);
                if($usernameLogin == $this->form->username) {
                    App::getRouter()->forwardTo('logout');
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('userShow');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));
        App::getSmarty()->assign('records',$this->records);
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('userEdit.tpl');
    }

    public function log($data) {
        $output = $data;
        if (is_array($output))
        $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
