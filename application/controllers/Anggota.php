<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->model('User_model');
        $this->load->model('Peminjaman_model');

        // Cek apakah pengguna sudah login dan memiliki role 'anggota'
        if (!$this->session->userdata('logged_in')) {
            // Jika pengguna tidak login, arahkan ke halaman login
            redirect('auth/login');
        } else {
            // Jika pengguna login tapi role-nya bukan 'anggota', arahkan ke halaman yang sesuai
            if ($this->session->userdata('role') !== 'anggota') {
                redirect('auth/login'); // atau halaman yang sesuai dengan role pengguna
            }
        }
    }

    public function dashboard()
    {
        $user_id = $this->session->userdata('user_id');

        // Dapatkan profil user
        $data['profil'] = $this->User_model->getUserById($user_id);

        // Dapatkan stok total buku
        $data['stok'] = $this->Buku_model->totalBuku(); // Memanggil fungsi totalBuku dari Buku_model

        // Dapatkan total peminjaman untuk user
        $data['total_peminjaman'] = $this->Peminjaman_model->hitungTotalPeminjamanByUserId($user_id); // Fungsi ini perlu Anda buat di Peminjaman_model

        // Dapatkan total pengembalian untuk user
        $data['total_pengembalian'] = $this->Peminjaman_model->hitungTotalPengembalianByUserId($user_id); // Fungsi ini perlu Anda buat di Peminjaman_model

        // Tampilkan view dashboard dengan data
        $this->load->view('anggota/dashboard', $data);
    }

    public function katalog_buku()
    {
        $data['buku'] = $this->Buku_model->getAllBuku(); // Memanggil model untuk mendapatkan semua data buku
        $this->load->view('anggota/katalog_buku', $data); // Menampilkan view katalog buku dengan data buku

		// var_dump($data);
    }

    public function transaksi()
    {
        // Mengambil ID pengguna yang sedang login
        $user_id = $this->session->userdata('user_id');

        // Mengambil transaksi peminjaman dan pengembalian milik pengguna
        $this->load->model('Peminjaman_model');
        $data['transaksi'] = $this->Peminjaman_model->getPeminjamanByUserId($user_id);

        // Menampilkan view dengan data transaksi
        $this->load->view('anggota/transaksi', $data);
    }
}
