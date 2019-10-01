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
use app\admin\model\Filem;
use app\admin\model\Friendly;
use app\admin\model\Goods;
use app\admin\model\Goodscate;
use app\admin\model\Menu;
use app\admin\model\News;
use app\admin\model\Recruit;
use app\admin\model\Umenu;
use app\admin\model\Websets;
use app\extra\Upload;
use think\Db;
use app\admin\controller\Common as CommonController;

class Juhuiadmin extends CommonController
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

    }

    public  function profile()
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

    public  function goodscate()
    {
        $where = ['is_del' => 1];
        $goodscate = Db::name('goodscate')->where($where)->select();
        return view('', ['goodscate' => $goodscate]);
    }

    public  function addgoodscate()
    {
        $param = request()->param();
        if (request()->isAjax()) {
            $goodscateModel = new Goodscate;
            $data = [
                'title' => trim($param['title'])
                ,'sort' => intval($param['sort'])
                ,'intro' => trim($param['intro'])
            ];

            $r = Common::dataExecute($goodscateModel, $data, $param);
            if (!empty($r))
                exit(Common::json(200, '已提交'));
            exit(Common::json(400, '提交失败'));
        }

        $dataOne = null;;
        if (!empty($param['id'])) {
            $dataOne = Db::name('goodscate')->where('id', intval($param['id']))->find();
        }

        return view('', ['dataOne' => $dataOne]);

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
            $data = [
                'title' => trim($param['title'])
                ,'sort' => intval($param['sort'])
                ,'intro' => trim($param['intro'])
                ,'content' => htmlspecialchars($param['Mcontent'])
                ,'pc_content' => htmlspecialchars($param['Pcontent'])
                ,'pc_icon' => trim($param['Pc_icon'])
                ,'icon' => trim($param['Mobile_icon'])
                ,'keywords' => trim($param['keywords'])
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
                ,'keywords' => trim($param['keywords'])

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

    //产品中心
    public  function goods()
    {
        $where = ['is_del' => 1];
        $goods = Db::name('goods')->where($where)->select();
        return view('', ['goods' => $goods]);
    }

    public  function addgoods()
    {
        $param = request()->param();
        if (request()->isAjax()) {
            $goodsModel = new Goods;
            $data = [
                'title' => trim($param['title'])
                ,'sort' => intval($param['sort'])
                ,'intro' => trim($param['intro'])
                ,'content' => htmlspecialchars($param['Mcontent'])
                ,'pc_content' => htmlspecialchars($param['Pcontent'])
                ,'pc_icon' => trim($param['Pc_icon'])
                ,'icon' => trim($param['Mobile_icon'])
                ,'keywords' => trim($param['keywords'])
                ,'cateid' => trim($param['cateid'])

            ];

            $r = Common::dataExecute($goodsModel, $data, $param);

            if (!empty($r))
                exit(Common::json(200, '已提交'));
            exit(Common::json(400, '提交失败'));
        }

        $dataOne = null;;
        if (!empty($param['id'])) {
            $dataOne = Db::name('goods')->where('id', intval($param['id']))->find();
        }

        $where = ['is_del' => 1, 'status' => 1];
        $goods = Db::name('goods')->where($where)->select();

        //goods_cate
        $goods_cate = Db::name('goodscate')->where($where)->select();

        return view('', ['goods' => $goods, 'dataOne' => $dataOne, 'goods_cate' => $goods_cate]);

    }


    public  function recruit()
    {
        $recruit = Db::name('recruit')->select();
        return view('', ['recruit' => $recruit]);

    }
    public  function friendly()
    {
        $friendly = Db::name('friendly')->select();
        return view('', ['friendly' => $friendly]);

    }

    public  function addrecruit()
    {
        $param = request()->param();
        if (request()->isAjax()) {
            $recruitModel = new Recruit;
            $data = [
                'title' => trim($param['title'])
                ,'sort' => intval($param['sort'])
                ,'intro' => trim($param['intro'])
                ,'content' => htmlspecialchars($param['content'])
                ,'keywords' => trim($param['keywords'])
                ,'pc_content' => htmlspecialchars($param['Pcontent'])
            ];
            $r = Common::dataExecute($recruitModel, $data, $param);

            if (!empty($r))
                exit(Common::json(200, '已提交'));
            exit(Common::json(400, '提交失败'));
        }

        $dataOne = null;;
        if (!empty($param['id'])) {
            $dataOne = Db::name('recruit')->where('id', intval($param['id']))->find();
        }

        $where = ['status' => 1];
        $recruit = Db::name('recruit')->where($where)->select();
        return view('', ['recruit' => $recruit, 'dataOne' => $dataOne]);

    }


    public  function addfriendly()
    {
        $param = request()->param();
        if (request()->isAjax()) {
            $recruitModel = new Friendly;
            $data = [
                'title' => trim($param['title'])
                ,'sort' => intval($param['sort'])
                ,'intro' => trim($param['intro'])
                ,'url' => trim($param['url'])
                ,'icon' => trim($param['Mobile_icon'])
                ,'pc_icon' => trim($param['Pc_icon'])
            ];

            $r = Common::dataExecute($recruitModel, $data, $param);

            if (!empty($r))
                exit(Common::json(200, '已提交'));
            exit(Common::json(400, '提交失败'));
        }

        $dataOne = null;;
        if (!empty($param['id'])) {
            $dataOne = Db::name('friendly')->where('id', intval($param['id']))->find();
        }

        $where = ['status' => 1];
        $friendly = Db::name('friendly')->where($where)->select();
        return view('', ['friendly' => $friendly, 'dataOne' => $dataOne]);

    }


    public function  webset()
    {
        $param = request()->param();
        $websetModel = new Websets;
        if (request()->isAjax()) {
            $data = [
                'title' => trim($param['title'])
                ,'bscnym_path' => trim($param['bscnym_path'])
                ,'intro' =>trim($param['intro'])
                ,'keywords' =>trim($param['keywords'])
            ];


            $r = Common::dataExecute($websetModel, $data, $param);
            if (!empty($r))
                exit(Common::json(200, '已提交'));
            exit(Common::json(400, '提交失败'));
        }
        $webset = Db::name('websets')->find();
        wl_debug($webset);
        return view('', ['webset' => $webset]);

    }


    public function exportDatabase(){
        header("Content-type:text/html;charset=utf-8");
        $path = RUNTIME_PATH.'mysql/';
        $database = config('database')['database'];
        echo "运行中，请耐心等待...<br/>";
        $info = "-- ----------------------------\r\n";
        $info .= "-- 日期：".date("Y-m-d H:i:s",time())."\r\n";
        $info .= "-- MySQL - 5.5.52-MariaDB : Database - ".$database."\r\n";
        $info .= "-- ----------------------------\r\n\r\n";
        $info .= "CREATE DATAbase IF NOT EXISTS `".$database."` DEFAULT CHARACTER SET utf8 ;\r\n\r\n";
        $info .= "USE `".$database."`;\r\n\r\n";

        // 检查目录是否存在
        if(is_dir($path)){
        // 检查目录是否可写
            if(is_writable($path)){
        //echo '目录可写';exit;
            } else {
        //echo '目录不可写';exit;
                chmod($path,0777);
            }
        }else{
        //echo '目录不存在';exit;
        // 新建目录
            mkdir($path, 0777, true);
        //chmod($path,0777);
        }

        // 检查文件是否存在
        $file_name = $path.$database.'-'.date("Y-m-d",time()).'.sql';

        if(file_exists($file_name)){
            echo "数据备份文件已存在！";
            exit;
        }
        file_put_contents($file_name,$info,FILE_APPEND);

            //查询数据库的所有表
        $result = Db::query('show tables');
            //print_r($result);exit;
        foreach ($result as $k=>$v) {
            //查询表结构
            $val = $v['Tables_in_'.$database];
            $sql_table = "show create table ".$val;
            $res = Db::query($sql_table);
            //print_r($res);exit;
            $info_table = "-- ----------------------------\r\n";
            $info_table .= "-- Table structure for `".$val."`\r\n";
            $info_table .= "-- ----------------------------\r\n\r\n";
            $info_table .= "DROP TABLE IF EXISTS `".$val."`;\r\n\r\n";
            $info_table .= $res[0]['Create Table'].";\r\n\r\n";
            //查询表数据
            $info_table .= "-- ----------------------------\r\n";
            $info_table .= "-- Data for the table `".$val."`\r\n";
            $info_table .= "-- ----------------------------\r\n\r\n";
            file_put_contents($file_name,$info_table,FILE_APPEND);
            $sql_data = "select * from ".$val;
            $data = Db::query($sql_data);
            //print_r($data);exit;
            $count= count($data);
            //print_r($count);exit;
            if($count<1) continue;
            foreach ($data as $key => $value) {
                $sqlStr = "INSERT INTO `".$val."` VALUES (";
                foreach($value as $v_d){
                    $v_d = str_replace("'","\'",$v_d);
                    $sqlStr .= "'".$v_d."', ";
                }
                //需要特别注意对数据的单引号进行转义处理
                //去掉最后一个逗号和空格
                $sqlStr = substr($sqlStr,0,strlen($sqlStr)-2);
                $sqlStr .= ");\r\n";
                file_put_contents($file_name,$sqlStr,FILE_APPEND);
            }
            $info = "\r\n";
            file_put_contents($file_name,$info,FILE_APPEND);
        }
        echo "数据备份完成！";
    }

    public  function data_backups()
    {
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


    public  function  nosey()
    {
        return view();
    }



    public  function  filemanage()
    {
        $files = Db::name('filem')->select();
        foreach ($files as &$v) {
            $v['pic_url'] = $v['pic'];
        }
        return view('', ['files' => $files]);
    }

    public  function  addfiles()
    {
        $param = request()->param();

        if (request()->isAjax()) {
            $fileModel = new Filem;

            $data = [
                'pic' => trim($param['Mobile_icon'])
                ,'title' => trim($param['title'])
            ];

            $r = Common::dataExecute($fileModel, $data, $param);

            if (!empty($r))
                exit(Common::json(200, '已提交'));
            exit(Common::json(400, '提交失败'));
        }

        $dataOne = null;
        if (!empty($param['id'])) {
            $dataOne = Db::name('filem')->where('id', intval($param['id']))->find();
        }
        return view('', ['dataOne' => $dataOne]);

    }

    public  function cdnUploads()
    {
        $img = $_FILES['file'];
        $fileError = $img['error'];
        $fileType = $img['type'];

        if ($fileError == 0) {
            $file_type = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($fileType, $file_type)) {
                $arr   = [
                    'code' => 400,
                    'message'=>'文件上传失败',
                ];
                exit(json_encode($arr));
            }

        Upload::image($img);

        }
    }


}