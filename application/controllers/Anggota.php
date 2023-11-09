<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->model('User_model');

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
        $data['profil'] = $this->User_model->getUserById($this->session->userdata('user_id'));
        // ... kode lain untuk mengambil data yang diperlukan untuk dashboard ...
        $this->load->view('anggota/dashboard', $data);
    }

    public function katalog_buku()
    {
        $data['buku'] = $this->Buku_model->getAllBuku(); // Memanggil model untuk mendapatkan semua data buku
        $this->load->view('anggota/katalog_buku', $data); // Menampilkan view katalog buku dengan data buku
    }
}
