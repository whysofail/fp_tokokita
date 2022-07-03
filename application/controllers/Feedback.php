<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		if(empty($this->session->userdata('userName'))){
			redirect('adminpanel');
		}
	}

	public function index(){
		$data['crosscheckdata'] = $this->Mcrud->cek('tbl_feedback');
		$data['member'] = $this->Mcrud->get_all_data('tbl_feedback')->result();
		$this->template->load('layout_admin','admin/feedback/index',$data);
	}


	
	}
