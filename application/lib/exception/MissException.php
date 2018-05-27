<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/5/27
 * Time: 15:17
 */

namespace app\lib\exception;


class MissException extends BaseException
{
    //覆盖父类
    public $code = 400;
    public $msg = '请求的Banner不存在';
    public $errorCode = 40000;
}