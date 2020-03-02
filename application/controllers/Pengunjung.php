<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('M_rating_a'); 
		// $this->load->model('M_pelanggan');  

	}
	public function index()
	{
		$data['produk'] = $this->db->get('produk')->result();
		$data['penjual'] = $this->db->get('penjual')->result_array();
		$data['data_rating'] = $this->M_rating_a->getData();
		$this->load->view('pengunjung/templates/head');
		$this->load->view('pengunjung/templates/header');
		$this->load->view('pengunjung/templates/slider');
		$this->load->view('pengunjung/templates/nav');
		// $this->load->view('pengunjung/produk', $data);
		$this->load->view('pengunjung/penjual', $data);
		$this->load->view('pengunjung/testimoni', $data);
		$this->load->view('pengunjung/templates/footer');

	}


	public function produk()
	{
		$data['produk'] = $this->db->get('produk')->result();
		$data['produk1'] = $this->db->get('produk')->result();
		$data['penjual'] = $this->db->get('penjual')->result();
		$data['data_rating'] = $this->M_rating_a->getData();
		$this->load->view('pengunjung/templates/head');
		$this->load->view('pengunjung/templates/header');
		$this->load->view('pengunjung/templates/nav');
		$this->load->view('pengunjung/produk', $data);
		$this->load->view('pengunjung/testimoni', $data);
		$this->load->view('pengunjung/templates/footer');

	}
	public function about()
	{
		$data['karyawan'] = $this->db->get('karyawan')->result_array();
		$this->load->view('pengunjung/templates/head');
		$this->load->view('pengunjung/templates/header');
		$this->load->view('pengunjung/templates/nav');
		$this->load->view('pengunjung/about', $data);
		$this->load->view('pengunjung/templates/footer');

	}

	public function berita()
	{

		$this->load->view('pengunjung/templates/head');
		$this->load->view('pengunjung/templates/header');
		$this->load->view('pengunjung/templates/nav');
		$this->load->view('pengunjung/beritaterbaru');
		$this->load->view('pengunjung/templates/footer');

	}
	public function contact()
	{
		$this->load->view('pengunjung/templates/head');
		$this->load->view('pengunjung/templates/header');
		$this->load->view('pengunjung/templates/nav');
		$this->load->view('pengunjung/contact');
		$this->load->view('pengunjung/templates/footer');

	}

	public function reservation()
	{
		$data['data_rating'] = $this->M_rating_a->getData();
		$data['produk'] = $this->db->get('produk')->result();
		$data['toko'] = $this->M_rating_a->get_data_penjual();
		$this->load->view('pengunjung/templates/head');
		$this->load->view('pengunjung/templates/header');
		$this->load->view('pengunjung/templates/nav');
		$this->load->view('pengunjung/reservation', $data);
		$this->load->view('pengunjung/templates/footer');

	}

	function tambahrating(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data_rating_a'] = $this->M_rating_a->getData();
		$data['pelanggan'] = $this->M_rating_a->get_data_pelanggan();
		$data['produk'] = $this->M_rating_a->get_data_produk();
		$data['toko'] = $this->M_rating_a->get_data_penjual();

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('produk', 'Rating', 'required');
		// $this->form_validation->set_rules('id_rating', 'Pelanggan', 'required');
		$this->form_validation->set_rules('toko', 'Tanggal Rating', 'required');
		$this->form_validation->set_rules('rating', 'Tanggal Rating', 'required');
		

		if ($this->form_validation->run() == false) {
			$this->load->view('pengunjung/templates/head');
			$this->load->view('pengunjung/templates/header');
			$this->load->view('pengunjung/templates/nav');
			$this->load->view('pengunjung/reservation', $data);
			$this->load->view('pengunjung/templates/footer');
		}else{
			$this->M_pelanggan->insertDataRating();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Rating Telah Dikirim <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button></div>');
			redirect('pengunjung/reservation');
		}
	}
}