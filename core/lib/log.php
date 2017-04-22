<?php
/**
 * Created by PhpStorm.
 * Author: SYes
 * Date: 2017/4/21
 * Time: 15:36
 */

namespace core\lib;

class log
{
    static $class;//存放驱动

    /**
     * 1.确定日志存储方式
     * 2.写日志
     */

    static public function init()
    {
        //确定驱动方式
        $driver = config::get('DRIVER', 'log');
        $class = '\core\lib\driver\log\\'.$driver;

        self::$class = new $class;
    }

    static public function log($name, $file = 'log')
    {
        self::$class->log($name, $file);
    }
}