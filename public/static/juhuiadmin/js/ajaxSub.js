
layui.define(function(exports){ //提示：模块也可以依赖其它模块，如：layui.define('layer', callback);
    var obj = {
        hello: function(str){
            alert('Hello '+ (str||'mymod'));
        }
    };

    //输出test接口
    exports('mymod', obj);
});



//config的设置是全局的
layui.config({
    base: '/static/juhuiadmin/js/' //假设这是你存放拓展模块的根目录
}).extend({ //设定模块别名
    mymod: 'ajaxSub' //如果 mymod.js 是在根目录，也可以不用设定别名
   // ,mod1: 'admin/mod1'  //相对于上述 base 目录的子目录
});
//
// //你也可以忽略 base 设定的根目录，直接在 extend 指定路径（主要：该功能为 layui 2.2.0 新增）
// layui.extend({
//     mod2: '{/}http://cdn.xxx.com/lib/mod2' // {/}的意思即代表采用自有路径，即不跟随 base 路径
// })

//使用拓展模块
layui.use('ajaxSub', function(){
    alert(1)
    var mymod = layui.mymod;

    mymod.hello('World!'); //弹出 Hello World!
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









