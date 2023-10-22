<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_model extends CI_Model
{

    public function getAllBuku()
    {
        return $this->db->get('buku')->result_array();
    }
}
