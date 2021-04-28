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
}
