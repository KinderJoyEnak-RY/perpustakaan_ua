<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{
	public function getAllPeminjaman()
    {
		$query = $this->db->get('peminjaman');
        return $query->result_array();

    }
	
	public function getPeminjamanById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('peminjaman')->row_array();
    }
}
