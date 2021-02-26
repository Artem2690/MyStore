<?php


namespace Core\base\controllers;
use core\base\settings\Settings;

class RoutController
{
    static private $_instance;
    //Защищаем от создания через new
    private function  __construct(){

    }
    //Защищаем от создания через клонировани
    private function __clone(){

    }
    //создание объект класса или возваращения сылки на объект класса
    static public function getInstance(){
        if(self::$_instance instanceof self){
            return self::$_instance;// Если $_instance не равен 'null', то возвращаем существующий объект
        }
        return self::$_instance = new self; // Иначе  создаем объект new self()
    }

}