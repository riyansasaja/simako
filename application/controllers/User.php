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
        $data['title'] = 'User Management';
        $data['js'] = 'adduser.js';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('user/index');
        $this->load->view('templates/footer', $data);
    }

    public function getUserById()
    {
        $id = $this->input->post('id');
        $data = $this->db->get_where('user', ['id' => $id])->result();
        echo json_encode($data);
    }

    public function getUserByAtasan()
    {
        $id = $this->session->userdata('id');
        $data = $this->db->get_where('user', ['id_atasan' => $id])->result();
        echo json_encode($data);
    }

    public function adduser()
    {

        $this->form_validation->set_rules('name', 'Name', 'required');
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
                'name' => strtoupper($this->input->post('name', true)),
                'email' => $this->input->post('email', true),
                'id_atasan' => $id,
                'password' => password_hash('1234567890', PASSWORD_DEFAULT),
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


    public function updateuser()
    {

        $this->form_validation->set_rules('name_edit', 'Name', 'required');
        $this->form_validation->set_rules('email_edit', 'Email', 'required');

        if ($this->form_validation->run() == FALSE) {
            # kirim pesan salah
            $json = [
                'status' => 'unsuccess',
                'message' => validation_errors()
            ];
            echo json_encode($json);
        } else {
            $id = $this->input->post('id_edit', true);
            $data = [
                'name' => $this->input->post('name_edit', true),
                'email' => $this->input->post('email_edit', true)
            ];

            $this->db->where('id', $id);
            $proses = $this->db->update('user', $data);

            $json = [
                'status' => 'success',
                'data' => $proses
            ];
            echo json_encode($json);
        }
    }

    public function resetuser()
    {


        $id = $this->input->post('id');
        $data = [
            'password' => password_hash('1234567890', PASSWORD_DEFAULT)
        ];

        $this->db->where('id', $id);
        $result = $this->db->update('user', $data);
        echo json_encode($result);
    }

    public function deleteuser()
    {
        $id_barang = $this->input->post('id');
        $result = $this->db->delete('user', ['id' => $id_barang]);
        echo json_encode($result);
    }
}
