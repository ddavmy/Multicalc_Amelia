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

Utils::addRoute('userShow',         'userCtrl',        ['user', 'admin']);
Utils::addRoute('userDelete',       'userEditCtrl',        ['admin']);
Utils::addRoute('userEdit',         'userEditCtrl',	    ['admin']);
Utils::addRoute('userSave',         'userEditCtrl',	    ['admin']);

// Utils::addRoute('userNew',     'userEditCtrl',	['admin']);

Utils::addRoute('poleObwShow',      'poleObwCtrl');
Utils::addRoute('poleObwDelete',    'poleObwCtrl',      ['admin']);
Utils::addRoute('poleObwCompute',   'poleObwCtrl');

Utils::addRoute('deltaShow',        'deltaCtrl');
Utils::addRoute('deltaDelete',      'deltaCtrl',        ['admin']);
Utils::addRoute('deltaCompute',     'deltaCtrl');

Utils::addRoute('trygShow',        'trygCtrl');
Utils::addRoute('trygDelete',      'trygCtrl',        ['admin']);
Utils::addRoute('trygCompute',     'trygCtrl');
