<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("PRC");
class PraiseController extends CI_Controller {

		function PraiseController(){
		parent::__construct();
		//1,如果不添加这个方法，在前端使用url的时候会出问题
		$this->load->helper('url');
		 $this->load->model('PraiseModel');
		  /*加载日期函数*/
       $this->load->helper('date');

	}
	public function index()
	{
		//1 获取参数
		$user_id=$this->session->userdata('user_id');
		$praise_time=date('Y-m-d h:i:s',time()); 
		$note_id=$_POST['note_id'];
         //先检查点过没有
        $row=$this->PraiseModel->isPraise($user_id,$note_id);


        if($row=='haved'){
        	echo json_encode(array('result'=>'haved')); 
        }else{
        	//没点过就可以点赞
        	
        //把点赞数插入到数据库中
        	       $query=$this->PraiseModel->insertPraise($user_id,$note_id,$praise_time);
        	       if($query){
        	       	//使note表中的点赞数+1
     			  //先获取点赞数
       			$parise_num=$_POST['parise_num'];
       			$parise_num++;
       			//更改
       			$res=$this->PraiseModel->updata($parise_num, $note_id);

       			if($res){
       				 echo json_encode(array('result'=>'success'));
       			}else{
       				 echo json_encode(array('result'=>'fail'));
       			}

        	       }
        	       else {
        	       	 echo json_encode(array('result'=>'fail'));
        	       }
       
       				
        }
        


       }
        
	}

