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

        $data['title'] = 'Dashboard';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('asda/dashboardsatu');
        $this->load->view('templates/footer');
        $this->load->view('asda/enddashboardsatu');
    }
}
