<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');

		// Daftar metode yang tidak memerlukan pemeriksaan session
		$exception_uris = array(
			'login_view',
			'register',
			'do_login' // Anda mungkin juga ingin mengecualikan ini agar pengguna dapat mencoba login
		);

		if (!in_array($this->router->fetch_method(), $exception_uris)) {
			if (!$this->session->userdata('logged_in')) {
				redirect('auth/login_view');
			}
		}
	}


	public function login_view()
	{
		$this->load->view('login');
	}

	public function do_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->User_model->check_login($username);

		if ($user && password_verify($password, $user->password)) {
			// Set session data
			$session_data = array(
				'user_id' => $user->id,
				'username' => $user->username,
				'nama' => $user->nama,
				'role' => $user->role,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($session_data);

			// Redirect ke halaman dashboard
			redirect('admin/dashboard');
		} else {
			// Redirect kembali ke halaman login dengan pesan error
			$this->session->set_flashdata('error', 'Invalid username or password');
			redirect('auth/login_view');
		}
	}

	// public function register()
	// {
	// 	$this->load->library('form_validation');

	// 	// Set rules validasi form
	// 	$this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[users.nama]');
	// 	$this->form_validation->set_rules('nis', 'Nis', 'required|is_unique[users.nis]');
	// 	$this->form_validation->set_rules('kelas', 'Kelas', 'required|is_unique[users.kelas]');
	// 	$this->form_validation->set_rules('telefon', 'Telefon', 'required|is_unique[users.telefon]');
	// 	$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
	// 	$this->form_validation->set_rules('password', 'Password', 'required');
	// 	$this->form_validation->set_rules('password_repeat', 'Repeat Password', 'required|matches[password]');
	// 	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
	// 	$this->form_validation->set_rules('role', 'Role', 'required|in_list[staff,anggota]');

	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->load->view('register');
	// 	} else {
	// 		$data = array(
	// 			'nama' => $this->input->post('nama'),
	// 			'nis' => $this->input->post('nis'),
	// 			'kelas' => $this->input->post('kelas'),
	// 			'username' => $this->input->post('username'),
	// 			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
	// 			'telefon' => $this->input->post('telefon'),
	// 			'email' => $this->input->post('email'),
	// 			'role' => $this->input->post('role'),
	// 			'created_at' => date('Y-m-d H:i:s'),
	// 			'updated_at' => date('Y-m-d H:i:s')
	// 		);
	// 		$this->User_model->register($data);
	// 		$this->session->set_flashdata('success', 'Registration successful! Please login.');
	// 		redirect('auth/login_view');
	// 	}
	// }

	public function register (){

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
				$this->User_model->register($data);
				$this->session->set_flashdata('success', 'Registration successful! Please login.');
				redirect('auth/login_view');
            }
        }
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}
