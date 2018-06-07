<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-05-23
 * Time: 16:55
 */

namespace app\api\controller\v2;


class Banner
{
    /**
     * 获取指定id的Banner信息
     * @url /banner/:id  接口的访问路径
     * @http GET
     * @id Banner的id号
     */

    public function getBanner($id){
        return "This is v2 Version";
    }

}