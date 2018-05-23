<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-05-23
 * Time: 17:54
 */

namespace app\api\validate;


use think\Validate;

class TestValidate extends Validate
{
    //定义验证器
    //rule是TP固定的写法
    protected $rule = [
        'name' => 'require|max:10',
        'email' => 'email'
    ];
}