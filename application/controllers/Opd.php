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

    public function riwayat()
    {
        $data['title'] = 'Input Riwayat Resiko';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('opd/riwayat');
        $this->load->view('templates/footer');
    }

    public function listriwayat()
    {
        $data['title'] = 'Lihat Riwayat Resiko';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('opd/listriwayat');
        $this->load->view('templates/footer');
        $this->load->view('opd/endlistriwayat');
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
}
