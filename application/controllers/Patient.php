<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient extends CI_Controller {

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
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        if (!$this->ion_auth->in_group(array('admin', 'Nurse', 'Accountant', 'Doctor', 'Supervisor'))) {
            redirect('home');
        }
    }

    public function index() {

        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['patients'] = $this->patient_model->getPatient();
        $data['settings'] = $this->settings_model->getSettings();
        $data['beds'] = $this->patient_model->getbed();

        $loginId = $this->ion_auth->user()->row()->auto_emp_a_iid;
        $data['user_P'] = $this->settings_model->get_log_user($loginId); 
        $data['site_set'] = $this->settings_model->getSettings();
            
        $this->load->view('head', $data);
        $this->load->view('home/admin_head', $data);
        $this->load->view('patient/patient_list', $data); 
        $this->load->view('home/admin_foot', $data);       
        $this->load->view('foot');
    }


// Patient Admmission Statement View
    public function admitreport() {
        
        $data['doctors'] = $this->doctor_model->getDoctor();

        $loginId = $this->ion_auth->user()->row()->auto_emp_a_iid;
        $data['user_P'] = $this->settings_model->get_log_user($loginId); 
        $data['site_set'] = $this->settings_model->getSettings();
            
        $this->load->view('head', $data);
        $this->load->view('home/admin_head', $data);
        $this->load->view('patient/report_view', $data); 
        $this->load->view('home/admin_foot', $data);       
        $this->load->view('foot');
    }
// Patient Admmission Statement View


// Patient Full Report Form
    public function reports_P() {

        $p_id = $this->input->get('p_id');
        $data['patient_info'] = $this->patient_model->get_p_full_infobyId($p_id);
        $data['creat_bill'] = $this->patient_model->get_create_bill($p_id);
        $data['ticket'] = $this->patient_model->get_dr_ticket_fee($p_id);
        $data['bill_cumission'] = $this->patient_model->get_bill_cums($p_id);
        $data['receive_bill'] = $this->patient_model->get_receive_bill($p_id);
        $this->load->view('patient/p_history', $data);

        // HTML to PDF
/*        $html = $this->output->get_output();
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();        
        $this->dompdf->stream("Daily_Patient_Report.pdf", array("Attachment"=>0));*/
        //Output Line
    }
// Patient Full Report Form

// Patient Admmission Statement
    public function admit_statement_report() {

        $st_date = date('Y-m-d', strtotime($this->input->get('st_date')));
        $last_date = date('Y-m-d', strtotime($this->input->get('last_date')));
        $data['patient_data'] = $this->patient_model->getfullpatient($st_date, $last_date);
        $data['s_date'] = date('d-M-Y', strtotime($st_date));
        $data['l_date'] = date('d-M-Y', strtotime($last_date));
        $this->load->view('patient/p_report', $data);

        
        // HTML to PDF
        // $html = $this->output->get_output();
        // $this->dompdf->loadHtml($html);
        // $this->dompdf->setPaper('A4', 'portrait');
        // $this->dompdf->render();        
        // $this->dompdf->stream("Patient_Report.pdf", array("Attachment"=>0));
        //Output Line
    }
// Patient Admmission Statement

    public function report_with_doctor() {
        $dr_a_id = $this->input->get('dr_a_id');
        $id = $dr_a_id;
        $data['dr_info'] = $this->patient_model->getDoctorById($dr_a_id);
        $st_date = date('Y-m-d', strtotime($this->input->get('st_date')));
        $last_date = date('Y-m-d', strtotime($this->input->get('last_date')));
        $data['patient_data'] = $this->patient_model->getstatementDr($st_date, $last_date, $dr_a_id);
        $data['doctor_data'] = $this->doctor_model->getDoctorById($id);
        $data['s_date'] = date('d-M-Y', strtotime($st_date));
        $data['l_date'] = date('d-M-Y', strtotime($last_date));
        $this->load->view('patient/with_doctor', $data);
}

// Patient Medicine Chart
    public function printchart() {
        $id = $this->input->get('id');
        $data['paitents_data'] = $this->patient_model->getPatientById($id);
        $this->load->view('patient/m_chart', $data);

        // HTML to PDF
        $html = $this->output->get_output();
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();        
        $this->dompdf->stream("Medical_Chart.pdf", array("Attachment"=>0)); //Output Line
    }
// Patient Medicine Chart


