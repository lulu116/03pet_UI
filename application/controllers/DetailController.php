<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailController extends CI_Controller {
    
    function DetailController(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('DetailModel');
    }

	public function index()
	{
		$note_id = $params=$this->uri->segment(4);
		$data['detail'] = $this->DetailModel->getDetail($note_id);
		$this->load->view('detail',$data);
	}
}
