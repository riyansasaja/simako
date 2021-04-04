<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('modeldashboard', 'dashboard');
        is_logged_in();
    }

    public function index()
    {

        $data['title'] = 'Dashboard';
        $data['js'] = 'dashboard.js';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index');
        $this->load->view('templates/footer', $data);
    }

    public function getDashboard()
    {

        $role_id = $this->session->role_id;
        $id = $this->session->id;

        if ($role_id == 3) {
            # jika Usernya Bidang
            $data = $this->dashboard->getDataById($id);
            $highrisk = $this->dashboard->countRiskById($id);
        } else if ($role_id == 2) {
            # Jika User OPD
            $data = $this->dashboard->getDataByAtasan($id);
            $highrisk = $this->dashboard->countRiskByAtasan($id);
        } else {
            #jika user asda atau Inspektorat
            $data = $this->db->get('v_totalskor')->result();
            $highrisk = $this->dashboard->countRiskAll();
        }

        $json = [
            'data' => $data,
            'highrisk' => $highrisk,
            'totalrisk' => count($data)
        ];

        echo json_encode($json);
    }
}
