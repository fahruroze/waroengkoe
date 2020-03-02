<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_rating_a extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getData()
	{
		// $this->db->join('pelanggan','rating.id_pelanggan=pelanggan.id_pelanggan');
		$this->db->join('produk','rating.id_produk=produk.id_produk');
		$this->db->join('penjual','rating.id_penjual=penjual.id_penjual');
		return $this->db->get('rating')->result();
	}
	function insertData()
	{
		$data = array (
			'email' => $this->input->post('email'),
			'id_produk' => $this->input->post('produk'),
			'id_penjual' => $this->input->post('toko'),
			// 'id_pelanggan' => $this->input->post('id_rating'),
			'rating' => $this->input->post('rating'),
			'tanggal_rating' => time(),
		);
		return $this->db->insert('rating', $data);
	}
	function updateData($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	function simpanUpdateData($id_rating)
	{
		$id_rating = $this->input->post('id_rating');
		$data = array (
			'id_rating' => $this->input->post('id_rating'),
			'rating' => $this->input->post('rating'),
			'tanggal_rating' => $this->input->post('tanggal_rating'),
		);
		$this->db->where('id_rating',$id_rating);
		$this->db->update('rating',$data);
	}
	function hapus_data($id)
	{
		$this->db->where('id_rating', $id);
		$this->db->delete('rating');
	}

	function get_data_pelanggan()
	{
		return $this->db->get('pelanggan')->result();
	}
	function get_data_produk()
	{
		return $this->db->get('produk')->result();
	}
	function get_data_penjual()
	{
		return $this->db->get('penjual')->result();
	}
}

?>