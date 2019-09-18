



layui.use('layedit', function() {
    var layedit = layui.layedit;
    /*pc*/
    layedit.build('pc', {
        height: 180 //设置编辑器高度
        ,width: 300
    });
    /*手机*/
    layedit.build('mobile', {
        height: 180 //设置编辑器高度
        ,width: 300
    });
});

layui.use('upload', function(){
    var upload = layui.upload;
    //执行实例
    var uploadInst = upload.render({
        elem: '#Mobile-icon' //绑定元素
        ,url: '/cdnUploads' //上传接口
        ,accept:"file"
        ,exts: 'jpg|png'
        , method: "post"
        // , auto: false  //auto 参数必须设置为false
        ,done: function(res){
            //上传完毕回调
            console.log(res)
        }
        ,error: function(err){
            //请求异常回调
            console.log(err)
        }
    });
});

layui.use('upload', function(){
    var upload = layui.upload;
    //执行实例
    var uploadInst = upload.render({
        elem: '#PC-icon' //绑定元素
        ,url: '/cdnUploads' //上传接口
        ,accept:"file"
        ,exts: 'jpg|png'
        , method: "post"
        // , auto: false  //auto 参数必须设置为false
        ,done: function(res){
            //上传完毕回调
            console.log(res)
        }
        ,error: function(err){
            //请求异常回调
            console.log(err)
        }
    });
});
