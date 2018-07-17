<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/7/13
 * Time: 7:03
 */

namespace app\api\model;


use think\Paginator;

class Order extends BaseModel
{
    protected $hidden = ['user_id', 'delete_time', 'update_time'];
    protected $autoWriteTimestamp = true;
    //自定义自动插入数据库的数据库时间列名称,TP5默认的是create_time,uodate_time,delete_time
    //protected $createTime = 'create_timestamp';

    public static function getSummaryByUser($uid,$page=1,$size=15)
    {
        //Paginator:: 对象
        $pagingData = self::where('user_id','=',$uid)
            ->order('create_time desc')
            ->paginate($size,true,['page' => $page]);
        //paginate相当于select find，
        return $pagingData;
    }
}