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

    public function countRiskById_low($id)
    {
        $query = "SELECT * FROM v_totalskor WHERE id_user = $id AND nilai_reskeg <3";
        return $this->db->query($query)->num_rows();
    }
    public function countRiskById_midle($id)
    {
        $query = "SELECT * FROM v_totalskor WHERE id_user = $id AND nilai_reskeg > 3 AND nilai_reskeg < 9";
        return $this->db->query($query)->num_rows();
    }
    public function countRiskById_high($id)
    {
        $query = "SELECT * FROM v_totalskor WHERE id_user = $id AND nilai_reskeg > 9";
        return $this->db->query($query)->num_rows();
    }

    public function countRiskByAtasan_low($id)
    {
        $query = "SELECT * FROM v_totalskor WHERE id_atasan = $id AND nilai_reskeg <3";
        return $this->db->query($query)->num_rows();
    }
    public function countRiskByAtasan_midle($id)
    {
        $query = "SELECT * FROM v_totalskor WHERE id_atasan = $id AND nilai_reskeg > 3 AND nilai_reskeg < 9";
        return $this->db->query($query)->num_rows();
    }
    public function countRiskByAtasan_high($id)
    {
        $query = "SELECT * FROM v_totalskor WHERE id_atasan = $id AND nilai_reskeg > 9";
        return $this->db->query($query)->num_rows();
    }
    public function countRiskAll_low()
    {
        $query = "SELECT * FROM v_totalskor WHERE nilai_reskeg < 3";
        return $this->db->query($query)->num_rows();
    }
    public function countRiskAll_midle()
    {
        $query = "SELECT * FROM v_totalskor WHERE nilai_reskeg > 3 AND nilai_reskeg <9 ";
        return $this->db->query($query)->num_rows();
    }
    public function countRiskAll_high()
    {
        $query = "SELECT * FROM v_totalskor WHERE nilai_reskeg >9 ";
        return $this->db->query($query)->num_rows();
    }
}
