<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="<?php echo base_url()?>css/amazeui.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>css/wap.css">

    <title>内容页</title>
    <?php
    $this->load->view('libs');
    ?>
</head>
<body>


   <?php 
   	$this->load->view('head');
    ?>
<div style="height:90px;border: 1px solid #242424;background: url('../../images/cattitilebak.jpg');" id=""></div>

    <div class="pet_mian"  style="background:#ececec">
	<?php foreach($detail as $data){
		$note_id      = $data['note_id'];
		$note_title   = $data['note_title'];
		$note_content = $data['note_content'];
		$note_url     = $data['note_url'];
		$note_time    = $data['note_time'];
		$note_likes   =$data['note_likes'];
	?>
	<div class="pet_content col-md-10" style="margin-left: 8%" id='getnote_id' note_id="<?=$note_id;?>" parise_num="<?=$note_likes;?>">
		<div class="pet_content_block">
			<article data-am-widget="paragraph" class="am-paragraph am-paragraph-default pet_content_article" data-am-paragraph="{ tableScrollable: true, pureview: true }">
				<input type="hidden" name="user_nick" id="user_nick" value="">
				<input type="hidden" name="news_id" id="news" value="">
				<p id="pet_article_title"><?=$note_title;?></p>

                <div class="col-lg-3" >
                    <img src="<?=$note_url;?>">

                </div>
                <div class="col-lg-8 articletext" >
                    <p class=paragraph-default-p><?=$note_content;?></p>

                </div>

			</article>
            <div class="pet_article_user_time"> 发表于：<?=$note_time;?></div>

            <ul class="like_share_block">
				<li id="praise" news_id='111'><a class="link_share_button"  href="###"><i class="iconfont share_ico_link">&#xe62f;</i><span id="praise_num"><?=$note_likes;?></span></a></li>
				<li id="commentli"><a class="link_share_button"  href="###"><i class="iconfont share_ico_wx"></i><span id="comment">评论</span></a></li>
				<li id="shareli"><a class="link_share_button" id="friend" href="#"><i class="iconfont share_ico_pyq">&#xe62e;</i><span id="share">分享</span></a></li>

			</ul>

		</div>
		<!--评论-->
		<div style="height:80px;display:none;" id="comment_div">
			<textarea style="margin:0 auto;width:840px; font-size:20px; margin-top:20px;" id="comment_content" name="comment_content"></textarea>
			<input type="hidden" name="note_id" id="note_id" value="<?=$note_id;?>">
			<button type="button" style="width:60px;height:40px;float:right;margin:30px 50px 0 0;" id="show">发表</button>
		</div>

		<!--分享-->
		<div style="height:100px;display:none;" id="share_div">
			<input style="width:640px; margin-top:20px;" id="share_content" name="share_content" placeholder="转发理由">
			<input type="hidden" name="user_id" id="user_id" value="">
			<button type="button" style="float:right;margin-top:10px;" id="share_show">分享</button>
		</div>
		<div class="pet_comment_list">
			<div class="pet_comment_list_wap"><div class="pet_comment_list_title">精彩评论</div>

				<div data-am-widget="tabs" class="am-tabs am-tabs-default pet_comment_list_tab" >
					<ul class="am-tabs-nav am-cf pet_comment_list_title_tab">
						<li class="am-active"><a href="[data-tab-panel-0]">人气</a></li>
						<li class=""><a href="[data-tab-panel-1]">最新</a></li>
						<li class=""><a href="[data-tab-panel-2]">最早</a></li>
					</ul>
				</div>
			




				</div>
			</div>

			<div id="detail_cmt">


			</div>


		</div>
	</div>
<?php
	}
?>

<div id="backtohome" class="canclick"><span id="back">回到入口</span><span><</span></div>

<script src="<?php echo base_url()?>js/amazeui.min.js"></script>
<script src="<?php echo base_url()?>js/detail.js"></script>
<script>
    var homeurl="<?php echo site_url('Home')?>";
    var detaiUrl = "<?php echo site_url('CommentController')?>";
    var getcmtUrl = "<?php echo site_url('CommentController/getcmt')?>";
    var praiseurl="<?php echo site_url('PraiseController')?>";
    var isLogin="<?php echo site_url('IsLogin')?>";
    var baseurl="<?php echo base_url()?>";
</script>







</body>
</html>