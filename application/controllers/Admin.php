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
        $this->load->model('Denda_model');

        // Cek apakah pengguna sudah login dan memiliki role 'staff'
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'staff') {
            redirect('auth/login_view');
        }
    }

    // Mengupdate metode dashboard di dalam class Admin

    public function dashboard()
    {
        $this->load->model('Buku_model');
        $this->load->model('Anggota_model');
        $this->load->model('Peminjaman_model'); // Pastikan model ini sudah diload

        $data['stok'] = $this->Buku_model->totalBuku();
        $data['users'] = $this->Anggota_model->totalAnggota();
        $data['total_peminjaman'] = $this->Peminjaman_model->hitungTotalPeminjaman(); // Total peminjaman
        $data['total_pengembalian'] = $this->Peminjaman_model->hitungTotalPengembalian(); // Total pengembalian

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
        $data['password'] = password_hash($this->input->post('password_edit'), PASSWORD_DEFAULT);
        $data['role'] = $this->input->post('role_edit');

        // var_dump($id, $data);


        $this->db->where('id', $id);
        $this->db->update('users', $data);

        // var_dump($this->db->last_query());


        if ($this->db->affected_rows() > 0) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "message" => "Gagal Update Anggota"));
        }
    }

    public function update_buku()
    {

        $id = $this->input->post('id_buku'); // Ambil ID buku dari form

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

        // print_r($id);
        // print_r($data);
        // exit();

        // var_dump($id, $data);

        $this->db->where('id', $id);
        $this->db->update('buku', $data);

        // var_dump($this->db->last_query());


        if ($this->db->affected_rows() > 0) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "message" => "Gagal mengupdate buku"));
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
        $this->load->model('User_model');
        $this->load->model('Buku_model');

        $data['peminjaman'] = $this->Peminjaman_model->getAllPeminjaman();
        $data['users'] = $this->User_model->getAllUsers(); // Metode untuk mengambil semua user
        $data['buku'] = $this->Buku_model->getAllBuku(); // Metode untuk mengambil semua buku

        $this->load->view('admin/data_peminjaman', $data);
    }

    public function tambah_peminjaman()
    {
        $user_id = $this->input->post('user_id');
        $buku_id = $this->input->post('buku_id');
        $tanggal_pinjam = new DateTime($this->input->post('tanggal_pinjam'));
        $tanggal_harus_kembali = new DateTime($this->input->post('tanggal_harus_kembali'));
        $jumlah_buku = $this->input->post('jumlah_buku');

        // Konversi objek DateTime menjadi string.
        $formatted_tanggal_pinjam = $tanggal_pinjam->format('Y-m-d');
        $formatted_tanggal_harus_kembali = $tanggal_harus_kembali->format('Y-m-d');

        $interval = $tanggal_pinjam->diff($tanggal_harus_kembali);
        $hari = $interval->days;

        if ($hari > 2) {
            // Set flashdata untuk menampilkan error
            $this->session->set_flashdata('error', 'Peminjaman hanya bisa maksimal 2 hari.');
            redirect('admin/data_peminjaman');
        }

        $data = array(
            'user_id' => $user_id,
            'buku_id' => $buku_id,
            'tanggal_pinjam' => $formatted_tanggal_pinjam, // Gunakan string tanggal yang sudah diformat
            'tanggal_harus_kembali' => $formatted_tanggal_harus_kembali, // Gunakan string tanggal yang sudah diformat
            'status' => 'dipinjam', // Status default saat peminjaman
            'jumlah_buku' => $jumlah_buku
        );

        $this->load->model('Peminjaman_model');
        $insert = $this->Peminjaman_model->tambahPeminjaman($data);

        if ($insert) {
            $this->session->set_flashdata('success', 'Peminjaman berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menambahkan peminjaman.');
        }

        redirect('admin/data_peminjaman');
    }
    public function hapus_peminjaman($id)
    {
        $this->load->model('Peminjaman_model');
        $delete = $this->Peminjaman_model->hapusPeminjaman($id);

        // Persiapkan response
        $response = array();
        if ($delete) {
            $response['success'] = true;
            $response['message'] = 'Data peminjaman berhasil dihapus.';
        } else {
            $response['success'] = false;
            $response['message'] = 'Terjadi kesalahan saat menghapus data peminjaman.';
        }

        echo json_encode($response); // Mengirimkan respon dalam format JSON
    }

    public function get_user_info($id)
    {
        $this->load->model('User_model');
        $user_info = $this->User_model->getUserById($id);

        echo json_encode($user_info);
    }
    public function get_buku_info($id)
    {
        $this->load->model('Buku_model');
        $buku_info = $this->Buku_model->getBookById($id);

        echo json_encode($buku_info);
    }

    public function kembalikan_buku($id)
    {
        error_log("ID Peminjaman: " . $id); // Log untuk debugging

        // Ambil data peminjaman berdasarkan id
        $peminjaman = $this->db->get_where('peminjaman', ['id' => $id])->row();

        // Periksa apakah data peminjaman ditemukan
        if (!$peminjaman) {
            echo json_encode(['success' => false, 'message' => 'Data peminjaman tidak ditemukan.']);
            return;
        }

        // Ambil denda aktif
        $denda_aktif = $this->Denda_model->getDendaAktif();
        $tarif_denda = $denda_aktif['jumlah_denda'];

        $tanggal_kembali = date('Y-m-d'); // tanggal saat ini
        $tanggal_harus_kembali = new DateTime($peminjaman->tanggal_harus_kembali);
        $tanggal_pengembalian = new DateTime($tanggal_kembali);

        // Hitung selisih hari, jika terlambat, maka selisih_hari akan lebih dari 0
        $selisih_hari = $tanggal_pengembalian > $tanggal_harus_kembali ? $tanggal_harus_kembali->diff($tanggal_pengembalian)->days : 0;

        // Cek jika denda sudah ada, jika ya, gunakan denda yang sudah ada, jika tidak, hitung denda baru
        $denda_sudah_ada = $peminjaman->denda;
        $denda = $denda_sudah_ada > 0 ? $denda_sudah_ada : $selisih_hari * $tarif_denda;

        // Update peminjaman dengan tanggal kembali dan denda
        $data = array(
            'tanggal_kembali' => $tanggal_kembali,
            'status' => 'dikembalikan',
            'denda' => $denda
        );

        $this->db->where('id', $id);
        $update = $this->db->update('peminjaman', $data);

        // Jika update berhasil dan buku dikembalikan, tambahkan stoknya kembali
        if ($update) {
            // Load Buku_model jika belum diload
            $this->load->model('Buku_model');
            // Tambahkan stok buku
            $this->Buku_model->tambahStok($peminjaman->buku_id, $peminjaman->jumlah_buku);
        }

        // Persiapkan response
        $response = array();
        if ($update) {
            $response['success'] = true;
            $response['message'] = 'Buku berhasil dikembalikan' . ($denda > 0 ? " dengan denda Rp$denda" : ".");
        } else {
            $response['success'] = false;
            $response['message'] = 'Terjadi kesalahan saat mengembalikan buku.';
        }

        $response['selisih_hari'] = $selisih_hari;
        echo json_encode($response); // Mengirimkan respon dalam format JSON
    }

    public function get_denda_json()
    {
        $this->load->model('Denda_model');
        $data['denda'] = $this->Denda_model->getAllDenda();
        echo json_encode($data['denda']);
    }

    public function tambah_denda()
    {
        $jumlah_denda = $this->input->post('jumlah_denda');

        // Validasi input disini jika diperlukan
        $data = array(
            'jumlah_denda' => $jumlah_denda,
            'status_aktif' => 1, // Denda ini akan menjadi denda aktif
            'tanggal_dibuat' => date('Y-m-d') // atau tanggal lain sesuai dengan kebutuhan
        );

        $this->load->model('Denda_model');
        $insert = $this->Denda_model->tambahDenda($data);

        if ($insert) {
            $this->session->set_flashdata('success', 'Denda berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menambahkan denda.');
        }

        redirect('admin/data_peminjaman');
    }

    public function update_denda()
    {
        $this->load->model('Peminjaman_model');
        $peminjaman = $this->Peminjaman_model->getAllPeminjaman();
        echo json_encode($peminjaman);
    }
}
