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
            $data['title'] = 'Input Riwayat Risiko';
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
        $id_user = $this->session->userdata('id');
        $data['title'] = 'List Riwayat Risiko';
        $data['listriwayat'] = $this->db->get_where('tb_riwayat_resiko', ['id_user' => $id_user])->result_array();
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
        $data['program'] = $this->db->get_where('tb_program', ['id_user' => $id])->result_array();
        $data['js'] = 'inputprogram.js';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('opd/inputprogram', $data);
        $this->load->view('templates/footer', $data);
    }

    public function inputoutcome()
    {
        $id = $this->session->userdata('id');
        $data['title'] = 'Input Realisasi Outcome';
        $data['program'] = $this->db->get_where('tb_program', ['id_user' => $id])->result_array();
        $data['real_program'] = $this->ModelOpd->get_realprogram($id);
        $data['js'] = 'inputrealisasioutcome.js';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('opd/inputrealoutcome', $data);
        $this->load->view('templates/footer', $data);
    }

    public function addProgram()
    {
        $id_user = $this->session->userdata('id');
        $data = $this->ModelOpd->tambahProgram($id_user);
        echo json_encode($data);
    }

    public function getprogram()
    {
        $id_user = $this->session->userdata('id');
        $data = $this->db->get_where('tb_program', ['id_user' => $id_user])->result();
        $json = [
            'data' => $data
        ];
        echo json_encode($json);
    }

    public function getoutcomprog()
    {
        $nama_program = $this->input->post('nama_program');
        $data = $this->db->get_where('tb_program', ['nama_program' => $nama_program])->result();

        echo json_encode($data);
    }

    public function updateprogram()
    {
        $data = $this->ModelOpd->updateProgram();
        echo json_encode($data);
    }

    public function deleteProgram()
    {
        $id = $this->input->post('id');
        $result = $this->db->delete('tb_program', ['id' => $id]);
        echo json_encode($result);
    }


    public function addrealisasiprogram()
    {
        $data = [
            'id' => '',
            'id_program' => $this->input->post('id_program'),
            'real_outcome' => $this->input->post('realisasi_outcome'),

        ];
        $this->db->insert('tb_realisasi_program', $data);
        redirect('opd/inputoutcome');
    }

    // ====================================================================

    public function getkegiatan()
    {
        $id_user = $this->session->userdata('id');
        // $data = $this->db->get_where('tb_tujuan_kegiatan', ['id_user' => $id_user])->result();
        $data = $this->db->get_where('tb_tujuan_kegiatan', ['id_user' => $id_user])->result();
        $json = [
            'data' => $data
        ];
        echo json_encode($json);
    }

    public function addKegiatan()
    {
        $id_user = $this->session->userdata('id');
        $data = $this->ModelOpd->tambah($id_user);
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
