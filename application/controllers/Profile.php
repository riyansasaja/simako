<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        // mengambil data user
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // form validationnya
        $this->form_validation->set_rules('oldpassword', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('newpassword1', 'Password Baru', 'required|trim|min_length[4]|matches[newpassword2]');
        $this->form_validation->set_rules('newpassword2', 'Konfirmasi Password', 'required|trim|min_length[4]|matches[newpassword1]');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $data['title'] = 'User Profile';
            $data['js'] = 'userprofile.js';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('profile/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            //cek password lama benar atau tidak
            $current_pasword = $this->input->post('oldpassword');
            $new_password = $this->input->post('newpassword1');
            if (!password_verify($current_pasword, $data['user']['password'])) {
                #Pasword lama salah
                $this->session->set_flashdata(
                    'message',
                    '<div class = "alert alert-danger" role = "alert">Password Lama Salah</div>'
                );
                redirect('profile/');
            } else {
                #cek password lama sama dengan password baru atau tidak
                if ($current_pasword == $new_password) {
                    # code...
                    $this->session->set_flashdata(
                        'message',
                        '<div class = "alert alert-danger" role = "alert">Password Baru sama dengan Password Lama</div>'
                    );
                    redirect('profile/');
                } else {
                    //password pass
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    //ubah di databse
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata(
                        'message',
                        '<div class = "alert alert-success" role = "alert">Password Berhasil Diganti</div>'
                    );
                    redirect('profile/');
                }
            }
        }
    }
}
