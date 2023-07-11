<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('siteShow'); #default action
App::getRouter()->setLoginRoute('loginShow'); #action to forward if no permissions

Utils::addRoute('login',            'loginCtrl');
Utils::addRoute('loginShow',        'loginCtrl');
Utils::addRoute('logout',           'loginCtrl');
Utils::addRoute('register',         'registerCtrl');
Utils::addRoute('registerShow',     'registerCtrl');
Utils::addRoute('siteShow',         'loginCtrl');

Utils::addRoute('userShow',         'userCtrl',         ['user', 'admin']);
Utils::addRoute('userDelete',       'userEditCtrl',     ['admin']);
Utils::addRoute('userEdit',         'userEditCtrl',	    ['admin']);
Utils::addRoute('userSave',         'userEditCtrl',	    ['admin']);

Utils::addRoute('Pole_obwod',           'PoleObwodCtrl');
Utils::addRoute('Kwadrat',         'calcKwadratCtrl');
Utils::addRoute('Prostokat',         'calcProstokatCtrl');
Utils::addRoute('Trojkat',         'calcTrojkatCtrl');
Utils::addRoute('Romb',         'calcRombCtrl');
Utils::addRoute('Trapez',         'calcTrapezCtrl');
Utils::addRoute('Rownoleglobok',         'calcRownoleglobokCtrl');
Utils::addRoute('Kolo',         'calcKoloCtrl');

Utils::addRoute('Delta',    'calcDeltaCtrl');
Utils::addRoute('Funkcje_trygonometryczne',     'calcFunkcjeTrygCtrl');
