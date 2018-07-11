<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/7/6
 * Time: 7:27
 */

namespace app\api\service;


use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;

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

    public static function getCurrentTokenVar($key){
        //约定好token在header头里传递
        $token = Request::instance()
            ->header('token');
        $vars = Cache::get($token);
        if(!$vars){
            throw new TokenException();
        }else{
            if(!is_array($vars)){
                $vars = json_decode($vars,true);
            }
            if(array_key_exists($key,$vars)){
                return $vars[$key];
            }
            else{
                throw new Exception('尝试获取的Token变量不存在');
            }
        }
    }

    public static function getCurrentUid(){
        //token
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }
}