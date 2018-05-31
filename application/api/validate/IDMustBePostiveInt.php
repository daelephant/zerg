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
    //自定义验证规则（验证正整数）
    protected function isPositiveInteger($value,$rule='',$data='',$field='')
    {
        //验证正整数
        if(is_numeric($value) && is_int($value + 0) && ($value + 0) > 0){
            return true;
        }
        else{
            return $field.'必须是正整数';
        }
    }

}