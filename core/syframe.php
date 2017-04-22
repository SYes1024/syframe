<?php
/* 
* @Author: SYes
* @Date:   2017-02-20 21:54:08
* @Last Modified by:   SYes
* @Last Modified time: 2017-02-20 22:28:37
*/

namespace core;

class syframe
{
    public static $classMap = array();
    public $assign;//传给前台的值
    //测试核心文件是否加载成功
    static public function run()
    {
        \core\lib\log::init();
        \core\lib\log::log('test1');
        $route = new \core\lib\route();
        $controller = $route->controller;
        $action = $route->action;
        $ctrlPath = APP.'/controller/'.$controller.'Controller.php';//控制器路径
        $ctrlClass = '\\'.MODULE.'\controller\\'.$controller.'Controller';//控制器类名
        if(is_file($ctrlPath)) {
            include $ctrlPath;
            $ctrl = new $ctrlClass();
            $ctrl->$action();//加载方法
            \core\lib\log::log('ctrl:'.$ctrlClass.'    '.'aciton:'.$action);
        } else {
            throw new \Exception('找不到控制器'.$controller);
        }
    }

    //自动加载类库
    static public function load($class)
    {
        if(isset($classMap[$class])) {
            return true;//判断类是否已经被引入
        } else {
            $class = str_replace('\\', '/', $class);//替换，把 \ 换成 /
            $file = ROOT .'/'. $class . '.php';
            if (is_file($file)) {  //判断文件是否存在
                include $file;//存在引入
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    //视图传值
    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    //视图输出
    public function display($file)
    {
        $filePath = APP.'/views/'.$file;
        if(is_file($filePath)) {
            extract($this->assign);//将数组拆分成变量
            include $filePath;
        }
    }
}
?>
