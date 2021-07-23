<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('ModelBidang');
    }

    public function inpuTK()
    {

        $data['title'] = 'Input Tujuan Kegiatan';
        $data['js'] = 'bidanginput.js';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('bidang/input_tujuan_kegiatan');
        $this->load->view('templates/footer', $data);
    }

    public function geTK()
    {
        $id = $this->session->userdata('id');
        $data['data'] = $this->db->get_where('tb_tujuan_kegiatan', ['kode_unor' => $id])->result();
        echo json_encode($data);
    }

    public function updateTK()
    {
        $id = $this->input->post('id_tk');
        $data = [
            'outcome' => $this->input->post('outcome'),
            'output' => $this->input->post('output'),
            'tujuan' => $this->input->post('tujuan_kegiatan'),
            'is_idev' => 2

        ];
        $this->db->where('id_tk', $id);
        $this->db->set($data);
        $hasil = $this->db->update('tb_tujuan_kegiatan');
        echo json_encode($hasil);
    }

    public function analisrisk()
    {
        $id = $this->session->userdata('id');
        $data['list'] = $this->ModelBidang->getlist($id);
        $data['title'] = 'Input Analisis Risiko';
        $data['js'] = 'analis.js';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('bidang/input_analis');
        $this->load->view('templates/footer', $data);
    }

    public function inputrisk($id_tk)
    {
        $data['list'] = $this->ModelBidang->getprogrambyid($id_tk);
        $data['ref_risk'] = $this->ModelBidang->getrefrisk($id_tk);
        $data['title'] = 'Input Analisis Risiko';
        $data['js'] = 'inputrisk.js';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('bidang/input_risk');
        $this->load->view('templates/footer', $data);
    }

    public function seveidev()
    {
        $id_user = $this->session->userdata('id');
        $id_atasan = $this->session->userdata('id_atasan');
        $data['data'] = $this->ModelBidang->m_saveidev($id_user, $id_atasan);
        echo json_encode($data);
    }

    public function getidev($id_tk)
    {
        $data['data'] = $this->db->get_where('tb_idev', ['id_tk' => $id_tk])->result();
        echo json_encode($data);
    }

    public function del_idev()
    {
        $id_idev = $this->input->post('id_idev');
        $this->db->where('id_idev', $id_idev);
        $data = $this->db->delete('tb_idev');
        echo json_encode($data);
    }

    public function inputrtp($id_idev)
    {
        $data['title'] = 'Input RTP';
        $data['rtp'] = $this->ModelBidang->getrtp($id_idev);
        $data['js'] = 'inputrtp.js';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('bidang/input_rtp');
        $this->load->view('templates/footer', $data);
    }

    public function savertp()
    {
        $data = $this->ModelBidang->m_savertp();
        echo json_encode($data);
    }

    public function edit_rtp()
    {
        $data = $this->ModelBidang->m_editrtp();
        echo json_encode($data);
    }

    public function getinputrtp($id_idev)
    {
        $data['data'] = $this->db->get_where('tb_rtp', ['id_idev' => $id_idev])->result_array();
        echo json_encode($data);
    }

    public function del_rtp()
    {
        $id_rtp = $this->input->post('id_rtp');
        $this->db->where('id_rtp', $id_rtp);
        $data = $this->db->delete('tb_rtp');
        echo json_encode($data);
    }

    //realisasi
    // public function inputrealisasi($id_idev)
    // {
    //     //load library
    //     $this->load->library('form_validation');

    //     //form validation rules
    //     $this->form_validation->set_rules('uraian', 'Uraian', 'required');

    //     //form validation check
    //     if ($this->form_validation->run() == FALSE) {
    //         $data['title'] = 'Input Realisasi';
    //         $data['resiko'] = $this->ModelBidang->getrtp($id_idev);
    //         $data['rtp'] = $this->ModelBidang->get_rtp($id_idev);
    //         $data['realisasi'] = $this->ModelBidang->get_realisasi($id_idev);
    //         $data['js'] = 'inputrealisasi.js';
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar');
    //         $this->load->view('bidang/input_realisasi');
    //         $this->load->view('templates/footer', $data);
    //     } else {
    //         $data = [
    //             'id_realisasi' => '',
    //             'id_idev' => $this->input->post('id_idev'),
    //             'kejadian' => $this->input->post('kejadian'),
    //             'uraian' => $this->input->post('uraian'),
    //             'waktu' => $this->input->post('waktu'),
    //             'pj' => $this->input->post('pj')
    //         ];
    //         //input ke database
    //         $this->db->insert('tb_realisasi', $data);
    //         header("Refresh:0");
    //     }
    // }

    // public function delrealisasi($id_idev, $id_realisasi)
    // {
    //     $this->db->delete('tb_realisasi', ['id_realisasi' => $id_realisasi]);
    //     redirect('bidang/inputrealisasi/' . $id_idev . '/');
    // }

    //realisasi baru

    public function realisasi()
    {
        $data['title'] = 'Input Realisasi';
        $data['js'] = 'inputrealisasi.js';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('bidang/inputRealisasi');
        $this->load->view('templates/footer', $data);
    }


    public function realisasikegiatan()
    {
        $id = $this->session->userdata('id');
        $data['title'] = 'Input Realisasi';
        $data['js'] = 'inputrealisasi.js';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('bidang/realisasikegiatan');
        $this->load->view('templates/footer', $data);
    }

    public function addrealisasikegiatan()
    {
        $id_tk = $this->input->post('id_tk');
        $data = [

            'realisasi_output_kegiatan' => $this->input->post('realisasi_kegiatan'),
            'realisasi_tujuan_kegiatan' => $this->input->post('realisasi_tujuan_kegiatan'),
            'realisasi' => 1
        ];
        $this->db->where('id_tk', $id_tk);
        $this->db->update('tb_tujuan_kegiatan', $data);
        redirect('bidang/realisasikegiatan');
    }

    public function get_realisasi_tk()
    {
        $id = $this->session->userdata('id');
        $data['data'] = $this->db->get_where('tb_tujuan_kegiatan', ['kode_unor' => $id, 'realisasi' => 1])->result_object();
        echo json_encode($data);
    }

    public function delete_realisasi_tk()
    {
        $id_tk = $this->input->post('id_tk');
        $data = [

            'realisasi_output_kegiatan' => null,
            'realisasi_tujuan_kegiatan' => null,
            'realisasi' => null
        ];
        $this->db->where('id_tk', $id_tk);
        $jadi = $this->db->update('tb_tujuan_kegiatan', $data);
        echo json_encode($jadi);
    }

    public function realisasirisiko()
    {
        $id = $this->session->userdata('id');
        $data['title'] = 'Input Realisasi';
        $data['js'] = 'inputrealisasiresiko.js';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('bidang/realisasirisiko');
        $this->load->view('templates/footer', $data);
    }

    public function get_all_idev()
    {
        $id_user = $this->session->userdata('id');
        $data['data'] = $this->ModelBidang->get_all_idev($id_user);
        echo json_encode($data);
    }

    public function get_all_idev_realisasi()
    {
        $id_user = $this->session->userdata('id');
        $data['data'] = $this->ModelBidang->get_all_idev_realisasi($id_user);
        echo json_encode($data);
    }

    public function addrealisasirisiko()
    {
        $id_idev = $this->input->post('id');
        $data = [
            'realisasi_resiko' => $this->input->post('realisasi_risiko'),
            'realisasi_sebab' => $this->input->post('realisasi_sebab'),
            'realisasi_dampak' => $this->input->post('realisasi_dampak'),
            'realisasi_idev' => 1
        ];
        $this->db->where('id_idev', $id_idev);
        $cek = $this->db->update('tb_idev', $data);
        // var_dump($data);
        redirect('bidang/realisasirisiko');
    }

    public function delete_realisasi_risiko()
    {
        $id_idev = $this->input->post('id_idev');
        $data = [
            'realisasi_resiko' => null,
            'realisasi_sebab' => null,
            'realisasi_dampak' => null,
            'realisasi_idev' => null
        ];
        $this->db->where('id_idev', $id_idev);
        $cek = $this->db->update('tb_idev', $data);
        echo json_encode($cek);
    }

    public function realisasirtp()
    {
        $id = $this->session->userdata('id');
        $data['title'] = 'Input Realisasi';
        $data['js'] = 'inputrealisasirtp.js';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('bidang/realisasirtp');
        $this->load->view('templates/footer', $data);
    }

    public function get_all_rtp()
    {
        $id_user = $this->session->userdata('id');
        $data['data'] = $this->ModelBidang->get_all_rtp($id_user);
        echo json_encode($data);
    }

    public function add_realisasi_rtp()
    {
        $id_rtp = $this->input->post('id_rtp');
        $data = [
            'realisasi_uraian' => $this->input->post('realisasi_uraian_rtp'),
            'realisasi_target_waktu' => $this->input->post('realisasi_target_waktu'),
            'realisasi_pj' => $this->input->post('realisasi_pj'),
            'is_realisasi' => 1
        ];

        $this->db->where('id_rtp', $id_rtp);
        $cek = $this->db->update('tb_rtp', $data);
        redirect('bidang/realisasirtp');
    }

    public function get_all_realisasi_rtp()
    {
        $id_user = $this->session->userdata('id');
        $data['data'] = $this->ModelBidang->get_all_realisasi_rtp($id_user);
        echo json_encode($data);
    }

    public function delete_realisasi_rtp()
    {
        $id_rtp = $this->input->post('id_rtp');
        $data = [
            'realisasi_uraian' => null,
            'realisasi_target_waktu' => null,
            'realisasi_pj' => null,
            'is_realisasi' => null
        ];
        $this->db->where('id_rtp', $id_rtp);
        $cek = $this->db->update('tb_rtp', $data);
        echo json_encode($cek);
    }
}
