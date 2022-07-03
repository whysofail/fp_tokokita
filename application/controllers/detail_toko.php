<?php
defined('BASEPATH') or exit('No direct script access allowed');

class detail_toko extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
    }

    public function detailToko($idToko)
    {
        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
        $data['detail_toko'] = $this->Mcrud->get_by_id('tbl_toko', array('idToko' => $idToko))->row_object();

        $this->template->load('layout_frontend', 'frontend/detail_toko', $data);
    }

    public function produk($idToko)
    {
        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
        $data['detail_toko'] = $this->Mcrud->get_by_id('tbl_toko', array('idToko' => $idToko))->row_object();
        $data['produk'] = $this->Mcrud->get_by_id('tbl_produk', array('idToko' => $idToko))->result();

        $this->template->load('layout_frontend', 'frontend/produk', $data);
    }

    public function produk_baru($idToko)
    {
        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
        $data['detail_toko'] = $this->Mcrud->get_by_id('tbl_toko', array('idToko' => $idToko))->row_object();

        $this->template->load('layout_frontend', 'frontend/create_produk', $data);
    }

    public function save_product()
    {
        $idKat = $this->input->post('kategori');
        $idToko = $this->input->post('idToko');
        $namaProduk = $this->input->post('namaProduk');
        $foto = $_FILES['foto'];
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $berat = $this->input->post('berat');
        $deskripsiProduk = $this->input->post('deskripsiProduk');

        if ($_FILES['foto']['name'] == null) {
            $foto = ' ';
        } else {
            $config['upload_path'] = './assets/img';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size']             = 10000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;


            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {

                $this->session->set_flashdata('mssg', 'Foto Gagal di Upload');
                redirect('detail_toko/produk_baru/' . $idToko);
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'idKat' => $idKat,
            'idToko' => $idToko,
            'namaProduk' => $namaProduk,
            'foto' => $foto,
            'harga' => $harga,
            'stok' => $stok,
            'berat' => $berat,
            'deskripsiProduk' => $deskripsiProduk
        );

        $this->Mcrud->insert('tbl_produk', $data);
        redirect('detail_toko/produk/' . $idToko);
    }

    public function getid($id)
    {
        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
        $data['detail_toko'] = $this->Mcrud->get_all_data('tbl_toko')->row_object();
        // $data['detail_toko'] = $this->Mcrud->get_by_id('tbl_toko', array('idToko' => $idToko))->row_object();
        $dataWhere = array('idProduk' => $id);
        $data['produk'] = $this->Mcrud->get_by_id('tbl_produk', $dataWhere)->row_object();
        $this->template->load('layout_frontend', 'frontend/form_edit', $data);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $idKat = $this->input->post('kategori');
        $idToko = $this->input->post('idToko');
        $namaProduk = $this->input->post('namaProduk');
        // $foto = $_FILES['foto'];
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $berat = $this->input->post('berat');
        $deskripsiProduk = $this->input->post('deskripsiProduk');


        $config['upload_path']          = './assets/img';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $dataUpdate = array(
                'idKat' => $idKat,
                'idToko' => $idToko,
                'namaProduk' => $namaProduk,
                // 'foto' => $foto,
                'harga' => $harga,
                'stok' => $stok,
                'berat' => $berat,
                'deskripsiProduk' => $deskripsiProduk
            );
            $this->Mcrud->update('tbl_produk', $dataUpdate, 'idProduk', $id);
            redirect('detail_toko/produk/' . $idToko);
        } else {

            $foto = $this->upload->data();
            $foto = $foto['file_name'];

            $dataUpdate = array(
                'idKat' => $idKat,
                'idToko' => $idToko,
                'namaProduk' => $namaProduk,
                'foto' => $foto,
                'harga' => $harga,
                'stok' => $stok,
                'berat' => $berat,
                'deskripsiProduk' => $deskripsiProduk
            );
            $this->Mcrud->update('tbl_produk', $dataUpdate, 'idProduk', $id);
            redirect('detail_toko/produk/' . $idToko);
        }
    }
    public function delete($id)
    {
        $where = array('idProduk' => $id);
        $this->Mcrud->delete($where, 'tbl_produk');
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Kategori berhasil dihapus!!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('kategori');
    }
}
