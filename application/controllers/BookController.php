<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('BookModel');
    }

    public function index() {
        $data['books'] = $this->BookModel->getAllBooks();
        $this->load->view('main/book_view', $data);
        $this->load->view('main/topbar');
        $this->load->view('main/sidebar');
    }
}
?>
