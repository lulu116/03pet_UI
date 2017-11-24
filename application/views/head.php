

<link rel="stylesheet" href="<?php echo base_url()?>css/head.css">
	<div class="container-fluid">
	<div class="row" id="headdiv">
<div class="col-md-6"><img src="<?php echo base_url()?>images/title.png" alt=""></div>
<?php 
$nick_name=$this->session->userdata('nick_name');
$user_id=$this->session->userdata('user_id');

if(!$nick_name){
	echo "<div class='col-md-6' id='userhomediv'><span id='loginbtn' class='canclick'>登陆 / 注册</span></div>";
}else{
	$userhomeimg=base_url()."images/user_home.png";
	echo "<div class='col-md-6 canclick' id='userhomediv' user_id='$user_id'><div id='userhome_show' class='flex_center'><img src='$userhomeimg' id='user_homeicon'><span id='user_homename'>$nick_name</span><div id='userhome_hidden'><div class='flex_center userhomehiddenone' id='touserhome'>个人中心</div>
  <div class='flex_center userhomehiddenone' id='tomymes'>我的消息<span id='news'></span></div><div class='flex_center userhomehiddenone' id='logout'>退出登陆</div></div></div></div>";
}


 ?>

	</div>




	</div>
	<script>
var mymeshomeurl="<?php echo site_url('MyMesHome')?>";
var isnewmesurl="<?php echo site_url('MyMesHome/findNewMes/')?>";
var loginurl="<?php echo site_url('IndexControler')?>";
   $('#loginbtn').click(function() {
        window.location.href = loginurl;
    })

   $('#userhomediv').hover(function(){
   		$('#userhome_hidden').css('display','block');

      //查看有没有新消息
 $.ajax({
                    url: isnewmesurl,
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                                                if(data.res=='have'){
                        
                                $("#news").css('display','inline-block');

                          }
                          if(data.res=='no'){
                          
                      $("#news").css('display','none');
                          }
                    },
                    erorr:function(erorr){
                  
                    }
                });




   },function(){
$('#userhome_hidden').css('display','none');
   })

   $('.userhomehiddenone').hover(function(){
   	$(this).css('background','#F00F24');
   	$(this).css('color','white');
   },function(){
   		$(this).css('background','white');
   			$(this).css('color','black');
   })

   //退出登陆
  var logouturl="<?php echo site_url('Logout')?>";

 $("#logout").click(function(){
   		  $.ajax({
                    url: logouturl,
                    type: 'POST',
                    dataType: 'json',
                  

                    success: function(data) {

                    },
                    erorr:function(erorr){
                	
                    }
                });
   		  location.reload();
   		
   })

var userhomeurl="<?php echo site_url('UserHome')?>";
 $("#touserhome").click(function(){

window.location.href=userhomeurl;


 })

//我的消息

 $("#tomymes").click(function(){
window.location.href=mymeshomeurl;
 })
	</script>
