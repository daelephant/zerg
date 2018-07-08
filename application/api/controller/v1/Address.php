<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/7/8
 * Time: 18:41
 */

namespace app\api\controller\v1;


use app\api\validate\AddressNew;
use app\api\service\Token as TokenService;
use app\api\model\User as UserModel;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;

class Address
{
    public function createOrUpdateAddress()
    {
        $validate = new AddressNew();
        $validate->goCheck();
        //根据Token来获取Uid
        //根据uid来查找用户数据，判断用户是否存在，如果不存在则抛出异常
        //获取用户从客户端提交来的地址信息
        //根据用户地址信息是否存在,从而判断是添加地址还是更新地址
        $uid = TokenService::getCurrentUid();//封装的优雅
        $user = UserModel::get($uid);
        if(!$user){
            throw new UserException();
        }
        $dataArray = $validate->getDataByRule(input('post.'));//过滤掉不需要的参数
        $userAddress = $user->address();
        if(!$userAddress)
        {
            //通过模型的关联模型新增一条useraddress
            $user->address()->save($dataArray);
        }
        else{
            //更新
            $user->address->save($dataArray);
        }
        //标准的Rest风格，返回修改后的资源
        //return $user;
        //我们这里只需要返回是否成功信息
        return json(new SuccessMessage(),201);

    }
}