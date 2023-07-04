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
Utils::addRoute('PoShow',           'poleObwCtrl');

Utils::addRoute('userShow',         'userCtrl',         ['user', 'admin']);
Utils::addRoute('userDelete',       'userEditCtrl',     ['admin']);
Utils::addRoute('userEdit',         'userEditCtrl',	    ['admin']);
Utils::addRoute('userSave',         'userEditCtrl',	    ['admin']);

Utils::addRoute('POkwShow',         'calcPOkwCtrl');
Utils::addRoute('POkwDelete',       'calcPOkwCtrl',      ['admin']);
Utils::addRoute('POkwCompute',      'calcPOkwCtrl');

Utils::addRoute('POprShow',         'calcPOprCtrl');
Utils::addRoute('POprDelete',       'calcPOprCtrl',      ['admin']);
Utils::addRoute('POprCompute',      'calcPOprCtrl');

Utils::addRoute('POtrShow',         'calcPOtrCtrl');
Utils::addRoute('POtrDelete',       'calcPOtrCtrl',      ['admin']);
Utils::addRoute('POtrCompute',      'calcPOtrCtrl');

Utils::addRoute('POrbShow',         'calcPOrbCtrl');
Utils::addRoute('POrbDelete',       'calcPOrbCtrl',      ['admin']);
Utils::addRoute('POrbCompute',      'calcPOrbCtrl');

Utils::addRoute('POtzShow',         'calcPOtzCtrl');
Utils::addRoute('POtzDelete',       'calcPOtzCtrl',      ['admin']);
Utils::addRoute('POtzCompute',      'calcPOtzCtrl');

Utils::addRoute('POrgShow',         'calcPOrgCtrl');
Utils::addRoute('POrgDelete',       'calcPOrgCtrl',      ['admin']);
Utils::addRoute('POrgCompute',      'calcPOrgCtrl');

Utils::addRoute('POkoShow',         'calcPOkoCtrl');
Utils::addRoute('POkoDelete',       'calcPOkoCtrl',      ['admin']);
Utils::addRoute('POkoCompute',      'calcPOkoCtrl');

Utils::addRoute('calcDeltaShow',    'calcDeltaCtrl');
Utils::addRoute('calcDeltaDelete',  'calcDeltaCtrl',     ['admin']);
Utils::addRoute('calcDeltaCompute', 'calcDeltaCtrl');

Utils::addRoute('calcTrygShow',     'calcTrygCtrl');
Utils::addRoute('calcTrygDelete',   'calcTrygCtrl',      ['admin']);
Utils::addRoute('calcTrygCompute',  'calcTrygCtrl');
