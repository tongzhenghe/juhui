<?php
namespace app\index\controller;

use think\Db;

class Index
{
    public function index()
    {
        //menu
        $where= ['is_del' => 1, 'status' => 1, 'is_m' => 2];
        $menu = Db::name('umenu')->where($where)->order('sort asc')->select();
        return view('', ['menu'=> $menu]);
    }


    public  function test()
    {
        return view();
    }



}
