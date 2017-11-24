<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserInformation extends CI_Controller {

		function UserInformation(){
		parent::__construct();
		//1,如果不添加这个方法，在前端使用url的时候会出问题
		$this->load->helper('url');
		 $this->load->model('UserInformationModel');

	}
	public function index()
	{
		
             $nickname=$_POST['nickname'];
			$user_id=$this->session->userdata('user_id');
if(@$_POST['viaimg']){
 			 $uservia=$_POST['viaimg'];
 			 $this->UserInformationModel->changeUserInfoAll($uservia,$nickname,$user_id);

		}else{
			$this->UserInformationModel->changeUserInfoNickName($nickname,$user_id);
		}

	
		
		 
	}
}
