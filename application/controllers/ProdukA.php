<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class ProdukA extends CI_Controller {
    public function __construct(){
     parent:: __construct();
     $this->load->model('M_produk_a');  
 }
 public function index()
 {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['data_produk_a'] = $this->M_produk_a->getData();
    $data['penjual'] = $this->M_produk_a->getDataPenjual();
    $data['produkcek'] = $this->db->get('produk')->result();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('V_produkA', $data);
    $this->load->view('templates/footer');
}

public function tambahproduk()
{
   $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
   $data['data_produk_a'] = $this->M_produk_a->getData();
   $data['penjual'] = $this->M_produk_a->getDataPenjual();
   $data['produkcek'] = $this->db->get('produk')->result();

   $valid = $this->form_validation;

   $valid->set_rules('kode_produk', 'Kode Produk', 'required|trim');
   $valid->set_rules('nama', 'Nama', 'required|trim');
   $valid->set_rules('detail_produk', 'Detail Produk', 'required|trim');
   $valid->set_rules('toko', 'Toko', 'required|trim');
   $valid->set_rules('kategori', 'Kategori', 'required|trim');
   $valid->set_rules('harga', 'Harga', 'required|trim');


   if ($valid->run()) {
    $config['upload_path']      = './assets/template/back/dist/img/produk/';
    $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_sizes']        = '2400'; //kb
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';

            $this->load->library('upload',$config);

            if (! $this->upload->do_upload('gambar')) { 
             $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
             $data['data_produk_a'] = $this->M_produk_a->getData();
             $data['penjual'] = $this->M_produk_a->getDataPenjual();
             $data['produkcek'] = $this->db->get('produk')->result();
             $this->load->view('templates/header', $data);
             $this->load->view('templates/sidebar', $data);
             $this->load->view('V_produkA', $data);
             $this->load->view('templates/footer');
         }else{

            $upload_image  = array('upload_data'   => $this->upload->data());

                //create thumbs
            $config['image_library']        = 'gd2';
            $config['source_image']         = './assets/template/back/dist/img/produk/'.$upload_image['upload_data']['file_name'];
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
                    'kode_produk'                   => $i->post('kode_produk'),
                    'nama_produk'               => $i->post('nama'),
                    'detail_produk'              => $i->post('detail_produk'),
                    'id_penjual'           => $i->post('toko'),
                    'kategori'                  => $i->post('kategori'),
                    'harga'                  => $i->post('harga'),

                    'gambar'                  => $upload_image['upload_data']['file_name'],
                );
                $this->M_produk_a->insertDataProduk($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
                redirect(base_url('produkA'),'refresh');
            }
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_produk_a'] = $this->M_produk_a->getData();
        $data['penjual'] = $this->M_produk_a->getDataPenjual();
        $data['produkcek'] = $this->db->get('produk')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('V_produkA', $data);
        $this->load->view('templates/footer');
        
    }

    public function tambahTabel()
    {
        $this->M_produk_a->insertData();
        ?>
        <script type="text/javascript">
            alert('Data berhasil disimpan');
            document.location='http://localhost/warungcoro/produkA';
        </script>
        <?php
    }
    public function editTabel($id)
    {
        $where = array('id_produk' => $id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit_produk_a'] = $this->M_produk_a->updateData($where,'produk')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('V_edit_produkA', $data);
        $this->load->view('templates/footer');
    }

    public function editproduk()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('detail_produk', 'Detail Produk', 'required|trim');

        if ($this->form_validation->run() == false) {
           $this->load->view('templates/header', $data);
           $this->load->view('templates/sidebar', $data);
           $this->load->view('V_edit_produkA', $data);
           $this->load->view('templates/footer');

       }else{
        $id_produk = $this->input->post('id_produk');
        $kode_produk = $this->input->post('kode_produk');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $nama = $this->input->post('nama');
        $detail_produk = $this->input->post('detail_produk');
        $created_by = $this->input->post('created_by');
        $created_date = $this->input->post('created_date');
        $updated_by = $this->input->post('updated_by');
        $updated_date = $this->input->post('updated_date');


           //  jika ada gambar yang diupload
        $upload_image = $_FILES['gambar']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/template/back/dist/img/produk/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar'))
            {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            }
            else
            {
                echo $this->upload->display_errors();
            }

        }

        $this->db->set('kode_produk', $kode_produk);
        $this->db->set('kategori', $kategori);
        $this->db->set('nama_produk', $nama);
        $this->db->set('harga', $harga);
        $this->db->set('detail_produk', $detail_produk);
        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data profil telah di edit! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('produkA');

    }
}

public function update()
{
    $id_produk= $this->input->post('id_produk');
    $kode_produk= $this->input->post('kode_produk');
    $nama= $this->input->post('nama');
    $detail_produk= $this->input->post('detail_produk');
    $gambar= $this->input->post('gambar');
    $created_by= $this->input->post('created_by');
    $created_date= $this->input->post('created_date');
    $updated_by= $this->input->post('updated_by');
    $updated_date= $this->input->post('updated_date');

    $data = array (
        'kode_produk' => $kode_produk,
        'nama'  =>$nama,
        'detail_produk'   =>$detail_produk,
        'gambar'      =>$gambar,
        'created_by' => $created_by,
        'created_date' => $created_date,
        'updated_by' => $updated_by,
        'updated_by' => $updated_date,
    );

    $this->db->where('id_produk', $this->input->post('id_produk'));
    $this->db->update('produk', $data);
    redirect('produkA');
}
public function hapusTabel($id)
{
    $this->M_produk_a->hapus_data($id);
    ?>
    <script type="text/javascript">
        alert('Data berhasil dihapus');
        document.location='http://localhost/warungcoro/produkA';
    </script>
    <?php
}     
}
?>