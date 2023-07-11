<?php

namespace app\controllers;

use core\App;
use core\Route;
use core\Router;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\CalcForm;
use app\forms\ResultForm;

class PoleObwodCtrl {
    
    private $result;

    public function __construct() {
        $this->result = new ResultForm();
    }

    public function action_Pole_obwod() {
        $this->result->records = App::getDB()->query("
            SELECT figury.figura_id, figury.style, figury.image, figury.nazwa, calcs.action, figury.param1
            FROM figury
            INNER JOIN calcs ON figury.calc_id = calcs.calc_id
        ")->fetchAll();
        $this->generateView();
	}

    public function generateView() {
        
        App::getSmarty()->assign('user',SessionUtils::loadObject('user', true));
        App::getSmarty()->assign('records', $this->result->records);

        App::getSmarty()->display('PoleObwod.tpl');
    }

    public function log($data) {
        $output = $data;
        if (is_array($output))
        $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
