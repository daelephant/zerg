<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/7/9
 * Time: 6:37
 */

namespace app\lib\exception;


class UserException extends BaseException
{
    public $code = 404;
    public $msg = '用户不存在';
    public $errorCode = 60000;
}