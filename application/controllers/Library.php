<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Library extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
    }

    public function index()
    {
        $data['buku'] = $this->Buku_model->getAllBuku();
        $this->load->view('library_view', $data);
    }
}
