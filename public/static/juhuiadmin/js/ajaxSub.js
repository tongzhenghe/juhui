layui.define('jquery', function(exports){
    var $=layui.jquery;
    var base={
        test:function(){
            console.log("helloworld")
        }
    };
    exports('base', base);
});
layui.config({
    version: true //一般用于更新模块缓存，默认不开启。设为true即让浏览器不缓存。也可以设为一个固定的值，如：201610
    ,debug: false //用于开启调试模式，默认false，如果设为true，则JS模块的节点会保留在页面
    , base: '/static/juhuiadmin/js/' //假设这是你存放拓展模块的根目录
}).use(['base'],function(){
    var base=layui.base;
    base.test()
});
