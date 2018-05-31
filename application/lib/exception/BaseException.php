<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/5/27
 * Time: 15:09
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    //预制变量：写子类的时候这样一些成员变量都是会被覆盖的
    //HTTP 状态码 404,200
    public $code = 400;

    //错误具体信息
    public $msg = '参数错误';

    //自定义的错误码
    public $errorCode = 10000;

    public function __construct($params = [])
    {
        if(!is_array($params)){
            return ;
            //throw new Exception('参数必须是整数');
        }

        if(array_key_exists('code',$params)){
            $this->code = $params['code'];
        }

        if(array_key_exists('msg',$params)){
            $this->msg = $params['msg'];
        }
        if(array_key_exists('errorCode',$params)){
            $this->errorCode = $params['errorCode'];
        }
    }
}