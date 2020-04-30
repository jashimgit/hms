<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pathology extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('labrcv_model');
        $this->load->library('Ciqrcode');
        $this->load->library('upload');
        $this->load->library('Pdf');
        $this->load->model('pathology_model');
        $language = $this->db->get('settings')->row()->language;
        $this->lang->load('system_syntax', $language);
        $this->load->model('ion_auth_model');
        $this->load->model('settings_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }
    }

    function index() {
        $data['ptNInfo'] = $this->labrcv_model->getptninfo();

        $loginId = $this->ion_auth->user()->row()->emp_id;
        $data['user_P'] = $this->settings_model->get_log_user($loginId);

        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('pathology/result_entry2', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function search_printID() {
        $pId = $this->input->get('id');
        $data = $this->pathology_model->searchSinglePrint($pId);
        echo json_encode($data);
    }

    function test_add() {
        $loginId = $this->ion_auth->user()->row()->emp_id;
        $data['user_P'] = $this->settings_model->get_log_user($loginId);

        $data['test_info'] = $this->pathology_model->get_testInfos();
        $data['test_dept'] = $this->pathology_model->get_testDept();

        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('pathology/test_add', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function get_TestGrup() {
        $dept_id = $this->input->get('deptId');
        $data = $this->pathology_model->get_testGrp($dept_id);
        echo json_encode($data);
    }

    function get_tst_grup_byID() {
        $tst_grup = $this->input->get('tst_Grp_id');
        $data = $this->pathology_model->get_tst_grup($tst_grup);
        echo json_encode($data);
    }

    function AddNewTest() {
        $dep_idi            = $this->input->post('dep_idi');
        $grup_id            = $this->input->post('grup_id');
        $test_name          = $this->input->post('test_name');
        $test_rate_normal   = $this->input->post('test_rate_normal');
        $test_rate_argnt    = $this->input->post('test_rate_argnt');
        $test_grup_typ      = $this->input->post('test_grup_typ');
        $data = array(
            'dep_id'        => $dep_idi,
            'grup_iid'      => $grup_id,
            'inv_name'      => $test_name,
            'rate'          => $test_rate_normal,
            'argent_rate'   => $test_rate_argnt,
            'grup_type'     => $test_grup_typ 
        );
        $this->pathology_model->insert_new_test($data);
        $this->session->set_flashdata('feedback', 'Test Addedd Successfully');
            redirect('pathology/test_add');
    }

    function editPathoTest() {
        $tst_inv_ID = $this->input->post('inv_idi');
        $tst_Name = $this->input->post('test_name');
        $tst_NRate = $this->input->post('test_rate_normal');
        $tst_ARate = $this->input->post('test_rate_argnt');
        $edata = array(
            'inv_name'      => $tst_Name,     
            'rate'          => $tst_NRate,     
            'argent_rate'   => $tst_ARate     
        );
        $this->pathology_model->update_testINV($tst_inv_ID, $edata);
        $this->session->set_flashdata('feedback', 'Update Successfully');
            redirect('pathology/test_add');
    }

    function getTestInfobyID() {
        $tstID = $this->input->get('tstID');
        $data = $this->pathology_model->get_tst_byID($tstID);
        echo json_encode($data);
    }

    function addInvTests() {
        $loginId = $this->ion_auth->user()->row()->emp_id;
        $data['user_P'] = $this->settings_model->get_log_user($loginId);
        $data['test_grup'] = $this->pathology_model->get_grupforRange();

        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('pathology/addInvTests', $data);
        $this->load->view('home/footer'); // just the header file        
    }

    function get_patho_inv_tst() {
        $patho_inv_idd = $this->input->get('inv_ids');
        $data = $this->pathology_model->get_invTst_s_($patho_inv_idd);
        echo json_encode($data);
    }

    function deleteTst() {
        $tstID = $this->input->get('tstid');
        $this->pathology_model->del_tst_inv($tstID);
        $this->session->set_flashdata('feedback', 'Deleted');
            redirect('pathology/test_add');
    }

    function grp_info() {
        $loginId = $this->ion_auth->user()->row()->emp_id;
        $data['user_P'] = $this->settings_model->get_log_user($loginId);

        $data['grp_info'] = $this->pathology_model->get_grup();
        $data['test_dept'] = $this->pathology_model->get_testDept();

        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('pathology/grup_inf', $data);
        $this->load->view('home/footer'); // just the header file        
    }

    function deleteGrp() {
        $g_id = $this->input->get('grpid');
        $this->pathology_model->del_grup($g_id);
        $this->session->set_flashdata('feedback', 'Deleted');
            redirect('pathology/grp_info');        
    }

    function AddNewGrp() {
        $dep_idi        = $this->input->post('dep_idi');
        $grp_name       = $this->input->post('grp_name');
        $test_grup_typ  = $this->input->post('test_grup_typ');
        $sata = array(
            'tst_grp_short'  => $test_grup_typ,
            'tst_grp_name' => $grp_name,
            'diag_dept_id'  => $dep_idi 
        );
        $this->pathology_model->insert_grup_data($sata);
        $this->session->set_flashdata('feedback', 'Add Successfully');
            redirect('pathology/grp_info');    
    }

    function editGrupByIDD() {
        $grpID = $this->input->get('grpID');
        $data = $this->pathology_model->getGrupIDD($grpID);
        echo json_encode($data);                       
    }

    function editPathoGrp() {
        $grp_idi        = $this->input->post('grp_idi');
        $grp_name       = $this->input->post('grup_name');
        $test_grup_typ  = $this->input->post('grp_short');
        $sata = array(
            'tst_grp_short' => $test_grup_typ,
            'tst_grp_name'  => $grp_name 
        );
        $this->pathology_model->update_grup_data($sata, $grp_idi);
        $this->session->set_flashdata('feedback', 'Update Successful');
            redirect('pathology/grp_info');             
    }

    function test_rangeAdd() {
        $loginId = $this->ion_auth->user()->row()->emp_id;
        $data['user_P'] = $this->settings_model->get_log_user($loginId);
        $data['test_grup'] = $this->pathology_model->get_grupforRange();
        $data['test_Inv'] = $this->pathology_model->get_tstInvQuery();

        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('pathology/tst_range_add', $data);
        $this->load->view('home/footer'); // just the header file        
    }

    function get_invBygID() {
      $grpID = $this->input->get('grpID');
      $data = $this->pathology_model->get_invBygrpID($grpID);
      echo json_encode($data);
    }                    

    function addNewRangess() {
        $inv_iidd   = $this->input->post('inv_id');
        $Tst_Units  = $this->input->post('Tst_Units');
        $nVal       = $this->input->post('nVal');
        $tst_a_idds = $this->input->post('tst_a_idds');

        $aData = array(
            'inv_tst_a_idd'     => $tst_a_idds,
            'Test_Units'        => $Tst_Units,
            'tst_normal_rang'   => $nVal,
            'tst_inv_iid'       => $inv_iidd   
        );
        $this->pathology_model->insert_RangData($aData);
    }

    function addNewINVTest() {
        $Inv_grup_iid   = $this->input->post('invGRP_id');
        $inv_iidd       = $this->input->post('inv_id');
        $tst_Nam        = $this->input->post('name');
        $rang_typ       = $this->input->post('type');
        $tst_Range      = $this->input->post('test_no_range');
        $tst_unit       = $this->input->post('Test_Unitss');

        $aData = array(
            'p_inv_id'       => $inv_iidd,
            'test_name'      => $tst_Nam,
            'tst_typ'        => $rang_typ,
            'grup_idid'      => $Inv_grup_iid,
            'tst_normal_rang'=> $tst_Range,
            'Test_Units'     => $tst_unit     
        );
        $this->pathology_model->insert_invTstData($aData);
    }

    function updateINVTest() {
        $inv_tst_iddd   = $this->input->post('inv_tst_id');
        $tst_Nam        = $this->input->post('tst_name');
        $rang_typ       = $this->input->post('tst_type');
        $tst_rang       = $this->input->post('tst_Rang');
        $tst_unit       = $this->input->post('tst_Unit');

        $uData = array(
            'test_name'             => $tst_Nam,
            'tst_typ'               => $rang_typ,
            'tst_normal_rang'       => $tst_rang,
            'Test_Units'            => $tst_unit     
        );
        $this->pathology_model->update_invTstData($inv_tst_iddd, $uData);
    }

    function tstRngbyINV() {
        $inv_ids = $this->input->get('inv_ids');
        $data = $this->pathology_model->getTstRngByINV($inv_ids);
        echo json_encode($data);
    }

    function deleteINVTest() {
        $inv_tstI = $this->input->post('inv_tst_id');
        $this->pathology_model->delInvTSTs($inv_tstI);
    }

    function getPtnByIIDD() {
        $ptn_ids = $this->input->get('ptn_ids');
        $data = $this->pathology_model->getPtnByIdds($ptn_ids);
        echo json_encode($data);
    }

    function getPtnTstByIIDDD() {
        $ptn_ids = $this->input->get('ptn_ids');
        $data = $this->pathology_model->gettstByPtnIDD($ptn_ids);
        echo json_encode($data);
    }

    function getPtnTDDD() {
        $ptn_ids = $this->input->get('ptn_ids');
        $data = $this->pathology_model->getTstGrp($ptn_ids);
        echo json_encode($data);
    }

    function tst_result_entry() {
        $lab_ptnid  = $this->input->post('lab_ptn_iidds');
        $lab_rgstID = $this->input->post('lab_ptn_Rgstrid');
        $emp_id     = $this->ion_auth->user()->row()->emp_id;
        $thisTim    = time();

        $inv_tst_id_ = array($this->input->post('test_idii_auto'));
        $tst_result_ = array($this->input->post('lab_tst_result'));

        $eData = [];
        foreach ($inv_tst_id_ as $key => $value) {
            foreach ($value as $key1 => $value1) {
                $eData[] = [
                    'inv_tst_idsss_'    =>  $inv_tst_id_[$key][$key1],
                    'Inv_tst_result_'   =>  $tst_result_[$key][$key1],
                    'ptn_auto_iiddd'    =>  $lab_ptnid,
                    'lab_ptn_rgts_iid_' =>  $lab_rgstID,
                    'this_Emp_IDs'      =>  $emp_id,
                    'thisTime'          =>  $thisTim
                ];
            }
         } 

         $this->pathology_model->insert_tstResult($eData);

         $upData = array(
                'patho_entry_userIIDD' => $emp_id, 
            );
         $this->pathology_model->update_ptn_table($upData, $lab_ptnid);

        $this->session->set_flashdata('feedback', 'Result Entry');
            redirect('pathology');             
    }

    function printRepoView() {
        $data['ptNInfo'] = $this->labrcv_model->getptninfo();

        $loginId = $this->ion_auth->user()->row()->emp_id;
        $data['user_P'] = $this->settings_model->get_log_user($loginId);

        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('pathology/tst_repo_view', $data);
        $this->load->view('home/footer'); // just the header file        
    }

    function gettstGrupforCheck() {
        $ptn_ids = $this->input->get('ptn_ids');
        $data = $this->pathology_model->gettstByPtnIDD($ptn_ids);
        echo json_encode($data);
    }

    function TstResultViewforUpdate() {
        $ptn_ids = $this->input->get('ptn_ids');
        $data = $this->pathology_model->getTstDataForUpdate($ptn_ids);
        echo json_encode($data);
    }

    function getTstResultForPrint() {
        $ptnIds = $this->input->get('ptnIds');
        $grupIDss = $this->input->get('grupIDss');
        $data = $this->pathology_model->getTstInvResult($ptnIds, $grupIDss);
        echo json_encode($data);
    }

    function updateTstResults() {
        $lab_ptnid  = $this->input->post('lab_ptn_iidds');
        $thisTim    = time();

        $inv_tst_id_ = array($this->input->post('test_idii_auto'));
        $tst_result_ = array($this->input->post('lab_tst_result'));

        $eData = [];
        foreach ($inv_tst_id_ as $key => $value) {
            foreach ($value as $key1 => $value1) {
                $eData[] = [
                    'inv_tst_idsss_'    =>  $inv_tst_id_[$key][$key1],
                    'Inv_tst_result_'   =>  $tst_result_[$key][$key1],
                    'thisTime'          =>  $thisTim
                ];
            }
         } 

         $this->pathology_model->UpdateTstResultss($eData, $lab_ptnid);

        // $this->session->set_flashdata('feedback', 'Result Entry');
        //     redirect('pathology');             
    }

    function printReport() {
        $ptn_ids = $this->input->get('ptnId');
        $tst_grup = $this->input->get('grupID');
        $data['report_vw'] = $this->pathology_model->TstReportPrint_ss($ptn_ids, $tst_grup);
        $data['grup'] = $this->pathology_model->get_tst_grup($tst_grup);
        $data['ptn_infos'] = $this->pathology_model->getPtnByAIddsss($ptn_ids);

        $this->load->view('pathology/TstReport_Print', $data);
    } 
}








/* End of file Pathology.php */
/* Location: ./application/modules/pathology/controllers/pathology.php */