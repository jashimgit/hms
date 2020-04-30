<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pharmacist extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('pharmacist_model');
        $this->load->library('upload');
        $this->load->library('Pdf');
        $language = $this->db->get('settings')->row()->language;
        $this->lang->load('system_syntax', $language);
        $this->load->model('settings_model');
        $this->load->model('ion_auth_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        if (!$this->ion_auth->in_group('admin')) {
            redirect('home/permission');
        }
    }

    public function index() {
        $data['pharmacists'] = $this->pharmacist_model->getPharmacist();
        $data['emps'] = $this->pharmacist_model->getemp();

        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('pharmacist/pharmacist', $data);
        $this->load->view('home/footer'); // just the header file
    }




    function daily() {

 
        $target = $this->input->post('date');
        $datte = strtotime($target);
        $date = date('Y-m-d', $datte);


        $data['pharmacists'] = $this->pharmacist_model->getAttnDate($date);
        $data['emps'] = $this->pharmacist_model->getemp();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('pharmacist/daily', $data);
        $this->load->view('home/footer'); // just the header file
    }


    function job_card() {

        $data['emps'] = $this->pharmacist_model->getemp();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('pharmacist/jobcard', $data);
        $this->load->view('home/footer'); // just the header file
    }



    function job_details() {
        $month = $this->input->get('month');
        $year = $this->input->get('year');
        $emp_id = $this->input->get('emp_id');
        $data['job_cards'] = $this->pharmacist_model->job_card($emp_id, $month, $year);
        $data['job_count'] = $this->pharmacist_model->job_count($emp_id, $month, $year);
        $this->load->view('pharmacist/job_details', $data);


        // HTML to PDF
        $html = $this->output->get_output();
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();        
        $this->dompdf->stream("Daily_Attendance.pdf", array("Attachment"=>0)); //Output Line
    }



    function dailys() {
 
        $target = $this->input->get('date');
        $datte = strtotime($target);
        $date = date('Y-m-d', $datte);
        $data['pharmacists'] = $this->pharmacist_model->getAttnDates($date);
        $data['emps'] = $this->pharmacist_model->getemps();
        $this->load->view('pharmacist/dailys', $data);


        // HTML to PDF
        $html = $this->output->get_output();
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();        
        $this->dompdf->stream("Daily_Attendance.pdf", array("Attachment"=>0)); //Output Line
    }




    function monthly() {
 
        $target = $this->input->post('date');


      //  $this->db->query('
        //        SELECT COUNT(date)
          //      FROM attn
            //    WHERE MONTH(date) = $date AND emp_id = $emp_id; ');
        //$

        $data['pharmacists'] = $this->pharmacist_model->getAttnMonth();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('pharmacist/monthly', $data);
        $this->load->view('home/footer'); // just the header file
    }



