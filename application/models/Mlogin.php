<?php

class Mlogin extends CI_Model{

	public function cek_login($u, $p)
    {
        $q = $this->db->get_where('tbl_admin', array('userName' => $u, 'password' => $p));
        return $q;
    }

	public function cek_user($u, $p){
		$q = $this->db->get_where('tbl_member', array('Username' => $u, 'password' => $p));
		return $q;
	}

	public function lvl($where){
		return $this->db->get_where('tbl_admin',array('userName' => $where));
	}
}