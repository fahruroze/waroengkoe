<?php 
class M_konf_web extends CI_Model{
	public function tampil_data()
	{
		return $this->db->get('produk');
	}
}