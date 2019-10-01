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
        //news
        $news = Db::name('news')->where($where)->where('is_recommend', 1)->order('sort asc')->limit(4)->select();
        foreach ($news as &$v) {
            $v['create_time'] = timeTran($v['create_time']);
            $v['intro'] = utf8_sub_str($v['intro'], 0, 50).'..';
        }
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
        $about = Db::name('us')->find();
        $about['pc_content'] = html_entity_decode($about['pc_content']);
        return view('', ['about' => $about]);
    }

    public  function goodslist()
    {
        $cateid = request()->param('cateid');
        $where = ['status' => 1, 'is_del' => 1];
        $goodscate = Db::name('goodscate')->where($where)->field('id, title')->select();
        //goods
        $where2 = [];
        if (!empty($cateid))
            $where2 = ['cateid' => $cateid];
        $goods = Db::name('goods')->where($where)->where($where2)->field('id, title, intro, pc_icon')->select();
        foreach ($goods as &$v) {
            $v['intro'] = utf8_sub_str($v['intro'], 0, 150).'..';
        }

        return view('', ['goodscate' => $goodscate, 'goods' => $goods]);
    }

    public  function goodsinfo()
    {
        $id = request()->param('id');
        $where = ['status' => 1, 'is_del' => 1];
        $goodscate = Db::name('goodscate')->where($where)->field('id, title')->select();
        if (!empty($id)) {
            $data = Db::name('goods')->where('id', $id)->find();
            $data['pc_content'] = html_entity_decode($data['pc_content']);
            $data['create_time'] = timeTran($data['create_time']);
            $this->assign('data', $data);
        } else {
            exit(false);
        }

        return view('', ['goodscate' => $goodscate]);

    }

    public  function newslist()
    {
        $where = ['status' => 1, 'is_del' => 1];
        $news = Db::name('news')->where($where)->field('id, title, intro, pc_icon')->select();
        foreach ($news as &$v) {
            $v['intro'] = utf8_sub_str($v['intro'], 0, 150).'..';
        }

        return view('', ['news' => $news]);
    }

    public  function newsinfo()
    {
        return view();
    }


    public  function contact()
    {
        $about = Db::name('us')->find();
        return view('', ['about' => $about]);
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
