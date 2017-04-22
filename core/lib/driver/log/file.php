<?php
/**
 * Created by PhpStorm.
 * Author: SYes
 * Date: 2017/4/21
 * Time: 15:46
 */
//文件系统
namespace core\lib\driver\log;

use core\lib\config;

class file
{
    public $option;//日志配置信息
    public $path;//日志存储位置

    public function __construct()
    {
        $this->option = config::get('OPTION', 'log');
        $this->path = $this->option['PATH'];
    }

    public function log($message, $file = 'log')
    {
        /**
         * 1.确定文件是否存在
         *   否：新建目录
         *   是：写入日志
         */
        if(!is_dir($this->path.'\\'.date('Ymd'))) {
            mkdir($this->path.'\\'.date('Ymd'), '0777', true);
        }
        return file_put_contents($this->path.'\\'.date('Ymd').'\\'.$file.'.php', date('Y-m-d H:i:s').json_encode($message).PHP_EOL, FILE_APPEND);//文件内容写入
    }
}