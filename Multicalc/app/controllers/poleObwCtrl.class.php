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
    
    private $calcPO;

    public function action_PoShow(){
        $this->calcPO = App::getDB()->select("figury", "*");
        $this->generateView();
	}

    public function generateView(){
        
        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));
        App::getSmarty()->assign('calcPO', $this->calcPO);

        App::getSmarty()->display('poleObw.tpl');
    }
    public function log($data) {
        $output = $data;
        if (is_array($output))
        $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
