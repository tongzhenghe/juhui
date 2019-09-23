<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/17
 * Time: 11:22
 */

namespace app\admin\model;


use app\admin\model\system\SystemAdmin;

class Goods extends SystemAdmin
{
    protected $autoWriteTimestamp = true;
    protected $insert = ['is_del' => 1, 'status' => 1];

    protected function setIpAttr()
    {
        return request()->ip();
    }

}