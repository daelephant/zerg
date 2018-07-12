<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-07-12
 * Time: 16:28
 */

namespace app\lib\exception;


class OrderException extends BaseException
{
    public $code = 404;
    public $msg = '订单不存在，请检查ID';
    public $errorCode = 80000;
}