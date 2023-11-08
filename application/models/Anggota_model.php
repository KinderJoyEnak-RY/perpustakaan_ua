<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    public function getAllAnggota()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function getAnggotaById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('users')->row_array();
    }

    public function totalAnggota()
    {
        return $this->db->count_all('users');
    }

    public function getNisList()
    {
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
}