//This is for Total Absence

    function getcount() {

 
        $target = $this->input->post('date');
        $datte = strtotime($target);
        $datesss = date('m', $datte);
        $data['pharmacists'] = $this->pharmacist_model->getcountmodel();
    //    $data['tdays'] = $this->pharmacist_model->getcountmodel();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('pharmacist/getcount', $data);
        $this->load->view('home/footer'); // just the header file
    }



    function salary() {



        $target = $this->input->post('date');
        $datte = strtotime($target);
        $datesss = date('m', $datte);



        
        $data['pharmacists'] = $this->pharmacist_model->getAttnMonth();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('pharmacist/salary', $data);
        $this->load->view('home/footer'); // just the header file
    }



    function alup() {

        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('pharmacist/duplod', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function attnProcess() {
        $loginId = $this->ion_auth->user()->row()->emp_id;
        $data['user_P'] = $this->settings_model->get_log_user($loginId); 

        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('pharmacist/attnProcess', $data);
        $this->load->view('home/footer'); // just the footer file    

    }



    function addNewView() {
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('pharmacist/add_new');
        $this->load->view('home/footer'); // just the header file
    }

    function addNew() {

        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        // Validating Password Field
        if (empty($id)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        }
        // Validating Email Field
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[5]|max_length[500]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[5]|max_length[50]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $data = array();
                $data['pharmacist'] = $this->pharmacist_model->getPharmacistById($id);
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('pharmacist/add_new', $data);
                $this->load->view('home/footer'); // just the footer file
            } else {
                $data = array();
                $data['setval'] = 'setval';
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('pharmacist/add_new');
                $this->load->view('home/footer'); // just the header file
            }
        } else {
            $file_name = $_FILES['img_url']['name'];
            $file_name_pieces = explode('_', $file_name);
            $new_file_name = '';
            $count = 1;
            foreach ($file_name_pieces as $piece) {
                if ($count !== 1) {
                    $piece = ucfirst($piece);
                }

                $new_file_name .= $piece;
                $count++;
            }
            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => False,
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "1768",
                'max_width' => "2024"
            );

            $this->load->library('Upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('img_url')) {
                $path = $this->upload->data();
                $img_url = "uploads/" . $path['file_name'];
                $data = array();
                $data = array(
                    'img_url' => $img_url,
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone
                );
            } else {
                //$error = array('error' => $this->upload->display_errors());
                $data = array();
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone
                );
            }
            $username = $this->input->post('name');
            if (empty($id)) {     // Adding New Pharmacist
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('feedback', 'This Email Address Is Already Registered');
                    redirect('pharmacist/addNewView');
                } else {
                    $dfg = 7;
                    $this->ion_auth->register($username, $password, $email, $dfg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                    $this->pharmacist_model->insertPharmacist($data);
                    $pharmacist_user_id = $this->db->get_where('pharmacist', array('email' => $email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->pharmacist_model->updatePharmacist($pharmacist_user_id, $id_info);
                    $this->session->set_flashdata('feedback', 'Added');
                }
            } else { // Updating Pharmacist
                $ion_user_id = $this->db->get_where('pharmacist', array('id' => $id))->row()->ion_user_id;
                if (empty($password)) {
                    $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                } else {
                    $password = $this->ion_auth_model->hash_password($password);
                }
                $this->pharmacist_model->updateIonUser($username, $email, $password, $ion_user_id);
                $this->pharmacist_model->updatePharmacist($id, $data);
                $this->session->set_flashdata('feedback', 'Updated');
            }
            // Loading View
            redirect('pharmacist');
        }
    }





