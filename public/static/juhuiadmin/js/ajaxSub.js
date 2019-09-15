layui.use(['form', 'layedit', 'laydate'], function() {

    var form = layui.form,

       layui.jquery = layui.jquery;

    laydate = layui.laydate;

    form.render();

    //日期

    laydate.render({

        elem: '#date_hash'

    });


    //menu
    form.on('submit(tomenu)', function(data) {

        console.log(data.field)
       layui.jquery.fn.repost( data.field, data.field);

    });







    form.on('switch(switchContent)', function(data) {



        if (this.checked) {

            //链接框

           layui.jquery(".content-url").show();

           layui.jquery(".content-custom").hide();

            //UE.getEditor('container').setContent('', false);

        } else {

           layui.jquery(".content-url").hide();

           layui.jquery(".content-custom").show();

            //$("input[name='out_url']").val('');

        }

    });



    //profile_cate

    form.on('submit(formDemoPro)', function(data) {

        data.field.icon =layui.jquery(".imgdemo1").attr('src');

        data.field.img =layui.jquery(".imgdemo2").attr('src');

        data.field.is_tj = ( data.field.is_tj === 'on') ? 1 : 2;

        data.field.is_hot = ( data.field.is_hot === 'on') ? 1 : 2;

        data.field.is_new = ( data.field.is_new === 'on') ? 1 : 2;

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });





    //profile

    form.on('submit(formDemoProject)', function(data) {

        data.field.content =  ue.getContent();

        data.field.icon =layui.jquery(".imgdemo1").attr('src');

        data.field.img =layui.jquery(".imgdemo2").attr('src');

        data.field.is_tj = ( data.field.is_tj === 'on') ? 1 : 2;

        data.field.is_hot = ( data.field.is_hot === 'on') ? 1 : 2;

        data.field.is_new = ( data.field.is_new === 'on') ? 1 : 2;

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });







    //profile

    form.on('submit(formBanner)', function(data) {

        data.field.img =layui.jquery(".imgdemo2").attr('src');

        data.field.is_tj = ( data.field.is_tj === 'on') ? 1 : 2;

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });





    //active_cate:

    form.on('submit(formActivity_cate)', function(data) {

        data.field.icon =layui.jquery(".imgdemo1").attr('src');

        data.field.is_tj = ( data.field.is_tj === 'on') ? 1 : 2;

        data.field.is_hot = ( data.field.is_hot === 'on') ? 1 : 2;

        data.field.is_new = ( data.field.is_new === 'on') ? 1 : 2;

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });





    form.on('submit(formSubject)', function(data) {

        data.field.img =layui.jquery(".imgdemo2").attr('src');

        data.field.is_tj = ( data.field.is_tj === 'on') ? 1 : 2;

        data.field.is_hot = ( data.field.is_hot === 'on') ? 1 : 2;

        data.field.is_new = ( data.field.is_new === 'on') ? 1 : 2;

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });





    //sub_cate:

    form.on('submit(formSubject_cate)', function(data) {

        data.field.icon =layui.jquery(".imgdemo1").attr('src');

        data.field.is_tj = ( data.field.is_tj === 'on') ? 1 : 2;

        data.field.is_hot = ( data.field.is_hot === 'on') ? 1 : 2;

        data.field.is_new = ( data.field.is_new === 'on') ? 1 : 2;

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });





    //active_cate:

    form.on('submit(formNews_cate)', function(data) {

        data.field.icon =layui.jquery(".imgdemo1").attr('src');

        data.field.is_tj = ( data.field.is_tj === 'on') ? 1 : 2;

        data.field.is_hot = ( data.field.is_hot === 'on') ? 1 : 2;

        data.field.is_new = ( data.field.is_new === 'on') ? 1 : 2;

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });



    //news:

    form.on('submit(formNews)', function(data) {

        data.field.icon =layui.jquery(".imgdemo2").attr('src');

        data.field.is_tj = ( data.field.is_tj === 'on') ? 1 : 2;

        data.field.is_hot = ( data.field.is_hot === 'on') ? 1 : 2;

        data.field.is_new = ( data.field.is_new === 'on') ? 1 : 2;

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });







    //active:

    form.on('submit(formActivity)', function(data) {

        data.field.img =layui.jquery(".imgdemo2").attr('src');

        data.field.is_tj = ( data.field.is_tj === 'on') ? 1 : 2;

        data.field.is_hot = ( data.field.is_hot === 'on') ? 1 : 2;

        data.field.is_new = ( data.field.is_new === 'on') ? 1 : 2;

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });





    //active:

    form.on('submit(formReal_show)', function(data) {

        data.field.icon =layui.jquery(".imgdemo1").attr('src');

        data.field.img =layui.jquery(".imgdemo2").attr('src');

        data.field.icon_title =layui.jquery(".icon_title").attr('src');

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });





    //ask-cate:

    form.on('submit(formAsk_cate)', function(data) {

        data.field.icon =layui.jquery(".imgdemo1").attr('src');

        data.field.is_tj = ( data.field.is_tj === 'on') ? 1 : 2;

        data.field.is_hot = ( data.field.is_hot === 'on') ? 1 : 2;

        data.field.is_new = ( data.field.is_new === 'on') ? 1 : 2;

        console.log(data.field)

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });



    //ask-cate:

    form.on('submit(formRealShowCate)', function(data) {

        data.field.icon =layui.jquery(".imgdemo1").attr('src');

        data.field.is_tj = ( data.field.is_tj === 'on') ? 1 : 2;

        data.field.is_hot = ( data.field.is_hot === 'on') ? 1 : 2;

        data.field.is_new = ( data.field.is_new === 'on') ? 1 : 2;

        console.log(data.field)

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });



    //news:

    form.on('submit(formAsk)', function(data) {

        data.field.icon =layui.jquery(".imgdemo2").attr('src');

        data.field.is_tj = ( data.field.is_tj === 'on') ? 1 : 2;

        data.field.is_hot = ( data.field.is_hot === 'on') ? 1 : 2;

        data.field.is_new = ( data.field.is_new === 'on') ? 1 : 2;

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });



    //notes

    form.on('submit(formNotes)', function(data) {

        var img = [];



       layui.jquery.each($("#imgdemo2").children("img"), function (key, val ) {

            img.push($(val).attr("src"))

        });



        data.field.img = img;

        data.field.icon =layui.jquery(".imgdemo1").attr('src');



       layui.jquery.fn.repost( data.field.requestUrl, data.field);



    });



    //formGy

    form.on('submit(formGy)', function(data) {

        data.field.img =layui.jquery(".imgdemo2").attr('src');



        console.log()

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });



    //notes

    form.on('submit(formVideo)', function(data) {

        data.field.requestUrl = '/webadmin/index/addVideo';

        data.field.is_tj = ( data.field.is_tj === 'on') ? 1 : 2;

        data.field.path = layui.jquery(".videoDemo").attr('href');

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });



    //notes

    form.on('submit(formMachine)', function(data) {

        data.field.img =layui.jquery(".imgdemo2").attr('src');

        data.field.icon =layui.jquery(".imgdemo1").attr('src');

        // console.log( data.field);

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });



    //notes

    form.on('submit(formExpert)', function(data) {

        data.field.is_tj = ( data.field.is_tj === 'on') ? 1 : 2;

        data.field.img =layui.jquery(".imgdemo2").attr('src');

        var arr = [];

       layui.jquery.each($(".layui-badge"), function (k, v ) {

            arr.push($(v).text())

        });

        data.field.be_expert_in = arr;

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });







    //contact

    form.on('submit(formContact)', function(data) {

        var arr_tel = [];

        var arr_bus = [];



        console.log($(".beDemo-tel").children(".layui-self"));

       layui.jquery.each($(".beDemo-tel").children(".layui-self"), function (k, v ) {

            arr_tel.push($(v).text())

        });

        data.field.tel = arr_tel;



       layui.jquery.each($(".beDemo-bus").children(".layui-self"), function (k, v ) {

            arr_bus.push($(v).text())

        });

        data.field.bus = arr_bus;



       layui.jquery.fn.repost( data.field.requestUrl, data.field);



    });



    form.on('submit(formAbout)', function(data) {

        data.field.img =layui.jquery(".imgdemo2").attr('src');

        data.field.about_video =layui.jquery(".videoDemo").attr("href");

        console.log( data.field);

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });



    form.on('submit(formUser)', function(data) {



       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });



    form.on('submit(formUser)', function(data) {



       layui.jquery.fn.repost( data.field.requestUrl, data.field);



    });





    form.on('submit(formWebSetting)', function(data) {

        data.field.left_poster =layui.jquery(".imgLeft").attr('src');

        data.field.center_poster =layui.jquery(".imgCenter").attr('src');

        data.field.mobile_poster =layui.jquery(".imgCenterMo").attr('src');

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });



    form.on('submit(formGoods)', function(data) {

        data.field.is_tj = ( data.field.is_tj === 'on') ? 1 : 2;

        data.field.discount = ( data.field.discount === 'on') ? 1 : 2;

        data.field.icon =layui.jquery("#imgdemo1").attr('src');

       layui.jquery.fn.repost( data.field.requestUrl, data.field);

    });



    //权限模块选择













    //swetch监听指定开关

    form.on('switch(switchTest_hash)', function(data) {

        //id， 字段， url

        var id =layui.jquery(this).attr('data-ids')

            ,field =layui.jquery(this).attr('data-field')

            ,value  = this.checked ? 1: 2;

        if (!id) {alert('数据不存在！'); return false;}

        data = {id:id, field:field, value:value,do:$(this).attr('data-do')};

       layui.jquery.fn.repost($(this).attr('data-url'), data);

        // layer.msg((this.checked ? '已开启' : '已禁用'), {

        //     offset: '6px'

        // });

        //layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)

    });



});






$.fn.repost = function(url, data) {
   layui.jquery.post(url  , data, function(res) {
        console.log(res);
        if ( res.status )  {
            layer.msg('<span><i class="layui-icon layui-icon-ok" style="    color: white; background: #6cd965;     margin-right: 13px;border-radius: 10px;"></i>'+res.msg+'</span>', {
                time : 1000,
                maxWidth: 850,
            }, function() {
                layer.close(layer.index);
                window.parent.location.reload();
            });
        } else {
            layer.msg('<span><i class="layui-icon layui-icon-close" style="    color: white; background: red;     margin-right: 13px;border-radius: 10px;"></i>'+res.msg+'</span>', {
                time : 3000,
                // time: 2, //2s后自动关闭
            });
        }
    }, 'json');
};