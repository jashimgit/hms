<?php 

	/*
	 * 
	 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Front_view extends CI_Controller {
	
	function __construct() {
    	parent::__construct();
        $this->load->model('doctor_model');
        $this->load->model('settings_model');
        $this->load->model('department_model');
	}

	function index() {
        $data['site_set'] = $this->settings_model->getSettings();
        $data['get_dept'] = $this->department_model->getDepartment();

        $this->load->view('head', $data);
        $this->load->view('front_view/front_header', $data);
        $this->load->view('front_view/front_home', $data);
        $this->load->view('front_view/front_footer', $data);
        $this->load->view('foot');  
	}

    function log_in() {        
        $data['site_set'] = $this->settings_model->getSettings();

        $this->load->view('head', $data);
        $this->load->view('front_view/front_header', $data);
        $this->load->view('front_view/login_page', $data);
        $this->load->view('front_view/front_footer', $data);
        $this->load->view('foot');  
    }

	function doctor_list() {		
        $data['site_set'] = $this->settings_model->getSettings();
        $data['get_doctor'] = $this->doctor_model->getDoctorThis();
        $data['get_dept'] = $this->department_model->getDepartment();
        $this->load->view('front_view/head', $data); 
        $this->load->view('front_view/doctors_list', $data);   
        $this->load->view('front_view/footer', $data); 
	} 

    function doctor_profile() {
        $id = $this->input->get('id');
        $data['site_set'] = $this->settings_model->getSettings();
        $data['dr_info'] = $this->doctor_model->getDoctorById($id);
        $data['dr_time'] = $this->doctor_model->getDoctorTime($id);
        $data['dr_spcl'] = $this->doctor_model->getDoctorOthInfoS($id);
        $this->load->view('front_view/doctors_detail', $data);   
        $this->load->view('front_view/footer', $data);         
    }

























	}
