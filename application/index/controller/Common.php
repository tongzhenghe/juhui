<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/27
 * Time: 9:52
 */

namespace app\index\controller;

use think\Controller;
use think\Db;

class Common extends  Controller
{

    public  function  _initialize()
    {
        $where= ['is_del' => 1, 'status' => 1, 'is_m' => 2];
        $menu = Db::name('umenu')->where($where)->order('sort asc')->select();
        $about = Db::name('us')->find();

        $webset = Db::name('websets')->find();
        wl_debug($webset);
        $this->assign('about', $about);
        $this->assign('menu', $menu);

    }


}