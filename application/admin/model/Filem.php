<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/21
 * Time: 10:53
 */

namespace app\admin\model;


use app\admin\model\system\SystemAdmin;

class Filem extends  SystemAdmin
{

    protected function setIpAttr()
    {
        return request()->ip();
    }


}