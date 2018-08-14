<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/8/12
 * Time: 16:50
 */

namespace app\api\validate;


class AppTokenGet extends BaseValidate
{
    protected $rule = [
        'ac' => 'require|isNotEmpty',
        'se' => 'require|isNotEmpty'
    ];
}