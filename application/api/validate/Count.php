<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/6/12
 * Time: 6:40
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
        'count' => 'isPositiveInteger|between:1,15'
    ];
}