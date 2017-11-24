<?php
date_default_timezone_set("PRC");
defined('BASEPATH') OR exit('No direct script access allowed');
class GetCatMsg extends CI_Controller {

		function GetCatMsg(){
		parent::__construct();
		//1,如果不添加这个方法，在前端使用url的时候会出问题
		$this->load->helper('url');
		 $this->load->model('CatMsgModel');

	}
	public function index(){
	set_time_limit(0);
	$time=0;
	while(1){
		usleep(2000);
$time+=1;
		$res=$this->CatMsgModel->findcatmsg();
			//echo json_encode($res);
		if($res!=[]){		

			echo json_encode($res);
				
			$changeres=$this->CatMsgModel->changecatmsg();
			
				exit();
		}
		if($time=5){
			
			exit();
		}
		
		
	}
	}


	public function changeMsg(){
		$changeres=$this->CatMsgModel->changecatmsg();
	}



	public function insertMsg(){
		$senduser_id=$this->session->userdata('user_id');
		$msg_content=$_POST['msg_content'];
		   $msg_time =date('Y-m-d h:i:s');     
		echo $this->CatMsgModel->insertcatmsg($senduser_id,$msg_content,$msg_time);

	}
	
}

