<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-05-21
 * Time: 17:02
 */

namespace app\sample\controller;

//use think\Request;
class Test
{
    public function hello()
    {
        $all = input('param.');
        var_dump($all);
        //$id = Request::instance()->param('id');
        //$name = Request::instance()->param('name');
        //$age = Request::instance()->param('age');
        //echo $id.'------'.$name.'+++++'.$age;
        //return "hello,yin";
    }
}