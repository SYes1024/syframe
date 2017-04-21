<?php
/* 
* @Author: SYes
* @Date:   2017-02-20 22:28:44
* @Last Modified by:   SYes
* @Last Modified time: 2017-02-20 22:29:12
*/
/**
 * 路由类库
 */
namespace core\lib;

class route
{
    public $controller;//控制器
    public $action;//方法
    public function __construct()
    {
        /**
         * 1.隐藏index.php
         * 2.获取URL中的参数 $_SERVER['REQUEST_URI']
         * 3.返回对应的控制器和方法
         */
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            $path = $_SERVER['REQUEST_URI'];
            $pathArr = explode('/', trim($path, '/'));//先去一个 / ，然后分隔
            if(isset($pathArr[0])) {
                $this->controller = $pathArr[0];
                unset($pathArr[0]);
            }
            if(isset($pathArr[1])) { //判断第二个参数是否存在
                $this->action = $pathArr[1];
                unset($pathArr[1]);
            } else {
                $this->action = 'index';
            }
            //url多余部分转换成$_GET
            //id/1/str/2/test/3
            $count = count($pathArr) + 2;//判断数组中有多少类
            $i = 2;
            while($i < $count) {
                if(isset($pathArr[$i + 1])) { //判断参数值是否存在
                    $_GET[$pathArr[$i]] = $pathArr[$i + 1];
                }
                $i += 2;
            }
        } else {
            $this->controller = 'index';//默认控制器
            $this->action = 'index';//默认方法
        }
    }
}
?>
