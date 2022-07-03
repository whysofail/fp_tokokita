<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		if(empty($this->session->userdata('userName'))){
			redirect('adminpanel');
		}
	}

	public function index(){
		$data['tt'] = 'Manajemen Toko';
		$data['tk'] = 'active';
		$data['level'] = $this->session->userdata('level');
		$data['nama'] = $this->session->userdata('userName');
		$data['cekombak'] = $this->Mcrud->cek('tbl_toko');
		$data['toko'] = $this->Mcrud->get_all_data('tbl_toko')->result();
		$this->template->load('layout_admin','admin/toko/index',$data);
	}

	public function add() {
        $data['tt'] = 'Manajemen Toko';
		$data['tk'] = 'active';
		$data['level'] = $this->session->userdata('level');
		$data['nama'] = $this->session->userdata('userName');
		$data['member'] = $this->Mcrud->get_all_data('tbl_member')->result();

        $this->template->load('layout_admin', 'admin/toko/form_add',$data);
    }
    public function save() {
       
        $nama = $this->input->post('nama');
        $desc = $this->input->post('desc');
		$idmem = $this->input->post('member');
        $status = "Y";
        $logo = $_FILES['logo'];

        if($_FILES['logo']['name'] == null) {
            $logo = ' ';
        } else {
            $config['upload_path'] = './assets/img';
            $config['allowed_types'] = 'jpg|png|gif';
			$config['max_size']     = '1048';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('logo')) {

                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Proses upload logo gagal!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  	</div>');
                redirect('toko/add');
            } else {
                $logo = $this->upload->data('file_name');
            }
        }

        $data = array(
            'idKonsumen' => $idmem,
            'namaToko' => $nama,
            'logo' => $logo,
            'deskripsi' => $desc,
            'statusAktif' => $status
        );

        $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data berhasil ditambahkan!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        $this->Mcrud->insert('tbl_toko', $data);
        redirect('toko/index');
    } 


	public function status_toko($idToko){
        $where = array('idToko' => $idToko);
        $status = $this->Mcrud->get_by_id('tbl_toko', $where)->row_object();

        if ($status->statusAktif == "Y") {
            $update = array('statusAktif' => "N");
        } else {
            $update = array('statusAktif' => "Y");
        }

        $this->Mcrud->update('tbl_toko', $update, 'idToko', $idToko);
        redirect('toko');
    }
}