<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-07-11
 * Time: 17:40
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\OrderPlace;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;
use think\Controller;
use app\api\service\Token as TokenService;

class Order extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'placeOrder']
    ];
    //下面方法被抽象到baseController里面
    //protected function checkExclusiveScope(){
    //    $scope = TokenService::getCurrentTokenVar('scope');
    //    if ($scope){
    //
    //        if ($scope == ScopeEnum::User){
    //            return true;
    //        }
    //        else{
    //            throw new ForbiddenException();
    //        }
    //    }else
    //    {
    //        throw new TokenException();
    //    }
    //}
    public function placeOrder(){
        (new OrderPlace())->goCheck();
        //要获取数组参数，专门写法
        $products = input('post.products/a');
        $uid = TokenService::getCurrentUid();
        //在service里面建立一个模型来处理复杂的具体业务逻辑
    }
}