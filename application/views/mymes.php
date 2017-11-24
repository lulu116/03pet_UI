<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的消息</title>
<link rel="stylesheet" href="<?php echo base_url()?>css/mymes.css"> 
<?php  
	$this->load->view('libs');
?>
  
	
</head>
<script src="<?php echo base_url()?>js/mymes.js"></script> 
<body>
<?php  
	$this->load->view('head');
?>
<div class="container-fluid">
<div class="row" id="mesbody">
<div class="col-sm-12 col-md-12" id="mymestitle"></div>

<div class="col-sm-12 col-md-12 mymestype flex_center"><div>系统消息</div></div>
<div class="col-sm-12 col-md-12 mymestype flex_center"><div>私信</div></div>



<?php 
 foreach ($allmes as $mes){
         $nick_name=$mes['nick_name']; 
         $user_id=$mes['senduser_id']; 
         $viaurl=base_url().$mes['user_via']; 
        $msg_content=$mes['msg_content']; 
		$msg_time=$mes['msg_time']; 
echo "<div class='col-sm-12 col-md-12 flex_center class='onemes'><div class='onemesin'><div class='onemesleft'><div class='onemesviadiv flex_center'><img src='$viaurl' alt=''></div><div class='onemesname flex_center'>来自：<span>".$nick_name."</span></div></div><div class='onemesright'><div class='onemestime'>$msg_time</div><div class='onemescontent'>$msg_content</div></div><div class='onemesrightrr'><div class='onemesrev'><button user_id='$user_id' class='revbtn' nick_name='$nick_name'>回复</button></div></div></div></div>";


}

 ?>

</div>

</div>

<div class="col-sm-12 col-md-12" id="mymesbottom"></div>

<div id="backtohome" class="canclick"><span id="back">回到入口</span><span><</span></div>
<div id='catsendmesbigdiv' class="flex_center"><div id="catsendmes"><div id="catsendmestitle" class="flex_center"><span id="catsendmestitletowho"></span><span id="close_catsendmes" class="canclick">x</span></div><textarea name="" id="catsendmescontent" ></textarea><div id="catsendmesbtndiv" class="flex_center"><button id="catsendmesok">发送</button></div></div>
</div>
<script>
var homeurl="<?php echo site_url('Home')?>";
var sendmes="<?php echo site_url('CatMes')?>";
</script>
</body>
</html>