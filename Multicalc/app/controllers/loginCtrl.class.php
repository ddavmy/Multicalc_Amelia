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
    private $userData;
    private $calcs;

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
            $hashedPwdInDB = App::getDB()->get("uzytkownicy", "password", [
                "username"=>$this->form->login
            ]);

            if(empty($hashedPwdInDB)) {
                Utils::addErrorMessage("Takie konto nie istnieje!");
                return !app::getMessages()->isError();
            }
            
            $pwdVerify = password_verify($this->form->pass, $hashedPwdInDB);
    
                if($pwdVerify == 1) {
            
                    $this->userData = App::getDB()->get("uzytkownicy", [
                        "[><]role"=>["role_id"=>"role_id"]
                    ], [
                        "uzytkownicy.user_id",
                        "uzytkownicy.username",
                        "uzytkownicy.password",
                        "uzytkownicy.email",
                        "role.role_name"
                    ], [
                        "username"=>$this->form->login,
                        "password"=>$hashedPwdInDB
                    ]);
                    $user = new User($this->userData['user_id'], $this->userData['username'], $this->userData['role_name']);
                    SessionUtils::storeObject('user', $user);
                    RoleUtils::addRole($this->userData['role_name']);
                } else {
                    Utils::addErrorMessage("Takie konto nie istnieje!");
                }
            } else {
                Utils::addErrorMessage("Takie konto nie istnieje!");
            }
        return !app::getMessages()->isError();
    }

    public function action_login() {
        if ($this->validateLogin()) {
            Utils::addInfoMessage('Poprawnie zalogowano do systemu');
            App::getRouter()->redirectTo("siteShow");
        } else {
            $this->defUser();
            $this->generateView();
        }
    }

    public function defUser() {
        $check = ParamUtils::getFromSession('user', false, null, null);
        if(empty($check)) {
            $this->userData = App::getDB()->get("uzytkownicy", [
                "user_id",
                "username",
            ], [
                "username"=>"guest"
            ]);
            $user = new User($this->userData['user_id'], $this->userData['username'], null);
            SessionUtils::storeObject('user', $user);
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
 
    public function generateView() {
        $this->defUser();
        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('login.tpl');
    }

    public function genArticle() {
        $this->calcs = App::getDB()->query("
            SELECT *
            FROM calcs
            ORDER BY CASE WHEN calc_id = 0 THEN 1 ELSE 0 END ASC, calc_id ASC
        ")->fetchAll();

        return !app::getMessages()->isError();
    }

    public function action_siteShow() {
        $this->defUser();
        $this->genArticle();
        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));
        App::getSmarty()->assign('calcs', $this->calcs);
        App::getSmarty()->display('index.tpl');
    }

    public function log($data) {
        $output = $data;
        if (is_array($output))
        $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
