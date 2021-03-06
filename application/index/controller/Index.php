<?php
namespace app\index\controller;

use app\index\controller\Common as IndexCommonController;
use think\Db;
use think\Session;

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
        $data = Db::name('us')->find();
        $data['pc_content'] = html_entity_decode($data['pc_content']);
        return view('', ['data' => $data]);
    }

    public  function goodslist()
    {
        $cateid = '';
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

        return view('', ['goodscate' => $goodscate, 'goods' => $goods, 'cateid' => $cateid]);
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
        $goodscate = Db::name('goodscate')->where($where)->field('id, title')->select();
        $news = Db::name('news')->where($where)->field('id, title, intro, create_time')->select();
        foreach ($news as &$v) {
            $v['intro'] = utf8_sub_str($v['intro'], 0, 150).'..';
            $v['create_time'] = date('Y-m-d', ($v['create_time']));
        }

        return view('', ['news' => $news, 'goodscate' => $goodscate]);

    }

    public  function newsinfo()
    {
        $id = request()->param('id');
        $where = ['status' => 1, 'is_del' => 1];
        $goodscate = Db::name('goodscate')->where($where)->field('id, title')->select();
        if (!empty($id)) {
            $data = Db::name('news')->where('id', $id)->find();
            $data['pc_content'] = html_entity_decode($data['pc_content']);
            $data['create_time'] = date('Y-m-d', ($data['create_time']));
            $this->assign('data', $data);
        } else {
            exit(false);
        }

        return view('', ['goodscate' => $goodscate]);
    }


    public  function contact()
    {
        $data = Db::name('us')->find();
        return view('', ['data' => $data]);
    }

    public  function recruit()
    {
        $where = ['status' => 1, 'is_del' => 1];
        $goodscate = Db::name('goodscate')->where($where)->field('id, title')->select();
        return view('', ['goodscate' => $goodscate]);
    }
    public  function recruitinfo()
    {
        return view();
    }

    public  function wmsg()
    {
        if(!is_dir('./tmp/'))mkdir ('./tmp/', 0700);
        session_save_path('./tmp/');
        $param = request()->param();
        if (request()->isAjax()) {

            if (Session::get('uip') == get_ip())
                exit(json_encode(['state' => false, 'msg' => '重复提交']));

            $data = [
            'user_name' => trim($param['user_name'])
            ,'user_tel' => trim($param['user_tel'])
            ,'user_message' => trim($param['user_message'])
            ];

            $res = Db::name('message')->insert($data);

            if (!empty($res))
                Session::set('uip', get_ip());
                exit(json_encode(['state' => true, 'msg' => '已提交']));
        }
        return view();
    }




}
