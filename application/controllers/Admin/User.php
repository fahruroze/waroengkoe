<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
    public function __construct(){
       parent:: __construct();
        $this->load->model('M_user');  
    }
    public function index()
    {
    	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    	$data['data_user'] = $this->M_user->getData();
    	$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('V_user', $data);
		$this->load->view('templates/footer');
    }
   

    public function tambahTabel()
    {
        $this->M_user->insertData();
        ?>
            <script type="text/javascript">
                alert('Data berhasil disimpan');
                document.location='http://localhost/warungcoro/user';
            </script>
        <?php    
    }
    public function editTabel($id)
    {
        $where = array('id' => $id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit_user'] = $this->M_user->updateData($where,'user')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('V_edit_user', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $id= $this->input->post('id_user');
        $nama= $this->input->post('nama');
        $username= $this->input->post('username');
        $password= $this->input->post('password');
        $email= $this->input->post('email');

        $data = array (
            'nama'  =>$nama,
            'username'   =>$username,
            'password'      =>$password,
            'email'         =>$email       
        );

        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
        redirect('user');
    }
    public function hapusTabel($id)
    {
        $this->M_user->hapus_data($id);
        ?>
            <script type="text/javascript">
                alert('Data berhasil dihapus');
                document.location='http://localhost/warungcoro/user';
            </script>
        <?php
    }     
}
?>