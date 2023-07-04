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
    private $form; 

    public function __construct() {

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

        $this->form->id = ParamUtils::getFromPost('id', true, 'Błędne wywołanie aplikacji');

        $this->log("ValidateSaveAfterID ".$this->form->id." <-");
        
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

    public function validateEdit() {


        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }
    public function action_userEdit() {

        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("uzytkownicy", "*", [
                    "user_id" => $this->form->id
                ]);
        
                $this->form->id = $record['user_id'];
                $this->form->username = $record['username'];
                $this->form->email = $record['email'];
                $this->form->role = $record['role_id'];
        
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        $this->generateView();
    }

    public function action_userDelete() {
        if ($this->validateEdit()) {
            try {
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
        App::getRouter()->forwardTo('userShow');
    }

    public function action_userSave() {
        $this->log("userSaveCheck +");

        if ($this->validateSave()) {
    
            try {
        
                if ($this->form->id == '') {
                    App::getRouter()->forwardTo('userShow');
                }
                else if (App::getDB()->has("uzytkownicy", [
                        "username" => $this->form->username
                    ])) {
                        Utils::addErrorMessage('Nazwa jest już zajęta');
                        $this->generateView();
                        return !App::getMessages()->isError();
                    }
                    App::getDB()->update("uzytkownicy", [
                        "username" => $this->form->username,
                        "email" => $this->form->email,
                        "role_id" => $this->form->role
                            ], [
                        "user_id" => $this->form->id
                    ]);
        
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

    
            App::getRouter()->forwardTo('userShow');
        } else {
    
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));
        App::getSmarty()->assign('records',$this->records);
        App::getSmarty()->assign('form', $this->form); 

        App::getSmarty()->display('userEdit.tpl');
    }

    public function log($data) {
        $output = $data;
        if (is_array($output))
        $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
