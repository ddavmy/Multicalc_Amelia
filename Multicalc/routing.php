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

Utils::addRoute('userDelete',       'usersCtrl',        ['admin']);
Utils::addRoute('usersShow',        'usersCtrl',        ['user', 'admin']);

Utils::addRoute('poleObwDelete',    'poleObwCtrl',      ['admin']);
Utils::addRoute('poleObwShow',      'poleObwCtrl');
Utils::addRoute('poleObwCompute',   'poleObwCtrl');

Utils::addRoute('deltaDelete',      'deltaCtrl',        ['admin']);
Utils::addRoute('deltaShow',        'deltaCtrl');
Utils::addRoute('deltaCompute',     'deltaCtrl');

Utils::addRoute('trygDelete',      'trygCtrl',        ['admin']);
Utils::addRoute('trygShow',        'trygCtrl');
Utils::addRoute('trygCompute',     'trygCtrl');