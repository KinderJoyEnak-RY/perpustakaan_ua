<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Fungsi untuk mendapatkan semua pengguna
    public function getAllUsers()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function getUserById($id)
    {
        $this->db->select('nis, kelas, telefon');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan satu baris sebagai array asosiatif
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
