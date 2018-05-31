<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-05-23
 * Time: 16:55
 */

namespace app\api\controller\v1;


use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\MissException;
use think\Exception;

class Banner
{
    /**
     * 获取指定id的Banner信息
     * @url /banner/:id  接口的访问路径
     * @http GET
     * @id Banner的id号
     */

    public function getBanner($id){
        (new IDMustBePostiveInt())->goCheck();
        //静态方法是通过类名直接访问，实例方法是通过类的实例访问
        //能够拿起来就用的，就用静态实现，比如工具类https://www.cnblogs.com/-mrl/p/6485616.html
        $banner = BannerModel::getBannerById($id);
        if(!$banner){
            throw new MissException();
        }
        return json($banner);

        //if($id....)
        //独立验证用法(太直白：1、校验流程很长，每个控制器下都要有这样的校验过程2、代码复用性不高  如果需要从get、post等获取变量，再去判断，代码会更长)
        //被验证的数据
        //$data = [
        //    //'name' => 'vendor',
        //    //'email' => 'vendor@qq.com'
        //    'id' => $id
        //];
        //验证规则
        //$validate = new Validate([
        //    //'name' => 'require|max:10',
        //    //'email' => 'email'
        //    'id' => '',
        //]);
        //使用验证器：
        //$validate = new TestValidate();
        //执行验证  batch批量验证
        //$result = $validate->batch()->check($data);
        //错误提示
        //echo $validate->getError();//只能打印字符串数组要用var_dump
        //var_dump($validate->getError());

        //自定义验证器
        //$data = [
        //    'id' => $id
        //];
        //$validate = new IDMustBePostiveInt();
        //$resule = $validate->batch()->check($data);
        //if($resule){
        //}
        //else{
        //}


    }

}