<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Labrcv_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getptninfo() {
        $tody = date('Y-m-d', time());
      	$this->db->where('this_date', $tody);
    	$this->db->join('doctor', 'doctor.dr_auto_id = lab_patient_info.lbpdr_id', 'left');
    	$query = $this->db->get('lab_patient_info');
    	return $query->result();
    }

    function getdoctor() {
        $query = $this->db->get('doctor');
        return $query->result();
    }

    function getlabtest() {
        $query = $this->db->get('patho_inv');
        return $query->result();

    }
    function gettestforrate($tstiid) {
        $this->db->join('diagonostic_dept', 'diagonostic_dept.diag_dept_idii = patho_inv.dep_id', 'left');
        $this->db->where('tst_inv_id', $tstiid);
        $query = $this->db->get('patho_inv');
        return $query->row();
    }

    function getPatienbyid($serch_Idi) {
        $this->db->like('lab_rgstr_iidd', $serch_Idi);
        $sql = $this->db->get('lab_patient_info');
        return $sql->result();
    }

    function getlabtstiid() {
        $this->db->limit(1);
        $this->db->order_by('lab_rgstr_iidd',"DESC");
        $query = $this->db->get("lab_patient_info");
        return $query->row();
    }

    function insert_labrcvptn($data) {
        $this->db->insert('lab_patient_info', $data);
    }

    function insert_rcvtstinfo($f_data) {
        $this->db->insert_batch('lavrcv_tstinfo', $f_data);
    }

    function getLabPatient($labrcvidii) {
        $this->db->where('lab_rgstr_iidd', $labrcvidii);
        $this->db->join('doctor', 'doctor.dr_auto_id = lab_patient_info.lbpdr_id', 'left');
        $query = $this->db->get('lab_patient_info');
        return $query->row();
    }

    function getLabTestforP($labrcvidii) {
        $this->db->where('labptnididid', $labrcvidii);
        $this->db->join('patho_inv', 'patho_inv.tst_inv_id = lavrcv_tstinfo.tstiiddid', 'left');
        $this->db->join('diagonostic_dept', 'diagonostic_dept.diag_dept_idii = patho_inv.dep_id', 'left');
        $sql = $this->db->get('lavrcv_tstinfo');
        return $sql->result();        
    }

    function getLabDepartment() {
        $sql = $this->db->get('diagonostic_dept');
        return $sql->result();
    }

    function insert_rcvttkdata($tk_data) {
        $this->db->insert('test_receive_amnt', $tk_data);
    }


























}
