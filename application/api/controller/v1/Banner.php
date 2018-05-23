<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-05-23
 * Time: 16:55
 */

namespace app\api\controller\v1;


use app\api\validate\TestValidate;
use think\Validate;

class Banner
{
    /**
     * 获取指定id的Banner信息
     * @url /banner/:id  接口的访问路径
     * @http GET
     * @id Banner的id号
     */
    public function getBanner($id){

        //独立验证用法
        //被验证的数据
        $data = [
            'name' => 'vendor',
            'email' => 'vendor@qq.com'
        ];
        //验证规则
        //$validate = new Validate([
        //    'name' => 'require|max:10',
        //    'email' => 'email'
        //]);
        //使用验证器：
        $validate = new TestValidate();
        //执行验证  batch批量验证
        $result = $validate->batch()->check($data);
        //错误提示
        //echo $validate->getError();//只能打印字符串数组要用var_dump
        var_dump($validate->getError());

    }

}