<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelBidang extends CI_Model
{


    public function getlist($id)
    {
        $where = [
            "kode_unor" => $id,
            "is_idev" => 2
        ];

        $this->db->where($where);
        return $this->db->get('tb_tujuan_kegiatan')->result_array();
    }

    public function getprogrambyid($id_tk)
    {
        $this->db->select('id_tk, program, kegiatan, id_sk');
        return $this->db->get_where('tb_tujuan_kegiatan', ['id_tk' => $id_tk])->result_array();
    }

    public function getrefrisk($id_tk)
    {

        $cari = $this->getprogrambyid($id_tk);
        $id_sk = $cari[0]['id_sk'];
        return $this->db->get_where('tb_ref_resiko', ['id_sk' => $id_sk])->result_array();
    }

    public function m_saveidev($id_user, $id_atasan)
    {
        $data = [
            'id_idev' => '',
            'id_user' => $id_user,
            'id_atasan' => $id_atasan,
            'id_tk' => $this->input->post('id_tk'),
            'resiko' => $this->input->post('resiko'),
            'sebab' => $this->input->post('sebab'),
            'dampak' => $this->input->post('dampak'),
            'n_kemungkinan' => $this->input->post('n_kemungkinan'),
            'n_dampak' => $this->input->post('n_dampak'),
            'n_resiko' => $this->input->post('n_resiko')
        ];

        return $this->db->insert('tb_idev', $data);
    }

    // ini yang mo hapus




    public function getNilaiProgram($id)
    {
        // // $this->db->join('idev', 'tujuankegiatan.id_tk = idev.id_tk', 'left');
        // // return $this->db->get_where('tujuankegiatan', ['kode_unor' => $id])->result_array();
        // $query = 'SELECT tujuankegiatan.id_tk, tujuankegiatan.program, tujuankegiatan.kegiatan, SUM(idev.skor_resiko) AS totalskor
        // FROM tujuankegiatan LEFT JOIN idev
        // ON tujuankegiatan.id_tk = idev.id_tk
        // WHERE kode_unor = 3
        // GROUP BY tujuankegiatan.id_tk';
        // $hasil = $this->db->query($query);
        // return $hasil->result_array();
        return $this->db->get_where('totalskor', ['id_user' => $id])->result_array();
    }

    public function searchprogram($program, $id_sk)
    {
        $this->db->like('resiko', $program);
        $this->db->limit(10);
        return $this->db->get_where('tb_ref_resiko', ['id_sk' => $id_sk])->result();
    }
}
