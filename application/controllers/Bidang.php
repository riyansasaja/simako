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

    public function input()
    {

        $id = $this->session->userdata('id');
        $data['programs'] = $this->db->get_where('tb_tujuan_kegiatan', ['kode_unor' => $id])->result_array();



        $data['title'] = 'Input Analisis Resiko';
        $data['js'] = 'bidanginput.js';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('bidang/input');
        $this->load->view('templates/footer', $data);
    }

    public function list()
    {
        $data['title'] = 'List Analisis Resiko';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('bidang/input');
        $this->load->view('templates/footer');
    }

    public function inputform()
    {
        // ambe input
        $skor_kemungkinan = $this->input->post('skor_kemungkinan');
        $skor_dampak = $this->input->post('skor_dampak');
        $skor_resiko = $skor_kemungkinan * $skor_dampak;
        $todb = [
            'id_idev' => null,
            'id_user' => $this->session->userdata('id'),
            'id_atasan' => $this->session->userdata('id_atasan'),
            'id_tk' => $this->input->post('program'),
            'id_refrr' => $this->input->post('resiko'),
            'skor_kemungkinan' => $skor_kemungkinan,
            'skor_dampak' => $skor_dampak,
            'skor_resiko' => $skor_resiko

        ];
        $this->db->insert('idev', $todb);
        redirect('bidang');
    }

    public function autofill()
    {
        $id_refrr = $this->input->post('id_refrr');;
        $cari = $this->db->get_where('refrr', ['id_refrr' => $id_refrr])->result();
        echo json_encode($cari);
    }

    public function cari_refrr()
    {
        $id_tk = $this->input->post('id_tk');
        $ambe_id_sk = $this->db->get_where('tb_tujuan_kegiatan', ['id_tk' => $id_tk])->result_array();
        $id_sk = $ambe_id_sk[0]['id_sk'];
        $cari = $this->db->get_where('refrr', ['id_sk' => $id_sk])->result();
        echo json_encode($cari);
    }
    public function tess()
    {
        $id_tk = 1;
        $ambe_id_sk = $this->db->get_where('tb_tujuan_kegiatan', ['id_tk' => $id_tk])->result_array();
        $id_sk = $ambe_id_sk[0]['id_sk'];
        var_dump($id_sk);
    }
}
