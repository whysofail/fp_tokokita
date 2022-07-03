<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
    }

    public function index()
    {
        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
        $data['produk'] = $this->Mcrud->get_all_produk_terbaru()->result();

        $this->template->load('layout_frontend', 'frontend/dashboard', $data);
    }

    public function daftar(){
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();

        $this->template->load('layout_frontend', 'frontend/form_daftar', $data);
    }

	public function save_daftar()
    {
        $namaKonsumen = $this->input->post('nama_lengkap');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $alamat = $this->input->post('alamat');
        $idKota = $this->input->post('kota');
        $tlpn = $this->input->post('no_telepon');
        $status = "N";

        $cek_username = $this->Mcrud->get_by_id('tbl_member', array('username' => $username))->num_rows();

        if($cek_username > 0) {
            $this->session->set_flashdata('mssg', 'Username Sudah Terpakai');
            redirect('frontend/daftar');
        } else {
            $data_user = array(
                'namaKonsumen' => $namaKonsumen,
                'email' => $email,
                'username' => $username,
                'password' => $password,
                'alamat' => $alamat,
                'idKota' => $idKota,
                'tlpn' => $tlpn,
                'statusAktif' => $status
            );

            $this->Mcrud->insert('tbl_member', $data_user);
            redirect('user');
        }
    }

    public function feedback()
    {   
        
        if (!empty($_SESSION['status'])) {
            $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
             $this->template->load('layout_frontend', 'frontend/feedback.php',$data);
               }else{
                $this->template->load('layout_frontend', 'frontend/error_login.php',$data);
               }      
    }
}
?>