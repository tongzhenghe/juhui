<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/16
 * Time: 11:26
 */

namespace app\admin\model;


use app\admin\model\system\SystemAdmin;

class Common extends  SystemAdmin
{


    public  static  function  dataExecute($model, $data, $param = null)
    {

        if (!empty($param['id'])) {
            return $model->save($data, ['id' => intval($param['id'])]);
        } else {
            return $model->save($data);
        }

    }


}