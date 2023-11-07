<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        // $this->load->library('User_model');

        $this->load->library('QrCodeGenerator');
        $this->load->model('Buku_model');

        // Cek apakah pengguna sudah login dan memiliki role 'staff'
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'staff') {
            redirect('auth/login_view');
        }
    }

    public function dashboard()
    {
        $this->load->model('Buku_model');
        $this->load->model('Anggota_model');

        $data['stok'] = $this->Buku_model->totalBuku();
        $data['users'] = $this->Anggota_model->totalAnggota();
        $this->load->view('admin/dashboard', $data);
    }

    public function getNisList()
    {
        $this->load->model('Anggota_model');

        $nis_data = $this->Anggota_model->getNisList();
        echo json_encode($nis_data);
    }

    public function data_buku()
    {
        $this->load->model('Buku_model');
        $data['buku'] = $this->Buku_model->getAllBuku();
        $this->load->view('admin/data_buku', $data);
    }

    public function tambah_buku()
    {
        // Load library form_validation
        $this->load->library('form_validation');

        // Atur aturan validasi
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('tahun_buku', 'Tahun Buku', 'required');
        $this->form_validation->set_rules('nomor_isbn', 'Nomor ISBN', 'required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('stok_buku', 'Stok Buku', 'required|numeric');
        $this->form_validation->set_rules('rak', 'Rak', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        // Cek validasi
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            echo json_encode(array("status" => FALSE, "message" => validation_errors()));
        } else {
            // Jika validasi berhasil, lakukan proses upload dan penyimpanan data
            $config['upload_path'] = './uploads/sampul/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('sampul')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
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
                $id_buku = $this->db->insert_id(); // Mendapatkan ID buku yang baru saja disimpan

                // Mendapatkan informasi nama rak dan nama kategori berdasarkan ID yang diberikan
                $nama_rak = $this->Buku_model->getNamaRak($this->input->post('rak'));
                $nama_kategori = $this->Buku_model->getNamaKategori($this->input->post('kategori'));

                // Membuat detail buku dengan nama rak dan nama kategori
                $detailBuku = sprintf(
                    "Judul: %s\nTahun: %s\nISBN: %s\nPengarang: %s\nPenerbit: %s\nRak: %s\nKategori: %s\nStok: %d",
                    $this->input->post('judul'),
                    $this->input->post('tahun_buku'),
                    $this->input->post('nomor_isbn'),
                    $this->input->post('pengarang'),
                    $this->input->post('penerbit'),
                    $nama_rak, // Nama rak dari database
                    $nama_kategori, // Nama kategori dari database
                    $this->input->post('stok_buku')
                );

                // Setelah data buku berhasil disimpan dan kita mendapatkan id_buku
                $qrCodeFileName = uniqid() . '.png';
                $qrFilePath = './uploads/qrcodes/qrbuku/' . $qrCodeFileName;

                // Gunakan library QrCodeGenerator untuk menggenerate QR Code dengan detail buku
                $this->qrcodegenerator->generate($detailBuku, $qrFilePath);

                // Simpan hanya nama file QR code ke database (tanpa path)
                $this->db->where('id', $id_buku);
                $this->db->update('buku', array('qr_code' => $qrCodeFileName));

                // $this->session->set_flashdata('success', 'Buku berhasil ditambahkan');
                echo json_encode(array("status" => TRUE));
            }
        }
    }

    public function get_buku_by_id($id)
    {
        $this->load->model('Buku_model');
        $data = $this->Buku_model->getBukuById($id);
        echo json_encode($data);
    }
    public function update_buku()
    {
        $id = $this->input->post('id'); // Ambil ID buku dari form

        $config['upload_path'] = './uploads/sampul/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB

        $this->load->library('upload', $config);

        // Cek apakah ada file yang di-upload
        if (!empty($_FILES['sampul_edit']['name'])) {
            if (!$this->upload->do_upload('sampul_edit')) {
                echo json_encode(array("status" => FALSE, "message" => $this->upload->display_errors()));
                return;
            } else {
                $upload_data = $this->upload->data();
                $data['sampul'] = $upload_data['file_name'];
            }
        }

        $data['judul'] = $this->input->post('judul_edit');
        $data['tahun_buku'] = $this->input->post('tahun_buku_edit');
        $data['nomor_isbn'] = $this->input->post('nomor_isbn_edit');
        $data['pengarang'] = $this->input->post('pengarang_edit');
        $data['penerbit'] = $this->input->post('penerbit_edit');
        $data['rak_id'] = $this->input->post('rak_edit');
        $data['kategori_id'] = $this->input->post('kategori_edit');
        $data['stok_buku'] = $this->input->post('stok_buku_edit');

        $this->db->where('id', $id);
        $this->db->update('buku', $data);

        if ($this->db->affected_rows() > 0) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "message" => "Gagal mengupdate buku"));
        }
    }
    public function delete_buku($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('buku');
        if ($this->db->affected_rows() > 0) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "message" => "Gagal menghapus buku"));
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


    public function tambah_anggota()
    {
        $this->load->library('form_validation');

        // Atur aturan validasi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nis', 'Nis', 'required');
        // $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Paswword', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('telefon', 'telefon', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required|in_list[staff,anggota]');

        // Cek validasi
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            echo json_encode(array("status" => FALSE, "message" => validation_errors()));
        } else {
            // Jika validasi berhasil, lakukan proses upload dan penyimpanan data
            $config['upload_path'] = './uploads/profil_anggota/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('profil')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                echo json_encode(array("status" => FALSE, "message" => $this->upload->display_errors()));
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'profil' => $upload_data['file_name'],
                    'nama' => $this->input->post('nama'),
                    'nis' => $this->input->post('nis'),
                    'kelas' => $this->input->post('kelas'),
                    'username' => $this->input->post('username'),
                    // 'password' => $this->input->post('password'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'email' => $this->input->post('email'),
                    'telefon' => $this->input->post('telefon'),
                );

                $this->db->insert('users', $data);
                $id_user = $this->db->insert_id(); // Mendapatkan ID buku yang baru saja disimpan

                // Membuat detail buku dengan nama rak dan nama kategori
                $detailUser = sprintf(
                    "Nama : %s\nNis: %s\nKelas:%d",
                    $this->input->post('nama'),
                    $this->input->post('nis'),
                    $this->input->post('kelas')
                );

                // Setelah data buku berhasil disimpan dan kita mendapatkan id_buku
                $qrCodeFileName = uniqid() . '.png';
                $qrFilePath = './uploads/qrcodes/qranggota/' . $qrCodeFileName;

                // Gunakan library QrCodeGenerator untuk menggenerate QR Code dengan detail buku
                $this->qrcodegenerator->generate($detailUser, $qrFilePath);

                // Simpan hanya nama file QR code ke database (tanpa path)
                $this->db->where('id', $id_user);
                $this->db->update('users', array('qr_code' => $qrCodeFileName));

                // $this->session->set_flashdata('success', 'Anggota berhasil ditambahkan');
                echo json_encode(array("status" => TRUE));
            }
        }
    }

    public function data_anggota()
    {
        $this->load->model('Anggota_model');
        $data['users'] = $this->Anggota_model->getAllAnggota();
        $this->load->view('admin/data_anggota', $data);
    }

    public function get_anggota_by_id($id)
    {
        $this->load->model('Anggota_model');
        $data = $this->Anggota_model->getAnggotaById($id);
        echo json_encode($data);
    }




    public function update_anggota()
    {
        $id = $this->input->post('id');

        $config['upload_path'] = './uploads/profil_anggota/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB

        $this->load->library('upload', $config);

        if (!empty($_FILES['profil_edit']['name'])) {
            if (!$this->upload->do_upload('profil_edit')) {
                echo json_encode(array("status" => FALSE, "message" => $this->upload->display_errors()));
                return;
            } else {
                $upload_data = $this->upload->data();
                $data['profil'] = $upload_data['file_name'];
            }
        }

        $data['nis'] = $this->input->post('nis_edit');
        $data['nama'] = $this->input->post('nama_edit');
        $data['kelas'] = $this->input->post('kelas_edit');
        $data['telefon'] = $this->input->post('telefon_edit');
        $data['email'] = $this->input->post('email_edit');
        $data['username'] = $this->input->post('username_edit');
        // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        $data['password'] = password_hash($this->input->post('password_edit'), PASSWORD_DEFAULT);
        $data['role'] = $this->input->post('role_edit');

        $this->db->where('id', $id);
        $this->db->update('users', $data);

        if ($this->db->affected_rows() > 0) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "message" => "Gagal Update Anggota"));
        }
    }

    public function delete_anggota($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        if ($this->db->affected_rows() > 0) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "message" => "Gagal Hapus Anggota"));
        }
    }

    public function data_peminjaman()
    {
        $this->load->model('Peminjaman_model');
        $data['peminjaman'] = $this->Peminjaman_model->getAllPeminjaman();
        $this->load->view('admin/data_peminjaman', $data);
    }

    public function tambah_denda()
    {
        $data = array(
            'harga_denda' => $this->input->post('harga_denda'),
            'status' => $this->input->post('status')
        );

        $this->db->insert('denda', $data);
        echo json_encode(array("status" => TRUE));
    }
    public function get_all_denda()
    {
        $data = $this->db->get('denda')->result();
        echo json_encode($data);
    }
    public function delete_denda($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('denda');
        if ($this->db->affected_rows() > 0) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "message" => "Gagal menghapus Denda"));
        }
    }
}
