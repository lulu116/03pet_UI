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


    $(".btn").click(function() {
        $(".btn").removeClass('current');
        $(this).addClass('current');

        if ($(this).html() == "更改资料") {

            $("#userhomeright").css('display', 'none');
            $("#userhomeright_change").css('display', 'flex');
        }
        if ($(this).html() == "个人资料") {
            $("#userhomeright").css('display', 'flex');
            $("#userhomeright_change").css('display', 'none');

        }




    })


    var ue = UE.getEditor('note_content11'); //news_content_text是需要加载编辑器的id
    var uploadEditor = UE.getEditor("uploadEditor", {
        isShow: false,
        focus: false,
        enableAutoSave: false,
        autoSyncData: false,
        autoFloatEnabled: false,
        wordCount: false,
        sourceEditor: null,
        scaleEnabled: true,
        toolbars: [
            ["insertimage", "attachment"]
        ]
    });
    uploadEditor.ready(function() {
        uploadEditor.addListener("beforeInsertImage", _beforeInsertImage);
    });

    //自定义按钮绑定触发多图上传和上传附件对话框事件
    document.getElementById('j_upload_img_btn').onclick = function() {
        var dialog = uploadEditor.getDialog("insertimage");
        dialog.title = '多图上传';
        dialog.render();
        dialog.open();
    };

    //多图上传动作
    function _beforeInsertImage(t, result) {
        var imageHtml = '';
        var note_url = '';
        for (var i in result) {
            imageHtml = '<li><img src="' + result[i].src + '" alt="' + result[i].alt + '" height="150"></li>';
            note_url = result[i].src;
        }
        document.getElementById('upload_img_wrap').innerHTML = imageHtml;
        //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
        //具体怎么设置看项目需求，我这里只是举个例子
        document.getElementById('note_url').value = note_url;
    }


    $("#userhome_changebtn").click(function() {
        var viaimg = $("#note_url").val().split('mypet/')[1];
        var changenickname = $("#changenicknameinput").val();
        console.log(viaimg);
        console.log(changenickname);
        $.ajax({
            url: changeuserinfourl,
            type: 'POST',
            dataType: 'json',
            data: { viaimg: viaimg, nickname: changenickname },
            success: function(data) {
                console.log(data.result)
                if (data.result == 'ok') {
                    window.location.reload();
                }

            },
            error: function(err) {
                alert("操作失败");
            }
        });






    })



})
