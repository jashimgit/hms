<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usg extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('Ciqrcode');
        $this->load->library('form_validation');
        $this->load->model('ion_auth_model');
        $this->load->library('upload');
        //  $this->load->library('Pdf');
        $language = $this->db->get('settings')->row()->language;
        $this->lang->load('system_syntax', $language);
        $this->load->model('settings_model');
        $this->load->model('doctor_model');
        $this->load->model('patient_model');
        $this->load->model('usg_model');


        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }
    }

    function index()
    {
        $loginId = $this->ion_auth->user()->row()->emp_id;
        $data['user_P'] = $this->settings_model->get_log_user($loginId);
        $data['lab_ptn'] = $this->usg_model->getLab_ptn();
        $data['dr_Inf'] = $this->doctor_model->getDoctorThis();

        $this->load->view('head', $data);
        $this->load->view('home/admin_head', $data);
        $this->load->view('home/admin_dashboard', $data);
        $this->load->view('home/admin_foot', $data);
        $this->load->view('foot');
    }

    function normal_test()
    {
        $loginId = $this->ion_auth->user()->row()->emp_id;
        $data['user_P'] = $this->settings_model->get_log_user($loginId);
        $data['usg_test'] = $this->usg_model->getTestreport();

        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('usg/test_repo');
        $this->load->view('home/footer'); // just the header file
    }

    function getReportSample()
    {
        $inv_repo_id = $this->input->get('id');
        $data = $this->usg_model->getTestreportbyID($inv_repo_id);
        echo json_encode($data);
    }

    function testRepor()
    {
        $ptn_id         = $this->input->post('lab_ptn_id');
        $testID         = $this->input->post('testID');
        $reportsample   = $this->input->post('ptn_report');
        $repoDR         = $this->input->post('repo_dr_id');
        $times          = time();
        $date           = date('Y-m-d', time());
        $user           = $this->ion_auth->user()->row()->emp_id;


        $a_data = array(
            'lab_ptn_idss'          => $ptn_id,
            'lab_tst_iidds'         => $testID,
            'ptn_report_final'      => $reportsample,
            'repo_entry_userss'     => $user,
            'repo_entry_time'       => $times,
            'report_dr_id'          => $repoDR,
            'repodatesss'           => $date
        );
        $this->usg_model->addNewReport($a_data);


        $this->session->set_flashdata('feedback', 'Report Entry Successfull');
        redirect('usg');
    }

    function print_repo()
    {
        $loginId = $this->ion_auth->user()->row()->emp_id;
        $data['user_P'] = $this->settings_model->get_log_user($loginId);
        $data['lab_ptn'] = $this->usg_model->getLab_ptn();
        $data['dr_Inf'] = $this->doctor_model->getDoctorThis();

        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('usg/repo_view', $data);
        $this->load->view('home/footer'); // just the header file        
    }

    function editReport_sample()
    {
        $inv_repo_id = $this->input->post('id');
        $inv_repo_full = $this->input->post('description');

        $data = array(
            'test_normal_repo' => $inv_repo_full
        );
        $this->usg_model->edit_tst_report($inv_repo_id, $data);
        redirect('usg/normal_test');
    }

    function getptnRepo()
    {
        $ptn_id = $this->input->get('ptn_id');
        $tst_id = $this->input->get('tst_id');
        $data = $this->usg_model->getReport_ptnTst($ptn_id, $tst_id);
        echo json_encode($data);
    }

    function ptn_tst_infobyid()
    {
        $ptnid = $this->input->get('id');
        $data = $this->usg_model->getptn_tst_all_info($ptnid);
        echo json_encode($data);
    }

    function testNormalReport()
    {
        $tstId = $this->input->get('id');
        $data = $this->usg_model->getTestNRepot($tstId);
        echo json_encode($data);
    }

    function print_rep()
    {
        $ptn_idd = $this->input->get('ptn_idd');
        $tstID = $this->input->get('tstID');
        $data['all_Info'] = $this->usg_model->getTstRepot($ptn_idd, $tstID);
        $data['ptn_info'] = $this->usg_model->getptn_Info($ptn_idd);
        $this->load->view('usg/repo_print', $data);
    }
}
