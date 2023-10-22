<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Cek apakah pengguna sudah login dan memiliki role 'staff'
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'staff') {
            redirect('auth/login_view');
        }
    }

    public function dashboard()
    {
        $this->load->view('admin/dashboard');
    }

    public function data_buku()
    {
        $this->load->model('Buku_model');
        $data['buku'] = $this->Buku_model->getAllBuku();
        $this->load->view('admin/data_buku', $data);
    }

    public function tambah_buku()
    {
        $config['upload_path'] = './uploads/'; // direktori untuk menyimpan gambar
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('sampul')) {
            echo json_encode(array("status" => FALSE, "message" => $this->upload->display_errors()));
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'sampul' => $upload_data['file_name'],
                'judul' => $this->input->post('judul'),
                'tahun_buku' => $this->input->post('tahun_buku'),
                'nomor_isbn' => $this->input->post('nomor_isbn'),
                'pengarang' => $this->input->post('pengarang'),
                'penerbit' => $this->input->post('penerbit'),
                'rak_id' => $this->input->post('rak'),
                'kategori_id' => $this->input->post('kategori'),
                'stok_buku' => $this->input->post('stok_buku')
            );

            $this->db->insert('buku', $data);
            echo json_encode(array("status" => TRUE));
        }
    }

    public function tambah_rak()
    {
        $data = array(
            'nama_rak' => $this->input->post('nama_rak'),
            'deskripsi' => $this->input->post('deskripsi')
        );

        $this->db->insert('rak', $data);
        echo json_encode(array("status" => TRUE));
    }
    public function get_all_rak()
    {
        $data = $this->db->get('rak')->result();
        echo json_encode($data);
    }

    public function tambah_kategori()
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
            'deskripsi' => $this->input->post('deskripsi')
        );

        $this->db->insert('kategori', $data);
        echo json_encode(array("status" => TRUE));
    }
    public function get_all_kategori()
    {
        $data = $this->db->get('kategori')->result();
        echo json_encode($data);
    }
    public function delete_rak($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('rak');
        if ($this->db->affected_rows() > 0) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "message" => "Gagal menghapus rak"));
        }
    }
    public function delete_kategori($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kategori');
        if ($this->db->affected_rows() > 0) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "message" => "Gagal menghapus kategori"));
        }
    }
    // public function delete_rak($id)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->delete('buku');
    //     if ($this->db->affected_rows() > 0) {
    //         echo json_encode(array("status" => TRUE));
    //     } else {
    //         echo json_encode(array("status" => FALSE, "message" => "Gagal menghapus rak"));
    //     }
    // }
}