// Patient Medicine Chart Blank
    public function printchart_blank() {
        $this->load->view('patient/m_chart_blank');

        // HTML to PDF
        $html = $this->output->get_output();
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();        
        $this->dompdf->stream("Medical_Chart.pdf", array("Attachment"=>0)); //Output Line
   
    }
// Patient Medicine Chart Blank



    public function addpatient() {
        $this_tim = time();
        $date_time = $this->input->post('date').' '.$this->input->post('time');
        $tmp_date = $this->input->post('date');
        $this_time = strtotime($date_time);
        $emp_id = $this->ion_auth->user()->row()->emp_id;
        $name = $this->input->post('name');
        $ptn_cuss = $this->input->post('ptn_cause');
        $f_name = $this->input->post('f_name');
        $app_id = $this->input->post('app_id');
        $dr_id = $this->input->post('dr_id');
        $address = $this->input->post('address');
        $mobile = $this->input->post('mobile');
        $sex = $this->input->post('sex');
        $rel_actv = $this->input->post('actv');
        $b_num = $this->input->post('b_num');
        $auto_emp_a_iid = $this->ion_auth->user()->row()->auto_emp_a_iid;
        $add_date = date('Y-m-d', strtotime($tmp_date));
        $todays = date('Y-m-d', time());
        $age = $this->input->post('age');
        $rand1 = rand(100, 1000000);
        $rand2 = rand(10, 1000);
        $rand3 = rand(10, 100000);
        $patient_id = $rand1 + $rand2 + $rand3;
        $id_ptns = $this->patient_model->get_ptn_number();
        $increment_ids = $id_ptns->p_n_id+1;
        $last_admit_date = $id_ptns->add_date;
        $temp_date_ymd_formate = date('ymd', time());
        $last_reg_no = $id_ptns->reg_no;

        $temp_date_ymd_formate_today = date('ymd', strtotime($tmp_date));

        $get_last_reg_no = $this->patient_model->get_last_reg_number($add_date);
        $last_date_to_entry = $get_last_reg_no->add_date;
        $last_reg_no_by_date = $get_last_reg_no->reg_no;

        if ($last_date_to_entry == $add_date) {
            $new_reg_no = $last_reg_no_by_date + 1;
        }else {
            $new_reg_no = $temp_date_ymd_formate_today.'01';
        }


        $data = array(
            'ptnname'           => $name,
            'f_s_name'          => $f_name,
            'dr_a_iniq_idd'     => $dr_id,
            'pn_address'        => $address,
            'mobile'            => $mobile,
            'sex'               => $sex,
            'age'               => $age,
            'time_this'         => $this_time,
            'Patient_cause'     => $ptn_cuss,
            'patient_rand_id'   => $patient_id,
            'emp_id'            => $auto_emp_a_iid,
            'b_num'             => $b_num,
            'add_date'          => $add_date,
            'rel_with_ptn'      => $rel_actv,
            'reg_no'            => $new_reg_no,
            'reg_time_stamp_now'=> $this_tim,
            'ptn_reg_emp_iddd'  => $auto_emp_a_iid,
            'entry_datess'      => $todays
            );
        $this->patient_model->insertPatient($data);

        $bed_allocate = array(
            'patient_id'    => $patient_id,
            'admit_time'    => $this_time,
            'bed_cat_i'     => $b_num,
            'bed_no'        => $b_num,
            'ptn_iid'       => $increment_ids
            );
        $this->patient_model->insert_b_a($bed_allocate);
        $this->session->set_flashdata('success', 'Paitient Admitted');
            // Loading View
                redirect('patient');
        }

    public function editPatientData() {
        $date_time      = $this->input->post('date').' '.$this->input->post('time');
        $this_time      = strtotime($date_time);

        $name           = $this->input->post('name');
        $f_name         = $this->input->post('father');
        $dr_id          = $this->input->post('doctor_p');
        $address        = $this->input->post('address');
        $mobile         = $this->input->post('phone');
        $sex            = $this->input->post('sex');
        $age            = $this->input->post('age');
        $id             = $this->input->post('id');
        $data = array();
        if ($this->ion_auth->in_group(array('admin'))) {
        $data = array(
                    'ptnname'       => $name,
                    'f_s_name'      => $f_name,
                    'dr_a_iniq_idd' => $dr_id,
                    'pn_address'    => $address,
                    'mobile'        => $mobile,
                    'sex'           => $sex,
                    'age'           => $age,
                    'time_this'     => $this_time
            );
        }else{
            $data = array(
                        'ptnname'       => $name,
                        'f_s_name'      => $f_name,
                        'dr_a_iniq_idd' => $dr_id,
                        'pn_address'    => $address,
                        'mobile'        => $mobile,
                        'sex'           => $sex,
                        'age'           => $age
                );
        }
        $this->patient_model->updatePatient($id, $data);
        $this->session->set_flashdata('success', 'Updated');
            // Loading View
                redirect('patient');
        }

        function search_patientByID() {
            $p_id = $this->input->get('id');
            $data = $this->patient_model->get_patient_forSearch($p_id);
            echo json_encode($data);
        }


    function getPatient() {
        $data['patient'] = $this->patient_model->get_patient();
        $this->load->view('patient/patient', $data);
    }

    function editPatient() {
        $data = array();
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['groups'] = $this->donor_model->getBloodBank();
        
        $loginId = $this->ion_auth->user()->row()->emp_id;
        $data['user_P'] = $this->settings_model->get_log_user($loginId); 

        $this->load->view('home/dashboard', $data); // just the header file
        
        $this->load->view('patient/add_new', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function editPatientByJason() {
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);
        echo json_encode($data);
    }

 
    function getinfoByJason() {
        $id = $this->input->get('id');
        $data['appointments'] = $this->patient_model->getAppinfoById($id);
        echo json_encode($data);
    }

    function editBed_data() {
        $p_ids          = $this->input->post('p_id_for_bed'); 
        $p_bed_s        = $this->input->post('b_num');
        $last_patient   = $this->patient_model->get_p_by_ids($p_ids);
        $now_bed_no     = $last_patient->b_num;
        $p_rand_id      = $last_patient->patient_rand_id;
        $this_time      = time();
        $query_last_bed = $this->patient_model->get_previous_bed($p_ids, $now_bed_no);
        $last_bed_id    = $query_last_bed->b_a_id;
        $now_time       = time();

        $bed_update_data = array(
            'discharge_time' => $now_time, 
        );
        $this->patient_model->updateNowBed($last_bed_id, $bed_update_data);
        $c_data = array(
            'b_num' => $p_bed_s, 
        );
        $this->patient_model->update_P_Beds($p_ids, $c_data);

        $bed_allocate = array(
            'patient_id'       => $p_rand_id,
            'admit_time'            => $this_time,
            'bed_cat_i'             => $p_bed_s,
            'bed_no'                => $p_bed_s,
            'ptn_iid'               => $p_ids
            );
        $this->patient_model->insert_b_a($bed_allocate);
        $this->session->set_flashdata('success', 'Bed Updated');
            // Loading View
        redirect('patient');
    }

   function patientDetails() {
        $data = array();
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);
        
        $loginId = $this->ion_auth->user()->row()->emp_id;
        $data['user_P'] = $this->settings_model->get_log_user($loginId); 

        $this->load->view('home/dashboard', $data); // just the header file
        
        $this->load->view('patient/details', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function report() {
        $data = array();
        $id = $this->input->get('id');
        $data['settings'] = $this->settings_model->getSettings();
        $data['payment'] = $this->finance_model->getPaymentById($id);
        
        $loginId = $this->ion_auth->user()->row()->emp_id;
        $data['user_P'] = $this->settings_model->get_log_user($loginId); 

        $this->load->view('home/dashboard', $data); // just the header file
        
        $this->load->view('patient/diagnostic_report_details', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function delete() {
        $id = $this->input->get('id');

        $p_ids = $id;

        $last_patient   = $this->patient_model->get_p_by_ids($p_ids);
        $now_bed0_no     = $last_patient->b_num;
        $p_rand_id      = $last_patient->patient_id;
        $this_time      = time();

        $query_last_bed = $this->patient_model->get_previous_bed($p_ids, $now_bed_no);
        $last_bed_id    = $query_last_bed->b_a_id;
        $now_time       = time();

        $bed_update_data = array(
            'discharge_time' => $now_time, 
        );
        $this->patient_model->updateNowBed($last_bed_id, $bed_update_data);
        
        $this->patient_model->delete($id);
        $this->session->set_flashdata('warning', 'Deleted ');
        redirect('patient');
    }




//End Bracket
}
