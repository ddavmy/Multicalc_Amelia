<?php

namespace app\controllers;

use app\transfer\User;
use core\App;
use core\SessionUtils;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\LoginForm;

class loginCtrl {

    private $form;
    // private $login;
    private $role;

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        return !App::getMessages()->isError();
    }

    public function validateLogin() {
        //check if given username even exists
        if($this->validate()) {
            $usernameExists = App::getDB()->has("uzytkownicy", [
                "username"=>$this->form->login
            ]);

            //if it does then check the password
            if($usernameExists) {
                $hashedPwdInDB = App::getDB()->get("uzytkownicy", [
                    "password"
                ], [
                    "username"=>$this->form->login
                ]);
                $hashedPwdInDB = implode($hashedPwdInDB);

                //check if hashed pwd in db and input matches
                $pwdVerify = password_verify($this->form->pass, $hashedPwdInDB);
                if($pwdVerify == 1) {
                    //assign corresponding role
                    $this->role = App::getDB()->get("uzytkownicy", [
                        "[><]role"=>["role_id"=>"role_id"]
                    ], [
                        "role.role_name"
                    ], [
                        "username"=>$this->form->login,
                        "password"=>$hashedPwdInDB
                    ]);
                    
                    $username = App::getDB()->get("uzytkownicy", [
                        "user_id"
                    ], [
                        "username"=>$this->form->login
                    ]);
                    $role = App::getDB()->get("uzytkownicy", [
                        "role_id"
                    ], [
                        "username"=>$this->form->login
                    ]);
                    $this->log("loginROLA=".$role);
                    $username = implode($username);
                    $role = implode($role);
                    $this->role = implode($this->role);

                    SessionUtils::store('login', $username);
                    SessionUtils::store('role', $role);
                    $user = new User($this->form->login, $this->role);
                    SessionUtils::storeObject('user', $user);
                    RoleUtils::addRole($this->role);
                } else {
                    Utils::addErrorMessage("Takie konto nie istnieje");
                }
            } else {
                Utils::addErrorMessage("Takie konto nie istnieje!");
            }
        }

        return !app::getMessages()->isError();
    }

    public function action_login() {
        if ($this->validateLogin()) {
            //zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
            Utils::addInfoMessage('Poprawnie zalogowano do systemu');
            App::getRouter()->redirectTo("siteShow");
            // $this->generateView();
        } else {
            $this->generateView();
        }
    }

    public function action_loginShow() {
            $this->generateView();
    }

    public function action_logout() {
        // 1. zakończenie sesji
        SessionUtils::remove('user');
        session_destroy();
        Utils::addInfoMessage("Wylogowano pomyślnie");
        // 2. idź na stronę główną - system automatycznie przekieruje do strony logowania
        App::getRouter()->redirectTo("loginShow");
        // $this->generateView();
    }

    public function roleTest() {
        if(RoleUtils::inRole("admin")) {
            return true;
        } elseif(RoleUtils::inRole("user")) {
            return true;
        }  else
        $this->role = "guest";
        SessionUtils::store('login', 1);
        SessionUtils::store('role', 2);
        $user = new User("guest", $this->role);
        SessionUtils::storeObject('user', $user);
        SessionUtils::loadObject('user', true);
        RoleUtils::addRole($this->role);
    }
 
    public function generateView() {
        $this->roleTest();
        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));

        App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
        App::getSmarty()->display('login.tpl');
    }

    public function action_siteShow() {
        $this->roleTest();
        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));

        App::getSmarty()->display('index.tpl');
    }

    public function log($data) {
        $output = $data;
        if (is_array($output))
        $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
