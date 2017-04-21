<?php
/**
 * Created by PhpStorm.
 * Author: SYes
 * Date: 2017/4/21
 * Time: 13:47
 */
/**
 * 配置类
 */
namespace core\lib;

class config
{
    static public $conf = array();

    static public function get($name, $file)
    {
        /**
         * 1.判断配置文件是否存在
         * 2.判断配置是否存在
         * 3.缓存配置
         */
        if (isset(self::$conf[$file])) {
            return self::$conf[$file][$name];
        } else {
            $filePath = ROOT . '/core/config/' . $file . '.php';
            if (is_file($filePath)) {
                $conf = include $filePath;
                if (isset($conf[$name])) {
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception('没有这个配置项' . $name);
                }
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }

    static public function all($file)
    {
        /**
         * 读取所有配置
         */
        if (isset(self::$conf[$file])) {
            return self::$conf[$file];
        } else {
            $filePath = ROOT . '/core/config/' . $file . '.php';
            if (is_file($filePath)) {
                $conf = include $filePath;
                self::$conf[$file] = $conf;
                return self::$conf[$file];
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }
}