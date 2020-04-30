<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctor_admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('patient_model');
        $this->load->library('upload');
        $this->load->library('pdf');
        $language = $this->db->get('settings')->row()->language;
        $this->lang->load('system_syntax', $language);
        $this->load->model('doctor_model');
        $this->load->model('settings_model');
        $this->load->model('ion_auth_model');
    }

    public function index() {
        $NowDate = date('Y-m-d', time());
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['admit_parients'] = $this->doctor_model->getAdmitPatients();
        $data['today_app'] = $this->doctor_model->getTodayApp($NowDate);
        $data['patients'] = $this->patient_model->getPatient();
        $data['settings'] = $this->settings_model->getSettings();
        $data['beds'] = $this->patient_model->getbed();



        $data['site_set'] = $this->settings_model->getSettings();
            
        $this->load->view('head', $data);
        $this->load->view('doctor_admin/doctor_header', $data);
        $this->load->view('doctor_admin/doctor_admit_patients', $data);
        $this->load->view('doctor_admin/doctor_footer', $data);       
        $this->load->view('foot');
    }


}