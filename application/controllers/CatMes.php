<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("PRC");
class CatMes extends CI_Controller {

		function CatMes(){
		parent::__construct();
		//1,如果不添加这个方法，在前端使用url的时候会出问题
		$this->load->helper('url');
		 $this->load->model('CatMesModel');

	}
	public function index()
	{
		$content=$_POST['sendcontent'];
		$receiveuser_id=$_POST['receiveuser_id'];
		$senduser_id=$this->session->userdata('user_id');
		$msg_time=date('Y-m-d h:i:s',time()); 
		$this->CatMesModel->insertcatmes($content,$receiveuser_id,$senduser_id,$msg_time);
		
		 
	}
}
