<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertPatient($data) {
        $this->db->insert('patient', $data);
    }

    function getPatient() {
        $this->db->order_by('p_n_id', 'desc');
        $this->db->where('ok', 0);
        $this->db->join('nurse', 'nurse.emp_id = patient.emp_id', 'left');
        $this->db->join('doctor', 'doctor.dr_auto_id = patient.dr_a_iniq_idd', 'left');
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getstatementDr($st_date, $last_date, $dr_a_id) {
        $this->db->where('dr_a_iniq_idd', $dr_a_id);
        $this->db->where('add_date >=', $st_date);
        $this->db->where('add_date <=', $last_date);
        $this->db->order_by('p_n_id', 'DESC');
        $sql = $this->db->get('patient');
        return $sql->result();        
    }

    function get_last_reg_number($add_date) {        
        $this->db->where('add_date', $add_date);
        $this->db->order_by('p_n_id', 'DESC');
        $sql = $this->db->get('patient');
        return $sql->row();
    }

    function getfullpatient($st_date, $last_date) {
        $this->db->where('add_date >=', $st_date);
        $this->db->where('add_date <=', $last_date);
        $this->db->join('doctor', 'doctor.dr_auto_id = patient.dr_a_iniq_idd', 'left');
        $this->db->order_by('p_n_id', 'DESC');
        $sql = $this->db->get('patient');
        return $sql->result();
    }

    function get_receive_bill($p_id) {
        $this->db->select_sum('bill_cat_taka');
        $this->db->where('p_iid', $p_id);
        $query = $this->db->get('bill_receive');
        return $query->row()->bill_cat_taka;
    }

    function get_bill_cums($p_id) {
        $this->db->select_sum('coms_amount_tk');
        $this->db->where('p_iid', $p_id);
        $query = $this->db->get('indoor_bill_cumms');
        return $query->row()->coms_amount_tk;
    }

    function get_dr_ticket_fee($p_id) {
        $this->db->where('admit_p_iid', $p_id);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function get_create_bill($p_id) {
        $this->db->where('patient_iid', $p_id);
        $this->db->where('create_bill_taka !=', '0');
        $this->db->join('bill_cat', 'bill_cat.c_num = create_indoor_bill.bill_cat_iid', 'left');
        $query = $this->db->get('create_indoor_bill');
        return $query->result();
    }    

    function getAllBedWith_BedRates($p_idd) {
        $this->db->where('ptn_iid', $p_idd);
        $query = $this->db->get('bed_allocation');
        return $query->result();        
    }

    function getPtnInfoByRegNo($reg_no) {
        $this->db->where('reg_no', $reg_no);
        $this->db->join('doctor', 'doctor.dr_auto_id = patient.dr_a_iniq_idd', 'left');
        $this->db->join('dr_fee', 'dr_fee.dr_a_idid_auto = doctor.dr_auto_id', 'left');
        $this->db->join('bed', 'bed.b_num = patient.b_num', 'left');
        $sql = $this->db->get('patient');
        return $sql->row();        
    }

    function get_p_full_infobyId($p_id) {
        $this->db->where('p_n_id', $p_id);
        $this->db->join('nurse', 'nurse.n_id = patient.bill_create_emp', 'left');
        $this->db->join('doctor', 'doctor.dr_auto_id = patient.dr_a_iniq_idd', 'left');
        $this->db->join('dr_fee', 'dr_fee.dr_a_idid_auto = doctor.dr_auto_id', 'left');
        $sql = $this->db->get('patient');
        return $sql->row();
    }

    function getconststst_name($p_id) {
        $this->db->where('p_n_id', $p_id);
        $this->db->join('doctor', 'doctor.dr_auto_id = patient.consultant_id', 'left');
        $this->db->join('dr_fee', 'dr_fee.dr_a_idid_auto = doctor.dr_auto_id', 'left');
        $sql = $this->db->get('patient');
        return $sql->row();
    }

    function getconndndnd_name($p_id) {
        $this->db->where('p_n_id', $p_id);
        $this->db->join('doctor', 'doctor.dr_auto_id = patient.consul_sec_id', 'left');
        $this->db->join('dr_fee', 'dr_fee.dr_a_idid_auto = doctor.dr_auto_id', 'left');
        $sql = $this->db->get('patient');
        return $sql->row();
    }

    function getconsaltant2_info($reg_no) {
        $this->db->where('reg_no', $reg_no);
        $this->db->join('doctor', 'doctor.dr_auto_id = patient.consul_sec_id', 'left');
        $this->db->join('dr_fee', 'dr_fee.dr_a_idid_auto = doctor.dr_auto_id', 'left');
        $sql = $this->db->get('patient');
        return $sql->row();
    }

    function getconsaltant1_info($reg_no) {
        $this->db->where('reg_no', $reg_no);
        $this->db->join('doctor', 'doctor.dr_auto_id = patient.consultant_id', 'left');
        $this->db->join('dr_fee', 'dr_fee.dr_a_idid_auto = doctor.dr_auto_id', 'left');
        $sql = $this->db->get('patient');
        return $sql->row();
    }

    function getbed() {
        $this->db->order_by('b_num', 'ASC');
        $query = $this->db->get('bed');
        return $query->result();
    }

    function getLastBed_allocate_iddd($p_serial) {
        $this->db->where('ptn_iid', $p_serial);
        $this->db->where('discharge_time', '');
        $query = $this->db->get('bed_allocation');
        return $query->row();        
    }

    function getDoctorById($dr_id) {
        $this->db->where('dr_auto_id', $dr_id);
        $query = $this->db->get('doctor');
        return $query->row();
    }

    function getPatientById($id) {
        $this->db->where('p_n_id', $id);
        $this->db->join('doctor', 'doctor.dr_auto_id = patient.dr_a_iniq_idd', 'left');
        $query = $this->db->get('patient');
        return $query->row();
    }

    function get_patient_forSearch($p_id) {
        $this->db->like('patient_rand_id', $p_id);
        $this->db->join('doctor', 'doctor.dr_auto_id = patient.dr_a_iniq_idd', 'left');
        $sql = $this->db->get('patient');
        return $sql->result();
    }

    function get_ptn_number() {
        $this->db->order_by('p_n_id', 'DESC');
        $this->db->limit(1);
        $sql = $this->db->get('patient');
        return $sql->row();
    }

    function get_p_by_ids($p_ids) {
        $this->db->where('p_n_id', $p_ids);
        $sql = $this->db->get('patient');
        return $sql->row();
    }

    function updateNowBed($last_bed_id, $bed_update_data) {
        $this->db->where('b_a_id', $last_bed_id);
        $this->db->update('bed_allocation', $bed_update_data);
    }

    function update_P_Beds($p_ids, $c_data) {
        $this->db->where('p_n_id', $p_ids);
        $this->db->update('patient', $c_data);
    }

    function get_previous_bed($p_ids, $now_bed_no) {
        $this->db->where('ptn_iid', $p_ids);
        $this->db->where('bed_cat_i', $now_bed_no);
        $sql = $this->db->get('bed_allocation');
        return $sql->row(); 
    }

    function updatePatient($id, $data) {
        $this->db->where('p_n_id', $id);
        $this->db->update('patient', $data);
    }

    function insert_b_a($bed_allocate) {
        $this->db->insert('bed_allocation', $bed_allocate);
    }

    function delete($id) {
        $this->db->where('p_n_id', $id);
        $this->db->delete('patient');
    }

}
