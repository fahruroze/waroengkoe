<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class Karyawan extends CI_Controller {
    public function __construct(){
       parent:: __construct();
       $this->load->model('M_karyawan');  
   }
   public function index()
   {
     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
     $data['data_karyawan'] = $this->M_karyawan->getData();
     $data['namatoko'] = $this->db->get('penjual')->result();

     $this->load->view('templates/header', $data);
     $this->load->view('templates/sidebar', $data);
     $this->load->view('v_karyawan', $data);
     $this->load->view('templates/footer');
 }


 public function tambahkaryawan()
 {
   $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
   $data['namatoko'] = $this->db->get('penjual')->result();


   $valid = $this->form_validation;

   $valid->set_rules('nama_karyawan', 'Nama', 'required|trim');
   $valid->set_rules('nama_toko', 'Nama Toko', 'required|trim');
   $valid->set_rules('motto_masak', 'Motto', 'required|trim');

   if ($valid->run()) {
    $config['upload_path']      = './assets/template/back/dist/img/';
    $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_sizes']        = '2400'; //kb
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';

            $this->load->library('upload',$config);

            if (! $this->upload->do_upload('image')) { 
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $data['data_karyawan'] = $this->M_karyawan->getData();
                $data['namatoko'] = $this->db->get('penjual')->result();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('v_karyawan', $data);
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
                    'nama_karyawan'          => $i->post('nama_karyawan'),
                    'nama_toko'              => $i->post('nama_toko'),
                    'moto_masak'            => $i->post('motto_masak'),
                    'image'                  => $upload_image['upload_data']['file_name'],
                );
                $this->M_karyawan->insertData($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
                redirect(base_url('Karyawan'),'refresh');
            }
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_karyawan'] = $this->M_karyawan->getData();
        $data['namatoko'] = $this->db->get('penjual')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_karyawan', $data);
        $this->load->view('templates/footer');
        
    }

    public function editTabel($id)
    {
        $where = array('id_karyawan' => $id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit_karyawan'] = $this->M_karyawan->updateData($where,'karyawan')->result();
        $data['namatoko'] = $this->db->get('penjual')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('V_edit_karyawan', $data);
        $this->load->view('templates/footer');
    }


    public function editkaryawan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
         $where = array('id_karyawan' => $this->input->post('nama_karyawan'));
       $data['edit_karyawan'] = $this->M_karyawan->updateData($where,'karyawan')->result();
        $data['namatoko'] = $this->db->get('penjual')->result();
        $valid = $this->form_validation;
        $valid->set_rules('nama_karyawan', 'Nama', 'required|trim');
        $valid->set_rules('nama_toko', 'Nama Toko', 'required|trim');
        $valid->set_rules('motto_masak', 'Motto', 'required|trim');

        if ($valid->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('V_edit_karyawan', $data);
            $this->load->view('templates/footer');
        }else{
            $nama = $this->input->post('nama_karyawan');
            $namatoko = $this->input->post('nama_toko');
            $motto = $this->input->post('motto_masak');
            $id_karyawan = $this->input->post('id_karyawan');


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

            $this->db->set('nama_karyawan', $nama);
            $this->db->set('nama_toko', $namatoko);
            $this->db->set('moto_masak', $motto);
            $this->db->where('id_karyawan', $id_karyawan);
            $this->db->update('karyawan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data karyawan telah di edit! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('Karyawan');

        }
    }

    public function hapusTabel($id)
    {
        $this->M_karyawan->hapus_data($id);
        ?>
        <script type="text/javascript">
            alert('Data berhasil dihapus');
            document.location='http://localhost/warungcoro/Karyawan';
        </script>
        <?php
    }     
}
?>