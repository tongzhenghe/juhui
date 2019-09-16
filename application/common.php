<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function wl_debug( $value )
{
    echo '<pre>';
    print_r( $value );
    echo '<pre>';
    exit;
}

//function  wl_debug_log( $files  , $key  = '' )
//{
//    $files = [$key ? $key : date('Y-m-d H : s', time()) => $files];
//    $i = date('YmdHs', time());
//    $error_file = $i.'error.txt';
//    $dir = fopen("../runtime/errordir/".$error_file, "w") or die("Unable to open file!");
//
//    fwrite($dir,  print_r($files, true));
//
//    fclose($dir);
//
//}

function jsondebug( $array )
{
    if (is_array($array)) {
        exit(json_encode(['json' => $array]));
    }

    exit( json_encode(['str' => $array]) );
}