<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-07-11
 * Time: 17:40
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\Token;
use app\api\validate\IDMustBePostiveInt;
use app\api\validate\OrderPlace;
use app\api\validate\PagingParameter;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\OrderException;
use app\lib\exception\SuccessMessage;
use app\lib\exception\TokenException;
use think\Controller;
use app\api\service\Token as TokenService;
use app\api\service\Order as OrderService;
use app\api\model\Order as OrderModel;

class Order extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'placeOrder'],
        'checkPrimaryScope' => ['only' => 'getDetail, getSummaryByUser']
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

    public function getSummaryByUser($page=1,$size=15)
    {
        (new PagingParameter())->goCheck();
        $uid = Token::getCurrentUid();
        $pagingOrders = OrderModel::getSummaryByUser($uid,$page,$size);
        //$pagingOrders是对象
        if($pagingOrders->isEmpty()){
            return [
                'data' => [],
                'current_page' =>$pagingOrders->getCurrentPage()
            ];
        }
        $data = $pagingOrders->hidden(['snap_items','snap_address','prepay_id'])->toArray();
        return [
            'data' => $data,
            'current_page' =>$pagingOrders->getCurrentPage()
        ];
    }

    /**
     * 获取全部订单简要信息（分页）
     * @param int $page
     * @param int $size
     * @return array
     * @throws \app\lib\exception\ParameterException
     */
    public function getSummary($page=1, $size = 20){
        (new PagingParameter())->goCheck();
//        $uid = Token::getCurrentUid();
        $pagingOrders = OrderModel::getSummaryByPage($page, $size);
        if ($pagingOrders->isEmpty())
        {
            return [
                'current_page' => $pagingOrders->currentPage(),
                'data' => []
            ];
        }
        $data = $pagingOrders->hidden(['snap_items', 'snap_address'])
            ->toArray();
        return [
            'current_page' => $pagingOrders->currentPage(),
            'data' => $data
        ];
    }

    //订单详情接口
    public function getDetail($id)
    {
        (new IDMustBePostiveInt())->goCheck();
        $orderDetail = OrderModel::get($id);
        if(!$orderDetail)
        {
            throw new OrderException();
        }
        return $orderDetail->hidden(['prepay_id']);
    }

    public function placeOrder(){
        (new OrderPlace())->goCheck();
        //要获取数组参数，专门写法
        $products = input('post.products/a');
        $uid = TokenService::getCurrentUid();
        //在service里面建立一个模型来处理复杂的具体业务逻辑

        $order = new OrderService();
        $status = $order->place($uid,$products);
        return $status;
    }

    public function delivery($id){
        (new IDMustBePostiveInt())->goCheck();
        $order = new OrderService();
        $success = $order->delivery($id);
        if($success){
            return new SuccessMessage();
        }
    }
}