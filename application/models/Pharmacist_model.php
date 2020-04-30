<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pharmacist_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertPharmacist($data) {
        $this->db->insert('attn', $data);
    }

    function getPharmacist() {

        $date = date('Y-m-d', strtotime("-1 days"));
        $this->db->where('status', 'active');
        $this->db->join('attn', 'attn.emp_id = nurse.emp_id')->where('date', $date);
        $query = $this->db->get('nurse');
        return $query->result();
    }

    function getPharmacistById($emp_id) {
    //   $query = $this->db->get_where('nurse', array('emp_id' => $emp_id))->row();
      //  return $query->name;
	
        $this->db->where('emp_id', $emp_id);
       $query = $this->db->get('nurse')->row();
        return $query->ename;
    }




    function getPharmacistByIdex($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('attn');
        return $query->row();
    }


    function monPharmacistByIdex($id) {
        $this->db->where('emp_id', $id);
        $query = $this->db->get('attn');
        return $query->row();
    }

    function updatePharmacist($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('attn', $data);
    }


// Attendance for a speacific date 

    function getAttnDate($date) {
   //     $this->db->select('*');
   //     $this->db->from('attn');
        $this->db->where('status', 'active');
        $this->db->join('attn', 'attn.emp_id = nurse.emp_id')->where('date', $date);
        $query = $this->db->get('nurse');
       return $query->result();
    }


    function getAttnDates($date) {
   //     $this->db->select('*');
   //     $this->db->from('attn');
        $this->db->where('date', $date);
        $query = $this->db->get('attn');
       return $query->result();
    }



    function job_card($emp_id, $month, $year) {
        $array = array('emp_id' => $emp_id, 'MONTH(date)' => $month, 'YEAR(date)' => $year);
        $this->db->where($array);
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get('attn');
       return $query->result();
    }

    function job_count($emp_id, $month, $year) {
        $array = array('emp_id' => $emp_id, 'MONTH(date)' => $month, 'YEAR(date)' => $year);
        $this->db->where($array);
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get('attn');
       return $query->num_rows();
    }






    function getAttnMonthss($date) {




     //   $this->db->where('emp_id', $emp_id);
       // $this->db->where('MONTH(date)', $date);
        $query = $this->db->get('attn');
        return $query->num_rows();
       // $this->db->where('YEAR(date)', $date); 
      //  $this->db->where('MONTH(date)', $date);
        //$this->db->where('status', 'active');
        //$query = $this->db->get('nurse');
        //$num_results = $this->db->count_all_results();
       //return $query->result();


        }





    function getemp() {
        $this->db->where('status', 'active');
        $this->db->order_by('eid');
        $this->db->join('empinfo', 'nurse.emp_id = empinfo.emp_id');
        $query = $this->db->get('nurse');
        return $query->result();
        }



    function getemps() {

        $this->db->where('status', 'active');
        $this->db->order_by('eid');
        $this->db->join('empinfo', 'nurse.emp_id = empinfo.emp_id');
        $query = $this->db->get('nurse');
        return $query->result();
        }







    function getAttnMonth($date) {




       // $this->db->where('YEAR(date)', $date); 
      //  $this->db->where('MONTH(date)', $date);
        $this->db->where('status', 'active');
        $this->db->join('empinfo', 'nurse.emp_id = empinfo.emp_id');
        $query = $this->db->get('nurse');
        //$num_results = $this->db->count_all_results();
       return $query->result();


        }





    function getcountmodel($date) {


       // $this->db->where('YEAR(date)', $date); 
      //  $this->db->where('MONTH(date)', $date);
        $this->db->where('status', 'active');
       // $this->db->join('empinfo', 'nurse.emp_id = empinfo.emp_id');
       // $this->db->join('attn', 'nurse.emp_id = attn.emp_id');
        $query = $this->db->get('nurse');
        //$num_results = $this->db->count_all_results();
       return $query->result();


        }


    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('attn');
    }

    function getAttnProccess($this_date) {
        $this->db->where('temp_process_date', $this_date);
        $this->db->join('nurse', 'nurse.emp_id = attn_proccess_date.this_emp_userss', 'left');
        $sql = $this->db->get('attn_proccess_date');
        return $sql->row();
    }

    function getTmp_Attn_Log($temp_date) { 
        $this->db->group_by(array('attn_log_temp.user_e_idd', 'attn_log_temp.attn_log_date'));   
        $this->db->where('attn_log_date', $temp_date);
        $this->db->join('nurse', 'nurse.emp_id = attn_log_temp.user_e_idd', 'left');  
        $this->db->order_by('eid', 'asc');   
        $sql = $this->db->get('attn_log_temp');
        return $sql->result();
    }

    function getTempAttn_Log_sub_query($empUser, $temp_date) {
        $this->db->where('user_e_idd', $empUser);
        $this->db->where('attn_log_date', $temp_date);
        $sql = $this->db->get('attn_log_temp');
        return $sql->result();
    }

    function insert_attnTotal($eData) {
        $this->db->insert_batch('attn', $eData);
    }

    function insert_processData($prData) {
        $this->db->insert('attn_proccess_date', $prData);
    }

    function getAttnFullEmpData($emp_iddii, $getMonth, $getYear) {
        $this->db->where('MONTH(attn_date)', $getMonth)->where('YEAR(attn_date)', $getYear)->where('emp_id', $emp_iddii);
        $sql = $this->db->get('attn');
        return $sql->result();
    }
}
