<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class RatingB extends CI_Controller {
    public function __construct(){
     parent:: __construct();
     $this->load->model('M_rating_b');  
 }
 public function index()
 {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['data_rating_b'] = $this->M_rating_b->getData();

    $this->form_validation->set_rules('id_rating', 'id rating', 'required');
    $this->form_validation->set_rules('nama_rating', 'Nama Rating', 'required');
    $this->form_validation->set_rules('rating', 'Rating', 'required');
    $this->form_validation->set_rules('tanggal_rating', 'Tanggal Rating', 'required');

    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('V_rating_b', $data);
        $this->load->view('templates/footer');
    }else{
        $this->M_rating_a->insertData();
        $this->session->set_flashdata('message', 'Data Produk Telah Ditambahkan!');
        redirect('RatingB');
    }
}
function tambah(){
    $this->load->view('V_rating_b ');
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
    $this->M_rating_b->insertData($data,'rating_b');
    redirect('RatingB');
}
    // public function tambahRating()
    // {
    //     $this->M_rating_b->insertData();
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
    $data['edit_rating_b'] = $this->M_rating_b->updateData($where,'rating_b')->result();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('V_edit_ratingB', $data);
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
    $this->db->update('rating_b', $data);
    redirect('RatingB');
}
public function hapusTabel($id)
{
    $this->M_rating_b->hapus_data($id);
    ?>
    <script type="text/javascript">
        alert('Data berhasil dihapus');
        document.location='http://localhost/warungcoro/RatingB';
    </script>
    <?php
}     
}
?>