<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class RatingA extends CI_Controller {
    public function __construct(){
     parent:: __construct();
     $this->load->model('M_rating_a');  
    
 }
 public function index()
 {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['data_rating_a'] = $this->M_rating_a->getData();
    $data['pelanggan'] = $this->M_rating_a->get_data_pelanggan();
    $data['produk'] = $this->M_rating_a->get_data_produk();
    $data['toko'] = $this->M_rating_a->get_data_penjual();

    $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('V_ratingA', $data);
        $this->load->view('templates/footer');
}

function tambah(){
    $this->load->view('V_ratingA');
}

function tambahRating(){
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['data_rating_a'] = $this->M_rating_a->getData();
    $data['pelanggan'] = $this->M_rating_a->get_data_pelanggan();
    $data['produk'] = $this->M_rating_a->get_data_produk();
    $data['toko'] = $this->M_rating_a->get_data_penjual();

    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('produk', 'Rating', 'required');
        // $this->form_validation->set_rules('id_rating', 'Pelanggan', 'required');
        $this->form_validation->set_rules('toko', 'Tanggal Rating', 'required');
        $this->form_validation->set_rules('rating', 'Tanggal Rating', 'required');

    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('V_ratingA', $data);
        $this->load->view('templates/footer');
    }else{
        $this->M_rating_a->insertData();
        $this->session->set_flashdata('message', 'Data Produk Telah Ditambahkan!');
        redirect('RatingA');
    }

    $id_rating = $this->input->post('id_rating');
    $rating = $this->input->post('rating');
    $tanggal_rating = $this->input->post('tanggal_rating');

    $data = array(
        'id_rating' => $id_rating,
        'rating' => $rating,
        'tanggal_rating' => $tanggal_rating,
    );
    $this->M_rating_a->insertData($data,'rating');
    redirect('RatingA');
}
    // }

    // public function tambahRating()
    // {
    //     $this->M_rating_a->insertData();

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
    $data['edit_rating_a'] = $this->M_rating_a->updateData($where,'rating')->result();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('V_edit_ratingA', $data);
    $this->load->view('templates/footer');
}

public function update()
{
    $id_rating= $this->input->post('id_rating');
    $rating= $this->input->post('rating');
    $tanggal_rating= $this->input->post('tanggal_rating');



    $data = array (
        'id_rating' => $id_rating,
        'rating'   =>$rating,
        'tanggal_rating'      =>$tanggal_rating,

    );

    $this->db->where('id_rating', $this->input->post('id_rating'));
    $this->db->update('rating', $data);
    redirect('ratingA');
}
public function hapusTabel($id)
    {
        $this->M_rating_a->hapus_data($id);
        ?>
            <script type="text/javascript">
                alert('Data berhasil dihapus');
                document.location='http://localhost/warungcoro/ratingA';
            </script>
        <?php
    }     
}
?>