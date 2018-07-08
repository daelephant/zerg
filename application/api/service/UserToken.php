<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-07-05
 * Time: 16:01
 * 实现对model的分层，model处理比较简单的细粒度的业务逻辑（还担任数据库访问层），service层处理复杂业务
 */

namespace app\api\service;


use app\lib\exception\TokenException;
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
                return $this->grantToken($wxResult);
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
        $token = $this->saveToCache($cachedValue);
        return $token;
    }
    private function saveToCache($cacheValue){
        $key = self::generateToken();
        //把数组转化成字符串json_encode成功则返回 JSON 编码的 string 或者在失败时返回 FALSE
        //把数组转化成字符串implode ( string $glue , array $pieces )用 glue 将一维数组的值连接为一个字符串。
        $value = json_encode($cacheValue);
        //令牌的过期时间可以巧妙地转换成缓存的过期时间
        $expire_in = config('setting.token_expire_in');

        //这里使用TP5自带缓存：封装，默认文件缓存可配置memcache。Redis  速度快一点点，支持存储一个对象，
        //我们使用文件是把数组对象存储成字符串，这样redis可以直接读取对象的，但是目前文件存储就是读取字符串
        //自己需要把字符串反序列化程数组，这是redis优势。单纯的存储键值对的话redis的优势不是很明显，但是用到redis数据结构对象的时候优势会大一些
        //用文件系统、memcache、redis、数据库都是载体的不同，最终的结果和实现的功能是一样的
        $request = cache($key,$value,$expire_in);
        if(!$request){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
        return $key;
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