<?php
class MahasiswaModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAllMahasiswas() {
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }

    public function getMahasiswaByNim($nim) {
        $query = $this->db->get_where('mahasiswa', array('nim' => $nim));
        return $query->row_array();
    }

    public function addMahasiswa($data) {
        return $this->db->insert('mahasiswa', $data);
    }

    public function updateMahasiswa($nim, $data) {
        $this->db->where('nim', $nim);
        return $this->db->update('mahasiswa', $data);
    }

    public function deleteMahasiswa($nim) {
        $this->db->where('nim', $nim);
        return $this->db->delete('mahasiswa');
    }

    public function update_mahasiswa($nim, $data)
{
    $this->db->where('nim', $nim);
    return $this->db->update('mahasiswa', $data);
}

}
?>
