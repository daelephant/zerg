<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/5/26
 * Time: 11:20
 */

namespace app\api\model;


use think\Db;
use think\Exception;
use think\Model;

class Banner extends Model
{
    //这里items不是普通的函数，而是关联：
    public function items()
    {
        //当前模型是Banner要关联的模型是BannerItem
        return $this->hasMany('BannerItem','banner_id','id');
    }
    //具体的业务实现：根据Banner id获取相关的业务。
    public static function getBannerById($id)
    {
        $banner = self::with(['items','items.img'])->find($id);
        return $banner;
         //    TODO:根据Banner ID号获取Banner信息
        //$result =  Db::query('select * from banner_item where banner_id=?',[$id]);
        //$result = Db::table('banner_item')->where('banner_id','=',$id)->select();
        //return $result;

    }

}