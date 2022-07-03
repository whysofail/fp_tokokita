<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		if(empty($this->session->userdata('userName'))){
			redirect('adminpanel');
		}
	}

	public function index(){
		$data['crosscheckdata'] = $this->Mcrud->cek('tbl_biaya_kirim');
		$data['ongkir'] = $this->Mcrud->ongkir()->result();
		$this->template->load('layout_admin','admin/pengiriman/ongkir/index',$data);
	}

	public function add(){
		$data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
		$data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
		$data['ongkir'] = $this->Mcrud->ongkir()->result();
		$this->template->load('layout_admin','admin/pengiriman/ongkir/form_add',$data);
	}

	public function save(){
		$kurir = $this->input->post('kurir');
		$kotaasal = $this->input->post('kotas');
		$kotatujuan = $this->input->post('kotuj');
		$biaya = $this->input->post('biaya');
		$dataInsert = array('idKurir' => $kurir,
							'idKotaAsal' => $kotaasal,
							'idKotaTujuan' => $kotatujuan,
							'biaya' => $biaya
						);

		$cekK = $this->Mcrud->get_by_id('tbl_biaya_kirim', array('idKurir' => $kurir));
		$cekKA = $this->Mcrud->get_by_id('tbl_biaya_kirim', array('idKotaAsal' => $kotaasal));
      	$cekKT = $this->Mcrud->get_by_id('tbl_biaya_kirim', array('idKotaTujuan' => $kotatujuan));
      	
      	
      		if($kotaasal == $kotatujuan){
      			$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Kota asal dan Kota tujuan tidak boleh sama!!!</strong>
				  <br><strong>Mohon input Kota asal dan kota Tujuan yang berbeda!!!</strong><br>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
      		redirect('ongkir/add');
      		}else if($biaya == NULL){
	      			$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissible fade show" role="alert">
	                  <strong>Nominal biaya ongkir tidak boleh kosong!!!</strong>
					  <br><strong>Mohon inputkan nominal biaya ongkir!!!</strong></br>
	                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                  </button>
	                </div>');
	      		redirect('ongkir/add');
      		}else{
	      		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
	                  <strong>Data baru berhasil ditambahkan!!!</strong>
	                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                  </button>
	                </div>');
				$this->Mcrud->insert('tbl_biaya_kirim',$dataInsert);
				redirect('ongkir');
      		}
	} 
      	

	public function getid($id){
		$dataWhere = array('idBiayaKirim' => $id);
		$data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
		$data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
		$data['ongkir'] = $this->Mcrud->get_by_id('tbl_biaya_kirim',$dataWhere)->row_object();
		$this->template->load('layout_admin','admin/pengiriman/ongkir/form_edit',$data);
	}

	public function edit(){
		$id = $this->input->post('id');
		$kurir = $this->input->post('kurir');
		$kotaasal = $this->input->post('kotas');
		$kotatujuan = $this->input->post('kotuj');
		$biaya = $this->input->post('biaya');
		$dataUpdate = array('idKurir' => $kurir,
							'idKotaAsal' => $kotaasal,
							'idKotaTujuan' => $kotatujuan,
							'biaya' => $biaya
						);
		if($kotaasal == $kotatujuan){
      			$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Kota asal dan Kota tujuan tidak boleh sama!!!</strong>
				  <br><strong>Mohon input Kota asal dan kota Tujuan yang berbeda!!!</strong></br>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
      		redirect('ongkir/getid/'.$id);
      		}else if($biaya == NULL){
	      			$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissible fade show" role="alert">
	                  <strong>Biaya tidak boleh kosong!</strong>
	                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                  </button>
	                </div>');
	      		redirect('ongkir/getid/'.$id);
      		}else{
	      		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
	                  <strong>Data lama berhasil diubah!!!</strong>
	                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                  </button>
	                </div>');
				$this->Mcrud->update('tbl_biaya_kirim', $dataUpdate, 'idBiayaKirim', $id);
				redirect('ongkir');
      		}
      	}

	public function delete_hapus($id){
		$where = array('idBiayaKirim' => $id);
		$this->Mcrud->delete($where,'tbl_biaya_kirim');
		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Data yang anda pilih berhasil dihapus!!!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
		redirect('ongkir');
	}
}