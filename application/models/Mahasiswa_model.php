<?php
class Mahasiswa_model extends CI_Model {

    public function get_data()
    {
        return $this->db->get('mahasiswa')->result();
    }

    public function save_data($data)
    {
        return $this->db->insert('mahasiswa', $data);
    }
}