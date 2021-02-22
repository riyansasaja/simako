<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelBidang extends CI_Model
{

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
        return $this->db->get_where('refrr', ['id_sk' => $id_sk])->result();
    }
}
