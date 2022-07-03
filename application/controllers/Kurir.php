<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		if(empty($this->session->userdata('userName'))){
			redirect('adminpanel');
		}
	}

	public function index(){
		$data['crosscheckdata'] = $this->Mcrud->cek('tbl_kurir');
		$data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
		$this->template->load('layout_admin','admin/pengiriman/kurir/index',$data);
	}

	public function add(){
		$this->template->load('layout_admin','admin/pengiriman/kurir/form_add');
	}

	public function save(){
		$namaKurir = $this->input->post('namaKurir');
		$dataInsert = array('namaKurir' => $namaKurir);
		$cek = $this->Mcrud->get_by_id('tbl_kurir', $dataInsert);

		if ($namaKurir==NULL){
			$this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Data kurir belum diisi!!!</strong>
				  <br><strong>Mohon isi data kurir terlebih dahulu!!!</strong></br>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
			redirect('kurir/add');
		}else{
			if($cek->num_rows() == 1){
				$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data kurir yang anda input sudah ada!!!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
                redirect('kurir/add');
			}else{
				$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data baru berhasil ditambahkan!!!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
				$this->Mcrud->insert('tbl_kurir',$dataInsert);
				redirect('kurir');
			}
		}
	}

	public function getid($id){
		$dataWhere = array('idKurir' => $id);
		$data['kurir'] = $this->Mcrud->get_by_id('tbl_kurir',$dataWhere)->row_object();
		$this->template->load('layout_admin','admin/pengiriman/kurir/form_edit',$data);
	}

	public function edit(){
		$id = $this->input->post('id');
		$namaKurir = $this->input->post('namaKurir');
		$dataUpdate = array('namaKurir' => $namaKurir);
		$this->Mcrud->update('tbl_kurir', $dataUpdate, 'idKurir', $id);
		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data lama berhasil diubah!!!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
		redirect('kurir');
	}

	public function delete_hapus($id){
		$where = array('idKurir' => $id);
		$this->Mcrud->delete($where,'tbl_kurir');
		$error = $this->db->error();
		if ($error['code'] != 0 ) {
			$this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Data yang anda pilih tidak bisa dihapus, sudah dipakai ditabel lain!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
		}else{
			$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data yang anda pilih berhasil dihapus!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
		}
		redirect('kurir');
	}
}