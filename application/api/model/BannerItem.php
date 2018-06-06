<?php

namespace app\api\model;

use think\Model;

class BannerItem extends Model
{
    //隐藏客户端不需要的字段
    protected $hidden = ['id','img_id','banner_id','delete_time','update_time'];
    //去关联img表
    public function img()
    {
        //描述一对一的关系belongsTo
        return $this->belongsTo('Image','img_id','id');
    }
}
