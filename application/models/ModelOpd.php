<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelOpd extends CI_Model
{
    public function tambah()
    {

        $data = [
            'tujuan_pd' => $this->input->post('tujuan_pd', true),
            'sasaran_pd' => $this->input->post('sasaran_pd', true),
            'program' => $this->input->post('program', true),
            'kegiatan' => $this->input->post('kegiatan', true),
            'output_kegiatan' => $this->input->post('output_kegiatan', true),
            'tujuan_kegiatan' => $this->input->post('tujuan_kegiatan', true),
            'sifat_kegiatan' => $this->input->post('sifat_kegiatan', true),
            'kode_unor' => $this->input->post('unor_tujuan', true),
            'is_idev' => 1

        ];



        $hasil = $this->db->insert('tujuankegiatan', $data);
        return $hasil;
    }
}
