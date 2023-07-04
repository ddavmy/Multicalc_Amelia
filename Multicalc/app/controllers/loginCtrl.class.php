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
    private $role;
    private $calc;

    public function __construct() {

        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');


        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        return !App::getMessages()->isError();
    }

    public function validateLogin() {

        if($this->validate()) {
            $usernameExists = App::getDB()->has("uzytkownicy", [
                "username"=>$this->form->login
            ]);

    
            if($usernameExists) {
                $hashedPwdInDB = App::getDB()->get("uzytkownicy", [
                    "password"
                ], [
                    "username"=>$this->form->login
                ]);
                $hashedPwdInDB = implode($hashedPwdInDB);

        
                $pwdVerify = password_verify($this->form->pass, $hashedPwdInDB);
                if($pwdVerify == 1) {
            
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
    
            Utils::addInfoMessage('Poprawnie zalogowano do systemu');
            $this->roleTest();
            App::getRouter()->redirectTo("siteShow");
    
        } else {
            $this->generateView();
        }
    }

    public function action_loginShow() {
            $this->generateView();
    }

    public function action_logout() {

        SessionUtils::remove('user');
        session_destroy();
        Utils::addInfoMessage("Wylogowano pomyślnie");

        App::getRouter()->redirectTo("loginShow");

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

        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('login.tpl');
    }

    public function genArticle() {
        $this->calc = App::getDB()->select("calc", "*");

        return !app::getMessages()->isError();
    }

    public function action_siteShow() {
        $this->roleTest();
        $this->genArticle();
        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));
        App::getSmarty()->assign('calc', $this->calc);
        App::getSmarty()->display('index.tpl');
    }

    public function log($data) {
        $output = $data;
        if (is_array($output))
        $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
