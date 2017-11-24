$(function() {
    $("#backtohome").hover(function() {
        $(this).animate({
            left: '0'

        });
    }, function() {
        $(this).animate({
            left: '-90px'

        });
    })

    $("#backtohome").click(function() {
        location.href = homeurl;
    })
    $("#close_catsendmes").click(function() {

        $("#catsendmesbigdiv").css('display', 'none');

    })
    $(".revbtn").click(function() {
        var nickname = $(this).attr('nick_name');
        var receiveuser_id = $(this).attr('user_id');
        $("#catsendmestitletowho").html("给" + nickname + "的私信");

        $("#catsendmesbigdiv").css('display', 'flex');
        $("#catsendmesok").click(function() {
            var sendcontent = $("#catsendmescontent").val();
            if (sendcontent == '') {
                alert("内容不能为空");
                return;
            }
            $.ajax({
                url: sendmes,
                type: 'POST',
                data: { sendcontent: sendcontent, receiveuser_id: receiveuser_id },
                dataType: 'json',
                success: function(data) {
                    console.log(data)
                    if (data.res == 'ok') {
                        alert("发送成功");
                        $("#catsendmescontent").val('');
                    } else {
                        alert("发送失败");
                    }

                },
                error: function() {
                    alert("操作失败");

                }
            })


        })

    })


})
