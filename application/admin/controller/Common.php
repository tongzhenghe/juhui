<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/16
 * Time: 19:00
 */

namespace app\admin\controller;


use app\admin\model\system\SystemAdmin;
use think\Controller;
use think\Db;

class Common extends  Controller
{

    protected static $adminInfo;

    public  function  _initialize()
    {
       // parent::_initialize();
       /// self::$adminInfo  =  SystemAdmin::activeAdminInfoOrFail();
        //if(!is_dir('./tmp/'))mkdir ('./tmp/', 0700);
       // session_save_path('./tmp/');

        //if(!SystemAdmin::hasActiveAdmin()) return $this->redirect(url('Sign/signin'));

        $where = ['state' => 1, 'is_del' => 1];
        $menu = Db::name('menu')->where($where)->select();
        $menu =tree($menu);

        wl_debug($menu);
        $this->assign('menu', $menu);

    }



}