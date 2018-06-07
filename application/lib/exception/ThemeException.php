<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/6/8
 * Time: 7:16
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '指定主题不存在，请检查主题ID';
    public $errorCode = 30000;
}