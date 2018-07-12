<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/7/13
 * Time: 7:03
 */

namespace app\api\model;


class Order extends BaseModel
{
    protected $hidden = ['user_id', 'delete_time', 'update_time'];

}