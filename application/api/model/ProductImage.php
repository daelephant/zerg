<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/7/8
 * Time: 14:23
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = ['img_id','delete_time','product_id'];
    //接下来还有模型关联，一对一
    public function imgUrl()
    {
        return $this->belongsTo('Image','img_id','id');
    }
}