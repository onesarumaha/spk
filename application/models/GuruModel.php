<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

    public function get_all() {
        return $this->db->get('guru')->result();
    }

    public function insert($data) {
        return $this->db->insert('guru', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('guru', ['id' => $id])->row();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('guru', $data);
    }

    public function delete($id) {
        return $this->db->delete('guru', ['id' => $id]);
    }
}
