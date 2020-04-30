<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usg_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getTestreport() {
    	$this->db->where('inv_srt', 'usg');
    	$this->db->join('patho_inv', 'patho_inv.tst_inv_id = rado_test_report.diag_inv_idii');
    	$sql = $this->db->get('rado_test_report');
    	return $sql->result();
    }

    function getTestreportbyID($inv_repo_id) {
    	$this->db->where('rado_repo_iidd', $inv_repo_id);
    	$this->db->join('patho_inv', 'patho_inv.tst_inv_id = rado_test_report.diag_inv_idii');
    	$sql = $this->db->get('rado_test_report');
    	return $sql->row();
    }

    function edit_tst_report($inv_repo_id, $data) {
    	$this->db->where('rado_repo_iidd', $inv_repo_id);
    	$this->db->update('rado_test_report', $data);    	
    }

    function getLab_ptn() {
    	$day_query = date('Y-m-d', strtotime("-30 days"));
    	$this->db->where('this_date >', $day_query);
    	$sql = $this->db->get('lab_patient_info');
    	return $sql->result();
    }

    function getptn_tst_all_info($ptnid) {
    	$this->db->where('labpn_id', $ptnid);
    	$this->db->join('doctor', 'doctor.dr_id = lab_patient_info.lbpdr_id', 'left');
    	$this->db->join('lavrcv_tstinfo', 'lab_patient_info.lab_rgstr_iidd = lavrcv_tstinfo.labptnididid', 'left');
    	$this->db->where('tsttype', 'USG');
    	$this->db->join('patho_inv', 'patho_inv.tst_inv_id = lavrcv_tstinfo.tstiiddid', 'left');
    	$this->db->join('rado_ptn_repo', 'rado_ptn_repo.lab_ptn_idss = lab_patient_info.labpn_id', 'left');
    	$sql = $this->db->get('lab_patient_info');
    	return $sql->result();
    }

    function getTestNRepot($tstId) {
    	$this->db->where('diag_inv_idii', $tstId);
    	$sql = $this->db->get('rado_test_report');
    	return $sql->row();
    }

    function addNewReport($a_data) {
    	$this->db->insert('rado_ptn_repo', $a_data);
    }

    function getReport_ptnTst($ptn_id, $tst_id) {
    	$this->db->where('lab_ptn_idss', $ptn_id);
    	$this->db->where('lab_tst_iidds', $tst_id); 
    	$this->db->join('doctor', 'doctor.dr_id = rado_ptn_repo.report_dr_id', 'left');
    	$sql = $this->db->get('rado_ptn_repo');
    	return $sql->row();
    }

    function getTstRepot($ptn_idd, $tstID) {
    	$this->db->where('lab_ptn_idss', $ptn_idd);
    	$this->db->where('lab_tst_iidds', $tstID);
    	$this->db->join('lab_patient_info', 'lab_patient_info.labpn_id = rado_ptn_repo.lab_ptn_idss', 'left');
    	$this->db->join('doctor', 'doctor.dr_id = rado_ptn_repo.report_dr_id', 'left');
    	$this->db->join('patho_inv', 'patho_inv.tst_inv_id = rado_ptn_repo.lab_tst_iidds', 'left');
    	$sql = $this->db->get('rado_ptn_repo');
    	return $sql->row();
    }

    function getptn_Info($ptn_idd) {
    	$this->db->where('labpn_id', $ptn_idd);
    	$this->db->join('doctor', 'doctor.dr_id = lab_patient_info.lbpdr_id', 'left');
    	$sql = $this->db->get('lab_patient_info');
    	return $sql->row();
    }
}