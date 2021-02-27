<?php
//Настройки плагина Shop

namespace core\base\settings;
use core\base\settings\Settings;

class ShopSettings
{
    static private $_instance;

    private $baseSettings;
    private $routes = [
        'admin'=>[
          'name'=>'bum'
      ]
        ];
    //Шаблон полей плагина Shop
    private $teplateArr = [
        'text'=>['price','short'],
        'textarea'=>['goods_content']
    ];

    //Метод для возвращения свойств routes
    static public function get($property){
        return self::instance()->$property;

    }

    static public function instance(){
        if(self::$_instance instanceof self){
            return self::$_instance;
        }
        self::$_instance = new self;
        //в свойство BaseSettings присваюваим сылку на объект класса Settings
        self::$_instance->baseSettings = Settings::instance();
        // в baseProperties сохраним результат работы метода baseProperties класса Settings
        $baseProperties = self::$_instance->baseSettings->clueProperties(get_class());
        self::$_instance->setProperty($baseProperties);

        return self::$_instance;

    }
    //
    protected function setProperty($properties){
        if ($properties){
            foreach ($properties as $name =>$property){
                $this->$name = $property;
            }
        }
    }

    //Защищаем от создания через new
    private function __construct(){
    }
    //Защищаем от создания через клонировани
    private function  __clone()
    {
    }

}