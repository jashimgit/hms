<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctor_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
    function getTodayApp($NowDate) {
        $this->db->where('app_serial', 'outdoor');
        $this->db->where('ap_date', $NowDate);
        $this->db->where('dr_approv', 0 );
        $query = $this->db->get('appointment'); 
        return $query->result();
    }

    function getAdmitPatients() {
        $this->db->where('dis_time', '');
        $query = $this->db->get('patient'); 
        return $query->result();
    }
    
    
    function insertDoctor($data) {
        $this->db->insert('doctor', $data);
    }

    function insertDoctorfee($data) {
        $this->db->insert('dr_fee', $data);
    }

    function getDoctor() {
        $this->db->join('department', 'doctor.department = department.dept_id', 'left');
        $query = $this->db->get('doctor');
        return $query->result();
    }

    function getDoctorThis() {
        $this->db->where('stus', '1');
        $this->db->join('department', 'doctor.department = department.dept_id', 'left');
        $query = $this->db->get('doctor');
        return $query->result();
    }

    function update_dr_pic($dr_main_id, $data) {
        $this->db->where('dr_auto_id', $dr_main_id);
        $this->db->update('doctor', $data);
    }

    function getDoctorforDrfee() {
        $this->db->order_by('dr_auto_id', 'DESC');
        $query = $this->db->get('doctor');
        return $query->result();
    }

    function getDoctorfeeById($id) {
        $this->db->where('dr_fee_id', $id);
        $this->db->join('doctor', 'dr_fee.dr_a_idid_auto = doctor.dr_auto_id', 'left');
        $query = $this->db->get('dr_fee');
        return $query->row();
    }

    function drfee() {
        $this->db->join('doctor', 'dr_fee.dr_a_idid_auto = doctor.dr_auto_id', 'left');
        $query = $this->db->get('dr_fee');
        return $query->result();
    }

    function getDoctorById($id) {
        $this->db->where('dr_auto_id', $id);
        $this->db->join('department', 'doctor.department = department.dept_id', 'left');
        $this->db->join('dr_fee', 'doctor.dr_auto_id = dr_fee.dr_a_idid_auto', 'left');
        $query = $this->db->get('doctor');
        return $query->row();
    }

    function getDoctorTime($id) {
        $this->db->where('dr_auto_iidd_a', $id); 
        $query = $this->db->get('dr_time');
        return $query->result();       
    }

    function getDoctorOthInfoS($id) {
        $this->db->where('dr_a_id_auto', $id); 
        $query = $this->db->get('dr_all_info');
        return $query->result(); 
    }

    function updateDoctor($dr_main_id, $data) {
        $this->db->where('dr_auto_id', $dr_main_id);
        $this->db->update('doctor', $data);
    }

    function delete($id) {
        $this->db->where('dr_auto_id', $id);
        $this->db->delete('doctor');
    }

    function get_doctor_dr_id() {
        $this->db->limit(1);
        $this->db->order_by('dr_id', 'DESC');
        $sql = $this->db->get('doctor');
        return $sql->row();
    }

    function updateDoctorfee($dr_fee_id, $data) {
        $this->db->where('dr_fee_id', $dr_fee_id);
        $this->db->update('dr_fee', $data);
    }
    
    function delete_fee($id) {
        $this->db->where('dr_fee_id', $id);
        $this->db->delete('dr_fee');
    }

    function delete_doctor($id) {
        $this->db->where('dr_auto_id', $id);
        $this->db->delete('doctor');
    }

    function setDoctorSpeciality($data) {
        $this->db->insert('dr_all_info', $data);
    }

    function getDrAllSpeciality($dr_a_id) {
        $this->db->where('dr_a_id_auto', $dr_a_id);
        $sql = $this->db->get('dr_all_info');
        return $sql->result();
    }

    function updateSpclty($data_dr_speciality, $iniq_id) {
        $this->db->where('iniq_id', $iniq_id);
        $this->db->update('dr_all_info', $data_dr_speciality);
    }

    function deleteSpclty($iniq_id) {
        $this->db->where('iniq_id', $iniq_id);
        $this->db->delete('dr_all_info');
    }

    function setDoctorTimeable($all_data) {
        $this->db->insert('dr_time', $all_data);
    }

    function getDoctorTimeable($dr_a_idd) {
        $this->db->where('dr_auto_iidd_a', $dr_a_idd);
        $sql = $this->db->get('dr_time');
        return $sql->result();
    }

    function updateDoctorTime_able($f_data, $iniq_id) {
        $this->db->where('dr_time_id', $iniq_id);
        $this->db->update('dr_time', $f_data);        
    }

    function deleteDRTime_able($iniq_id) {        
        $this->db->where('dr_time_id', $iniq_id);
        $this->db->delete('dr_time');        
    }
}



