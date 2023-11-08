<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{
    protected $table = 'peminjaman';

    public function getAllPeminjaman()
    {
        $this->db->select('peminjaman.*, users.nis, users.nama AS nama_peminjam, users.kelas, users.telefon, buku.judul AS judul_buku, buku.nomor_isbn, buku.pengarang, buku.penerbit');
        $this->db->from('peminjaman');
        $this->db->join('users', 'peminjaman.user_id = users.id');
        $this->db->join('buku', 'peminjaman.buku_id = buku.id');
        $query = $this->db->get();

        $peminjaman = $query->result_array();

        foreach ($peminjaman as &$pinjam) {
            $pinjam['denda'] = $this->hitungDenda($pinjam['tanggal_harus_kembali'], $pinjam['status']);
        }

        return $peminjaman;
    }

    private function hitungDenda($tanggal_harus_kembali, $status)
    {
        if ($status != 'dipinjam') {
            return 0; // Tidak ada denda untuk buku yang sudah dikembalikan.
        }

        $tanggal_harus_kembali = new DateTime($tanggal_harus_kembali);
        $tanggal_sekarang = new DateTime(); // Tanggal saat ini.

        if ($tanggal_sekarang > $tanggal_harus_kembali) {
            $selisih_hari = $tanggal_harus_kembali->diff($tanggal_sekarang)->days;

            // Ambil denda aktif dari model Denda
            $denda_aktif = $this->db->get_where('denda', ['status_aktif' => 1])->row_array();
            $tarif_denda = $denda_aktif ? $denda_aktif['jumlah_denda'] : 0;

            return $selisih_hari * $tarif_denda; // Denda = selisih hari * tarif per hari
        }

        return 0; // Tidak ada denda jika belum lewat tanggal harus kembali.
    }

    public function tambahPeminjaman($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function kembalikanBuku($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
}
