<?php
/**
 * 框架入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

define('ROOT', __DIR__);//入口文件所在根目录
define('CORE', ROOT.'/core');//核心文件所在目录
define('APP', ROOT.'/app');//项目文件所处目录
define('MODULE', 'app');//模块名
define('DEBUG',true);//是否开启调试模式

include "vendor/autoload.php";

if(DEBUG) {
    $whoops = new \Whoops\Run();
    $errorTitle = "框架出错了";
    $option = new \Whoops\Handler\PrettyPageHandler();
    $option->setPageTitle($errorTitle);
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_error','On');//显示错误
} else {
    ini_set('display_error', 'Off');
}

include CORE.'/common/function.php';//加载核心类库
include CORE.'/syframe.php';//加载核心文件

spl_autoload_register('\core\syframe::load');//当前类方法不存在函数栈内时，自动加载此方法

\core\syframe::run();//命名空间调用，设置成静态方法
/*
调用成功了，但命名的常量路径都是C:\xxx\xxx.php格式，而不是/xxx/xx.php
类似命令$_SERVER['SCRIPT_NAME']
 */

//var_dump($_SERVER['SCRIPT_NAME']);
?>