<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-07-05
 * Time: 16:01
 * 实现对model的分层，model处理比较简单的细粒度的业务逻辑（还担任数据库访问层），service层处理复杂业务
 */

namespace app\api\service;


class UserToken
{
    protected $code;
    protected $wxAppId;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    function __construct($code)
    {
        $this->$code = $code;
        $this->wxAppId = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'),$this->wxAppId,$this->wxAppSecret,$this->code);
    }

    public function get($code){
        //发送HTTP请求：
    }
}