<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelDashboard extends CI_Model
{
    public function getDataById($id)
    {
        return $this->db->get_where('totalskor', ['id' => $id])->result();
    }

    public function getDataByAtasan($id)
    {
        return $this->db->get_where('totalskor', ['id_atasan' => $id])->result();
    }

    public function countRiskById($id)
    {
        $query = "SELECT * FROM totalskor WHERE totalskor >12";
        return $this->db->query($query)->num_rows();
    }

    public function countRiskByAtasan($id)
    {
        $query = "SELECT * FROM totalskor WHERE totalskor >12";
        return $this->db->query($query)->num_rows();
    }
}
