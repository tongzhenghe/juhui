<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/16
 * Time: 10:46
 */


namespace app\admin\model;

use app\admin\model\system\SystemAdmin;

class Goodscate extends SystemAdmin
{
    protected $autoWriteTimestamp = true;
    protected $insert = ['is_del' => 1, 'status' => 1];

    protected function setIpAttr()
    {
        return request()->ip();
    }

}