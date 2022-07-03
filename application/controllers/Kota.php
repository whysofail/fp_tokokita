<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		if(empty($this->session->userdata('userName'))){
			redirect('adminpanel');
		}
	}

	public function index()	{
		$data['crosscheckdata'] = $this->Mcrud->cek('tbl_kota');
		$data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
		$this->template->load('layout_admin','admin/pengiriman/kota/index',$data);
	}

	public function add(){
		$this->template->load('layout_admin','admin/pengiriman/kota/form_add');
	}

	public function save(){
		$namaKota = $this->input->post('namaKota');
		$dataInsert = array('namaKota' => $namaKota);
		$cek = $this->Mcrud->get_by_id('tbl_kota', $dataInsert);

		if ($namaKota==NULL){
			$this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Data kota belum diisi!!!</strong>
				  <br><strong>Mohon isi data kota terlebih dahulu!!!</strong></br>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
			redirect('kota/add');
		}else{
			if($cek->num_rows() == 1){
				$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Data kota yang anda input sudah ada!!!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
                redirect('kota/add');
			}else{
				$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data baru berhasil ditambahkan!!!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
				$this->Mcrud->insert('tbl_kota',$dataInsert);
				redirect('kota');
			}
		}
	}

	public function getid($id){
		$dataWhere = array('idKota' => $id);
		$data['kota'] = $this->Mcrud->get_by_id('tbl_kota',$dataWhere)->row_object();
		$this->template->load('layout_admin','admin/pengiriman/kota/form_edit',$data);
	}

	public function edit(){
		$id = $this->input->post('id');
		$namaKota = $this->input->post('namaKota');
		$dataUpdate = array('namaKota' => $namaKota);
		$this->Mcrud->update('tbl_kota', $dataUpdate, 'idKota', $id);
		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data lama berhasil diubah!!!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
		redirect('kota');
	}

	public function delete_hapus($id){
		$where = array('idKota' => $id);
		$this->Mcrud->delete($where,'tbl_kota');
		$error = $this->db->error();
		if ($error['code'] != 0 ) {
			$this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Data yang anda pilih tidak bisa dihapus, sudah dipakai ditabel lain!!!</strong>
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
		redirect('kota');
	}
}