<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        if(empty($this->session->userdata('Username'))){
			redirect('login_user');
		}
    }

    public function index() {
        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();

        $this->template->load('layout_frontend', 'frontend/member', $data);
    }

    public function toko() {
        $dataWhere = array('Username' => $this->session->userdata('Username'));
        $dataMember = $this->Mcrud->get_by_id('tbl_member', $dataWhere)->row();
        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
        $data['toko'] = $this->Mcrud->get_by_id('tbl_toko', array('idKonsumen' => $dataMember->idKonsumen))->result();

        $this->template->load('layout_frontend', 'frontend/toko', $data);
    }

    public function buat_toko() {
        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();

        $this->template->load('layout_frontend', 'frontend/form_buat_toko',$data);
    }

    public function save_toko() {
        $data_Username = array('Username' => $this->session->userdata('Username'));
        $data_id_konsumen = $this->Mcrud->get_by_id('tbl_member', $data_Username)->row_object();

        $idKonsumen = $data_id_konsumen->idKonsumen;
        $namaToko = $this->input->post('nama_toko');
        $deskripsi = $this->input->post('deskripsi');
        $statusAktif = "N";
        $logo = $_FILES['logo'];

        if($_FILES['logo']['name'] == null) {
            $logo = ' ';
        } else {
            $config['upload_path'] = './assets/img';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('logo')) {

                $this->session->set_flashdata('mssg', 'Logo Gagal di Upload');
                redirect('user/buat_toko');
            } else {
                $logo = $this->upload->data('file_name');
            }
        }

        $data = array(
            'idKonsumen' => $idKonsumen,
            'namaToko' => $namaToko,
            'logo' => $logo,
            'deskripsi' => $deskripsi,
            'statusAktif' => $statusAktif
        );

        $this->session->set_flashdata('mssg', 'Logo Berhasil di Upload');
        $this->Mcrud->insert('tbl_toko', $data);
        redirect('user/toko');
    }
}
?>