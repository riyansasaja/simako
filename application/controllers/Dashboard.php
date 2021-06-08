<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelDashboard', 'dashboard');
        is_logged_in();
    }

    //dashboard
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
    //--- dashboard end

    //monitoring
    public function monitoring()
    {
        $data['title'] = 'Monitoring';
        $data['js'] = 'monitoring.js';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/monitoring');
        $this->load->view('templates/footer', $data);
    }

    //Monitoring
    public function get_monitoring_inputan_program()
    {
        $this->db->select('*');
        $this->db->from('tb_tujuan_kegiatan');
        $this->db->join('user', 'tb_tujuan_kegiatan.id_user = user.id');
        $data['data'] =  $this->db->get()->result();
        echo json_encode($data);
    }
    public function get_monitoring_inputan_risiko()
    {
        $this->db->select('*');
        $this->db->from('tb_idev');
        $this->db->join('tb_tujuan_kegiatan', 'tb_idev.id_tk = tb_tujuan_kegiatan.id_tk');
        $this->db->join('user', 'tb_idev.id_atasan = user.id');
        $data['data'] =  $this->db->get()->result();
        echo json_encode($data);
    }
    public function get_monitoring_inputan_rtp()
    {
        $this->db->select('*');
        $this->db->from('tb_idev');
        $this->db->join('tb_rtp', 'tb_idev.id_idev = tb_rtp.id_idev');
        $this->db->join('user', 'tb_idev.id_atasan = user.id');
        $data['data'] =  $this->db->get()->result();
        echo json_encode($data);
    }
    //----
}
