<?php
//файл настроек фреймворка
//использован шаблон проектирования singleton

namespace core\base\settings;


class Settings
{
    static private $_instance;

    private $routes =[
      'admin'=>[
          'name'=>'admin',//url для входа в админ панель
          'path'=>'core/admin/controllers/',//пространство имен
          'hrUrl'=> false //Понятный для человека url

      ],
      'settings'=> [
           'path'=>'core/base/settings'//пространство имен

      ],
      'plugins'=>[
          'path'=>'core/plugins',//пространство имен
          'hrUrl'=> false //Понятный для человека url
      ],
      'user'=>[
          'path'=>'core/user/controllers/',//пространство имен
          'hrUrl'=> true, //Понятный для человека url
          'routes'=>[

              ]
      ],
      'default' => [
          'controller'=> 'IndexController',//Контроллер по умолчанию
          'inputMethod'=> 'InputData',//Метод по умолчанию сбора данних
          'outputMethod'=> 'OutputData' //Метод по умолчанию вывода данних
      ]
    ];
    //стандартный шаблон для полей
    private $teplateArr = [
        'text'=>['name','phone','adress'],
        'textarea'=>['content','keywords']
    ];
    private $lalla = [
        'text'=>['name','phone','adress']
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
        } return self::$_instance = new self;
    }
    //Метод который будет склеивать свойства указанного класса
    public function clueProperties($class){
        $baseProperties = [];
        //Проходем в цикле по объекту класса Settings ($this)  как (as) имя свойства ($name) и значение свойства ($item)
        //В переменную $property мы будем сохранять свойства класса которого мы передали в метод clueProperties в качестве параметра
        //через метод get ,,,

        foreach ($this as $name =>$item){
            $property = $class::get($name);
            if (is_array($property) && is_array($item)){
                $baseProperties[$name] = $this->arreyMargeRecursive($this->$name,$property);
                continue;
            }
            if (!$property) $baseProperties[$name]= $this->$name;
        }
       return $baseProperties;
    }
    //Метод склейки массива подходящий нам
    public function arreyMargeRecursive(){
        $arrays = func_get_args();
        $base = array_shift($arrays);

        foreach ($arrays as $array){
            foreach ($array as $key=>$value){
                if (is_array($value) && is_array($base[$key])){
                    $base[$key] = $this->arreyMargeRecursive($base[$key],$value);
                }else{
                    if (is_int($key)){
                        if (!in_array($value,$base))array_push($base, $value);
                        continue;
                    }
                    $base[$key] = $value;
                }
            }
        }
        return $base;
    }


}