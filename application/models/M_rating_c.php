<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_rating_c extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getData()
	{
		$query = $this->db->query("SELECT * FROM rating_c ORDER BY id_rating DESC");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return array();
		}
	}
	function insertData()
	{
		$data = array (
			'id_rating' => $this->input->post('id_rating'),
			'nama_rating' => $this->input->post('nama_rating'),
			'rating' => $this->input->post('rating'),
			'tanggal_rating' => $this->input->post('tanggal_rating'),
		);
		return $this->db->insert('rating_c', $data);
	}
	function updateData($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	function simpanUpdateData()
	{
		$id_rating = $this->input->post('id_rating');
		$data = array (
			'id_rating' => $this->input->post('id_rating'),
			'nama_rating' => $this->input->post('nama_rating'),
			'rating' => $this->input->post('rating'),
			'tanggal_rating' => $this->input->post('tanggal_rating'),
		);
		$this->db->where('id_rating',$id);
		$this->db->update('rating',$data);
	}
	function hapus_data($id)
	{
		$this->db->where('id_rating', $id);
		$this->db->delete('rating_c');
	}
}

?>