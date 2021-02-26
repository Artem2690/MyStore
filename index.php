<?php
define('VG_ACCESS',true);

header('Content-Type:text/html;charset=utf-8');
session_start();

require_once 'config.php';
require_once 'core/base/settings/internal_settings.php';
use Core\base\exceptions\RoutException;
use Core\base\controllers\RoutController;
try {
    //RoutController::getInstance()->route();
    RoutController::getInstance();
}catch (RoutException $e){
    exit($e->getMessage());
}

