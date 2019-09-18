<?phpnamespace app\extra;// 引入七牛鉴权类use app\admin\model\Common;use Qiniu\Auth;// 引入七牛上传类use Qiniu\Storage\UploadManager;class Upload{    /**     * 上传图片     * @return null|string     */    public static function image()    {        if(empty($file['tmp_name']))            exit(Common::json(400 ,  '文件读取失败'));        $tmp_name = $file['tmp_name'];        $ext = strtolower(strrchr($file['name'],'.'));        $ext_arr = ['.jpg', '.png'];        if (!in_array($ext, $ext_arr))            exit(Common::json(400 , '文件类型错误！'));        $conf = ( !empty( $or_conf )) ? $or_conf : config('Qiniu_CONFIG');        //鉴权对象        $auth = new Auth('"v-_-RaWsWOAusrmRIEbvaJx4wmiVwHMjfkXyhmxX"', 'dz1lzAKprz8rfwrTTRPCpgos_siqu0jwf0PoxlC9');        // 生成token        $token = $auth->uploadToken($conf['bucket']);        //文件名        $filename = date('Y').'/'.date('m').'/'.substr(md5($tmp_name),8,5).date('Ymd').rand(0,9999).$ext;        jsondebug($filename);        // 初始化UploadManager类        $uploadMgr = new UploadManager();        list( $res, $err ) = $uploadMgr->putFile( $token, $filename, $tmp_name );        if($err !== null) {            exit(false);        }else{            exit( json_encode( ['file' => $conf['domain'] . $filename ]));        }    }    /**     * 删除图片     * @param $delFileName:要删除的图片文件，与七牛云空间存在的文件名称相同     * @return bool     */    public static function delimage( $delFileName )    {        // 判断是否是图片;        $isImage = preg_match('/.*(\.png|\.jpg|\.jpeg|\.gif)$/', $delFileName);        if( empty($isImage) ){            return false;        }        $conf = config('Qiniu_CONFIG');        //鉴权对象        $auth = new Auth($conf['accessKey'],$conf['secretKey']);        // 配置        $config = new \Qiniu\Config();        // 管理资源        $bucketManager = new \Qiniu\Storage\BucketManager($auth, $config);        // 删除文件操作        $res = $bucketManager->delete($conf['bucket'], $delFileName);        if ( is_null($res) ) {            // 为null成功            return true;        }        return false;    }}