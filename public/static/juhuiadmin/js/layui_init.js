layui.config({

    base: ''

}).use(['jquery', 'mockjs', 'table', 'sidebar', 'form'], function () {

    //var $ = layui.jquery,

    // sidebar = layui.sidebar,

    // form = layui.form;

    var table = layui.table;

    //转换静态表格

    table.init('demo', {

        // size: 'sm'

        // ,height: 500 //设置高度

        limit: 90 //注意：请务必确保 limit 参数（默认：10）是与你服务端限定的数据条数一致

        //支持所有基础参数

    });

});


layui.jquery(".layui-tab-title li").click(function(){

    var picTabNum = layui.jquery(this).index();

    // console.log("当前图片标题下标是："+picTabNum);

    sessionStorage.setItem("picTabNum",picTabNum);

});

layui.jquery(function(){

    var getPicTabNum = sessionStorage.getItem("picTabNum");

    layui.jquery(".layui-tab-title li").eq(getPicTabNum).addClass("layui-this").siblings().removeClass("layui-this");

    layui.jquery(".layui-tab-content>div").eq(getPicTabNum).addClass("layui-show").siblings().removeClass("layui-show");

});