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

class model extends \PDO
{
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=syframe';//这里的配置直接使用
        $username = 'root';
        $passwd = 'root';
        try {
            parent::__construct($dsn, $username, $passwd);
        } catch (\PDOException $e) {
            dump($e->getMessage());
        }
    }
}