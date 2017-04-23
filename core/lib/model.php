<?php
/**
 * Created by PhpStorm.
 * Author: SYes
 * Date: 2017/4/21
 * Time: 12:54
 */
/**
 * 数据库模型
 */
namespace core\lib;
use core\lib\config;

class model extends \Medoo\Medoo
{
    public function __construct()
    {
        $database = config::all('database');
        parent::__construct($database);
    }
}