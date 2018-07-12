<?php
/**
 * Created by PhpStorm.
 * User: yin
 * Date: 2018/7/12
 * Time: 7:05
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class OrderPlace extends BaseValidate
{
    //示例数据结构如下
    protected $oProducts = [
        [
            'product_id' => 1,
            'count' => 3
        ],
        [
            'product_id' => 2,
            'count' => 3
        ],
        [
            'product_id' => 3,
            'count' => 3
        ]
    ];
    //数据库查询的数据
    protected $products = [
        [
            'product_id' => 1,
            'count' => 3
        ],
        [
            'product_id' => 2,
            'count' => 3
        ],
        [
            'product_id' => 3,
            'count' => 3
        ]
    ];

    protected $rule = [
        'products' => 'checkProducts'
    ];

    //自定义
    protected $singleRule = [
        'product_id' => 'require|isPositiveInteger',
        'count' => 'require|isPositiveInteger'
    ];

    protected function checkProducts($values)
    {
        if(!is_array($values))
        {
            throw new ParameterException([
                'msg' => '商品参数不正确'
            ]);
        }

        if(empty($values))
        {
            throw new ParameterException([
                'msg' => '商品列表不能为空'
            ]);
        }
        foreach($values as $value)
        {
            $this->checkProduct($values);
        }
        return true;
    }
    protected function checkProduct($value)
    {
        $validate = new BaseValidate($this->singleRule);
        $result = $validate->check($value);
        if(!$result){
            throw new ParameterException([
                'msg' => '商品列表参数错误'
            ]);
        }
    }
}