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
     $this->load->view('templates/header', $data);
     $this->load->view('templates/sidebar', $data);
     $this->load->view('v_penjual', $data);
     $this->load->view('templates/footer');
 }


 public function tambahTabel()
 {
    $this->M_penjual->insertData();
    ?>
    <script type="text/javascript">
        alert('Data berhasil disimpan');
        document.location='http://localhost/warungcoro/penjual';
    </script>
    <?php    
}

public function tambahpenjual()
{
   $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
   $data['data_penjual'] = $this->M_penjual->getData();


   $valid = $this->form_validation;

   $valid->set_rules('nama', 'Nama', 'required|trim');
   $valid->set_rules('lok_toko', 'Lokasi Toko', 'required|trim');
   $valid->set_rules('nama_toko', 'Nama Toko', 'required|trim');
   $valid->set_rules('jml_karyawan', 'Jumlah Karyawan', 'required|trim');

   if ($valid->run()) {
    $config['upload_path']      = './assets/template/back/dist/img/';
    $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_sizes']        = '2400'; //kb
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';

            $this->load->library('upload',$config);

            if (! $this->upload->do_upload('image')) { 
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $data['data_penjual'] = $this->M_penjual->getData();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('v_penjual', $data);
                $this->load->view('templates/footer');
            }else{

                $upload_image  = array('upload_data'   => $this->upload->data());

                //create thumbs
                $config['image_library']        = 'gd2';
                $config['source_image']         = './assets/template/back/dist/img/'.$upload_image['upload_data']['file_name'];
                $config['new_image']            = './assets/upload/image/thumbs/';
                $config['create_thumb']         = TRUE;
                $config['maintain_ratio']       = TRUE;
                $config['width']                = 250; //px
                $config['height']               = 250; //px
                $config['thumb_marker']         = '';

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                $i = $this->input;
                $data   = array(    
                    'nama'                   => $i->post('nama'),
                    'lok_toko'               => $i->post('lok_toko'),
                    'nama_toko'              => $i->post('nama_toko'),
                    'jml_karyawan'           => $i->post('jml_karyawan'),
                    'motto'                  => $i->post('motto'),
                    'image'                  => $upload_image['upload_data']['file_name'],
                );
                $this->M_penjual->insertData($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
                redirect(base_url('penjual'),'refresh');
            }
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_penjual'] = $this->M_penjual->getData();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_penjual', $data);
        $this->load->view('templates/footer');
        
    }
    public function editTabel($id)
    {
        $where = array('id_penjual' => $id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit_penjual'] = $this->M_penjual->updateData($where,'penjual')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('V_edit_penjual', $data);
        $this->load->view('templates/footer');
    }

    public function editpenjual()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit_penjual'] = $this->M_penjual->updateData($where,'penjual')->result();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('lok_toko', 'Lokasi Toko', 'required|trim');
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required|trim');
        $this->form_validation->set_rules('jml_karyawan', 'Jumlah Karyawan', 'required|trim');
         $this->form_validation->set_rules('motto', 'Motto Dagang', 'required|trim');

        if ($this->form_validation->run() == false) {
           $this->load->view('templates/header', $data);
           $this->load->view('templates/sidebar', $data);
           $this->load->view('V_edit_penjual', $data);
           $this->load->view('templates/footer');
       }else{
        $nama = $this->input->post('nama');
        $lokasi = $this->input->post('lok_toko');
        $namatoko = $this->input->post('nama_toko');
        $jumlah = $this->input->post('jml_karyawan');
        $motto = $this->input->post('motto');
        $id_penjual = $this->input->post('id_penjual');


            //  jika ada gambar yang diupload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/template/back/dist/img/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image'))
            {
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            }
            else
            {
                echo $this->upload->display_errors();
            }

        }

        $this->db->set('nama', $nama);
        $this->db->set('lok_toko', $lokasi);
        $this->db->set('nama_toko', $namatoko);
        $this->db->set('jml_karyawan', $jumlah);
        $this->db->set('motto', $motto);
        $this->db->where('id_penjual', $id_penjual);
        $this->db->update('penjual');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data profil telah di edit! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('penjual');

    }
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
    redirect('penjual');
}
public function hapusTabel($id)
{
    $this->M_penjual->hapus_data($id);
    ?>
    <script type="text/javascript">
        alert('Data berhasil dihapus');
        document.location='http://localhost/warungcoro/penjual';
    </script>
    <?php
}     
}
?>