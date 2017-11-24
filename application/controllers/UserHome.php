<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserHome extends CI_Controller {

		function UserHome(){
		parent::__construct();
		//1,如果不添加这个方法，在前端使用url的时候会出问题
		$this->load->helper('url');
		 $this->load->model('UserHomeModel');

	}
	public function index()
	{
			$user_id=$this->session->userdata('user_id');
		$data['user']=$this->UserHomeModel->getUser($user_id);
		$this->load->view('userhome',$data);
		 
	}
	public function otherUser(){
		$user_id=$_POST['user_id'];
		$otheruser=$this->UserHomeModel->getUser($user_id);
		echo json_encode($otheruser);
	}
}
