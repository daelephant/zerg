<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-07-11
 * Time: 11:12
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '权限不够';
    public $errorCode = 10001;
}