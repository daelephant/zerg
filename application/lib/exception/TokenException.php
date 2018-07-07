<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/7/7
 * Time: 23:11
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'Token已经过期或无效Token';
    public $errorCode = 100001;
}