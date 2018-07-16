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
    protected $autoWriteTimestamp = true;
    //自定义自动插入数据库的数据库时间列名称,TP5默认的是create_time,uodate_time,delete_time
    //protected $createTime = 'create_timestamp';
}