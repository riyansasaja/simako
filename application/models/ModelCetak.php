<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelCetak extends CI_Model
{
    function getTkbyid($id)
    {
        $query = "SELECT tb_tujuan_kegiatan.*, user.name FROM tb_tujuan_kegiatan JOIN user ON tb_tujuan_kegiatan.id_user = user.id WHERE user.id = $id";

        return $this->db->query($query)->result_array();
    }

    function getTkbykodeunor($kodeunor)
    {
        $query = "SELECT tb_tujuan_kegiatan.*, user.name FROM tb_tujuan_kegiatan JOIN user ON tb_tujuan_kegiatan.kode_unor = user.id WHERE user.id = $kodeunor";

        return $this->db->query($query)->result_array();
    }
    function getTkall()
    {
        $query = "SELECT tb_tujuan_kegiatan.*, user.name FROM tb_tujuan_kegiatan JOIN user ON tb_tujuan_kegiatan.id_user = user.id";
        return $this->db->query($query)->result_array();
    }

    function getRtpbyid($id)
    {

        $query = "SELECT tb_rtp.*, v_highrisk.program, v_highrisk.kegiatan, v_highrisk.resiko, user.name FROM tb_rtp JOIN v_highrisk ON tb_rtp.id_idev = v_highrisk.id_idev JOIN user ON v_highrisk.id_user = user.id WHERE v_highrisk.id_atasan = $id";

        return $this->db->query($query)->result_array();
    }

    function getRtpbykodeunor($kodeunor)
    {
        $query = "SELECT tb_rtp.*, v_highrisk.program, v_highrisk.kegiatan, v_highrisk.resiko, user.name FROM tb_rtp JOIN v_highrisk ON tb_rtp.id_idev = v_highrisk.id_idev JOIN user ON v_highrisk.id_user = user.id WHERE v_highrisk.id_user = $kodeunor";

        return $this->db->query($query)->result_array();
    }

    function getRtpall()
    {
        $query = "SELECT tb_rtp.*, v_highrisk.program, v_highrisk.kegiatan, v_highrisk.resiko, user.name FROM tb_rtp JOIN v_highrisk ON tb_rtp.id_idev = v_highrisk.id_idev JOIN user ON v_highrisk.id_atasan = user.id";

        return $this->db->query($query)->result_array();
    }

    //historis
    function gethistorisbyid($id)
    {

        $query = "SELECT tb_riwayat_resiko.*, user.name FROM tb_riwayat_resiko JOIN user ON tb_riwayat_resiko.id_user = user.id WHERE tb_riwayat_resiko.id_user = $id";

        return $this->db->query($query)->result_array();
    }

    function gethistorisall()
    {

        $query = "SELECT tb_riwayat_resiko.*, user.name FROM tb_riwayat_resiko JOIN user ON tb_riwayat_resiko.id_user = user.id";

        return $this->db->query($query)->result_array();
    }
    //--

    //idev
    function getidevbyid($id)
    {
        $query = "SELECT tb_idev.*, tb_tujuan_kegiatan.program,tb_tujuan_kegiatan.kegiatan, user.name FROM tb_idev JOIN tb_tujuan_kegiatan ON tb_idev.id_tk = tb_tujuan_kegiatan.id_tk JOIN user ON tb_idev.id_user = user.id WHERE tb_idev.id_atasan = $id";
        return $this->db->query($query)->result_array();
    }
    function getidevbyunor($id)
    {
        $query = "SELECT tb_idev.*, tb_tujuan_kegiatan.program,tb_tujuan_kegiatan.kegiatan, user.name FROM tb_idev JOIN tb_tujuan_kegiatan ON tb_idev.id_tk = tb_tujuan_kegiatan.id_tk JOIN user ON tb_idev.id_user = user.id WHERE tb_idev.id_user = $id";
        return $this->db->query($query)->result_array();
    }

    //---

    //realisasi
    public function get_realisasi_risiko($id)
    {
        $this->db->select('*');
        $this->db->from('tb_idev');
        $this->db->where('tb_idev.id_user', $id);
        $this->db->join('tb_tujuan_kegiatan', 'tb_idev.id_tk = tb_tujuan_kegiatan.id_tk');
        return $this->db->get()->result_array();
    }

    public function get_realisasi_rtp($id)
    {
        $this->db->select('*');
        $this->db->from('tb_idev');
        $this->db->where('tb_idev.id_user', $id);
        $this->db->join('tb_rtp', 'tb_idev.id_idev = tb_rtp.id_idev');
        return $this->db->get()->result_array();
    }
    //---

}
