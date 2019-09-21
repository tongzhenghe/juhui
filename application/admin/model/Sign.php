<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/21
 * Time: 16:50
 */

namespace app\admin\model;


use app\admin\model\system\SystemAdmin;
use think\Cookie;
use think\Db;
use think\Session;

class Sign extends SystemAdmin
{

    static  public  function  check_login( $_user )

    {

        //if(!is_dir('./tmp/'))mkdir ('./tmp/', 0700); session_save_path('./tmp/');

//        $second  = Session::get('second');
//
//        if ( (int)$second  > 5 ) {
//
//            $second_time = Session::get('second_time');
//
//            if ($second_time  +3600 <= time() ) {
//
//                SystemAdmin::clearLoginInfo();
//
//            }
//
//            exit( iJson('', false, '您已超出登录次数， 请于1小时后在尝试登录！'));
//
//        }

        if ( !empty($_user)  || is_array( $_user )) {

            //验证
            $userInfo = Db::name('admin')->where('username',  trim($_user['username']))->find();

            if ($userInfo['state'] === 2 )
                exit( iJson('', false, '该账号还未未审核， 暂时无法登陆！'));

            if (!empty($userInfo)) {

                if ( $_user['password']  === $userInfo['password']) {
                    jsondebug(1);

                    //SystemAdmin::setUserInfo($userInfo);

                    //记住密码
//                    if ( 1 == intval( $_user['remember'] ) ) {
//
//                        Cookie::set('username', $_user['username'], time() + 3600 * 7 );
//
//                        Cookie::set('password',  $_user['password'],  time() + 3600 * 7 );
//
//                        Cookie::set('remember', $_user['remember'] ,  time() + 3600 * 7 );
//
//                    } else {
//
//                        Cookie::delete('username');
//
//                        Cookie::delete('password');
//
//                        Cookie::delete('remember' );
//
//                    }

                    return true;

                } else {

                    Session::set('second', $second +1);

                    Session::set('second_time',  time());

                    exit( iJson('', false, '密码输入错误！'));

                }

            } else {

                exit( iJson('', false, '用户不存在！'));

            }

        } else {

            exit( iJson('', false, '数据错误！'));

        }

    }


}