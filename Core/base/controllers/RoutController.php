<?php


namespace Core\base\controllers;
use core\base\settings\Settings;
use core\base\settings\ShopSettings;

class RoutController
{
    static private $_instance;
    //Защищаем от создания через клонировани
    private function __clone(){

    }
    //Защищаем от создания через new
    private function  __construct(){
        $s = Settings::instance();
        $s1 = ShopSettings::instance();
        exit();
    }
    //создание объект класса или возваращения сылки на объект класса
    static public function getInstance(){
        if(self::$_instance instanceof self){
            return self::$_instance;// Если $_instance не равен 'null', то возвращаем существующий объект
        }
        return self::$_instance = new self; // Иначе  создаем объект new self()
    }



}