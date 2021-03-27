<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('ModelOpd');
    }

    public function riwayat()
    {

        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $data['title'] = 'Input Riwayat Resiko';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('opd/riwayat');
            $this->load->view('templates/footer');
        } else {

            $cek =  $this->ModelOpd->tambahriwayat();
            if ($cek) {
                redirect('opd/listriwayat');
            } else {
                redirect('opd/riwayat');
            }
        }
    }

    public function listriwayat()
    {
        $data['title'] = 'List Riwayat Resiko';
        $data['listriwayat'] = $this->db->get('tb_riwayat_resiko')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('opd/listriwayat');
        $this->load->view('templates/footer');
    }


    public function inputprogram()
    {
        $id = $this->session->userdata('id');
        $data['title'] = 'Input Program';
        $data['bidang'] = $this->db->get_where('user', ['id_atasan' => $id])->result_array();
        $data['sifat_kegiatan'] = $this->db->get('tb_ref_sifat_kegiatan')->result_array();
        $data['js'] = 'inputprogram.js';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('opd/inputprogram', $data);
        $this->load->view('templates/footer', $data);
    }


    public function getkegiatan()
    {
        $data = $this->db->get('tb_tujuan_kegiatan')->result();
        $json = [
            'data' => $data
        ];
        echo json_encode($json);
    }

    public function addKegiatan()
    {
        $data = $this->ModelOpd->tambah();
        echo json_encode($data);
    }

    public function deleteKegiatan()
    {
        $id = $this->input->post('id');
        $result = $this->db->delete('tb_tujuan_kegiatan', ['id_tk' => $id]);
        echo json_encode($result);
    }

    public function updateKegiatan()
    {
        $data = $this->ModelOpd->update();
        echo json_encode($data);
    }
}
