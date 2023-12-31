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
    public function getBookById($id)
    {
        $this->db->select('nomor_isbn, pengarang, penerbit, stok_buku');
        $this->db->from('buku');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan satu baris sebagai array asosiatif
    }
    public function totalBuku()
    {
        $this->db->select('SUM(stok_buku) as stok');
        $query = $this->db->get('buku');

        if ($query->num_rows() > 0) {
            return $query->row()->stok;
        } else {
            return 0;
        }
    }

    public function getNamaRak($rak_id)
    {
        $this->db->where('id', $rak_id);
        $rak = $this->db->get('rak')->row();
        return $rak ? $rak->nama_rak : null; // Pastikan untuk menangani kasus jika rak tidak ditemukan
    }

    public function getNamaKategori($kategori_id)
    {
        $this->db->where('id', $kategori_id);
        $kategori = $this->db->get('kategori')->row();
        return $kategori ? $kategori->nama_kategori : null; // Pastikan untuk menangani kasus jika kategori tidak ditemukan
    }

    public function kurangiStok($buku_id, $jumlah)
    {
        $this->db->set('stok_buku', 'stok_buku-' . $jumlah, FALSE);
        $this->db->where('id', $buku_id);
        $this->db->update('buku');
    }

    public function tambahStok($buku_id, $jumlah)
    {
        $this->db->set('stok_buku', 'stok_buku+' . $jumlah, FALSE);
        $this->db->where('id', $buku_id);
        $this->db->update('buku');
    }
}
