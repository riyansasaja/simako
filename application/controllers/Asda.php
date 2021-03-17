<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {

        $data['judul'] = 'Dashboard';

        $this->load->view('asda/header', $data);
        $this->load->view('asda/dashboard');
        $this->load->view('asda/end');
    }

    public function adduser()
    {
        $data['judul'] = 'Add User';
        $this->load->view('asda/header', $data);
        $this->load->view('asda/adduser');
        $this->load->view('asda/end');
    }
}
