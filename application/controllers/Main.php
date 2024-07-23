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

    public function book_view(){
        $data['books'] = $this->BookModel->getAllBooks();
        $this->load->view('main/book_view', $data);
        $this->load->view('main/topbar');
        $this->load->view('main/sidebar');
    }
}