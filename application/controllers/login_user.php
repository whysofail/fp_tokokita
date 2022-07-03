<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login_user extends CI_Controller
{

    public function index()
    {
        $this->load->model('Mcrud');
        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();

        $this->template->load('layout_frontend', 'frontend/form_login', $data);
    }

    public function login(){
        $this->load->model('Mlogin');
		$u = $this->input->post('username');
		$p = $this->input->post('password');

		$cek = $this->Mlogin->cek_user($u, $p);
        $pass = $cek->row();

        if ($cek == 1) {
            if ($pass->statusAktif == 'Y') {
                
                $data_session = array(
                    'Username' => $u,
                    'status' => 'login'
                );

                $this->session->set_userdata($data_session);
                redirect('Frontend');
            } else {
                $this->session->set_flashdata('alert-msg', 'Akun ini belum diaktifkan oleh Admin');
            }
        } else {
            $this->session->set_flashdata('mssg', 'Username atau Password Salah !');
        }
        redirect('login_user');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login_user');
    }
}
?>