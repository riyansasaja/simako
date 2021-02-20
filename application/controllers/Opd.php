<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('ModelOpd');
    }

    public function index()
    {

        $data['judul'] = 'Dashboard';

        $this->load->view('opd/header', $data);
        $this->load->view('opd/dashboard');
        $this->load->view('opd/footer');
        $this->load->view('opd/end');
    }

    public function input()
    {
        $id = $this->session->userdata('id');
        $data['judul'] = 'Input Program';
        $data['bidang'] = $this->db->get_where('user', ['id_atasan' => $id])->result_array();
        $data['sifat_kegiatan'] = $this->db->get('ref_sifat_kegiatan')->result_array();

        $this->load->view('opd/header', $data);
        $this->load->view('opd/inputprogram', $data);
        $this->load->view('opd/inputprogscript');
        $this->load->view('opd/end');
    }


    public function get_kegiatan()
    {
        $data = $this->db->get('tujuankegiatan')->result();
        echo json_encode($data);
    }

    public function addKegiatan()
    {
        $data = $this->ModelOpd->tambah();
        echo json_encode($data);
    }

    public function adduser()
    {
        $data['judul'] = 'Add User';

        $this->load->view('opd/header', $data);
        $this->load->view('opd/adduser');
        $this->load->view('opd/footer');
        $this->load->view('opd/end');
    }
}
