<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/21
 * Time: 16:48
 */

namespace app\admin\controller;

use app\admin\model\Sign as SignModel;
use think\Controller;

class Sign extends  Controller
{

        public function  signin()
        {

        if (request()->isAjax()) {

            $post  = request()->post();
            if (empty( $post['username'] )) exit(iJson('', 400,  false, '用户名不能为空！'));

            if (empty( $post['password'] )) exit(iJson('', 400,  false, '密码不能为空！'));

            //$captcha = trim($user_info['captcha']);

            //if(!captcha_check($captcha)) exit(iJson('', 400,  false, '验证码输入错误'));

            $result =SignModel::check_login( $post );

            if (true === $result ) {

                exit(iJson( '/#/', true,  '欢迎'. $post['username']. '回来!'));

            } else {

                exit(iJson('', 400,  false, '系统错误！'));

            }

        }

        return view();





    }







    /**

     * 退出登陆

     */

    public function sign_out()

    {

        SystemAdmin::clearLoginInfo();

        Cookie::delete('username');

        Cookie::delete('password');

        Cookie::delete('remember');

        $this->redirect('sign/signin');

    }


}