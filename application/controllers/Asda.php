<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {

        $data['judul'] = 'Dashboard';

        $this->load->view('asda/header', $data);
        $this->load->view('asda/dashboard');
        $this->load->view('asda/footer');
        $this->load->view('asda/end');
    }
}
