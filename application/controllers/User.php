<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // $this->load->model('ModelUser', 'user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        echo 'success garanteed';
    }

    public function getUserByAtasan()
    {
        $id = $this->session->userdata('id');
        $data = $this->db->get_where('user', ['id_atasan' => $id])->result();
        echo json_encode($data);
    }

    public function adduser()
    {

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE) {
            # kirim pesan salah
            $json = [
                'status' => 'unsuccess',
                'message' => validation_errors()
            ];
            echo json_encode($json);
        } else {

            $id = $this->session->userdata('id');
            $data = [
                'id' => '',
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'id_atasan' => $id,
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $id + 1,
                'is_active' => 1,
                'date_created' => date('Y-m-d')

            ];

            $proses = $this->db->insert('user', $data);
            $json = [
                'status' => 'success',
                'data' => $proses
            ];
            echo json_encode($json);
        }
    }
}
