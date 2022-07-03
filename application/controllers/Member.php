<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		if(empty($this->session->userdata('userName'))){
			redirect('adminpanel');
		}
	}

	public function index(){
		$data['crosscheckdata'] = $this->Mcrud->cek('tbl_member');
		$data['member'] = $this->Mcrud->get_all_data('tbl_member')->result();
		$this->template->load('layout_admin','admin/member/index',$data);
	}

	public function status_member($idKonsumen) {
        $where = array('idKonsumen' => $idKonsumen);
        $status = $this->Mcrud->get_by_id('tbl_member', $where)->row_object();
        
        if ($status->statusAktif == "Y") {
            $update = array('statusAktif' => "N");
        } else {
            $update = array('statusAktif' => "Y");
        }

        $this->Mcrud->update('tbl_member', $update, 'idKonsumen', $idKonsumen);
        redirect('member');
    }

	
	}