//New Attendance 
    function NewAttn() {
        $data = array();
        $emp_id = $this->input->post('emp_id');
        $date = $this->input->post('date');
        $intime = $this->input->post('intime');
        $outtime = $this->input->post('outtime');
        $data = array(
                    'emp_id' => $emp_id,
                    'date' => $date,
                    'intim' => $intime,
                    'outtim' => $outtime
            );
        $data['pharmacist'] = $this->pharmacist_model->insertPharmacist($data);
            redirect('pharmacist');
        }




    function getPharmacist() {
        $data['pharmacists'] = $this->pharmacist_model->get_pharmacist();
        $data['pharmacist'] = $this->pharmacist_model->get_pharmacist();
        $this->load->view('pharmacist/pharmacist', $data);
    }

    function editPharmacist() {
        $data = array();
        $id = $this->input->get('id');
        $data['pharmacist'] = $this->pharmacist_model->getPharmacistById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('pharmacist/add_new', $data);
        $this->load->view('home/footer'); // just the footer file
    }



    function UpdatePharmacist() {
        $data = array();
        $id = $this->input->get('id');

        $id = $this->input->post('id');
        $emp_id = $this->input->post('emp_id');
        $date = $this->input->post('date');
        $intim = $this->input->post('intim');
        $outtim = $this->input->post('outtim');


        $data = array(

                    'intim' => $intim,
                    'outtim' => $outtim
            );

        $data['pharmacist'] = $this->pharmacist_model->updatePharmacist($id, $data);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('pharmacist/update', $data);
        $this->load->view('home/footer'); // just the footer file

            redirect('pharmacist/daily');
    }









    function UpdatePh() {
        $data = array();
        $id = $this->input->get('id');

        $id = $this->input->post('id');
        $emp_id = $this->input->post('emp_id');
        $date = $this->input->post('date');
        $intim = $this->input->post('intim');
        $outtim = $this->input->post('outtim');
        $data = array(

                    'intim' => $intim,
                    'outtim' => $outtim
            );

        $data['pharmacist'] = $this->pharmacist_model->updatePharmacist($id, $data);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('pharmacist/update', $data);
        $this->load->view('home/footer'); // just the footer file

            redirect('pharmacist');
    }







    function editPharmacistByJason() {
        $id = $this->input->get('id');
        $data['pharmacist'] = $this->pharmacist_model->getPharmacistByIdex($id);
        echo json_encode($data);
    }


    function monthPharmacistByJason() {
        $id = $this->input->get('id');
        $data['pharmacist'] = $this->pharmacist_model->monPharmacistByIdex($id);
        echo json_encode($data);
    }

    function delete() {
        $id = $this->input->get('id');
        $this->pharmacist_model->delete($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('pharmacist');
    }

    function checkAttnProcess() {
       $get_date = $this->input->get('date');
       $this_date = date('Y-m-d', strtotime($get_date));
       $data = $this->pharmacist_model->getAttnProccess($this_date);
       echo json_encode($data);
    }

    function getTempAttn_Log() {
       // $t_date_ = $this->input->get('temp_date');
       // $temp_date = date('Y-m-d', strtotime($t_date_));
       $data = $this->pharmacist_model->getemps();
       echo json_encode($data);        
    } 

    function getTempAttn_Log_sub_query(){
        $attn_temp_date = $this->input->get('temp_date');
        $temp_date = date('Y-m-d', strtotime($attn_temp_date));
        $empUser = $this->input->get('empUser');
        $data = $this->pharmacist_model->getTempAttn_Log_sub_query($empUser, $temp_date);
        echo json_encode($data);        
   }

    function print_temp_attn() {
        $temp_date = $this->input->get('temp_date');
        $data['date_tmp'] = date('Y-m-d', strtotime($temp_date));
        $this->load->view('pharmacist/print_tmp_attn_ss', $data);
    }

    function InsertAnntTtl() {
        $TempPrcssDate  = $this->input->post('prcssDate');
        $prcssDate      = date('Y-m-d', strtotime($TempPrcssDate));
        $user_empIddd   = array($this->input->post('user_empIdd'));
        $userInTime     = array($this->input->post('user_in_time'));
        $userOutTime    = array($this->input->post('userOut_time'));

        $emp_id         = $this->ion_auth->user()->row()->emp_id;
        $thisTim        = time();
        $thisDates      = date('Y-m-d', time());

        $eData = [];
        foreach ($user_empIddd as $key => $value) {
            foreach ($value as $key1 => $value1) {
                $eData[] = [
                    'emp_id'        =>  $user_empIddd[$key][$key1],
                    'intim'         =>  $userInTime[$key][$key1],
                    'outtim'        =>  $userOutTime[$key][$key1],
                    'attn_date'     =>  $prcssDate
                ];
            }
         } 
          $this->pharmacist_model->insert_attnTotal($eData);

        $prData = array(
            'temp_process_date'     => $prcssDate, 
            'this_date_t'           => $thisDates, 
            'this_timestamp_t'      => $thisTim, 
            'this_emp_userss'       => $emp_id 
        );
          $this->pharmacist_model->insert_processData($prData);
    }

    function EditEmpJobCardView() {
        $loginId = $this->ion_auth->user()->row()->emp_id;
        $data['user_P'] = $this->settings_model->get_log_user($loginId);
        $data['getemp'] = $this->pharmacist_model->getemp(); 

        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('pharmacist/emp_job_card_edit', $data);
        $this->load->view('home/footer'); // just the footer file            
    }

    function getAttnFullEmpData() {
        $emp_iddii = $this->input->post('ProssEMP_ID');
        $getMonth = $this->input->post('getMonthss');
        $getYear = $this->input->post('getYearss');
        $data = $this->pharmacist_model->getAttnFullEmpData($emp_iddii, $getMonth, $getYear); 
        echo json_encode($data);
    }

}



