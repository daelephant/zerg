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
        $randChars = getRandChar(32);
        //避免别人轻易伪造出Token：
        //用三组字符串，进行md5加密，把加密后的Token返回给客户端去
        //获取当前访问时间戳
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        //第三组：包括数据库存贮，密码加密以及很多密码算法里面涉及到加盐salt处理，他也是一个随机的字符串、这里把他定义到配置文件里
        $salt = config('secure.token_salt');
        return md5($randChars.$timestamp.$salt);
    }
}