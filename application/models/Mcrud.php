<?php

class Mcrud extends CI_Model{

	public function get_all_data($table){
		$q = $this->db->get($table);
		return $q;
	}

	public function cek($table){
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get()->num_rows();
	}

	public function insert($table,$data){
		$this->db->insert($table,$data);
	}

	public function get_by_id($table,$id){
		return $this->db->get_where($table,$id);
	}

	public function update($table,$data,$pk,$id){
		$this->db->where($pk,$id);
		$this->db->update($table,$data);
	}

	public function delete($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function ongkir(){
		$this->db->select('*, tka.namaKota AS kotaasal, tkt.namaKota AS kotatujuan, biaya');
		$this->db->from('tbl_biaya_kirim b');
		$this->db->join('tbl_kota tka','tka.idKota=b.idKotaAsal');
		$this->db->join('tbl_kota tkt','tkt.idKota=b.idKotaTujuan');
		$this->db->join('tbl_kurir k','k.idKurir=b.idKurir');
		$this->db->order_by('idBiayaKirim','ASC');
		return $this->db->get();
	}

	public function toko(){
		$this->db->select('*');
		$this->db->from('tbl_toko t');
		$this->db->join('tbl_member m','t.idKonsumen=m.idKonsumen');
		return $this->db->get();
	}

	public function get_all_produk_terbaru(){
		$this->db->order_by('idProduk','DESC');
		$this->db->limit(4);
		return $this->db->get('tbl_produk');
		//untuk mengambil 4 data produk terbaru
	}

	public function join($table1, $table2){
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2);
		return $this->db->get();
	}

	public function level($table,$where){
		$this->db->get_where($table,$where);
	}
}