<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/17
 * Time: 11:22
 */

namespace app\admin\model;


use app\admin\model\system\SystemAdmin;

class Websets extends SystemAdmin
{
    protected $autoWriteTimestamp = true;

    protected function setIpAttr()
    {
        return request()->ip();
    }

}