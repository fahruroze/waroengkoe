<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class Pelanggan extends CI_Controller {
    public function __construct(){
       parent:: __construct();
        $this->load->model('M_pelanggan');  
    }
    public function index()
    {
    	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    	$data['data_pelanggan'] = $this->M_pelanggan->getData();

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('full_name', 'Fullname', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/pelanggan/V_pelanggan', $data);
            $this->load->view('templates/footer');
        }else{
            $this->M_pelanggan->insertData();
            $this->session->set_flashdata('message', 'Data Produk Telah Ditambahkan!');
            redirect('admin/Pelanggan');
        }   	
    }
   

    public function tambahTabel()
    {
        $this->M_pelanggan->insertData();
        ?>
            <script type="text/javascript">
                alert('Data berhasil disimpan');
                document.location='http://localhost/warungcoro/admin/pelanggan';
            </script>
        <?php    
    }
    public function editTabel($id)
    {
        $where = array('id_pelanggan' => $id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit_pelanggan'] = $this->M_pelanggan->updateData($where,'pelanggan')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/pelanggan/V_edit_pelanggan', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $id= $this->input->post('id_pelanggan');
        $email= $this->input->post('email');
        $full_name= $this->input->post('full_name');
        $password= $this->input->post('password');
        $no_hp= $this->input->post('no_hp');

        $data = array (
            'email'  =>$email,
            'full_name'   =>$full_name,
            'password'      =>$password,
            'no_hp'         =>$no_hp       
        );

        $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'));
        $this->db->update('pelanggan', $data);
        redirect('admin/pelanggan');
    }
    public function hapusTabel($id)
    {
        $this->M_pelanggan->hapus_data($id);
        ?>
            <script type="text/javascript">
                alert('Data berhasil dihapus');
                document.location='http://localhost/warungcoro/admin/pelanggan';
            </script>
        <?php
    }     
}
?>