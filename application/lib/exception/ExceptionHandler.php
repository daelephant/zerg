<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/5/27
 * Time: 15:01
 */

namespace app\lib\exception;

use Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

/*
 * 重写Handle的render方法，实现自定义异常消息
 */
class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    //需要返回客户端当前请求的URL路径
    //基类\Exception的对象
    //Exception是所有异常的基类
    //$e是Exception（异常） new出来的对象，包含Exception类中的所有属性方法
    public function render(Exception $e)
    {
        //判断一个对象是否是某个类的实例 instanceof
        if($e instanceof BaseException){
            //如果是自定义的异常
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }
        else{
            //Config::get('app_debug');
            if(config('app_debug'))
            {
               return parent::render($e);
            }
            else
            {

                $this->code = 500;
                $this->msg = '服务端内部错误，不想告诉你';
                $this->errorCode = 999;
                $this->recordErrorLog($e);
            }
        }
        $request = Request::instance();
        $result = [
            'msg' => $this->msg,
            'error_code'=>$this->errorCode,
            'request_url' => $request->url(),
        ];
        return json($result,$this->code);
    }

    private function recordErrorLog(Exception $e){
        Log::init([
            'type' => 'File',
            'path' => LOG_PATH,
            'level' => ['error']
        ]);
        Log::record($e->getMessage(),'error');
    }
}