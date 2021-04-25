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
    }
}
