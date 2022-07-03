<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        if (empty($this->session->userdata('username'))) {
            redirect('login_user');
        }
    }

    public function index(){
        $data_member = $this->session->userdata('username');
        $id_member = $this->Mcrud->get_by_id('tbl_member', array('username' => $data_member))->row_object();
        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
        $data['transaksi'] = $this->Mcrud->get_by_id('tbl_order', array('idKonsumen' => $id_member->idKonsumen))->result();

        $this->template->load('layout_frontend', 'frontend/transaksi', $data);
    }
}
?>