$(function() {
    var note_id = $("#getnote_id").attr('note_id');
    $.ajax({
        url: getcmtUrl,
        type: 'POST',
        dataType: 'json',
        data: { note_id: note_id },
        success: function(cmt) {

            console.log(cmt)
            for (onecmt in cmt) {


                var nickname = cmt[onecmt].nick_name;
                var cmtcontent = cmt[onecmt].cmt_content;
                var cmttime = cmt[onecmt].cmt_time;
                var uservia = baseurl + cmt[onecmt].user_via;


                $("#detail_cmt").append("<div  data-tab-panel-0 class='am-tab-panel am-active'><div class='pet_comment_list_block'><div class='pet_comment_list_block_l'><img style='height:50px' src='" + uservia + "' alt=''></div><div class='pet_comment_list_block_r'><div class='pet_comment_list_block_r_info'>" + nickname + "</div><div class='pet_comment_list_block_r_text'>" + cmtcontent + "</div><div class='pet_comment_list_block_r_bottom'><div class='pet_comment_list_bottom_info_l'>" + cmttime + "</div><div class='pet_comment_list_bottom_info_r'></div></div></div></div></div>");

            }



        }
    });





    //评论
    $('#commentli').click(function() {
        $('#comment_div').css('display', 'block');
    });
    $('#show').click(function() {
        //判断是否登陆
        $.ajax({
            url: isLogin,
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.res == 'ok') {
                    var $note_id = $('#note_id').val();
                    var $comment_content = $('#comment_content').val();
                    $.ajax({
                        url: detaiUrl,
                        type: 'POST',
                        dataType: 'json',
                        data: { note_id: $note_id, cmt_content: $comment_content },
                        success: function(data) {
                            alert("评论成功");
                            window.location.reload();
                        }
                    });



                } else {
                    alert("为营造良好的环境，请先登陆后评论");
                }
            },
            error: function(err) {
                console.log(err);
            }
        });





    })

    //点赞数
    $('#praise').click(function() {
        var $note_id = $("#getnote_id").attr('note_id');
        var $parise_num = $("#getnote_id").attr('parise_num');
        //判断是否登陆
        $.ajax({
            url: isLogin,
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.res == 'ok') {


                    $.ajax({
                        url: praiseurl,
                        type: 'POST',
                        dataType: 'json',
                        data: { note_id: $note_id, parise_num: $parise_num },
                        success: function(data) {
                            //alert(1);
                            if (data.result == 'success') {
                                var likenume = parseInt($parise_num) + 1;
                                $("#praise_num").html("" + likenume + "");
                                $('.share_ico_link').css('color', '#e86060');
                                // window.location.reload();
                                $('#praise_num').html(data.praise_num);
                            } else if (data.result == 'haved') {
                                alert('您已经点赞过了');
                            } else {
                                alert('点赞失败');
                            }
                        }
                    });


                } else {
                    alert("登陆即可为喜欢的帖子点赞哦");
                }
            },
            error: function(err) {
                console.log(err);
            }
        });





    });

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


})
