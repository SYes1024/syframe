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

class model extends \PDO
{
    public function __construct()
    {
        $database = config::all('database');
        try {
            parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWD']);
        } catch (\PDOException $e) {
            dump($e->getMessage());
        }
    }
}