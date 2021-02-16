<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index()
    {

        // form validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Musti isi ini neh!',
            'valid_email' => 'isi email yang betul kwa!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]', [
            'min_length' => 'Password harus 8 charakter',
            'required' => 'Musti isi bro'
        ]);


        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        if ($email == 'kpd@gmail.com' && $password == '12345678') {
            redirect('dashboard/kpd');
        } elseif ($email == 'bidang@gmail.com' && $password == '12345678') {
            redirect('dashboard/');
        } else {
            echo 'email or password wrong';
        }
    }
}
