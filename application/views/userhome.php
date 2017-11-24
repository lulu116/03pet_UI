<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>MyPet</title>
<link rel="stylesheet" href="<?php echo base_url()?>css/userhome.css"> 

 	<?php  
	$this->load->view('libs');
?>
<script src="<?php echo base_url()?>js/userhome.js"></script> 
	<script type="text/javascript" src="<?php echo base_url()?>public/plug/ue/ueditor.config.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>public/plug/ue/ueditor.all.js"></script>


 </head>
 <body>
 	<?php  
	$this->load->view('head');
?>
<div class="container-fluid">



<div class="row">
<div class="col-sm-12 col-md-12" id="userhometitle"></div>


<div class="col-sm-12 col-md-12" id="userhomecontent">
<?php 
foreach ($user as $auser) {
	$nickname=$auser['nick_name'];
	$uservia=base_url().$auser['user_via'];
	$alllevel=$auser['all_level'];
	$catlevel=$auser['cat_level'];
$doglevel=$auser['dog_level'];
$hamsterlevel=$auser['hamster_level'];

	echo "<div class='col-sm-4 col-md-4' id='userhomeleft'><div class='current flex_center canclick btn' id='userhomemybtn'>个人资料</div><div id='userhomechangebtn' class='flex_center canclick btn'>更改资料</div></div><div class='col-md-1 col-sm-1'></div><div class='col-sm-7 col-md-7' id='userhomeright'><div id='userhomeright_l'><div id='userhomeviadiv' class='flex_center'><img src='$uservia'></div><div class='flex_center' id='userhome_name'>$nickname</div></div><div id='userhomelistdiv'><div>总积分:<span>12121221</span></div><div>化猫分:<span>121222</span></div><div>灵狗分:<span>12121221</span></div><div>仓鼠分:<span>12121221</span></div></div></div><div class='col-sm-7 col-md-7' id='userhomeright_change'><div id='userhomeright_change_top'><div id='changevia'><div id='changeviashowdiv' class='flex_center'><img src='$uservia'></div><div id='updatavia' class='control-group' style='display: inline-block;'><label class='control-label'></label><div class='controls'><button type='button' id='j_upload_img_btn'>更改头像</button><ul id='upload_img_wrap'></ul><input type='hidden' id='note_url' name='note_url' value=''><span class='help-inline'></span><textarea id='uploadEditor' style='display: none;'></textarea></div></div></div><div id='changenickname'><div>修改昵称</div><div><input type='text' placeholder='请输入您要修改的昵称' id='changenicknameinput' value='$nickname'></div></div></div><div id='userhomeright_change_bottom'><div id='userhome_changebtn' class='canclick'>保存</div></div></div>";
}



 ?>

  <!-- <div class='control-group' style='display: inline-block;'><label class='control-label'></label><div class='controls'><button type='button' id='j_upload_img_btn'>上传图片</button><ul id='upload_img_wrap'></ul><input type='hidden' id='note_url' name='note_url' value=''><span class='help-inline'></span><textarea id='uploadEditor' style='display: none;'></textarea></div></div> --> 








</div>
</div>
</div>
<div id="backtohome" class="canclick"><span id="back">回到入口</span><span><</span></div>

<script>
var homeurl="<?php echo site_url('Home')?>";
var changeuserinfourl="<?php echo site_url('UserInformation')?>";
</script>
 </body>
 </html>