layui.define('jquery', function(exports){
    var $=layui.jquery;
    // var base={
    //     test:function(){
    //         console.log("hellosssssworld")
    //     }
    // };
    exports('ajaxSub', $);
});
layui.config({
    version: true //一般用于更新模块缓存，默认不开启。设为true即让浏览器不缓存。也可以设为一个固定的值，如：201610
    ,debug: true //用于开启调试模式，默认false，如果设为true，则JS模块的节点会保留在页面
    , base: '/static/juhuiadmin/js/' //假设这  是你存放拓展模块的根目录
}).use(['ajaxSub','form', 'upload', 'layedit', 'laypage', 'laydate'],function(){
    var laypage, laydate, layedit, upload, form;
    laypage = layui.laypage;
    laydate = layui.laydate;
    layedit = layui.layedit;
    upload = layui.upload;
    form = layui.form;
    //addmenu
    form.on('submit(tos)', function(data) {
        alert(2)
    });




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

    //上传1
    upload.render({
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

    //上传2
    upload.render({
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
