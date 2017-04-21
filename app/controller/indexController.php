<?php
/**
 * Created by PhpStorm.
 * Author: SYes
 * Date: 2017/4/21
 * Time: 12:40
 */
namespace app\controller;

class indexController extends \core\syframe
{
    public function index()
    {
        $temp = new \core\lib\model();
        print_r($temp);
        /*视图部分实现*/
        $data = 'hello world';
        $title = '视图文件';
        $this->assign('data', $data);
        $this->assign('title', $title);
        $this->display('index.html');
    }
}