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
        $data['js'] = 'inputref.js';
        $data['sifatkegiatan'] = $this->db->get('ref_sifat_kegiatan')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('inspektorat/inputref');
        $this->load->view('templates/footer');
    }

    public function getData()
    {
        $data =  $this->db->get('refrr')->result();
        $json = [
            'data' => $data
        ];
        echo json_encode($json);
    }


    public function getDataById()
    {

        $id = $this->input->post('id');
        $this->db->select('*');
        $this->db->from('refrr');
        $this->db->where('id_refrr', $id);
        $this->db->join('ref_sifat_kegiatan', 'ref_sifat_kegiatan.id_sk=refrr.id_sk');
        $result = $this->db->get()->result();
        echo json_encode($result);
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

    public function updateData()
    {
        $id = $this->input->post('id_refrr');
        $data = [
            'id_sk' => $this->input->post('id_sk'),
            'resiko' => $this->input->post('resiko'),
            'sebab' => $this->input->post('sebab'),
            'dampak' => $this->input->post('dampak'),

        ];
        $this->db->where('id_refrr', $id);
        $proses = $this->db->update('refrr', $data);
        echo json_encode($proses);
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

    public function getSK()
    {
        $data =  $this->db->get('ref_sifat_kegiatan')->result();
        $json = [
            'data' => $data
        ];
        echo json_encode($json);
    }

    //delete SK
    public function deleteSK()
    {
        $id = $this->input->post('id');
        $result = $this->db->delete('ref_sifat_kegiatan', ['id_sk' => $id]);
        echo json_encode($result);
    }
    //------



}
