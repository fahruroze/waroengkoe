<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class RatingD extends CI_Controller {
    public function __construct(){
     parent:: __construct();
     $this->load->model('M_rating_d');  
 }
 public function index()
 {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['data_rating_d'] = $this->M_rating_d->getData();

    $this->form_validation->set_rules('id_rating', 'id rating', 'required');
    $this->form_validation->set_rules('nama_rating', 'Nama Rating', 'required');
    $this->form_validation->set_rules('rating', 'Rating', 'required');
    $this->form_validation->set_rules('tanggal_rating', 'Tanggal Rating', 'required');

    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('V_ratingD', $data);
        $this->load->view('templates/footer');
    }else{
        $this->M_rating_a->insertData();
        $this->session->set_flashdata('message', 'Data Produk Telah Ditambahkan!');
        redirect('RatingC');
    }
}

function tambah(){
    $this->load->view('V_ratingD');
}

function tambahRating(){
    $id_rating = $this->input->post('id_rating');
    $nama_rating = $this->input->post('nama_rating');
    $rating = $this->input->post('rating');
    $tanggal_rating = $this->input->post('tanggal_rating');

    $data = array(
        'id_rating' => $id_rating,
        'nama_rating' => $nama_rating,
        'rating' => $rating,
        'tanggal_rating' => $tanggal_rating,
    );
    $this->M_rating_d->insertData($data,'rating_d');
    redirect('RatingD');
}

    // public function tambahRating()
    // {
    //     $this->M_rating_d->insertData();
    //     
    //         <script type="text/javascript">
    //             alert('Data berhasil disimpan');
    //             document.location='http://localhost/warungcoro/ratingA';
    //         </script>
    //     <?php
    // }
public function editTabel($id_rating)
{
    $where = array('id_rating' => $id_rating);
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['edit_rating_d'] = $this->M_rating_d->updateData($where,'rating_d')->result();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('V_edit_ratingD', $data);
    $this->load->view('templates/footer');
}

public function update()
{
    $id_rating= $this->input->post('id_rating');
    $nama_rating= $this->input->post('nama_rating');
    $rating= $this->input->post('rating');
    $tanggal_rating= $this->input->post('tanggal_rating');



    $data = array (
        'id_rating' => $id_rating,
        'nama_rating'  =>$nama_rating,
        'rating'   =>$rating,
        'tanggal_rating'      =>$tanggal_rating,

    );

    $this->db->where('id_rating', $this->input->post('id_rating'));
    $this->db->update('rating_d', $data);
    redirect('ratingD');
}
public function hapusTabel($id)
{
    $this->M_rating_d->hapus_data($id);
    ?>
    <script type="text/javascript">
        alert('Data berhasil dihapus');
        document.location='http://localhost/warungcoro/RatingD';
    </script>
    <?php
}     
}
?>