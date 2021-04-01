<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelDashboard extends CI_Model
{
    public function getDataById($id)
    {
        return $this->db->get_where('v_totalskor', ['id_user' => $id])->result();
    }

    public function getDataByAtasan($id)
    {
        return $this->db->get_where('v_totalskor', ['id_atasan' => $id])->result();
    }

    public function countRiskById($id)
    {
        $query = "SELECT * FROM v_totalskor WHERE id_user = $id AND nilai_reskeg > 4";
        return $this->db->query($query)->num_rows();
    }

    public function countRiskByAtasan($id)
    {
        $query = "SELECT * FROM v_totalskor WHERE id_atasan = $id AND nilai_reskeg > 4";
        return $this->db->query($query)->num_rows();
    }
    public function countRiskAll()
    {
        $query = "SELECT * FROM v_totalskor WHERE nilai_reskeg > 4";
        return $this->db->query($query)->num_rows();
    }
}
