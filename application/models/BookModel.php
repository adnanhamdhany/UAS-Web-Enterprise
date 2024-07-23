<?php
class BookModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAllBooks() {
        $query = $this->db->get('buku');
        return $query->result_array();
    }
}
?>
