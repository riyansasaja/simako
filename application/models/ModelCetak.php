<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelCetak extends CI_Model
{
    function getTkbyid($id)
    {
        $query = "SELECT tb_tujuan_kegiatan.*, user.name FROM tb_tujuan_kegiatan JOIN user ON tb_tujuan_kegiatan.id_user = user.id WHERE user.id = $id";

        return $this->db->query($query)->result_array();
    }
}
