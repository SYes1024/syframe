<?php
/**
 * Created by PhpStorm.
 * Author: SYes
 * Date: 2017/4/21
 * Time: 12:40
 */
namespace app\controller;

use app\Model\cModel;
use core\lib\model;

class indexController extends \core\syframe
{
    public function index()
    {
        $data = 'hello world!11';
        $this->assign('data', $data);
        $this->display('index.html');
    }

    public function test()
    {
        $data = 'test';
        $this->assign('data', $data);
        $this->display('test.html');
    }
}