<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/6/12
 * Time: 21:20
 */

namespace app\api\model;


class Category extends BaseModel
{
//    关联Image表,一对一

    protected $hidden = ['delete_time','update_time','create_time'];
    public function img(){
        return $this->belongsTo('Image','topic_img_id','id');
    }
}