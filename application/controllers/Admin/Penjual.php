<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class Penjual extends CI_Controller {
    public function __construct(){
       parent:: __construct();
        $this->load->model('M_penjual');  
    }
    public function index()
    {
    	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    	$data['data_penjual'] = $this->M_penjual->getData();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('lok_toko', 'Lokasi Toko', 'required');
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required');
        $this->form_validation->set_rules('jml_karyawan', 'Jumlah karyawan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/penjual/V_penjual', $data);
            $this->load->view('templates/footer');
        }else{
            $this->M_penjual->insertData();
            $this->session->set_flashdata('message', 'Data Produk Telah Ditambahkan!');
            redirect('admin/Penjual');
        }
    }
   

    public function tambahTabel()
    {
        $this->M_penjual->insertData();
        ?>
            <script type="text/javascript">
                alert('Data berhasil disimpan');
                document.location='http://localhost/warungcoro/admin/penjual';
            </script>
        <?php    
    }
    public function editTabel($id)
    {
        $where = array('id_penjual' => $id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit_penjual'] = $this->M_penjual->updateData($where,'penjual')->result();
        $data['karyawan'] = array('1,2,3,4,5');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/penjual/V_edit_penjual', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $id= $this->input->post('id_penjual');
        $nama= $this->input->post('nama');
        $lok_toko= $this->input->post('lok_toko');
        $nama_toko= $this->input->post('nama_toko');
        $jml_karyawan= $this->input->post('jml_karyawan');

        $data = array (
            'nama'  =>$nama,
            'lok_toko'   =>$lok_toko,
            'nama_toko'      =>$nama_toko,
            'jml_karyawan'         =>$jml_karyawan       
        );

        $this->db->where('id_penjual', $this->input->post('id_penjual'));
        $this->db->update('penjual', $data);
        redirect('admin/penjual');
    }
    public function hapusTabel($id)
    {
        $this->M_penjual->hapus_data($id);
        ?>
            <script type="text/javascript">
                alert('Data berhasil dihapus');
                document.location='http://localhost/warungcoro/admin/penjual';
            </script>
        <?php
    }     
}
?>