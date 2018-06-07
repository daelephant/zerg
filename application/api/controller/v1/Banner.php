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
        $banner = BannerModel::getBannerById($id);
        if(!$banner){
            throw new MissException();
        }
        return json($banner);
    }

}