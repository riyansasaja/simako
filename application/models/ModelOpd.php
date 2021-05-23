<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelOpd extends CI_Model
{
    public function tambah($id_user)
    {

        $data = [
            'id_tk' => '',
            'id_user' => $id_user,
            'program' => $this->input->post('program', true),
            'outcome' => '',
            'kegiatan' => $this->input->post('kegiatan', true),
            'output' => '',
            'tujuan' => '',
            'id_sk' => $this->input->post('sifat_kegiatan', true),
            'kode_unor' => $this->input->post('unor_tujuan', true),
            'is_idev' => 1

        ];
        $hasil = $this->db->insert('tb_tujuan_kegiatan', $data);
        return $hasil;
    }
    public function tambahProgram($id_user)
    {

        $data = [
            'id' => '',
            'nama_program' => $this->input->post('program', true),
            'outcome_program' => $this->input->post('outcome', true),
            'id_user' => $id_user

        ];
        $hasil = $this->db->insert('tb_program', $data);
        return $hasil;
    }

    public function update()
    {
        $id = $this->input->post('id_tk');
        $data = [
            'program' => $this->input->post('program', true),
            'outcome' => '',
            'kegiatan' => $this->input->post('kegiatan', true),
            'output' => '',
            'tujuan' => '',
            'id_sk' => $this->input->post('id_sk', true),
            'kode_unor' => $this->input->post('kode_unor', true),
            'is_idev' => 1

        ];
        $this->db->where('id_tk', $id);
        $hasil = $this->db->update('tb_tujuan_kegiatan', $data);
        return $hasil;
    }

    public function tambahriwayat()
    {
        $data = [
            'id' => '',
            'id_user' => $this->input->post('id_user', true),
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
