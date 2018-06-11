<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-06-07
 * Time: 16:07
 */

namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = ['delete_time','update_time','create_time','main_img_id','pivot','from','category_id'];

    public function getMainImgUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }

    public static function getMostRecent($count){
        $products = self::limit($count)
            ->order('create_time desc')
            ->select();
        return $products;
    }
}