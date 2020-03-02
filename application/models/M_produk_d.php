<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	class M_produk_d extends CI_Model {
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		function getData()
		{
			$query = $this->db->query("SELECT * FROM produk ORDER BY id_produk DESC");
			if ($query->num_rows() > 0) {
				return $query->result();
			}else {
				return array();
			}
		}
		function insertData()
		{
			$data = array (
				'kode_produk' => $this->input->post('kode_produk'),
				'nama' => $this->input->post('nama'),
				'detail_produk' => $this->input->post('detail_produk'),
				'gambar' => $this->input->post('gambar'),
				);
			return $this->db->insert('produk', $data);
		}
		function updateData($where,$table)
		{
			return $this->db->get_where($table,$where);
		}
		function simpanUpdateData()
		{
			$id_produk = $this->input->post('id_produk');
			$data = array (
				'kode_produk' => $this->input->post('kode_produk'),
				'nama' => $this->input->post('nama'),
				'detail_produk' => $this->input->post('detail_produk'),
				'gambar' => $this->input->post('gambar'),
				'created_by' => $this->input->post('created_by'),
				'created_date' => $this->input->post('created_date'),
				'updated_by' => $this->input->post('updated_by'),
				'updated_by' => $this->input->post('updated_date'),
			);
			$this->db->where('id_produk',$id);
			$this->db->update('produk',$data);
		}
		function hapus_data($id)
		{
			$this->db->where('id_produk', $id);
			$this->db->delete('produk');
		}
	}

?>