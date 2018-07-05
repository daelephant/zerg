<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-07-05
 * Time: 16:01
 * 实现对model的分层，model处理比较简单的细粒度的业务逻辑（还担任数据库访问层），service层处理复杂业务
 */

namespace app\api\service;


use app\lib\exception\WeChatException;
use think\Exception;
use app\api\model\User as UserModel;
class UserToken extends Token
{
    protected $code;
    protected $wxAppId;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    function __construct($code)
    {
        $this->code = $code;
        $this->wxAppId = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'),$this->wxAppId,$this->wxAppSecret,$this->code);
    }

    public function get($code){
        //发送HTTP请求：
        $result = curl_get($this->wxLoginUrl);
        $wxResult = json_decode($result,true);//当该参数为 TRUE 时，将返回 array 而非 object 。
        if(empty($wxResult)){
            //这里使用think框架抛出异常，而不使用自定义异常，因为自定义异常是作为结果返回到客户端去的，但是服务器异常记录日志
            throw new Exception('获取session_key及openid时异常，微信内部错误');
        }
        else{
            $loginFail = array_key_exists('errcode',$wxResult);
            if($loginFail){
                $this->processLoginError($wxResult);
            }else{
                $this->grantToken($wxResult);
            }
        }
    }

    private function grantToken($wxResult){
        //拿到openid
        //数据库里看一下，这个openid是不是已经存在
        //如果存在 则不处理，如果不存在那么新增一条user记录
        //生成令牌，准备缓存数据，写入缓存
        //把令牌返回到客户端去

        //key:令牌
        //value:wxResult,uid,scope
        $openid = $wxResult['openid'];
        $user = UserModel::getByOpenId($openid);
        if($user){
            $uid = $user->id;
        }else{
            $uid = $this->newUser($openid);
        }
        $cachedValue = $this->prepareCachedValue($wxResult,$uid);
    }
    private function saveToCache($cacheValue){
        $key = generateToken();
    }

    private function prepareCachedValue($wxResult,$uid){
        $cachedValue = $wxResult;
        $cachedValue['uid'] = $uid;
        $cachedValue['scope'] = 16;
        return $cachedValue;
    }

    private function newUser($openid){
        $user = UserModel::create([
            'openid' => $openid
        ]);
        return $user->id;
    }

    private function processLoginError($wxResult){
        throw new WeChatException([
            'msg' => $wxResult['msg'],
            'errorCode' => $wxResult['errcode']
        ]);
    }
}