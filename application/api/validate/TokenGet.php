<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-07-05
 * Time: 15:30
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code'=>'require|isNotEmpty'
    ];

    protected $message = [
        'code' => '没有code还想获取Token？'
    ];
}