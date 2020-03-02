<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_produk_a extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getData()
	{
		$this->db->join('penjual', 'produk.id_penjual=penjual.id_penjual');
		return $this->db->get('produk')->result();
	}
	function insertDataProduk($data)
		{
			$this->db->insert('produk', $data);
		}
	function insertData()
	{
		$kode_produk = $this->input->post('kode_produk');
		$nama		= $this->input->post('nama');
		$detail_produk = $this->input->post('detail_produk');
		$harga		= $this->input->post('harga');
		$kategori	= $this->input->post('kategori');
		$nama_pemilik = $this->input->post('toko');
		$gambar		=$_FILES['gambar'];

		if ($gambar=''){}else{
			$config['upload_path']	= './assets/template/back/dist/img/warung';
			$config['allowed_types']	='jpg|png|jpeg|gif';

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('gambar')){
				echo "Upload Gagal"; die();
			}else{
				$gambar=$this->upload->data('file_name');
			}
		}
		$data = array (
			'kode_produk'	=> $kode_produk,
			'nama_produk'		=> $nama,
			'detail_produk'		=> $detail_produk,
			'gambar'		=> $gambar,
			'kategori'		=> $kategori,
			'id_penjual'	=> $nama_pemilik,
			'harga'		=> $harga,

			);
		return $this->db->insert('produk', $data);
	}
	function updateData($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	
	function hapus_data($id)
	{
		$this->db->where('id_produk', $id);
		$this->db->delete('produk');
	}
	function getDataPenjual()
	{
		return $this->db->get('penjual')->result();
	}
}

?>