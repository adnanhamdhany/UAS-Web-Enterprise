<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BookModel'); // Load the BookModel here
    }

    public function index() {
        $this->load->view('main/index');
        $this->load->view('main/topbar');
        $this->load->view('main/sidebar');
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
