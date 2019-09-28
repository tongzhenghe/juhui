<?php
namespace app\index\controller;

use app\index\controller\Common as IndexCommonController;
use think\Db;

class Index extends IndexCommonController
{
    public function index()
    {
        //banner
        $where = ['	is_del' => 1, 'status' => 1];
        $banner = Db::name('banner')->where($where)->select();
        //intro
        $us = Db::name('us')->find();
        wl_debug($us);
        //news
        $news = Db::name('news')->where($where)->order('sort asc')->limit(4)->select();
        //友情| 资质
        return view('',
            [
            'banner' => $banner
            ,'us' => $us
            ,'news' => $news
            ,
            ]
        );
    }

    public  function about()
    {
        return view();
    }
    public  function goodslist()
    {
        return view();
    }
    public  function goodsinfo()
    {
        return view();
    }

    public  function newslist()
    {
        return view();
    }

    public  function newsinfo()
    {
        return view();
    }


    public  function contact()
    {
        return view();
    }

    public  function recruit()
    {
        return view();
    }
    public  function recruitinfo()
    {
        return view();
    }

    public  function wmsg()
    {
        return view();
    }




}
