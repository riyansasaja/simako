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
            $data['js'] = '';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('opd/riwayat');
            $this->load->view('templates/footer', $data);
        } else {

            $cek =  $this->ModelOpd->tambahriwayat();
            if ($cek) {
                $this->session->set_flashdata('message', 'Data berhasil diinput!');
                redirect('opd/listriwayat');
            } else {
                redirect('opd/riwayat');
            }
        }
    }

    public function get_listriwayat()
    {
        $id_user = $this->session->userdata('id');
        $data['data'] = $this->db->get_where('tb_riwayat_resiko', ['id_user' => $id_user])->result_array();
        echo json_encode($data);
    }

    public function listriwayat()
    {

        $data['title'] = 'List Riwayat Risiko';
        $data['js'] = 'inputlistriwayat.js';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('opd/listriwayat');
        $this->load->view('templates/footer', $data);
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

    public function realisasioutcome()
    {
        $id = $this->session->userdata('id');
        $data['title'] = 'Input Realisasi Outcome';
        $data['js'] = 'inputrealisasioutcome.js';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('opd/inputrealoutcome');
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
        $id = $this->input->post('id_program');
        $data = [
            'realisasi_outcome_program' => $this->input->post('realisasi_outcome'),
            'realisasi' => 1

        ];
        $this->db->where('id', $id);
        $this->db->update('tb_program', $data);
        redirect('opd/realisasioutcome');
    }

    public function get_realisasi_program()
    {
        $id_user = $this->session->userdata('id');
        $data = $this->db->get_where('tb_program', ['id_user' => $id_user, 'realisasi' => 1])->result();
        $json = [
            'data' => $data
        ];
        echo json_encode($json);
    }

    public function deleterealisasiprogram()
    {
        $id = $this->input->post('id');
        $data = [
            'realisasi_outcome_program' => null,
            'realisasi' => null

        ];
        $this->db->where('id', $id);
        $jadi = $this->db->update('tb_program', $data);
        echo json_encode($jadi);
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

    //edit list riwayat
    public function editlistriwayat($id)
    {

        $this->form_validation->set_rules('id', 'ID', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Riwayat Risiko';
            $data['js'] = 'editlistriwayat.js';
            $data['data'] = $this->db->get_where('tb_riwayat_resiko', ['id' => $id])->result_object();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('opd/editriwayat');
            $this->load->view('templates/footer', $data);
        } else {
            $cek =  $this->ModelOpd->updateriwayat($id);
            if ($cek) {
                $this->session->set_flashdata('message', 'Data berhasil diupdate!');
                redirect('opd/listriwayat');
            } else {
                $this->session->set_flashdata('message', 'Maaf Silahkan diupdate lagi!');
                redirect('opd/editlistriwayat/' . $id);
            }
        }
    }


    public function delete_listriwayat()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('tb_riwayat_resiko');
    }
}
