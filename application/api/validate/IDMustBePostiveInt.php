<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-05-24
 * Time: 14:48
 */

namespace app\api\validate;


use think\Validate;

class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger',
        //'num' => 'in:1,2,3'
    ];
    protected $message=[
        'id' => 'id必须是正整数'
    ];


}