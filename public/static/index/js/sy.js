$(function () {

    var $con = $('#gg'), $box = $con.find('#ggBox'), $btns = $con.find('#ggBtns'), i = 0, autoChange = function () {
        i += 1;
        if (i === 4) { i = 0; }
        $btns.find('a:eq(' + i + ')').addClass('current').siblings().removeClass('current');
        var curr = $box.find('a:eq(' + i + ')'), prev = curr.siblings();
        prev.css('z-index', 2);
        curr.css('z-index', 3).animate({
            'opacity': 1
        }, 150, function () {
            prev.css({
                'z-index': 1, 'opacity': 0.1
            });
        });
    }, loop = setInterval(autoChange, 5000);

    $con.hover(function () {
        clearInterval(loop);
    }, function () {
        loop = setInterval(autoChange, 5000);
    });

    $btns.find('a').click(function () {
        i = $(this).index() - 1;
        autoChange();
    });
});

$(function () {
    $("#in-sub").click(function(){
        var data = {};
        data.r = $("input[name='r']").val();
        data.user_name = $("input[name='user_name']").val();
        data.user_tel = $("input[name='user_tel']").val();
        data.user_message = $("textarea[name='user_message']").val();
        $.post("wmsg", data, function(result){

            if (result.state == true) {
                alert(result.msg);
                //清空表单
                $("input[name='user_name']").val('');
                $("input[name='user_tel']").val('');
                $("textarea[name='user_message']").val('');
            } else {
                alert(result.msg);
                $("input[name='user_name']").val('');
                $("input[name='user_tel']").val('');
                $("textarea[name='user_message']").val('');
            }

        }, 'json');
    });
});