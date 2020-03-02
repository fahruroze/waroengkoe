<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	class M_admin extends CI_Model {
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		function getData()
		{
			$query = $this->db->query("SELECT * FROM user ORDER BY id_user DESC");
			if ($query->num_rows() > 0) {
				return $query->result();
			}else {
				return array();
			}
		}
		function insertData()
		{
			$data = array (
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'),
			);
			return $this->db->insert('user', $data);
		}
		function updateData($where,$table)
		{
			return $this->db->get_where($table,$where);
			
		}
		
		function hapus_data($id)
		{
			$this->db->where('id_user', $id);
			$this->db->delete('user');
		}
	}

?>