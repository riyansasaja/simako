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
        $data['title'] = 'Input Analisis Resiko';
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
        $data['title'] = 'Analisis Resiko';
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
    public function inputrealisasi($id_idev)
    {
        //load library
        $this->load->library('form_validation');

        //form validation rules
        $this->form_validation->set_rules('uraian', 'Uraian', 'required');

        //form validation check
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Input Realisasi';
            $data['resiko'] = $this->ModelBidang->getrtp($id_idev);
            $data['rtp'] = $this->ModelBidang->get_rtp($id_idev);
            $data['realisasi'] = $this->ModelBidang->get_realisasi($id_idev);
            $data['js'] = 'inputrealisasi.js';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('bidang/input_realisasi');
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'id_realisasi' => '',
                'id_idev' => $this->input->post('id_idev'),
                'kejadian' => $this->input->post('kejadian'),
                'uraian' => $this->input->post('uraian'),
                'waktu' => $this->input->post('waktu'),
                'pj' => $this->input->post('pj')
            ];
            //input ke database
            $this->db->insert('tb_realisasi', $data);
            header("Refresh:0");
        }
    }

    public function delrealisasi($id_idev, $id_realisasi)
    {
        $this->db->delete('tb_realisasi', ['id_realisasi' => $id_realisasi]);
        redirect('bidang/inputrealisasi/' . $id_idev . '/');
    }
}
