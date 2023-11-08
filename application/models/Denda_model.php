<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Denda_model extends CI_Model
{
    protected $table = 'denda';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function tambahDenda($data)
    {
        // Nonaktifkan semua denda yang ada
        $this->db->set('status_aktif', '0');
        $this->db->update($this->table);

        // Tambahkan denda baru dan setel sebagai aktif
        $data['status_aktif'] = '1'; // Set denda baru sebagai aktif
        return $this->db->insert($this->table, $data);
    }

    public function getAllDenda()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDendaAktif()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('status_aktif', '1');
        $query = $this->db->get();
        return $query->row_array();
    }
}
