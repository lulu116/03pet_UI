<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyMesHome extends CI_Controller {

    function MyMesHome(){
    parent::__construct();
    //1,如果不添加这个方法，在前端使用url的时候会出问题
    $this->load->helper('url');
     $this->load->model('CatMesModel');

  }
  public function index()
  {
    $receiveuser_id=$this->session->userdata('user_id');
    $data['allmes']=$this->CatMesModel->getAllMyMes($receiveuser_id);
    $this->load->view('mymes',$data);
     
  }

  public function findNewMes(){
        $receiveuser_id=$this->session->userdata('user_id');
        $this->CatMesModel->findnew($receiveuser_id);
  }

}
