<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konf_web extends CI_Controller {
 public function __construct(){
       parent:: __construct();
        $this->load->model('M_konf_web');  
    }
	
	public function index()
	{	
	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
	
		$this->load->view('templates/sidebar', $data);

		$this->load->view('V_konf_web', $data);
			$this->load->view('templates/footer', $data);
		}
}
