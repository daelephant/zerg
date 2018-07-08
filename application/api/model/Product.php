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

    public function imgs()
    {
       return $this->hasMany('ProductImage','product_id','id');
    }

    public function properties()
    {
        return $this->hasMany('ProductProperty','product_id','id');
    }

    public static function getMostRecent($count){
        $products = self::limit($count)
            ->order('create_time desc')
            ->select();
        return $products;
    }

    public static function getProductsByCategoryID($categoryID)
    {
        $products = self::where('category_id','=',$categoryID)->select();
        return $products;
    }

    public static function getProductDetail($id)
    {
        //使用模型写复杂的SQL
        //Query
        $product = self::with([
            'imgs' => function($query){
                $query->with(['imgUrl'])
                    ->order('order','asc');
            }
        ])
            ->with(['properties'])
            ->find($id);
        return $product;
    }
}