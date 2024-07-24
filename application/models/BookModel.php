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

    public function getBookById($id) {
        $query = $this->db->get_where('buku', array('id_buku' => $id));
        return $query->row_array();
    }

    public function addBook($data) {
        return $this->db->insert('buku', $data);
    }

    public function updateBook($id, $data) {
        $this->db->where('id_buku', $id);
        return $this->db->update('buku', $data);
    }

    public function deleteBook($id) {
        $this->db->where('id_buku', $id);
        return $this->db->delete('buku');
    }
}
?>
