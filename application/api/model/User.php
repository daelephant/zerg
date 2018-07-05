<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-07-05
 * Time: 15:48
 */

namespace app\api\model;


class User extends BaseModel
{
    public static function getByOpenId($openid){
        $user = self::where('openid','=',$openid)->find();
        return $user;
    }
}