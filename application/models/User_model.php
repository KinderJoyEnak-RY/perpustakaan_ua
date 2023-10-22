<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Fungsi tambah user baru
    public function register($data)
    {
        return $this->db->insert('users', $data);
    }

    public function check_login($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        return false;
    }
}
