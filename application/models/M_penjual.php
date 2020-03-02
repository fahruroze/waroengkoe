<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	class M_penjual extends CI_Model {
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		function getData()
		{
			$query = $this->db->query("SELECT * FROM penjual ORDER BY id_penjual DESC");
			if ($query->num_rows() > 0) {
				return $query->result();
			}else {
				return array();
			}
		}
		function insertData($data)
		{
			$this->db->insert('penjual', $data);
		}
		function updateData($where,$table)
		{
			return $this->db->get_where($table,$where);
			
		}
		
		function hapus_data($id)
		{
			$this->db->where('id_penjual', $id);
			$this->db->delete('penjual');
		}
	}

?>