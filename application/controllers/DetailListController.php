<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailListController extends CI_Controller {
    
    function DetailListController(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('DetailModel');
    }

	public function index()
	{
		$note_id = $_POST['note_id'];

		$data['noteDetail'] = $this->DetailModel->getDetail($note_id);

		echo json_encode($data['noteDetail']);
		// var_dump($data);
		// $this->load->view('detail',$data);
	}
}
