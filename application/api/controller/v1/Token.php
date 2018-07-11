<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-07-05
 * Time: 15:28
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;

class Token
{
    public function getToken($code='')
    {
        (new TokenGet())->goCheck();
        $ut = new UserToken($code);
        $token = $ut->get($code);
        //用框架自动返回json格式：
        //return $token;
        return [
            'token'=>$token
        ];
    }
}