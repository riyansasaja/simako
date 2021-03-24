<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inspektorat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Input Ref. Resiko';
        $data['sifatkegiatan'] = $this->db->get('ref_sifat_kegiatan')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('inspektorat/inputref');
        $this->load->view('templates/footer');
        $this->load->view('inspektorat/endinputref');
    }

    public function getData()
    {
        $data =  $this->db->get('refrr')->result();
        $json = [
            'data' => $data
        ];
        echo json_encode($json);
    }

    public function deleteData()
    {
        $id = $this->input->post('id');
        $result = $this->db->delete('refrr', ['id_refrr' => $id]);
        echo json_encode($result);
    }

    public function addData()
    {
        $data = [
            'id_refrr' => '',
            'id_Sk' => $this->input->post('sifat_kegiatan', true),
            'resiko' => $this->input->post('resiko', true),
            'sebab' => $this->input->post('sebab', true),
            'dampak' => $this->input->post('dampak', true),

        ];

        $proses = $this->db->insert('refrr', $data);
        $json = [
            'status' => 'success',
            'data' => $proses
        ];
        echo json_encode($json);
    }

    public function addSK()
    {
        $jenisSK = strtoupper($this->input->post('sifat_kegiatan'));
        $data = [
            'id_sk' => '',
            'sifat_kegiatan' => $jenisSK
        ];
        $proses = $this->db->insert('ref_sifat_kegiatan', $data);
        redirect('inspektorat');
    }
}
