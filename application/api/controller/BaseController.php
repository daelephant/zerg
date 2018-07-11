<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/7/12
 * Time: 6:23
 */

namespace app\api\controller;


use think\Controller;
use app\api\service\Token as TokenService;

class BaseController extends Controller
{
    protected function checkPrimaryScope(){
        TokenService::needPrimaryScope();
    }

    protected function checkExclusiveScope(){
        TokenService::needExclusiveScope();
    }
}