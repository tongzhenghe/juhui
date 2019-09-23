<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/13
 * Time: 10:51
 */

namespace app\admin\controller;

use app\admin\model\Article;
use app\admin\model\Banner;
use app\admin\model\Common;
use app\admin\model\Menu;
use app\admin\model\News;
use app\admin\model\Umenu;
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

    //关于我们
    public  function us()
    {
        $params = request()->param();
        if (request()->isAjax()) {
            $data = [
            'people' =>  trim($params['people'])
            ,'people_tel' => trim($params['people_tel'])
            ,'wcode' => trim($params['wcode'])
            ,'title' => trim($params['title'])
            ,'keywords' => trim($params['keywords'])
            ,'logo' => trim($params['logo'])
            ,'email' => trim($params['email'])
            ,'pc_content' => htmlentities($params['Pc_content'])
            ,'content' => htmlentities($params['content'])
            ,'address' => trim($params['address'])
            ,'intro' => trim($params['intro'])
            ,'update_time' => time()
            ];

            if (!empty($params['id'])) {
                $r = Db::name('us')->where('id', intval($params['id']))->update($data);
            } else {
                $r = Db::name('us')->insert($data);
            }

            if (!empty($r))
                exit(Common::json(200, '已提交'));
            exit(Common::json(400, '提交失败'));

        }

        $dataOne = Db::name('us')->find();
        return view('', ['dataOne' => $dataOne]);

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

    //前台菜单
   public  function umenu()
    {
        $where = ['is_del' => 1];
        $umenu = Db::name('umenu')->where($where)->select();
        $umenu = tree($umenu);
        return view('', ['umenu' => $umenu]);
    }

    public  function addumenu()
    {
        $param = request()->param();
        if (request()->isAjax()) {
            $umenuModel = new Umenu();
            $data = [
                'title' => trim($param['title'])
                ,'url' => trim($param['url'])
                ,'sort' => intval($param['sort'])
                ,'pid' => intval($param['pid'])
                ,'intro' => trim($param['intro'])
                ,'is_m' => intval($param['is_m'])
            ];

            $r = Common::dataExecute($umenuModel, $data, $param);
            if (!empty($r))
                exit(Common::json(200, '已提交'));
            exit(Common::json(400, '提交失败'));
        }

        $dataOne = null;;
        if (!empty($param['id'])) {
            $dataOne = Db::name('umenu')->where('id', intval($param['id']))->find();
        }

        $where = ['is_del' => 1, 'status' => 1];
        $umenu = Db::name('umenu')->where($where)->select();
        $umenu = tree($umenu);
        return view('', ['umenu' => $umenu, 'dataOne' => $dataOne]);

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

    public  function article()
    {
        $where = ['is_del' => 1];
        $article = Db::name('article')->where($where)->select();
        return view('', ['article' => $article]);

    }

    public  function addarticle()
    {
        $param = request()->param();
        if (request()->isAjax()) {
            $articleModel = new Article;

            jsondebug($param);
            $data = [
                'title' => trim($param['title'])
                ,'sort' => intval($param['sort'])
                ,'intro' => trim($param['intro'])
                ,'content' => htmlspecialchars($param['Mcontent'])
                ,'pc_content' => htmlspecialchars($param['Pcontent'])
                ,'pc_icon' => trim($param['Pc_icon'])
                ,'icon' => trim($param['Mobile_icon'])

            ];

            $r = Common::dataExecute($articleModel, $data, $param);

            if (!empty($r))
                exit(Common::json(200, '已提交'));
            exit(Common::json(400, '提交失败'));
        }

        $dataOne = null;;
        if (!empty($param['id'])) {
            $dataOne = Db::name('article')->where('id', intval($param['id']))->find();
        }

        $where = ['is_del' => 1, 'status' => 1];
        $article = Db::name('article')->where($where)->select();
        return view('', ['article' => $article, 'dataOne' => $dataOne]);

    }

    public  function news()
    {
        $where = ['is_del' => 1];
        $news = Db::name('news')->where($where)->select();
        return view('', ['news' => $news]);

    }

    public  function banner()
    {
        $where = ['is_del' => 1];
        $banner = Db::name('banner')->where($where)->select();
        return view('', ['banner' => $banner]);

    }

    public  function addbanner()
    {
        $param = request()->param();
        if (request()->isAjax()) {
            $bannerModel = new Banner;
            $data = [
            'banner' => trim($param['Mobile_icon'])
            ,'pc_banner' => trim($param['Pc_icon'])
            ,'title' => trim($param['title'])
            ,'url' => trim($param['url'])
            ,'sort' => intval($param['sort'])
            ,'intro' => trim($param['intro'])
            ,'content' => htmlspecialchars($param['content'])
            ,'keywords' => trim($param['keywords'])
            ,'pc_content' => htmlspecialchars($param['Pcontent'])
            ];
            $r = Common::dataExecute($bannerModel, $data, $param);

            if (!empty($r))
                exit(Common::json(200, '已提交'));
            exit(Common::json(400, '提交失败'));
        }

        $dataOne = null;;
        if (!empty($param['id'])) {
            $dataOne = Db::name('banner')->where('id', intval($param['id']))->find();
        }

        $where = ['is_del' => 1, 'status' => 1];
        $banner = Db::name('banner')->where($where)->select();
        return view('', ['banner' => $banner, 'dataOne' => $dataOne]);

    }

    public  function addnews()
    {
        $param = request()->param();
        if (request()->isAjax()) {
            $newsModel = new News;
            $data = [
                'title' => trim($param['title'])
                ,'sort' => intval($param['sort'])
                ,'intro' => trim($param['intro'])
                ,'content' => htmlspecialchars($param['Mcontent'])
                ,'pc_content' => htmlspecialchars($param['Pcontent'])
                ,'pc_icon' => trim($param['Pc_icon'])
                ,'icon' => trim($param['Mobile_icon'])

            ];

            $r = Common::dataExecute($newsModel, $data, $param);

            if (!empty($r))
                exit(Common::json(200, '已提交'));
            exit(Common::json(400, '提交失败'));
        }

        $dataOne = null;;
        if (!empty($param['id'])) {
            $dataOne = Db::name('news')->where('id', intval($param['id']))->find();
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
        $img = $_FILES['file'];
        wl_debug_log($img, 'logo');
        $fileError = $img['error'];
        $fileType = $img['type'];
        if ($fileError == 0) {
            //判断文件类型
            $file_type = ['image/jpeg', 'image/png'];
            if (!in_array($fileType, $file_type))
                exit(Common::json(200, '文件上传失败'));
        Upload::image($img);

        }
    }


}