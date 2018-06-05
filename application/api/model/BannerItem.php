<?php

namespace app\api\model;

use think\Model;

class BannerItem extends Model
{
    //去关联img表
    public function img()
    {
        //描述一对一的关系belongsTo
        return $this->belongsTo('Image','img_id','id');
    }
}
