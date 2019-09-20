
alert(2)
layui.define(function(exports){ //提示：模块也可以依赖其它模块，如：layui.define('layer', callback);
    var obj = {
        hello: function(str){
            alert('Hello '+ (str||'mymod'));
        }
    };

    //输出test接口
    exports('mymod', obj);
});


var laypage, laydate, layedit, upload, form;
layui.use(['form', 'upload', 'layedit', 'laypage', 'laydate'], function(){
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









