<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }

    
    public function index()
    {
        // echo "test";

        $data['title'] = 'Control User';
        $data['js'] = 'superuser.js';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('superuser/index');
        $this->load->view('templates/footer', $data);
    }

    public function reset()
    {
        echo "tes";
    }
}