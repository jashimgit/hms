<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pathology_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function searchSinglePrint($pId) {
        $this->db->like('lab_rgstr_iidd', $pId);
        $sql = $this->db->get('lab_patient_info');
        return $sql->result();
    }


    function get_testInfos() {
        $this->db->join('diagonostic_dept', 'diagonostic_dept.diag_dept_idii = patho_inv.dep_id', 'left');
        $this->db->join('patho_test_group', 'patho_test_group.tst_grp_iddi = patho_inv.grup_iid', 'left');
        $sql = $this->db->get('patho_inv');
        return $sql->result();
    }

    function get_testDept() {
        $query = $this->db->get('diagonostic_dept');
        return $query->result();
    }

    function get_testGrp($dept_id) {
        $this->db->where('diag_dept_id', $dept_id);
        $sql = $this->db->get('patho_test_group');
        return $sql->result();
    }

    function get_tst_grup($tst_grup) {
        $this->db->where('tst_grp_iddi', $tst_grup);
        $sql = $this->db->get('patho_test_group');
        return $sql->row();
    }

    function insert_new_test($data) {
        $this->db->insert('patho_inv', $data);
    }

    function get_tst_byID($tstID) {
        $this->db->where('tst_inv_id', $tstID);
        $sql = $this->db->get('patho_inv');
        return $sql->row();
    }

    function del_tst_inv($tstID) {
        $this->db->where('tst_inv_id', $tstID);
        $this->db->delete('patho_inv');
    }

    function update_testINV($tst_inv_ID, $edata) {
        $this->db->where('tst_inv_id', $tst_inv_ID);
        $this->db->update('patho_inv', $edata);
    }

    function get_grup() {
        $this->db->join('diagonostic_dept', 'diagonostic_dept.diag_dept_idii = patho_test_group.diag_dept_id', 'left');
        $sql = $this->db->get('patho_test_group');
        return $sql->result();
    }

    function del_grup($g_id) {
        $this->db->where('tst_grp_iddi', $g_id);
        $this->db->delete('patho_test_group');        
    }

    function insert_grup_data($sata) {
        $this->db->insert('patho_test_group', $sata);
    }

    function getGrupIDD($grpID) {
        $this->db->where('tst_grp_iddi', $grpID);
        $sql = $this->db->get('patho_test_group');
        return $sql->row();
    }

    function update_grup_data($sata, $grp_idi) {
        $this->db->where('tst_grp_iddi', $grp_idi);
        $this->db->update('patho_test_group', $sata);        
    }

    function get_grupforRange() {
        $this->db->where('diag_dept_id', '1');
        $sql = $this->db->get('patho_test_group');
        return $sql->result();
    }

    function get_invBygrpID($grpID) {
        $this->db->where('grup_iid', $grpID);
        $sql = $this->db->get('patho_inv');
        return $sql->result();
    }

    function get_tstInvQuery() {
        $sql = $this->db->get('patho_inv');
        return $sql->result();        
    }



    function get_invTst_s_($patho_inv_idd) { 
        $this->db->where('p_inv_id', $patho_inv_idd);
        $sql = $this->db->get('patho_inv_test');
        return $sql->result();        
    }

    function insert_invTstData($aData) {
        $this->db->insert('patho_inv_test', $aData);
    }

    function update_invTstData($inv_tst_iddd, $uData) {
        $this->db->where('tst_auto_iid', $inv_tst_iddd);
        $this->db->update('patho_inv_test', $uData);
    }

    function delInvTSTs($inv_tstI) {
        $this->db->where('tst_auto_iid', $inv_tstI);
        $this->db->delete('patho_inv_test');        
    }

    function getPtnByIdds($ptn_ids) {
        $this->db->where('lab_rgstr_iidd', $ptn_ids);
        $this->db->join('doctor', 'lab_patient_info.lbpdr_id = doctor.dr_id', 'left');  
        $sql = $this->db->get('lab_patient_info');
        return $sql->row();                     
    }

    function gettstByPtnIDD($ptn_ids) {
        $this->db->where('labptnididid', $ptn_ids);
        $this->db->join('patho_inv', 'patho_inv.tst_inv_id = lavrcv_tstinfo.tstiiddid', 'left');
        $this->db->join('patho_test_group', 'patho_test_group.tst_grp_iddi = patho_inv.grup_iid', 'left');
        $this->db->join('patho_inv_test', 'patho_inv.tst_inv_id = patho_inv_test.p_inv_id', 'left');
        $this->db->where('diag_dept_id', '1');
        $sql = $this->db->get('lavrcv_tstinfo');
        return $sql->result();
    }

    function getTstDataForUpdate($ptn_ids) {        
        $this->db->where('ptn_auto_iiddd', $ptn_ids);
        $this->db->join('patho_inv_test', 'patho_inv_test.tst_auto_iid = patho_ptn_result_entry.inv_tst_idsss_', 'left');
        $this->db->join('patho_inv', 'patho_inv.tst_inv_id = patho_inv_test.p_inv_id', 'left');       
        $sql = $this->db->get('patho_ptn_result_entry');
        return $sql->result();
    }

    function getTstGrp($ptn_ids) {
        $this->db->where('labptnididid', $ptn_ids);
        $this->db->join('patho_inv', 'patho_inv.tst_inv_id = lavrcv_tstinfo.tstiiddid', 'left');
        $this->db->join('patho_test_group', 'patho_test_group.tst_grp_iddi = patho_inv.grup_iid', 'left');
        $this->db->join('patho_inv_test', 'patho_inv.tst_inv_id = patho_inv_test.p_inv_id', 'left');
        $this->db->join('lab_patient_info', 'lab_patient_info.lab_rgstr_iidd = lavrcv_tstinfo.labptnididid', 'left');
        $this->db->join('patho_ptn_result_entry', 'patho_ptn_result_entry.ptn_auto_iiddd = lab_patient_info.labpn_id', 'left');
        $this->db->where('diag_dept_id', '1');
        $sql = $this->db->get('lavrcv_tstinfo');
        return $sql->result();
    }

    function insert_tstResult($eData) {
        $this->db->insert_batch('patho_ptn_result_entry', $eData);
    }

    function UpdateTstResultss($eData, $lab_ptnid) {
        $this->db->where('ptn_auto_iiddd', $lab_ptnid);
        $this->db->update_batch('patho_ptn_result_entry', $eData, 'inv_tst_idsss_');        
    }

    function getTstInvResult($ptnIds, $grupIDss) {        
        $this->db->where('ptn_auto_iiddd', $ptnIds);
        $this->db->join('patho_inv_test', 'patho_inv_test.tst_auto_iid = patho_ptn_result_entry.inv_tst_idsss_', 'left');
        $this->db->join('patho_inv', 'patho_inv.tst_inv_id = patho_inv_test.p_inv_id', 'left');     
        $this->db->where('grup_idid', $grupIDss);
        $sql = $this->db->get('patho_ptn_result_entry');
        return $sql->result();
    }

    function update_ptn_table($upData, $lab_ptnid) {
        $this->db->where('labpn_id', $lab_ptnid);
        $this->db->update('lab_patient_info', $upData);
    }

    function TstReportPrint_ss($ptn_ids, $tst_grup) {             
        $this->db->where('ptn_auto_iiddd', $ptn_ids);
        $this->db->join('patho_inv_test', 'patho_inv_test.tst_auto_iid = patho_ptn_result_entry.inv_tst_idsss_', 'left');
        $this->db->join('patho_inv', 'patho_inv.tst_inv_id = patho_inv_test.p_inv_id', 'left');       
        $this->db->where('grup_idid', $tst_grup);
        $sql = $this->db->get('patho_ptn_result_entry');
        return $sql->result();
    }

    function getPtnByAIddsss($ptn_ids) {
        $this->db->where('labpn_id', $ptn_ids);
        $this->db->join('doctor', 'lab_patient_info.lbpdr_id = doctor.dr_id', 'left');  
        $sql = $this->db->get('lab_patient_info');
        return $sql->row();                     
    }
}





