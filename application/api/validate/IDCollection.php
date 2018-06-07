<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-06-07
 * Time: 17:07
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule=[
        'ids' => 'require|checkIDs'
    ];
    protected $message=[
        'ids' => 'ids参数必须是以逗号分隔的多个正整数'
    ];

    //ids = id1,id2,id3
    protected function checkIDs($value){
        $value = str_replace('，',',',$value);//处理传入汉语逗号
        $values = explode(',',$value);
        if(empty($values)){
            return false;
        }
        foreach ($values as $id){
            if(!$this->isPositiveInteger($id)){
                return false;
            }
        }
        return true;
    }
}