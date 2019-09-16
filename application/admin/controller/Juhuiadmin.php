<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/13
 * Time: 10:51
 */

namespace app\admin\controller;

use app\admin\model\Menu;
use think\Controller;
use think\Db;

class Juhuiadmin extends  Controller
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
        return view();

    }


    public  function addmenu()
    {

        $param = request()->param();
        if (request()->isAjax()) {
jsondebug($param);
            $id = intval($param['id']);
            $menu = new Menu;
            $data = [
            'title' => trim($param['title'])
            ,'url' => trim($param['url'])
            ,'sort' => intval($param['sort'])
            ,'pid' => intval($param['pid'])
            ,'intro' => trim($param['intro'])
            ];

            jsondebug($data);

            if (!empty($id)) {
                $menu->save($data, ['id' => $id]);
            }
            $menu->save($data);




            //if (!empty($r))
                //返回json数据
        }


        //字段：title、 url sort  pid  intro
        return view();

    }






    public  function formindex()
    {
        return view();

    }

    public  function setting()
    {
        return view();

    }




}