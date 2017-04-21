<?php
/* 
* @Author: anchen
* @Date:   2017-02-20 21:42:20
* @Last Modified by:   anchen
* @Last Modified time: 2017-02-20 22:18:45
*/

function dump($var){
    if(is_bool($var)){
        var_dump($var);//布尔值原样输出
    }else if(is_null($var)){
        var_dump(NULL);//空值输出
    }else{
        echo "<pre style='background:#F5F5F5;border:1px solid #aaa;font-size:20px;'>".print_r($var,true)."</pre>";
    }
}
?>
