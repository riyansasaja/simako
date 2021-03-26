<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelOpd extends CI_Model
{
    public function tambah()
    {

        $data = [
            'id_tk' => '',
            'program' => $this->input->post('program', true),
            'outcome' => '',
            'kegiatan' => $this->input->post('program', true),
            'output' => '',
            'tujuan' => '',
            'id_sk' => $this->input->post('sifat_kegiatan', true),
            'kode_unor' => $this->input->post('unor_tujuan', true),
            'is_idev' => 1

        ];
        $hasil = $this->db->insert('tb_tujuan_kegiatan', $data);
        return $hasil;
    }

    public function tambahriwayat()
    {
        $data = [
            'id' => '',
            'kondisi' => $this->input->post('kondisi', true),
            'kriteria' => $this->input->post('kriteria', true),
            'sebab_uraian' => $this->input->post('sebab_uraian', true),
            'akibat' => $this->input->post('akibat', true),
            'saran' => $this->input->post('saran', true),
            'sumber_data' => $this->input->post('sumber_data', true),
            'pernyataan_resiko' => $this->input->post('pernyataan_resiko', true),
            'sebab' => $this->input->post('sebab', true),
            'dampak' => $this->input->post('dampak', true),
            'tindak_lanjut' => $this->input->post('tindak_lanjut', true)
        ];
        return $this->db->insert('tb_riwayat_resiko', $data);
    }
}
