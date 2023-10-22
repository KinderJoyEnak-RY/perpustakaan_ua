<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_model extends CI_Model
{

    public function getAllBuku()
    {
        $this->db->select('buku.*, rak.nama_rak, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('rak', 'buku.rak_id = rak.id');
        $this->db->join('kategori', 'buku.kategori_id = kategori.id');
        return $this->db->get()->result_array();
    }
    public function getBukuById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('buku')->row_array();
    }
}
