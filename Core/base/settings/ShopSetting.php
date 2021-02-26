<?php


namespace core\base\settings;
use core\base\settings\Settings;

class ShopSetting
{
    static private $_instance;
    private $BaseSettings;
    private $teplateArr = [
        'text'=>['name','phone','adress','price','short'],
        'textarea'=>['content','keywords','goods_content']
    ];
    //Защищаем от создания через new
    private function __construct(){
    }
    //Защищаем от создания через клонировани
    private function  __clone()
    {
    }
    //Метод для возвращения свойств routes
    static public function get($property){
        return self::instance()->$property;

    }

    static public function instance(){
        if(self::$_instance instanceof self){
            return self::$_instance;
        }
        self::$_instance->BaseSettings = Settings::instance();
        $baseProperties=self::instance()->BaseSettings->clueProperties(get_class());
        return self::$_instance = new self;
    }


}