<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("PRC");
class CommentController extends CI_Controller {
		function CommentController(){
		parent::__construct();
		//1,如果不添加这个方法，在前端使用url的时候会出问题
		$this->load->helper('url');
		 $this->load->model('CommentModel');
		  /*加载日期函数*/
       $this->load->helper('date');

	}
	public function index()
	{
		 //1 获取参数
		 $user_id=$this->session->userdata('user_id');
		 $cmt_time=date('Y-m-d h:i:s',time()); 
		 $note_id=$_POST['note_id'];
		 $cmt_content=$_POST['cmt_content'];
		 //2,插入评论到数据库
         $this->CommentModel->insertComments($user_id,$note_id,$cmt_content,$cmt_time);

         //更改评论数
          $this->CommentModel->changeComments($note_id);
       /*  //3,从数据库中取出数据
         $data['comments']=$this->CommentModel->getComments($note_id);
         $data['aaa']="hello world";*/
         //4,显示到页面上
        // $this->load->view('detail',$data);
	}
	public function getcmt(){
		 $note_id=$_POST['note_id'];
		 $note_cmt=$this->CommentModel->getComments($note_id);
		 echo json_encode($note_cmt);
	}
}
