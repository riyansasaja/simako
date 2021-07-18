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
            'valid_email' => 'Must be Valid Email!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]', [
            'min_length' => 'Min Pass 3 Characters'
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
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //jika ada usernya
        if ($user) {
            # cek usernya aktif atau tidak
            if ($user['is_active'] == 1) {
                # cek password
                if (password_verify($password, $user['password'])) {
                    # ambil data untuk disimpan di session
                    $data = [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'id_atasan' => $user['id_atasan'],
                        'role_id' => $user['role_id']
                    ];
                    #buat session
                    $this->session->set_userdata($data);
                    redirect('dashboard/');
                } else {
                    # jia password salah
                    $this->session->set_flashdata('message', 'Maaf Pasword Salah!');
                    redirect('auth/');
                }
            } else {
                # jika email tidak aktif
                $this->session->set_flashdata('message', 'Maaf email ini belum diaktifkan!');
                redirect('auth/');
            }
        } else {
            # jika tidak ada user
            $this->session->set_flashdata('message', 'Maaf Email belum terdaftar!');
            redirect('auth/');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth/');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked/');
    }
}
