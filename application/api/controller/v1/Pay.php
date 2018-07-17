<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/7/15
 * Time: 16:33
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\WxNotify;
use app\api\validate\IDMustBePostiveInt;
use app\api\service\Pay as PayService;

class Pay extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'getPreOrder']
    ];

    public function getPreOrder($id='')
    {
        (new IDMustBePostiveInt())->goCheck();
        $pay = new PayService($id);
        return $pay->pay();
    }
    //微信端调用的接口
    public function redirectNotify()
    {
        //通知频率为15/15/30/180/1800/1800/1800/3600,单位：秒
        //1、检查库存量，超卖
        //2、更新这个订单的status状态
        //3、减库存
        //如果成功处理，我们返回微信成功处理的信息。否则，我们需要返回没有成功处理

        //微信调用接口，特点：post,xml格式，不会携带参数
        $notify = new WxNotify();
        $notify->handle();

    }


    public function notifyConcurrency()
    {
        $notify = new WxNotify();
        $notify->handle();
    }

    public function receiveNotify()
    {
//        $xmlData = file_get_contents('php://input');
//        Log::error($xmlData);
//        $notify = new WxNotify();
//        $notify->handle();
        $xmlData = file_get_contents('php://input');
        $result = curl_post_raw('http:/zerg.cn/api/v1/pay/re_notify?XDEBUG_SESSION_START=13133',
            $xmlData);
        return $result;
        Log::error($xmlData);
    }
}