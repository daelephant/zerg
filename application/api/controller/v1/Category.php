<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/6/12
 * Time: 21:18
 */

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;

class Category
{
    public function getAllCategories(){
        //查询很简单，就不在model中写了，直接在控制器写
    // all([],'img')  等同于with(‘img’)->select(),查询全部则是传空数组
        $categories = CategoryModel::all([],'img');
        if($categories->isEmpty()){
            throw new CategoryException();
        }
        return $categories;
    }
}