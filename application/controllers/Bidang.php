<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {

        $data['judul'] = 'Dashboard';

        $this->load->view('bidang/header', $data);
        $this->load->view('bidang/dashboard');
        $this->load->view('bidang/footer');
        $this->load->view('bidang/end');
    }
}
