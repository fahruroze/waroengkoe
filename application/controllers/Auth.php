<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('admin');
		}
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'login page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		}else{
			$this->_login();
		}
	}

	private function _login(){

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array(); 
		//usernya ada
		if ($user) {
			//jika user active
			if ($user['active_id'] == 1) {
				//cek password
				if ($user['password'] == $password) {
					$data = [
						'email' => $user['email'],
						'role' => $user['role']
					];
					$this->session->set_userdata($data);
					if ($user['role'] ==  1) {
						redirect('admin/dasbor');
					}else {
						// redirect('penguji/penguji');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button></div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Email is not been activited!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button></div>');
				redirect('auth');
			}
		}else{

			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">you have been logged out!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button></div>');  
		redirect('auth');
	}
}
