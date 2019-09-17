<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/13
 * Time: 10:51
 */

namespace app\admin\controller;

use app\admin\model\Common;
use app\admin\model\Menu;
use app\admin\model\News;
use app\extra\Upload;
use think\Db;

class Juhuiadmin extends \app\admin\controller\Common
{
    public  function index()
    {
        return view();
    }


    public  function app()
    {
        return view();

    }

    //菜单生成
    public  function nav()
    {
        return view();

    }

    public  function grid()
    {
        return view();

    }

    public  function button()
    {
        return view();

    }

    public  function form()
    {
        return view();

    }
    public  function tab()
    {
        return view();

    }

    public  function progress()
    {
        return view();

    }

    public  function panel()
    {
        return view();

    }

    public  function badge()
    {
        return view();

    }

     public  function timeline()
    {
        return view();

    }
   public  function table_element()
    {
        return view();

    }

  public  function anim()
    {
        return view();

    }

     public  function auxiliar()
    {
        return view();

    }

     public  function layer()
    {
        return view();

    }
   public  function laydate()
    {
        return view();

    }

  public  function table()
    {
        return view();

    }

 public  function laypage()
    {
        return view();

    }

 public  function upload()
    {
        return view();

    }

 public  function carousel()
    {
        return view();

    }

 public  function laytpl()
    {
        return view();

    }

 public  function flow()
    {
        return view();

    }

 public  function util()
    {
        return view();

    }

 public  function code()
    {
        return view();

    }

 public  function select()
    {
        return view();

    }

 public  function p403()
    {
        return view('403');

    }

public  function p404()
    {
        return view('404');

    }

public  function p500()
    {
        return view('500');

    }
public  function pas()
    {
        return view();

    }
    public  function mockjs()
    {
        return view();

    }

     public  function tabs()
    {
        return view();

    }    public  function profile()
    {
        return view();

    }

     public  function utils()
    {
        return view();

    }

    public  function route()
    {
        return view();

    }

    public  function menu()
    {
        $where = ['is_del' => 1];
        $menu = Db::name('menu')->where($where)->select();
        $menu = tree($menu);
        return view('', ['menu' => $menu]);

    }


    public  function addmenu()
    {
        $param = request()->param();
        if (request()->isAjax()) {
            $menuModel = new Menu;
            $data = [
            'title' => trim($param['title'])
            ,'url' => trim($param['url'])
            ,'sort' => intval($param['sort'])
            ,'pid' => intval($param['pid'])
            ,'intro' => trim($param['intro'])
            ];

            $r = Common::dataExecute($menuModel, $data, $param);
            if (!empty($r))
                exit(Common::json(200, '已提交'));
            exit(Common::json(400, '提交失败'));
        }

        $dataOne = null;;
        if (!empty($param['id'])) {
            $dataOne = Db::name('menu')->where('id', intval($param['id']))->find();
        }

        $where = ['is_del' => 1, 'status' => 1];
        $menu = Db::name('menu')->where($where)->select();
        $menu = tree($menu);
        return view('', ['menu' => $menu, 'dataOne' => $dataOne]);

    }


    public  function news()
    {
        $where = ['is_del' => 1];
        $news = Db::name('news')->where($where)->select();
        return view('', ['news' => $news]);

    }


    public  function addnews()
    {
        $param = request()->param();
        if (request()->isAjax()) {
            $newsModel = new News;
            $data = [
                'title' => trim($param['title'])
                ,'url' => trim($param['url'])
                ,'sort' => intval($param['sort'])
                ,'pid' => intval($param['pid'])
                ,'intro' => trim($param['intro'])
            ];

            $r = Common::dataExecute($newsModel, $data, $param);
            if (!empty($r))
                exit(Common::json(200, '已提交'));
            exit(Common::json(400, '提交失败'));
        }

        $dataOne = null;;
        if (!empty($param['id'])) {
            $dataOne = Db::name('menu')->where('id', intval($param['id']))->find();
        }

        $where = ['is_del' => 1, 'status' => 1];
        $news = Db::name('news')->where($where)->select();
        return view('', ['news' => $news, 'dataOne' => $dataOne]);

    }

    public  function formindex()
    {
        return view();

    }

    public  function setting()
    {
        return view();

    }


    public  function  nosey()
    {
        return view();
    }


    public  function cdnUploads()
    {

        $img = $_FILES;

        jsondebug($img);

        if ($img) Upload::image($img['file']);
    }




}