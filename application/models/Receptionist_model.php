<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Receptionist_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_ticketss($thisdate) {
        $this->db->where('thisdate', $thisdate);
        $this->db->join('doctor', 'doctor.dr_auto_id = appointment.auto_iddd_for_dr', 'left');
        $this->db->join('nurse', 'nurse.n_id = appointment.emp_a_iiddd', 'left');
        $this->db->order_by('app_tc_id', 'desc');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getTicketByDate($thisdate) {
        $this->db->where('ap_date', $thisdate);
        $this->db->join('doctor', 'doctor.dr_auto_id = appointment.auto_iddd_for_dr', 'left');
        $this->db->join('nurse', 'nurse.n_id = appointment.emp_a_iiddd', 'left');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAllTicket() {
        $this->db->join('doctor', 'doctor.dr_auto_id = appointment.auto_iddd_for_dr', 'left');
        $this->db->join('nurse', 'nurse.n_id = appointment.emp_a_iiddd', 'left');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getdoctor() {
        $this->db->where('stus', '1');
        $this->db->join('dr_fee', 'dr_fee.dr_a_idid_auto = doctor.dr_auto_id', 'left');
        $query = $this->db->get('doctor');
        return $query->result();
    }

    function getUsers() {
        $this->db->join('nurse', 'nurse.n_id = users.auto_emp_a_iid');
        $query = $this->db->get('users');
        return $query->result();
    }

    function getticketcount($emp_id, $dr_id, $t_date) {
        $this->db->where('emp_a_iiddd', $emp_id);
        $this->db->where('auto_iddd_for_dr', $dr_id);
        $this->db->where('ap_date', $t_date);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function get_dr_count($dr_id, $t_date) {
        $this->db->where('auto_iddd_for_dr', $dr_id);
        $this->db->where('ap_date', $t_date);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function stmn_with_doctor($dr_id, $start_date, $end_date) {
        $this->db->where('auto_iddd_for_dr', $dr_id);
        $this->db->where('thisdate >=', $start_date);
        $this->db->where('thisdate <=', $end_date);
        $this->db->join('nurse', 'nurse.n_id = appointment.emp_a_iiddd', 'left');
        $this->db->order_by('app_tc_id', 'DESC');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getEmpticket($t_date) {
        $this->db->where('ap_date', $t_date);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getEmptckt($emp_id, $t_date) {
        $this->db->where('emp_a_iiddd', $emp_id);
        $this->db->where('ap_date', $t_date);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getAppSerial($dr_id, $AppDate) {
        $this->db->limit(1);
        $this->db->where('auto_iddd_for_dr', $dr_id);
        $this->db->where('ap_date', $AppDate);
        $this->db->order_by('app_tc_id', 'desc');
        $sql = $this->db->get('appointment');
        return $sql->row();
    }

    function getDrinfo() {
        $query = $this->db->get('doctor');
        return $query->result();
    }

    function get_ticket_date_date($datefrom, $todate) {
        $this->db->where('thisdate >=', $datefrom);
        $this->db->where('thisdate <=', $todate);
        $this->db->join('doctor', 'doctor.dr_auto_id = appointment.auto_iddd_for_dr', 'left');
        $this->db->join('nurse', 'nurse.n_id = appointment.emp_a_iiddd', 'left');
        $this->db->order_by('app_tc_id', 'DESC');
        $query = $this->db->get('appointment');
        return $query->result();
    }


    function insertappoint($data) {
        $this->db->insert('appointment', $data);
    }


    function getdefeeById($dr_id) {
        $this->db->where('dr_a_idid_auto', $dr_id);
        $query = $this->db->get('dr_fee');
        return $query->row();
    }


    function getdrById($dr_id) {
        $this->db->where('dr_auto_id', $dr_id);
        $query = $this->db->get('doctor');
        return $query->row();
    }




    function getAppById($ap_id) {
        $this->db->where('app_tc_id', $ap_id);
        $this->db->join('doctor', 'doctor.dr_auto_id = appointment.auto_iddd_for_dr', 'left');
        $this->db->join('nurse', 'nurse.n_id = appointment.emp_a_iiddd', 'left');
        $this->db->join('empinfo', 'empinfo.inq_emp_auto_i_iiid = nurse.n_id', 'left');
        $query = $this->db->get('appointment');
        return $query->row();
    }

    function searchTicket($tc_id) {
        $this->db->like('app_tc_id', $tc_id);
        $sql = $this->db->get('appointment');
        return $sql->result();
    }

    function getticketById($tc_id) {
        $this->db->where('app_tc_id', $tc_id);
        $this->db->join('doctor', 'doctor.dr_auto_id = appointment.auto_iddd_for_dr', 'left');
        $this->db->join('nurse', 'nurse.n_id = appointment.emp_a_iiddd', 'left');
        $query = $this->db->get('appointment');
        return $query->row();
    }

    function getticketall($tc_id) {
        $this->db->like('app_tc_id', $tc_id);
        $this->db->join('doctor', 'doctor.dr_auto_id = appointment.auto_iddd_for_dr', 'left');
        $this->db->join('nurse', 'nurse.n_id = appointment.emp_a_iiddd', 'left');
        $query = $this->db->get('appointment');
        return $query->result();
    }
        
    function editticketprint($id, $data) {
        $this->db->where('app_tc_id', $id);
        $this->db->update('appointment', $data);
    }

    function updateAppointTicket($id, $data) {
        $this->db->where('app_tc_id', $id);
        $this->db->update('appointment', $data);
    }

    function deleteticket($id) {
        $this->db->where('app_tc_id', $id);
        $this->db->delete('appointment');
    }

}
