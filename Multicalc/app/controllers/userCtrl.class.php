<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;

class userCtrl {
    private $form;
    public $records;

    public function userList() {
        // 1. Walidacja danych formularza (z pobraniem)
        // - W tej aplikacji walidacja nie jest potrzebna, ponieważ nie wystąpią błedy podczas podawania nazwiska.
        //   Jednak pozostawiono ją, ponieważ gdyby uzytkownik wprowadzał np. datę, lub wartość numeryczną, to trzeba
        //   odpowiednio zareagować wyświetlając odpowiednią informację (poprzez obiekt wiadomości Messages)
        // $this->validate();

        //SELECT uzytkownicy.username, uzytkownicy.password, role.role_name FROM uzytkownicy INNER JOIN role ON uzytkownicy.user_id=role.role_id;
        try {
            $this->records = App::getDB()->select("uzytkownicy", [
                "[><]role"=>["role_id"=>"role_id"]
            ], [
                "uzytkownicy.user_id",
                "uzytkownicy.username",
                "uzytkownicy.password",
                "uzytkownicy.email",
                "role.role_name"
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        $this->generateView();
    }

    public function action_userShow(){
        $this->userList();
	}

    public function generateView(){

        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));

        App::getSmarty()->assign('records',$this->records);
        
        App::getSmarty()->display('user.tpl');
    }

}
