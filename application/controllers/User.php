<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // $this->load->model('ModelUser', 'user');
    }

    public function index()
    {
        echo 'tes';
    }

    public function getUserByAtasan()
    {
        $id = $this->session->userdata('id');
        $data = $this->db->get_where('user', ['id_atasan' => $id])->result();
        echo json_encode($data);
    }

    public function adduser()
    {
        $id = $this->session->userdata('id');
        $data = [
            'id' => '',
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'id_atasan' => $id,
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => $id + 1,
            'is_active' => 1,
            'date_created' => date('d-m-y')

        ];

        $this->db->insert('user', $data);
        redirect('opd/adduser');
    }
}
