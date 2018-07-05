<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/7/6
 * Time: 7:27
 */

namespace app\api\service;


class Token
{
    //定义为静态的，因为这个方法跟实例对象无关系
    public static function generateToken(){
        //32个字符组成一组随机字符串
        $randChars = getRandChars();
    }
}