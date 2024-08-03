<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MahasiswaModel');
    }

    public function index() {
        $this->load->view('main/index');
        $this->load->view('main/topbar');
        $this->load->view('main/sidebar');
    }

    public function mahasiswa() {
        $data['mahasiswas'] = $this->MahasiswaModel->getAllMahasiswas();
        $this->load->view('main/mahasiswa', $data);
        $this->load->view('main/topbar');
        $this->load->view('main/sidebar');
    }

    public function get_mahasiswa_details() {
        $nim = $this->input->post('nim');
        $data = $this->MahasiswaModel->getMahasiswaByNim($nim);
        echo json_encode($data);
    }

    public function add_mahasiswa() {
        $data = array(
            'name' => $this->input->post('name'),
            'gander' => $this->input->post('gander'),
            'birth' => $this->input->post('birth'),
            'address' => $this->input->post('address'),
            'contact' => $this->input->post('contact'),
            'status' => $this->input->post('status')
        );
        $this->MahasiswaModel->addMahasiswa($data);
        redirect('main/mahasiswa');
    }

    public function edit_mahasiswa($nim) {
        $data['mahasiswa'] = $this->MahasiswaModel->getMahasiswaByNim($nim);
        $this->load->view('main/edit_mahasiswa', $data);
        $this->load->view('main/topbar');
        $this->load->view('main/sidebar');
    }

    public function update_mahasiswa()
{
    $nim = $this->input->post('nim');
    $data = array(
        'name' => $this->input->post('name'),
        'gander' => $this->input->post('gander'),
        'birth' => $this->input->post('birth'),
        'address' => $this->input->post('address'),
        'contact' => $this->input->post('contact'),
        'status' => $this->input->post('status'),
    );

    $this->Main_model->update_mahasiswa($nim, $data);
    redirect('main/mahasiswa');
}


    public function delete_mahasiswa($nim) {
        $this->MahasiswaModel->deleteMahasiswa($nim);
        redirect('main/mahasiswa');
    }

       public function book_view() {
        $data['books'] = $this->BookModel->getAllBooks();
        $this->load->view('main/book_view', $data);
        $this->load->view('main/topbar');
        $this->load->view('main/sidebar');
    }

    public function add_book() {
        $data = array(
            'judul_buku' => $this->input->post('judul_buku'),
            'harga_buku' => $this->input->post('harga_buku'),
            'nama_penulis' => $this->input->post('nama_penulis')
        );
        $this->BookModel->addBook($data);
        echo json_encode(array("status" => TRUE));
    }

    public function edit_book_view($id)     {
        $data['book'] = $this->BookModel->getBookById($id);
        $this->load->view('main/edit_book_view', $data);
        $this->load->view('main/topbar');
        $this->load->view('main/sidebar');
    }

    public function update_book($id) {
        $data = array(
            'judul_buku' => $this->input->post('judul_buku'),
            'harga_buku' => $this->input->post('harga_buku'),
            'nama_penulis' => $this->input->post('nama_penulis')
        );
        $this->BookModel->updateBook($id, $data);
        redirect('main/book_view');
    }

    public function delete_book($id) {
        $this->BookModel->deleteBook($id);
        redirect('main/book_view');
    }
}
?>
