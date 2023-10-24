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

	public function register()
	{
		$this->load->library('form_validation');

		// Set rules validasi form
		$this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[users.nama]');
		$this->form_validation->set_rules('nis', 'Nis', 'required|is_unique[users.nis]');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|is_unique[users.kelas]');
		$this->form_validation->set_rules('telefon', 'Telefon', 'required|is_unique[users.telefon]');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password_repeat', 'Repeat Password', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('role', 'Role', 'required|in_list[staff,anggota]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register');
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'nis' => $this->input->post('nis'),
				'kelas' => $this->input->post('kelas'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'telefon' => $this->input->post('telefon'),
				'email' => $this->input->post('email'),
				'role' => $this->input->post('role'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			);
			$this->User_model->register($data);
			$this->session->set_flashdata('success', 'Registration successful! Please login.');
			redirect('auth/login_view');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}
