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

    public function getrtp($id_idev)
    {
        return $this->db->get_where('v_highrisk', ['id_idev' => $id_idev])->result_array();
    }

    public function m_savertp()
    {
        $data = [
            'id_rtp' => '',
            'id_idev' => $this->input->post('id_idev'),
            'uraian_pengendalian' => $this->input->post('uraian_pengendalian'),
            'hasil_evaluasi' => $this->input->post('hasil_evaluasi'),
            'uraian_rtp' => $this->input->post('uraian_rtp'),
            'target_waktu' => $this->input->post('target_waktu'),
            'pj' => $this->input->post('pj'),
            'keterangan' => $this->input->post('keterangan')
        ];

        return $this->db->insert('tb_rtp', $data);
    }

    public function m_editrtp()
    {
        $id_rtp = $this->input->post('id_rtp');
        $data = [
            'uraian_pengendalian' => $this->input->post('uraian_pengendalian'),
            'hasil_evaluasi' => $this->input->post('hasil_evaluasi'),
            'uraian_rtp' => $this->input->post('uraian_rtp'),
            'target_waktu' => $this->input->post('target_waktu'),
            'pj' => $this->input->post('pj'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->where('id_rtp', $id_rtp);
        return $this->db->update('tb_rtp', $data);
    }


    public function get_rtp($id_idev)
    {
        return $this->db->get_where('tb_rtp', ['id_idev' => $id_idev])->result_array();
    }

    public function get_realisasi($id_idev)
    {
        return $this->db->get_where('tb_realisasi', ['id_idev' => $id_idev])->result_array();
    }
    public function get_all_idev($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_idev');
        $this->db->where('tb_idev.id_user', $id_user);
        $this->db->join('tb_tujuan_kegiatan', 'tb_idev.id_tk = tb_tujuan_kegiatan.id_tk');
        return $this->db->get()->result();
    }
    public function get_all_idev_realisasi($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_idev');
        $this->db->where('tb_idev.id_user', $id_user);
        $this->db->where('tb_idev.realisasi_idev', 1);
        $this->db->join('tb_tujuan_kegiatan', 'tb_idev.id_tk = tb_tujuan_kegiatan.id_tk');
        return $this->db->get()->result();
    }

    public function get_all_rtp($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_idev');
        $this->db->where('tb_idev.id_user', $id_user);
        $this->db->join('tb_rtp', 'tb_idev.id_idev = tb_rtp.id_idev');
        return $this->db->get()->result();
    }

    public function get_all_realisasi_rtp($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_idev');
        $this->db->where('tb_idev.id_user', $id_user);
        $this->db->where('tb_rtp.is_realisasi', 1);
        $this->db->join('tb_rtp', 'tb_idev.id_idev = tb_rtp.id_idev');
        return $this->db->get()->result();
    }
}
