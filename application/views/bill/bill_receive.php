

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title"> Patient </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Receive Patient Bill </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="form-group mb-0 row" style="width: 60%; ">
        <div class="col-md-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Type Patient Registration No </span>
                </div>
                <input class="form-control input_reg_no" type="text">
                <div class="input-group-append">
                    <button class="btn btn-primary reg_search_btn" type="button">Button</button>
                </div>
            </div>
        </div>
    </div>

    <div class="error_show">  </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class=" patients_data_a_bill">
<!--  Patient Information Here ...   -->
                </div>

                <div class=""></div>
                <div style="font-size: 20px; font-weight: bold; width: 30%;" align="right" class="totalCreated_bill_sss t_b"></div>
                <div style="font-size: 20px; font-weight: bold; width: 30%;" align="right" class="total_bill t_b"></div>
                <div class="advance_payment_ss"></div>

            </div>
        </div>
    </div><br>

    <center> 
      <div class="type_receive_bill_box" style="width: 20%; "></div> <br>
      <div class="add_indoor_bill"  style="width: 75%; "></div> 
      <div class="add_bill_cat"  style="width: 75%; display: none;"></div> 
      <div style="font-size: 20px; font-weight: bold; width: 30%;" align="right" class="total_indoor_bill_from_box "></div> <br>
      <div style="font-size: 20px; font-weight: bold; width: 30%;" align="right" class="  "></div> <br>
       <div class="receive_bill_btn"></div><br>
    </center>
    
    <br><br><br><br><br><br><br><br><br><br>



    <script type="text/javascript">
        
        var bed_fee_admit_patient = 0;
        var total_admit_day = 0;
        var bed_rate_s = 0;
        var bed_amount_hours = 0;
        var consultant1_data = '';
        var consultant2_data = '';
        var anesth_data = '';
        var ot_assist_data = '';
        var admit_days;
        var remain_hours;
        var remain_minutes;

        var service_charge_rates = 0;
        var stitch_fee_with_comission = 0;
        var dreshing_charge_with_comission = 0;
        var ng_tube_charge_with_comission = 0;
        var catheter_charge_with_comission = 0;
        var iv_canala_with_comission = 0;
        var all_photoTherapy_rates = 0;
        var oxy_rates = 0;
        var cbg_due_rates = 0;
        var medicine_cost = 0;
        var ecg_due_rates = 0;
        var xray_due_rates = 0;
        var bed_fee_rates = 0;
        var dr_consultant_rates = 0 ;
        var dr_night_fee = 0;
        var dr_ticket_night = 0;
        var service_fee_with_comission = 0;
        var oxy_or_photoTherapy_rates = 0;
        var extra_out_rates = 0;
        var dr_firsttime_due = 0;
        var ot_charge_rates = 0;
        var Oxy_charge_ratesss = 0;
        var ot_team_charge = 0;
        var total_created_bill_amount_ssss = 0;

        var ot_team_charge_3 = 0;
        var ot_team_charge_4 = 0;
        var ot_team_charge_5 = 0;

        var ot_team_charge_annes = 0;
        var ot_team_charge_assis = 0;
        var ot_team_charge_dr = 0;

        var dr_auto_id_ss = 0;
        var dr_name_ss = '';
        var dr_first_ticket_charge = 0;
        var dr_first_ticket_hospital_charge = 0;
        var dr_sec_ticket_charge = 0;
        var dr_sec_ticket_hospital_charge = 0;
        var consultant1_name_ss = '';
        var consultant1_sec_ticket_charge = 0;
        var consultant1_sec_ticket_hospital_charge = 0;
        var consultant2_name_ss = '';
        var consultant2_sec_ticket_charge = 0;
        var consultant2_sec_ticket_hospital_charge = 0;
        var type_receive_bill_box = '<div class="input-group" style="border: 3px solid black "><div class="input-group-prepend"><span class="input-group-text"> Type Bill </span></div><input class="form-control type_receive_bill_amount" style="text-align: right; " type="text"></div>';

        $('.reg_search_btn').click(function() { 
            getPatientInfoByRegNo();
        })

        $(document).on('keypress', '.input_reg_no', function(e) {
          if(e.which == 13) {
            getPatientInfoByRegNo();
          }
        });



    function getPatientInfoByRegNo() {
            var input_reg_no = $('.input_reg_no').val();
            if (input_reg_no == '') {
                $('.error_show').html(' Empty Please Type Registration Number....');
            }else {
                $.ajax({
                    url: 'bill/getPatientByRegNoForBillReceive?reg_no='+input_reg_no,
                    data: '',
                    method: 'GET',
                    dataType: 'json',
                    success: function(ptn_info) {                      

                        if (!$.trim(ptn_info.pathinfo)){   
                            $('.error_show').html(' Wrong Registration No.. Type Correct Registration No.. ');
                            $('.patients_data_a_bill').html('');
                            $('.total_bill').html('');              
                            $('.add_bill_cat').html('');
                            $('.advance_payment_ss').html('');
                            $('.type_receive_bill_box').html('');
                            $('.total_indoor_bill_from_box').html('');
                            $('.totalCreated_bill_sss').html('');
                            $('.receive_bill_btn').html('');
                            $('.add_indoor_bill').html('');
                        }else{      
                            $('.add_indoor_bill').html('');
                            $('.error_show').html('');

                            if (ptn_info.pathinfo.bill_receive_dates == '' && ptn_info.pathinfo.bll_rcv_emp == 0) {

                              if (ptn_info.pathinfo.bill_cr_date == '' && ptn_info.pathinfo.bill_create_emp == 0) {
                                  var bill_opt = '<select class="form-control bill_type" style="width: 50%; ">'+
                                          '<option value=""> Select Bill Type </option>'+
                                          '<option value="1"> Indoor </option>'+
                                          '<option value="2"> DNC </option>'+
                                          '<option value="3"> NVD </option>'+
                                          '<option value="4"> OT </option>'+
                                      '</select>';
                                  
                              }else {
                                  var bill_opt = '<button type="button" class="ui_extra_btn ui_extra_btn_orange rounded advance_pay_after_bill_create"> ADVANCE Payment </button> <button type="button" class="ui_extra_btn ui_extra_btn_light_green rounded bill_receive_btn"> Receive Bill </button><center class="bill_option_for_update" ></center>';
                              }
                            }else {
                              var bill_opt = '<button type="button" class="ui_extra_btn ui_extra_btn_red rounded update_received_bill"><i class="fa fa-edit"></i> Update Receive Bill </button> <button type="button" class="btn btn-dark btn-lg print_received_bill"><i class="fa fa-print"></i> PRINT Receive Bill </button><center class="bill_option_for_update" ></center>';
                            }

        dr_auto_id_ss = ptn_info.pathinfo.dr_a_iniq_idd;
        consultant1_data = ptn_info.pathinfo.consultant_id;
        consultant2_data = ptn_info.pathinfo.consul_sec_id;
        anesth_data = ptn_info.pathinfo.anes_id;
        ot_assist_data = ptn_info.pathinfo.assistant_id;

        dr_name_ss = ptn_info.pathinfo.dr_name;
        dr_first_ticket_charge = parseInt(ptn_info.pathinfo.dr_firsttime);
        dr_first_ticket_hospital_charge = parseInt(ptn_info.pathinfo.hospital_first);
        dr_sec_ticket_charge = parseInt(ptn_info.pathinfo.dr_sectime);
        dr_sec_ticket_hospital_charge = parseInt(ptn_info.pathinfo.hospital_sec);

            consultant1_name_ss = ptn_info.constant1_name.dr_name;
            consultant1_sec_ticket_charge = parseInt(ptn_info.constant1_name.dr_sectime);
            consultant1_sec_ticket_hospital_charge = parseInt(ptn_info.constant1_name.hospital_sec);
            consultant2_name_ss = ptn_info.constant2_name.dr_name;
            consultant2_sec_ticket_charge = parseInt(ptn_info.constant2_name.dr_sectime);
            consultant2_sec_ticket_hospital_charge = parseInt(ptn_info.constant2_name.hospital_sec);

                // Bed Rates 
        bed_rate_s = ptn_info.pathinfo.price;
        bed_amount_hours = bed_rate_s / 24;
                // Bed Rates 

                    // Timestamp to Admitted Date and Time 
            var admit_time = ptn_info.pathinfo.time_this;
            var AdmitTimestamp = admit_time*1000;
            var nowTimestamp = $.now();
            var ramainTimestamp = nowTimestamp - AdmitTimestamp;
                admit_days = Math.floor((ramainTimestamp/1000)/60/60/24);
            var total_admit_hours = Math.floor((ramainTimestamp/1000)/60/60);
            var total_admit_minutes = Math.floor((ramainTimestamp/1000)/60);
                remain_hours = total_admit_hours % 24;
                remain_minutes = total_admit_minutes % 60;

            if (remain_hours > 7 && admit_days != 0 ) {
                total_admit_day = admit_days + 1;   
            }else if(admit_days == 0) {
                total_admit_day = 1;
            }else {
                total_admit_day = admit_days;
            }

            if (admit_days == 0 && remain_hours < 7 ) {
                bed_fee_admit_patient = 100;
            }else {
                bed_fee_admit_patient = bed_rate_s * total_admit_day;
            }
                    // Timestamp to Admitted Date and Time 

                    // Timestamp to Date and Time 
            var date = new Date(AdmitTimestamp);
            var day = (date.getDate() < 10 ? '0' : '') + date.getDate();
            var month = (date.getMonth() < 9 ? '0' : '') + (date.getMonth() + 1);
            var year = date.getFullYear();
            var hours = ((date.getHours() % 12 || 12) < 10 ? '0' : '') + (date.getHours() % 12 || 12);
            var minutes = (date.getMinutes() < 10 ? '0' : '') + date.getMinutes();
            var meridiem = (date.getHours() >= 12) ? 'pm' : 'am';
            var formattedDate = day + '-' + month + '-' + year + ' at ' + hours + ':' + minutes + ' ' + meridiem;
            var dateformt = day + '-' + month + '-' + year;
            var times_formates = hours + ':' + minutes + ' ' + meridiem;
                    // Timestamp to Date and Time 

                            $('.patients_data_a_bill').html(' <h4 class="card-title"> Patients Information </h4>'+
                                    '<div class="row">'+
                                        '<div class="col-xl-6">'+
                                            '<div class="form-group row">'+
                                                '<label class="col-lg-3 col-form-label"> Patient Name </label>'+
                                                '<div class="col-lg-9">'+
                                                    '<div class="form-control patient_name input-group-text" patient_stus="'+ptn_info.pathinfo.p_stus+'"  patient_auto_idd="'+ptn_info.pathinfo.p_n_id+'"> '+ptn_info.pathinfo.ptnname+' </div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-xl-6">'+
                                            '<div class="form-group row">'+
                                                '<label class="col-lg-3 col-form-label "> Doctor Name </label>'+
                                                '<div class="col-lg-9">'+
                                                    '<div class="form-control doctor_name input-group-text"> '+ptn_info.pathinfo.dr_name+' </div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-xl-6">'+
                                            '<div class="form-group row">'+
                                                '<label class="col-lg-3 col-form-label"> Bed No </label>'+
                                                '<div class="col-lg-9">'+
                                                    '<div class="form-control patient_name input-group-text"> '+ptn_info.pathinfo.b_num+' </div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-xl-6">'+
                                            '<div class="form-group row">'+
                                                '<label class="col-lg-3 col-form-label"> Admit Date Time </label>'+
                                                '<div class="col-lg-9">'+
                                                    '<div class="form-control patient_name input-group-text"> '+dateformt+' - '+times_formates+' </div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<center class="bill_option_add" >'+bill_opt+'</center>');
                            $('.total_bill').html('');              
                            $('.add_bill_cat').html('');
                            $('.advance_payment_ss').html('');
                            $('.type_receive_bill_box').html('');
                            $('.total_indoor_bill_from_box').html('');
                            $('.totalCreated_bill_sss').html('');
                            $('.receive_bill_btn').html('');
                        }
                    },
                    error: function(){
                        $('.error_show').html(' Server Error Please Reload Again .... ');
                        $('.patients_data_a_bill').html('');
                        $('.total_bill').html('');              
                        $('.add_bill_cat').html('');
                        $('.advance_payment_ss').html('');
                        $('.type_receive_bill_box').html('');
                        $('.total_indoor_bill_from_box').html('');
                        $('.totalCreated_bill_sss').html('');
                        $('.receive_bill_btn').html('');
                        $('.add_indoor_bill').html('');
                    }
                })
            }
        }

    $(document).on('change', '.bill_type', function() {
        var bill_type_val = $(this).val();

        if (bill_type_val != '') {
          $('.advance_payment_ss').html('<center><input type="text" style="text-align: right; width: 30%; font-weight:bold; font-size:16px;" class="form-control advance_type_taka" value="0" > <a class="ui_extra_btn ui_extra_btn_purple rounded press-me advance_payment_save_btn" style="color:white; " > ADVANCE BILL </a><a class="ui_extra_btn ui_extra_btn_dark-blue full-rounded print_advance_bill" style="color:white; " > Print Advance Bill </a> </center>');
            $.ajax({
                url: 'bill/getBillcatByJson',
                data: '',
                method: 'GET',
                dataType: 'json',
                success: function(get_bil_cat) {


            var html_full_data = '';


                    if (!$.trim(get_bil_cat)){   
                        $('.error_show').html(' Something is Error ... ');
                    }else {
                        for (var i = 0; i < get_bil_cat.length; i++) {

                            if (bill_type_val == 1) {
                                if (get_bil_cat[i].c_num == '9' || get_bil_cat[i].c_num == '10' ||  get_bil_cat[i].c_num == '15' || get_bil_cat[i].c_num == '16' ||  get_bil_cat[i].c_num == '21' || get_bil_cat[i].c_num == '23' || get_bil_cat[i].c_num == '19') {
                                    var special_cat_rates = parseInt(get_bil_cat[i].indore_rate);
                                    html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_bil_cat[i].c_num+'" bill_cat_rates="'+special_cat_rates+'" billcat_idd="'+get_bil_cat[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_bil_cat[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right; border: 1px solid black;" class="form-control cat_type_num">'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value bill_tk" value="0" >'+
                                            '</div>';

                                }else if (get_bil_cat[i].c_num == '8') {


                                    html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_bil_cat[i].c_num+'" bill_cat_rates="'+bed_rate_s+'" billcat_idd="'+get_bil_cat[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_bil_cat[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value bill_tk" value="'+bed_fee_admit_patient+'" >'+
                                            '</div>';
                                }else if (get_bil_cat[i].c_num == '2' || get_bil_cat[i].c_num == '24' ) {

                                    var services_dr_rates = parseInt(get_bil_cat[i].indore_rate);
                                    var total_services_dr_rates;

                                    if (admit_days == 0 && remain_hours < 7 ) {
                                        total_services_dr_rates = 250;
                                    }else {
                                        total_services_dr_rates = services_dr_rates * total_admit_day;
                                    }

                                    html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_bil_cat[i].c_num+'" bill_cat_rates="'+services_dr_rates+'" billcat_idd="'+get_bil_cat[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_bil_cat[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value  bill_tk" value="'+total_services_dr_rates+'" >'+
                                            '</div>';
                                }else if (get_bil_cat[i].c_num == '1' ) {

                                    html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_bil_cat[i].c_num+'" bill_cat_rates="'+ex_cat_rates+'" billcat_idd="'+get_bil_cat[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_bil_cat[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value  bill_tk" value="'+parseInt(get_bil_cat[i].indore_rate)+'" >'+
                                            '</div>';
                                }else {
                                    var ex_cat_rates;

                                    if (admit_days == 0 && remain_hours < 7 ) {
                                        ex_cat_rates = 0;
                                    }else {
                                        ex_cat_rates = parseInt(get_bil_cat[i].indore_rate);
                                    }

                                    html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_bil_cat[i].c_num+'" bill_cat_rates="'+ex_cat_rates+'" billcat_idd="'+get_bil_cat[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_bil_cat[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value  bill_tk" value="'+ex_cat_rates+'" >'+
                                            '</div>';
                                }
                            }else if (bill_type_val == 2) {
                                var dnc_rates = parseInt(get_bil_cat[i].dnc_rate);
                                html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_bil_cat[i].c_num+'" bill_cat_rates="'+dnc_rates+'" billcat_idd="'+get_bil_cat[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_bil_cat[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value  bill_tk"  value="'+dnc_rates+'">'+
                                            '</div>';
                            }else if (bill_type_val == 3) {
                                var nvd_rates = parseInt(get_bil_cat[i].nvd_rate);
                                html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_bil_cat[i].c_num+'" bill_cat_rates="'+nvd_rates+'" billcat_idd="'+get_bil_cat[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_bil_cat[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value  bill_tk" value="'+nvd_rates+'">'+
                                            '</div>';
                            }else if (bill_type_val == 4) {
                                var ot_rates = parseInt(get_bil_cat[i].ot_rate);
                                html_full_data += '<div class="input-group bill_cat_main_div" style="width: 60%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_bil_cat[i].c_num+'" bill_cat_rates="'+ot_rates+'" billcat_idd="'+get_bil_cat[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_bil_cat[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" class="form-control cat_rates_value  bill_tk" style="text-align: right;" value="'+ot_rates+'">'+
                                            '</div>';

                            }
                        }
                        $('.add_bill_cat').html(html_full_data);              
                        total_bill_amount();
                    } 
                }
             })      
        }else {
            $('.add_bill_cat').html('');
            $('.total_bill').html(''); 
        }
    })


    function totalCreated_billsss() {   
        var patient_a_idd = $('.patient_name').attr('patient_auto_idd');

      $.ajax({
          url: 'bill/getCreateBillforAdvance?p_idd='+patient_a_idd,
          data: '',
          method: 'GET',
          dataType: 'json',
          success: function(total_create_bill) {                  
            $('.totalCreated_bill_sss').html('Total Create Bill '+total_create_bill);  
          }
        })
    }


    $(document).on('click', '.advance_pay_after_bill_create', function() {  

        totalCreated_billsss();    
        var patient_a_idd = $('.patient_name').attr('patient_auto_idd');
          $('.total_bill').html(''); 
          $('.add_bill_cat').html('');
          $('.add_indoor_bill').html('');
          $('.type_receive_bill_box').html('');
          $('.total_indoor_bill_from_box').html('');

        $('.advance_payment_ss').html('<center><input type="text" style="text-align: right; width: 30%; font-weight:bold; font-size:16px;" class="form-control advance_type_taka" value="0" > <a class="ui_extra_btn ui_extra_btn_purple rounded press-me advance_payment_save_btn" style="color:white; " > ADVANCE BILL </a><a class="ui_extra_btn ui_extra_btn_dark-blue full-rounded print_advance_bill" style="color:white; " > Print Advance Bill </a> </center>');
    })





    $(document).on('click', '.bill_receive_btn', function() {
        $('.add_bill_cat').html('');
        $('.advance_payment_ss').html('');
            getCreateBillforReceive();
        $('.type_receive_bill_box').html(type_receive_bill_box);
            totalCreated_billsss();
    })

    function getCreateBillforReceive() {
        var patient_a_idd = $('.patient_name').attr('patient_auto_idd');   
        var patient_stus = $('.patient_name').attr('patient_stus');

        $.ajax({
            url: 'bill/getCreateBillforReceive?p_idd='+patient_a_idd,
            data: '',
            method: 'GET',
            dataType: 'json',
            success: function(all_create_bill) {  
              if (!$.trim(all_create_bill)) {  
                    // if This is Indoor 
                  $('.error_show').html(' Something is Error ... ');
              }else {
                  $('.error_show').html('');
                  var full_data_s = '';
                  var i;
                  for (i=0; i<all_create_bill.length; i++) {

                    total_created_bill_amount_ssss = total_created_bill_amount_ssss + parseInt(all_create_bill[i].create_bill_taka); 

                    if (patient_stus == 'indoor') {
                      if (all_create_bill[i].c_num == '24') {
                               
                          service_charge_rates = parseInt(all_create_bill[i].create_bill_taka);
                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly" style="  background: white; text-align: right;" class="form-control receive_bill_amount services_input_box bill_tk  " value="'+service_charge_rates+'" >'+
                                      '</div>';
                      }else if (all_create_bill[i].c_num == '8') {                    
                          // if This is Bed Fee
                          bed_fee_rates = parseInt(all_create_bill[i].create_bill_taka);
                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control receive_bill_amount bed_fee_input_box bill_tk  " value="'+bed_fee_rates+'" >'+
                                      '</div>';
                      }else if (all_create_bill[i].c_num == '7') {
                          dr_firsttime_due = parseInt(all_create_bill[i].create_bill_taka);
                          var dr_first_fee_least = dr_firsttime_due - dr_first_ticket_charge;
                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+'  </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control receive_bill_amount dr_first_fee_input_box bill_tk  " value="'+dr_first_fee_least+'" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" dr_uniq_auto_idds_first_ticket="'+dr_auto_id_ss+'">'+
                                          '<span class="input-group-text" id=""> '+dr_name_ss+' (First Ticket) </span>'+
                                        '</div>'+
                                        '<input type="text" dr_first_ticket_s="'+dr_first_ticket_charge+'" dr_first_hospital_fee="'+dr_first_ticket_hospital_charge+'" readonly="readonly" style=" background: white; text-align: right;" class="form-control   dr_first_ticket_fee bill_tk" value="'+dr_first_ticket_charge+'" >'+
                                      '</div>';
                      }else if (all_create_bill[i].c_num == '2') {
                          dr_consultant_rates = parseInt(all_create_bill[i].create_bill_taka);
                        if (consultant1_name_ss == null && consultant2_name_ss == null) {

                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control receive_bill_amount dr_con_lest_amount   bill_tk" value="'+dr_consultant_rates+'" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" dr_uniq_auto_idds="'+dr_auto_id_ss+'" >'+
                                          '<span class="input-group-text" id=""> '+dr_name_ss+' </span>'+
                                        '</div>'+
                                        '<input type="text" style="text-align: right; border: 1px solid black;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control dr_sec_1_type ">'+
                                        '<input type="text" readonly="readonly"   style=" background: white; text-align: right;" class="form-control dr_sec_1_val " value="0" >'+
                                      '</div>';
                        }else if (consultant1_name_ss != null && consultant2_name_ss == null) {

                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control  receive_bill_amount dr_con_lest_amount  bill_tk" value="'+dr_consultant_rates+'" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info"  dr_uniq_auto_idds="'+dr_auto_id_ss+'" >'+
                                          '<span class="input-group-text" id=""> '+dr_name_ss+' </span>'+
                                        '</div>'+
                                        '<input type="text"  onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control  dr_sec_1_type ">'+
                                        '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control dr_sec_1_val " value="0" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" con1_uniq_auto_idds="'+consultant1_data+'"  >'+
                                          '<span class="input-group-text" id=""> '+consultant1_name_ss+' </span>'+
                                        '</div>'+
                                        '<input type="text"  onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control con1_sec_1_type ">'+
                                        '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control con1_sec_1_val   " value="0" >'+
                                      '</div>';
                        }else if (consultant1_name_ss == null && consultant2_name_ss != null) {

                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                      '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                        '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                      '</div>'+
                                      '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control dr_con_lest_amount receive_bill_amount bill_tk" value="'+dr_consultant_rates+'" >'+
                                    '</div>'+
                                    '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                      '<div class="input-group-prepend billcat_info"   dr_uniq_auto_idds="'+dr_auto_id_ss+'"   >'+
                                        '<span class="input-group-text" id=""> '+dr_name_ss+' </span>'+
                                      '</div>'+
                                      '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" style="text-align: right; border: 1px solid black;" class="form-control  dr_sec_1_type ">'+
                                      '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control   dr_sec_1_val " value="0" >'+
                                    '</div>'+
                                    '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                      '<div class="input-group-prepend billcat_info"   con2_uniq_auto_idds="'+consultant2_data+'"   >'+
                                        '<span class="input-group-text" id=""> '+consultant2_name_ss+' </span>'+
                                      '</div>'+
                                      '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"   style="text-align: right; border: 1px solid black;" class="form-control con2_sec_2_type ">'+
                                      '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control con2_sec_2_val " value="0" >'+
                                    '</div>';
                        }else if (consultant1_name_ss != null && consultant2_name_ss != null) {

                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                      '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                        '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                      '</div>'+
                                      '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control dr_con_lest_amount    receive_bill_amount bill_tk" value="'+dr_consultant_rates+'" >'+
                                    '</div>'+
                                    '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                      '<div class="input-group-prepend billcat_info"   dr_uniq_auto_idds="'+dr_auto_id_ss+'"   >'+
                                        '<span class="input-group-text" id=""> '+dr_name_ss+' </span>'+
                                      '</div>'+
                                      '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control dr_sec_1_type ">'+
                                      '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control dr_sec_1_val   " value="0" >'+
                                    '</div>'+
                                    '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                      '<div class="input-group-prepend billcat_info"   con1_uniq_auto_idds="'+consultant1_data+'" >'+
                                        '<span class="input-group-text" id=""> '+consultant1_name_ss+' </span>'+
                                      '</div>'+
                                      '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control  con1_sec_1_type ">'+
                                      '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control    con1_sec_1_val " value="0" >'+
                                    '</div>'+
                                    '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                      '<div class="input-group-prepend billcat_info"  con2_uniq_auto_idds="'+consultant2_data+'"   >'+
                                        '<span class="input-group-text" id=""> '+consultant2_name_ss+' </span>'+
                                      '</div>'+
                                      '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control  con2_sec_2_type ">'+
                                      '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control    con2_sec_2_val " value="0" >'+
                                    '</div>';
                        }
                      }else if (all_create_bill[i].c_num == '12') {
                          dr_night_fee = parseInt(all_create_bill[i].create_bill_taka);
                          var lest_dr_night_ticket = dr_night_fee - dr_first_ticket_charge;
                          dr_ticket_night = dr_first_ticket_charge / 2; 
                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+'  </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control   receive_bill_amount bill_tk" value="'+lest_dr_night_ticket+'" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info"  dr_uniq_auto_idds_night_ticket="'+dr_auto_id_ss+'"    >'+
                                          '<span class="input-group-text" id=""> '+dr_name_ss+' Night Ticket </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly" dr_night_ticket_charge_fees_s="'+dr_ticket_night+'" style=" background: white; text-align: right;" class="form-control   dr_night_ticket_charge bill_tk" value="'+dr_first_ticket_charge+'" >'+
                                      '</div>';
                      }else if (all_create_bill[i].c_num == '13') {
                           
                          stitch_fee_with_comission = parseInt(all_create_bill[i].create_bill_taka);
                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control   receive_bill_amount stitch_fee_input_box bill_tk" value="'+stitch_fee_with_comission+'" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'"  >'+
                                          '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                        '</div>'+
                                        '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control stitch_bill_comission_type">'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control   stitch_bill_comission_tk bill_commssion_tk " value="0" >'+
                                      '</div>';
                      }else if (all_create_bill[i].c_num == '14') {
                           
                          dreshing_charge_with_comission = parseInt(all_create_bill[i].create_bill_taka);
                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control   receive_bill_amount dreshing_fee_input_box bill_tk" value="'+dreshing_charge_with_comission+'" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name"></span>'+
                                        '</div>'+
                                        '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control dreshing_fee_bill_comission_type bill_comission_type">'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control   dreshing_fee_bill_comission_tk bill_commssion_tk " value="0" >'+
                                      '</div>';
                      }else if (all_create_bill[i].c_num == '15') {
                           
                          ng_tube_charge_with_comission = parseInt(all_create_bill[i].create_bill_taka);
                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control   receive_bill_amount ng_tube_fee_input_box bill_tk" value="'+ng_tube_charge_with_comission+'" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name"></span>'+
                                        '</div>'+
                                        '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ng_tube_fee_bill_comission_type bill_comission_type">'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control   ng_tube_fee_bill_comission_tk bill_commssion_tk " value="0" >'+
                                      '</div>';
                      }else if (all_create_bill[i].c_num == '16') {
                           
                          catheter_charge_with_comission = parseInt(all_create_bill[i].create_bill_taka);
                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control   receive_bill_amount catheter_fee_input_box bill_tk" value="'+catheter_charge_with_comission+'" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name"></span>'+
                                        '</div>'+
                                        '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control catheter_fee_bill_comission_type bill_comission_type">'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control   catheter_fee_bill_comission_tk bill_commssion_tk " value="0" >'+
                                      '</div>';
                      }else if (all_create_bill[i].c_num == '17') {
                           
                          iv_canala_with_comission = parseInt(all_create_bill[i].create_bill_taka);
                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control   receive_bill_amount iv_canala_fee_input_box bill_tk" value="'+iv_canala_with_comission+'" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name"></span>'+
                                        '</div>'+
                                        '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control iv_canala_fee_bill_comission_type bill_comission_type">'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control   iv_canala_fee_bill_comission_tk bill_commssion_tk " value="0" >'+
                                      '</div>';
                      }else if (all_create_bill[i].c_num == '20') {
                            xray_due_rates = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'"> </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+xray_due_rates+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '21') {
                            ecg_due_rates = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'">  </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+ecg_due_rates+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '22') {
                            medicine_cost = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'">  </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+medicine_cost+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '23') {
                            cbg_due_rates = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'">  </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+cbg_due_rates+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '10') {
                            oxy_rates = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control receive_bill_amount oxy_rates_input_boxs   bill_tk " value="'+oxy_rates+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '19') {
                            all_photoTherapy_rates = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control photoTherapy_rates_input_boxs   receive_bill_amount bill_tk" value="'+all_photoTherapy_rates+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '6') {
                      ot_charge_rates = parseInt(all_create_bill[i].create_bill_taka);
                      full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                    '</div>'+
                                    '<input type="text" readonly="readonly" style="background: white; text-align: right;" class="form-control ot_charges_input_boxs receive_bill_amount bill_tk" value="'+ot_charge_rates+'" >'+
                                  '</div>';
                    }else {
                        all_others_bill = parseInt(all_create_bill[i].create_bill_taka);
                        full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                      '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                        '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                      '</div>'+
                                      '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control all_others_input_box_ss   receive_bill_amount bill_tk" value="'+all_others_bill+'" >'+
                                    '</div>';
                      }
                    }else if (patient_stus == 'dnc') {
                      if (all_create_bill[i].c_num == '24') {
                          service_charge_rates = parseInt(all_create_bill[i].create_bill_taka);
                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control services_input_box receive_bill_amount bill_tk" value="'+service_charge_rates+'" >'+
                                      '</div>';
                      }else if (all_create_bill[i].c_num == '8') {
                          bed_fee_rates = parseInt(all_create_bill[i].create_bill_taka);
                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control receive_bill_amount bed_fee_input_box bill_tk" value="'+bed_fee_rates+'" >'+
                                      '</div>';
                    }else if (all_create_bill[i].c_num == '3') {
                      ot_team_charge_3 = parseInt(all_create_bill[i].create_bill_taka);
                    }else if (all_create_bill[i].c_num == '4') {
                      ot_team_charge_4 = parseInt(all_create_bill[i].create_bill_taka);
                    }else if (all_create_bill[i].c_num == '5') {
                      ot_team_charge_5 = parseInt(all_create_bill[i].create_bill_taka);
                      ot_team_charge = ot_team_charge_3+ot_team_charge_4+ot_team_charge_5;
                      if (anesth_data == '' && ot_assist_data == '') {
                      full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> OT Team Charge </span>'+
                                    '</div>'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control receive_bill_amount ot_team_least_fee_charge bill_tk" value="'+ot_team_charge+'" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'"  >'+
                                      '<span class="input-group-text" id=""> '+dr_name_ss+'  <input type="hidden" class=" bill_comission_name" value="'+dr_name_ss+'">  </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" style="text-align: right; border: 1px solid black;" class="form-control ot_team_dr_charge_type_ss ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_dr_charge bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff1_1_charge_fee_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff1_1_fee_val bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff2_2_charge_fees_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff2_2_fees_val_s_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff3_3_charge_fees_types_s ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff3_3_fee_s_val_ss bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff4_4_charges_fees_type_ss_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff4_4_fee_s_val_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>';
                          }else if (anesth_data != '' && ot_assist_data == '') {
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> OT Team Charge </span>'+
                                    '</div>'+
                                    '<input type="text" style="text-align: right;" class="form-control ot_team_least_fee_charge receive_bill_amount  bill_tk" value="'+ot_team_charge+'" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> '+dr_name_ss+' <input type="hidden" class=" bill_comission_name" value="'+dr_name_ss+'">  </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_dr_charge_type_ss ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_dr_charge bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text  " id=""> <input type="hidden" class=" bill_comission_name " value="'+anesth_data+'" >'+anesth_data+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_anest_charges_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_anest_charges_fees_val_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff1_1_charge_fee_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff1_1_fee_val bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff2_2_charge_fees_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff2_2_fees_val_s_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff3_3_charge_fees_types_s ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff3_3_fee_s_val_ss bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff4_4_charges_fees_type_ss_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff4_4_fee_s_val_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>';
                                }else if (anesth_data == '' && ot_assist_data != '') {
                                    full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> OT Team Charge </span>'+
                                        '</div>'+
                                        '<input type="text" style="text-align: right;" class="form-control ot_team_least_fee_charge receive_bill_amount  bill_tk" value="'+ot_team_charge+'" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+dr_name_ss+'"> '+dr_name_ss+' </span>'+
                                        '</div>'+
                                        '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_dr_charge_type_ss ">'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_dr_charge bill_commssion_tk bill_tk" value="0" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+ot_assist_data+'">  '+ot_assist_data+' </span>'+
                                        '</div>'+
                                        '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_assist_fees_type_ss ">'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_assist_fees_val_ bill_commssion_tk bill_tk" value="0" >'+
                                      '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff1_1_charge_fee_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff1_1_fee_val bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff2_2_charge_fees_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff2_2_fees_val_s_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff3_3_charge_fees_types_s ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff3_3_fee_s_val_ss bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff4_4_charges_fees_type_ss_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff4_4_fee_s_val_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>';
                                }else if (anesth_data != '' && ot_assist_data != '') {
                                    full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> OT Team Charge </span>'+
                                    '</div>'+
                                    '<input type="text" style="text-align: right;" class="form-control receive_bill_amount ot_team_least_fee_charge  bill_tk" value="'+ot_team_charge+'" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+dr_name_ss+'"> '+dr_name_ss+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_dr_charge_type_ss ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_dr_charge bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+anesth_data+'"> '+anesth_data+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_anest_charges_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_anest_charges_fees_val_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+ot_assist_data+'"> '+ot_assist_data+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_assist_fees_type_ss ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_assist_fees_val_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff1_1_charge_fee_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff1_1_fee_val bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff2_2_charge_fees_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff2_2_fees_val_s_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff3_3_charge_fees_types_s ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff3_3_fee_s_val_ss bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff4_4_charges_fees_type_ss_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff4_4_fee_s_val_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>';
                                }
                    }else if (all_create_bill[i].c_num == '6') {
                      ot_charge_rates = parseInt(all_create_bill[i].create_bill_taka);
                      full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                    '</div>'+
                                    '<input type="text" readonly="readonly" style="background: white; text-align: right;" class="form-control ot_charges_input_boxs bill_tk" value="'+ot_charge_rates+'" >'+
                                  '</div>';
                    }else if (all_create_bill[i].c_num == '10') {                      
                      oxy_rates = parseInt(all_create_bill[i].create_bill_taka);
                      full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                    '</div>'+
                                    '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control receive_bill_amount oxy_rates_input_boxs bill_tk" value="'+oxy_rates+'" >'+
                                  '</div>';
                    }else if (all_create_bill[i].c_num == '20') {
                            xray_due_rates = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'"> </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+xray_due_rates+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '21') {
                            ecg_due_rates = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'">  </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+ecg_due_rates+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '22') {
                            medicine_cost = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'">  </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+medicine_cost+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '23') {
                            cbg_due_rates = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'">  </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+cbg_due_rates+'" >'+
                                        '</div>';
                      }else {
                        all_others_bill = parseInt(all_create_bill[i].create_bill_taka);
                        full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                      '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                        '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                      '</div>'+
                                      '<input type="text" style="text-align: right;" class="form-control   bill_tk" value="'+all_others_bill+'" >'+
                                    '</div>';
                    }
                    }else if (patient_stus == 'nvd') {
                      if (all_create_bill[i].c_num == '24') {
                          service_charge_rates = parseInt(all_create_bill[i].create_bill_taka);
                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                        '</div>'+
                                        '<input type="text"  readonly="readonly" style=" background: white; text-align: right;" class="form-control services_input_box receive_bill_amount bill_tk" value="'+service_charge_rates+'" >'+
                                      '</div>';
                      }else if (all_create_bill[i].c_num == '20') {
                            xray_due_rates = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'"> </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+xray_due_rates+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '21') {
                            ecg_due_rates = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'">  </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+ecg_due_rates+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '22') {
                            medicine_cost = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'">  </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+medicine_cost+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '23') {
                            cbg_due_rates = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'">  </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+cbg_due_rates+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '8') {
                          bed_fee_rates = parseInt(all_create_bill[i].create_bill_taka);
                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control receive_bill_amount bed_fee_input_box bill_tk" value="'+bed_fee_rates+'" >'+
                                      '</div>';
                    }else if (all_create_bill[i].c_num == '3') {
                      ot_team_charge_3 = parseInt(all_create_bill[i].create_bill_taka);
                    }else if (all_create_bill[i].c_num == '4') {
                      ot_team_charge_4 = parseInt(all_create_bill[i].create_bill_taka);
                    }else if (all_create_bill[i].c_num == '5') {
                      ot_team_charge_5 = parseInt(all_create_bill[i].create_bill_taka);
                      ot_team_charge = ot_team_charge_3+ot_team_charge_4+ot_team_charge_5;
                      if (anesth_data == '' && ot_assist_data == '') {
                      full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> OT Team Charge </span>'+
                                    '</div>'+
                                    '<input type="text" style="text-align: right;" class="form-control ot_team_least_fee_charge receive_bill_amount    bill_tk" value="'+ot_team_charge+'" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+dr_name_ss+'"> '+dr_name_ss+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_dr_charge_type_ss ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_dr_charge bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff1_1_charge_fee_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff1_1_fee_val bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff2_2_charge_fees_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff2_2_fees_val_s_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff3_3_charge_fees_types_s ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff3_3_fee_s_val_ss bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff4_4_charges_fees_type_ss_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff4_4_fee_s_val_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff5_5_charge_s_fee_s_types ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control   bill_commssion_tk bill_tk ot_team_staff5_5_fees_ss_val_" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name  "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff6_6_charge_ss_fee_types_  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff6_6_fees_val_ss_s_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>';
                          }else if (anesth_data != '' && ot_assist_data == '') {
                              full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> OT Team Charge </span>'+
                                    '</div>'+
                                    '<input type="text" style="text-align: right;" class="form-control ot_team_least_fee_charge receive_bill_amount   bill_tk" value="'+ot_team_charge+'" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+dr_name_ss+'"> '+dr_name_ss+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_dr_charge_type_ss ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_dr_charge bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+anesth_data+'"> '+anesth_data+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_anest_charges_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_anest_charges_fees_val_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff1_1_charge_fee_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff1_1_fee_val bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff2_2_charge_fees_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff2_2_fees_val_s_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff3_3_charge_fees_types_s ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff3_3_fee_s_val_ss bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff4_4_charges_fees_type_ss_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff4_4_fee_s_val_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff5_5_charge_s_fee_s_types ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control   bill_commssion_tk bill_tk ot_team_staff5_5_fees_ss_val_" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name  "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff6_6_charge_ss_fee_types_  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff6_6_fees_val_ss_s_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>';
                                }else if (anesth_data == '' && ot_assist_data != '') {
                                    full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> OT Team Charge </span>'+
                                        '</div>'+
                                        '<input type="text" style="text-align: right;" class="form-control ot_team_least_fee_charge receive_bill_amount  bill_tk" value="'+ot_team_charge+'" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+dr_name_ss+'"> '+dr_name_ss+' </span>'+
                                        '</div>'+
                                        '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_dr_charge_type_ss  ">'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_dr_charge bill_commssion_tk bill_tk" value="0" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+ot_assist_data+'"> '+ot_assist_data+' </span>'+
                                        '</div>'+
                                        '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_assist_fees_type_ss  ">'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_assist_fees_val_ bill_commssion_tk bill_tk" value="0" >'+
                                      '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff1_1_charge_fee_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff1_1_fee_val bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff2_2_charge_fees_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff2_2_fees_val_s_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff3_3_charge_fees_types_s ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff3_3_fee_s_val_ss bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff4_4_charges_fees_type_ss_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff4_4_fee_s_val_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff5_5_charge_s_fee_s_types ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control   bill_commssion_tk bill_tk ot_team_staff5_5_fees_ss_val_" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name  "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff6_6_charge_ss_fee_types_  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff6_6_fees_val_ss_s_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>';
                                }else if (anesth_data != '' && ot_assist_data != '') {
                                    full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> OT Team Charge </span>'+
                                    '</div>'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_least_fee_charge   bill_tk" value="'+ot_team_charge+'" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+dr_name_ss+'"> '+dr_name_ss+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_dr_charge_type_ss  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_dr_charge bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+anesth_data+'"> '+anesth_data+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_anest_charges_types_  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_anest_charges_fees_val_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+ot_assist_data+'"> '+ot_assist_data+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right;" class="form-control ot_team_assist_fees_type_ss  bill_tk" value="0" >'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_assist_fees_val_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff1_1_charge_fee_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff1_1_fee_val bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff2_2_charge_fees_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff2_2_fees_val_s_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff3_3_charge_fees_types_s ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff3_3_fee_s_val_ss bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff4_4_charges_fees_type_ss_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff4_4_fee_s_val_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff5_5_charge_s_fee_s_types ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control   bill_commssion_tk bill_tk ot_team_staff5_5_fees_ss_val_" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name  "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff6_6_charge_ss_fee_types_  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff6_6_fees_val_ss_s_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>';
                                }
                    }else if (all_create_bill[i].c_num == '6') {
                      ot_charge_rates = parseInt(all_create_bill[i].create_bill_taka);
                      full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                    '</div>'+
                                    '<input type="text" readonly="readonly" style="background: white; text-align: right;" class="form-control ot_charges_input_boxs bill_tk" value="'+ot_charge_rates+'" >'+
                                  '</div>';
                    }else if (all_create_bill[i].c_num == '10') {                      
                      oxy_rates = parseInt(all_create_bill[i].create_bill_taka);
                      full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                    '</div>'+
                                    '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control receive_bill_amount oxy_rates_input_boxs bill_tk" value="'+oxy_rates+'" >'+
                                  '</div>';
                    }else {
                        all_others_bill = parseInt(all_create_bill[i].create_bill_taka);
                        full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                      '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                        '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                      '</div>'+
                                      '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control  receive_bill_amount bill_tk" value="'+all_others_bill+'" >'+
                                    '</div>';
                    }
                  }else if (patient_stus == 'ot') {
                      if (all_create_bill[i].c_num == '24') {
                          service_charge_rates = parseInt(all_create_bill[i].create_bill_taka);
                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control services_input_box receive_bill_amount bill_tk" value="'+service_charge_rates+'" >'+
                                      '</div>';
                      }else if (all_create_bill[i].c_num == '20') {
                            xray_due_rates = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'"> </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+xray_due_rates+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '21') {
                            ecg_due_rates = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'">  </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+ecg_due_rates+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '22') {
                            medicine_cost = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'">  </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+medicine_cost+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '23') {
                            cbg_due_rates = parseInt(all_create_bill[i].create_bill_taka);
                            full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                          '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                            '<span class="input-group-text" id=""> '+all_create_bill[i].category+' <input type="hidden" class=" bill_comission_name" value="'+all_create_bill[i].category+'">  </span>'+
                                          '</div>'+
                                          '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control bill_commssion_tk   bill_tk" value="'+cbg_due_rates+'" >'+
                                        '</div>';
                      }else if (all_create_bill[i].c_num == '8') {
                          bed_fee_rates = parseInt(all_create_bill[i].create_bill_taka);
                          full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control receive_bill_amount bed_fee_input_box bill_tk" value="'+bed_fee_rates+'" >'+
                                      '</div>';
                    }else if (all_create_bill[i].c_num == '3') {
                      ot_team_charge_3 = parseInt(all_create_bill[i].create_bill_taka);
                    }else if (all_create_bill[i].c_num == '4') {
                      ot_team_charge_4 = parseInt(all_create_bill[i].create_bill_taka);
                    }else if (all_create_bill[i].c_num == '5') {
                      ot_team_charge_5 = parseInt(all_create_bill[i].create_bill_taka);
                      ot_team_charge = ot_team_charge_3 + ot_team_charge_4 + ot_team_charge_5;
                      if (anesth_data == '' && ot_assist_data == '') {
                      full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> OT Team Charge </span>'+
                                    '</div>'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" style="text-align: right;" class="form-control receive_bill_amount   ot_team_least_fee_charge     bill_tk" value="'+ot_team_charge+'" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+dr_name_ss+'"> '+dr_name_ss+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_dr_charge_type_ss  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_dr_charge bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff1_1_charge_fee_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff1_1_fee_val bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff2_2_charge_fees_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff2_2_fees_val_s_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff3_3_charge_fees_types_s ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff3_3_fee_s_val_ss bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff4_4_charges_fees_type_ss_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff4_4_fee_s_val_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff5_5_charge_s_fee_s_types ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control   bill_commssion_tk bill_tk ot_team_staff5_5_fees_ss_val_" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name  "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff6_6_charge_ss_fee_types_  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff6_6_fees_val_ss_s_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>';
                          }else if (anesth_data != '' && ot_assist_data == '') {
                              full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> OT Team Charge </span>'+
                                    '</div>'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_least_fee_charge  receive_bill_amount   bill_tk" value="'+ot_team_charge+'" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+dr_name_ss+'"> '+dr_name_ss+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_dr_charge_type_ss  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_dr_charge bill_commssion_tk  bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+anesth_data+'"> '+anesth_data+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_anest_charges_types_  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_anest_charges_fees_val_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff1_1_charge_fee_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff1_1_fee_val bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff2_2_charge_fees_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff2_2_fees_val_s_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff3_3_charge_fees_types_s ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff3_3_fee_s_val_ss bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff4_4_charges_fees_type_ss_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff4_4_fee_s_val_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff5_5_charge_s_fee_s_types ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control   bill_commssion_tk bill_tk ot_team_staff5_5_fees_ss_val_" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name  "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff6_6_charge_ss_fee_types_  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff6_6_fees_val_ss_s_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>';
                                }else if (anesth_data == '' && ot_assist_data != '') {
                                    full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> OT Team Charge </span>'+
                                        '</div>'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_least_fee_charge receive_bill_amount    bill_tk" value="'+ot_team_charge+'" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+dr_name_ss+'"> '+dr_name_ss+' </span>'+
                                        '</div>'+
                                        '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_dr_charge_type_ss  ">'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_dr_charge bill_commssion_tk bill_tk" value="0" >'+
                                      '</div>'+
                                      '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                        '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                          '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+ot_assist_data+'"> '+ot_assist_data+' </span>'+
                                        '</div>'+
                                        '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_assist_fees_type_ss  ">'+
                                        '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_assist_fees_val_ bill_commssion_tk bill_tk" value="0" >'+
                                      '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff1_1_charge_fee_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff1_1_fee_val bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff2_2_charge_fees_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff2_2_fees_val_s_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff3_3_charge_fees_types_s ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff3_3_fee_s_val_ss bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff4_4_charges_fees_type_ss_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff4_4_fee_s_val_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff5_5_charge_s_fee_s_types ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control   bill_commssion_tk bill_tk ot_team_staff5_5_fees_ss_val_" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name  "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff6_6_charge_ss_fee_types_  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff6_6_fees_val_ss_s_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>';
                                }else if (anesth_data != '' && ot_assist_data != '') {
                                    full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> OT Team Charge </span>'+
                                    '</div>'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_least_fee_charge receive_bill_amount    bill_tk" value="'+ot_team_charge+'" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+dr_name_ss+'"> '+dr_name_ss+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_dr_charge_type_ss  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_dr_charge bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+anesth_data+'"> '+anesth_data+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_anest_charges_types_  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_anest_charges_fees_val_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> <input type="hidden" class=" bill_comission_name" value="'+ot_assist_data+'"> '+ot_assist_data+' </span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_assist_fees_type_ss  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_assist_fees_val_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff1_1_charge_fee_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff1_1_fee_val bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff2_2_charge_fees_types_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff2_2_fees_val_s_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff3_3_charge_fees_types_s ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff3_3_fee_s_val_ss bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff4_4_charges_fees_type_ss_ ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff4_4_fee_s_val_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff5_5_charge_s_fee_s_types ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control   bill_commssion_tk bill_tk ot_team_staff5_5_fees_ss_val_" value="0" >'+
                                  '</div>'+
                                  '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" comission-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""><input type="text" class=" bill_comission_name  "></span>'+
                                    '</div>'+
                                    '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  style="text-align: right; border: 1px solid black;" class="form-control ot_team_staff6_6_charge_ss_fee_types_  ">'+
                                    '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control ot_team_staff6_6_fees_val_ss_s_ss_ bill_commssion_tk bill_tk" value="0" >'+
                                  '</div>';
                                }
                    }else if (all_create_bill[i].c_num == '6') {
                      ot_charge_rates = parseInt(all_create_bill[i].create_bill_taka);
                      full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                    '</div>'+
                                    '<input type="text" readonly="readonly" style="background: white; text-align: right;" class="form-control ot_charges_input_boxs bill_tk" value="'+ot_charge_rates+'" >'+
                                  '</div>';
                    }else if (all_create_bill[i].c_num == '10') {                      
                      oxy_rates = parseInt(all_create_bill[i].create_bill_taka);
                      full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                    '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                      '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                    '</div>'+
                                    '<input type="text" readonly="readonly"  style=" background: white; text-align: right;" class="form-control receive_bill_amount oxy_rates_input_boxs bill_tk" value="'+oxy_rates+'" >'+
                                  '</div>';
                    }else {
                        all_others_bill = parseInt(all_create_bill[i].create_bill_taka);
                        full_data_s += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                      '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+all_create_bill[i].c_num+'" billcat_idd="'+all_create_bill[i].bill_cat_auto_id+'">'+
                                        '<span class="input-group-text" id=""> '+all_create_bill[i].category+' </span>'+
                                      '</div>'+
                                      '<input type="text" readonly="readonly" style=" background: white; text-align: right;" class="form-control  receive_bill_amount bill_tk" value="'+all_others_bill+'" >'+
                                    '</div>';
                    }
                  }else {
                      $('.error_show').html(' Something is Wrong Again bill Create ... ');
                  }
                }
                $('.add_indoor_bill').html(full_data_s);
                  total_bill_amount();
                $('.receive_bill_btn').html('<br><button class="ui_extra_btn ui_extra_btn_purple full-rounded received_bill_btn_ss" > BILL RECEIVE </button>');
              }
            } 
          })
    }

    function total_bill_amount() {
        var sum_total = 0;
        $('.bill_tk').each(function(){
            var bill_num = $(this).val();
        if (bill_num != 0) {
            sum_total += parseInt(bill_num);
            }
        });
        $('.total_indoor_bill_from_box').html('Total Normal Bill '+sum_total);  
    }


    function create_advance_bill() { 

        var patient_a_idd = $('.patient_name').attr('patient_auto_idd');
        var advance_type_taka = $('.advance_type_taka').val();

        $.ajax({
            url: 'bill/advance_bill_payment',
            method: 'POST',
            data: {
                'ptn_iidd': patient_a_idd,
                'advance_taka': advance_type_taka
            },
            beforeSend: function () {
                $('.create_bill_btn').css('display', 'none');
                $('#spin_loader').modal('show');
            },
            complete: function () {
                $('#spin_loader').modal('hide');
            },
            success: function() {
                toastr.success("ADVANCE Bill Successfully", "Success");
                window.open('bill/advbprint?ptnid='+patient_a_idd,'_blank', 'width=700,height=700,left=260,top=270');
                getPatientInfoByRegNo();
            } 
        })
    }

    $(document).on('click', '.advance_payment_save_btn', function() {
      create_advance_bill();
    })

    $(document).on('click', '.print_advance_bill', function() {
        var patient_a_idd = $('.patient_name').attr('patient_auto_idd');
        window.open('bill/advbprint?ptnid='+patient_a_idd,'_blank', 'width=700,height=700,left=260,top=270');
    })

    function type_receive_bill_after_discount() {
      var temp_type_receive_bill_amount = $('.type_receive_bill_amount').val();
      var type_receive_bill_amount = parseInt($('.type_receive_bill_amount').val());
      var remain_bill_amount_after_discount = total_created_bill_amount_ssss - type_receive_bill_amount;

      var remain_amount_after_services_cut = 0;
      var remain_amount_after_bed_fee_cut = 0;
      var remain_amount_after_oxy_fee_cut = 0;
      var remain_amount_after_photo_therapy_cut = 0;
      var remain_amount_after_ot_charge_cut = 0;

      if (temp_type_receive_bill_amount == '') {
        $('.services_input_box').val(service_charge_rates);
        $('.bed_fee_input_box').val(bed_fee_rates);
        $('.oxy_rates_input_boxs').val(oxy_rates);
        $('.photoTherapy_rates_input_boxs').val(all_photoTherapy_rates);
        $('.ot_charges_input_boxs').val(ot_charge_rates);        
      }else {
        if (remain_bill_amount_after_discount <= 0) {
          $('.services_input_box').val(service_charge_rates);
          $('.bed_fee_input_box').val(bed_fee_rates);
          $('.oxy_rates_input_boxs').val(oxy_rates);
          $('.photoTherapy_rates_input_boxs').val(all_photoTherapy_rates);
          $('.ot_charges_input_boxs').val(ot_charge_rates);  
        }else {
          remain_amount_after_services_cut = remain_bill_amount_after_discount - service_charge_rates;
          if (remain_amount_after_services_cut <= 0) {
            var cut_from_services_charge = service_charge_rates - remain_bill_amount_after_discount;
            $('.services_input_box').val(cut_from_services_charge);
            $('.bed_fee_input_box').val(bed_fee_rates);
            $('.oxy_rates_input_boxs').val(oxy_rates);
            $('.photoTherapy_rates_input_boxs').val(all_photoTherapy_rates);
            $('.ot_charges_input_boxs').val(ot_charge_rates);
          }else {
            remain_amount_after_bed_fee_cut = remain_amount_after_services_cut - bed_fee_rates;
            if (remain_amount_after_bed_fee_cut <= 0) {
              var cut_from_bed_feess = bed_fee_rates - remain_amount_after_services_cut;
              $('.services_input_box').val('0');
              $('.bed_fee_input_box').val(cut_from_bed_feess);
              $('.oxy_rates_input_boxs').val(oxy_rates);
              $('.photoTherapy_rates_input_boxs').val(all_photoTherapy_rates);
              $('.ot_charges_input_boxs').val(ot_charge_rates);
            }else {
              remain_amount_after_oxy_fee_cut = remain_amount_after_bed_fee_cut - oxy_rates;
              if (remain_amount_after_oxy_fee_cut <= 0) {
                var cut_from_oxy_charge = oxy_rates - remain_amount_after_bed_fee_cut;
                $('.services_input_box').val('0');
                $('.bed_fee_input_box').val('0');
                $('.oxy_rates_input_boxs').val(cut_from_oxy_charge);
                $('.photoTherapy_rates_input_boxs').val(all_photoTherapy_rates);
                $('.ot_charges_input_boxs').val(ot_charge_rates);
              }else {
                remain_amount_after_photo_therapy_cut = remain_amount_after_oxy_fee_cut - all_photoTherapy_rates;
                if (remain_amount_after_photo_therapy_cut <= 0) {
                  var cut_from_photoTherapy = all_photoTherapy_rates - remain_amount_after_oxy_fee_cut;
                  $('.services_input_box').val('0');
                  $('.bed_fee_input_box').val('0');
                  $('.oxy_rates_input_boxs').val('0');
                  $('.photoTherapy_rates_input_boxs').val(cut_from_photoTherapy);
                  $('.ot_charges_input_boxs').val(ot_charge_rates);
                }else {
                  remain_amount_after_ot_charge_cut = remain_amount_after_photo_therapy_cut - ot_charge_rates;
                  var cut_from_ot_charge = ot_charge_rates - remain_amount_after_photo_therapy_cut;
                  if (cut_from_ot_charge < 0 ) {
                    $('.services_input_box').val('0');
                    $('.bed_fee_input_box').val('0');
                    $('.oxy_rates_input_boxs').val('0');
                    $('.photoTherapy_rates_input_boxs').val('0');
                    $('.ot_charges_input_boxs').val('0');    
                  }else {
                    $('.services_input_box').val('0');
                    $('.bed_fee_input_box').val('0');
                    $('.oxy_rates_input_boxs').val('0');
                    $('.photoTherapy_rates_input_boxs').val('0');
                    $('.ot_charges_input_boxs').val(cut_from_ot_charge);                  
                  }
                }
              }
            }
          }
        }
      }
    }

    function save_receives_bills() {
        // bill receive information without comission Array
        var bill_cat_num = $('.billcat_info').map(function() {
            return $(this).attr('data-bill_cat_num');
        }).get();        
        var bill_receive_tk = $('.receive_bill_amount').map(function() {
            return $(this).val();
        }).get();

        // comission information Array
        var bill_cat_num_comission = $('.billcat_info').map(function() {
            return $(this).attr('comission-bill_cat_num');
        }).get();
        var bill_comission_person_name = $('.bill_comission_name').map(function() {
            return $(this).val();
        }).get();
        var bill_comission_amount_tk = $('.bill_commssion_tk').map(function() {
            return $(this).val();
        }).get();


        // Doctor's Ticket Information
        var patient_a_idd = $('.patient_name').attr('patient_auto_idd');   
        var patient_stus = $('.patient_name').attr('patient_stus');

        var dr_auto_ids = dr_auto_id_ss; 
        var dr_sec_ticket_fees = $('.dr_sec_1_val').attr('dr_sec_ticket_fees_s');
        var dr_sec_ticket_hospital_fees = $('.dr_sec_1_val').attr('dr_sec_ticket_hospital_fees_s');;

        var con1_auto_ids = consultant1_data; 
        var con1_sec_ticket_fees = $('.con1_sec_1_val').attr('dr_sec_ticket_fees_s');
        var con1_sec_ticket_hospital_fees = $('.dr_sec_1_val').attr('dr_sec_ticket_hospital_fees_s');

        var con2_auto_ids = consultant2_data; 
        var con2_sec_ticket_fees = $('.con2_sec_2_val').attr('dr_sec_ticket_fees_s');
        var con2_sec_ticket_hospital_fees = $('.con2_sec_2_val').attr('dr_sec_ticket_hospital_fees_s');

        var dr_firstTime_ticket_fees = $('.dr_first_ticket_fee').attr('dr_first_ticket_s');
        var dr_firstTime_ticket_hospital_fees = $('.dr_first_ticket_fee').attr('dr_first_hospital_fee');
        var dr_NightTime_ticket_fees = $('.dr_night_ticket_charge').attr('dr_night_ticket_charge_fees_s');

        $.ajax({
            url: 'bill/receive_bill_without_comission',
            method: 'POST',
            data: {
                'ptn_iidd': patient_a_idd,
                'patient_stus': patient_stus,
                'bill_cat_num[]': bill_cat_num,
                'bill_receive_tk[]': bill_receive_tk,
                'dr_auto_ids': dr_auto_ids,
                'dr_sec_ticket_fees': dr_sec_ticket_fees,
                'dr_sec_ticket_hospital_fees': dr_sec_ticket_hospital_fees,
                'con1_auto_ids': con1_auto_ids,
                'con1_sec_ticket_fees': con1_sec_ticket_fees,
                'con1_sec_ticket_hospital_fees': con1_sec_ticket_hospital_fees,
                'con2_auto_ids': con2_auto_ids,
                'con2_sec_ticket_fees': con2_sec_ticket_fees,
                'con2_sec_ticket_hospital_fees': con2_sec_ticket_hospital_fees,
                'dr_firstTime_ticket_fees': dr_firstTime_ticket_fees,
                'dr_firstTime_ticket_hospital_fees': dr_firstTime_ticket_hospital_fees,
                'dr_NightTime_ticket_fees': dr_NightTime_ticket_fees,
            },
            beforeSend: function () {
                $('.create_bill_btn').css('display', 'none');
                $('#spin_loader').modal('show');
            },
            success: function() {
            } 
        })
 
        $.ajax({
            url: 'bill/bill_comission_receive',
            method: 'POST',
            data: {
                'ptn_iidd': patient_a_idd,
                'patient_stus': patient_stus,
                'bill_cat_num_comission[]': bill_cat_num_comission,
                'bill_comission_person_name[]': bill_comission_person_name,
                'bill_comission_amount_tk[]': bill_comission_amount_tk,
            },
            complete: function () {
                $('#spin_loader').modal('hide');
            },
            success: function() {
                toastr.success("BILL RECEIVED Successfully", "Success");
                window.open('bill/print_receive_bill?ptnid='+patient_a_idd,'_blank', 'width=700,height=700,left=260,top=270');
                getPatientInfoByRegNo();
            } 
        })
    }

    $(document).on('click', '.received_bill_btn_ss', function() {
      save_receives_bills();      
    })

    $(document).on('click', '.print_received_bill', function() {
        var patient_a_idd = $('.patient_name').attr('patient_auto_idd');   
        window.open('bill/print_receive_bill?ptnid='+patient_a_idd,'_blank', 'width=700,height=700,left=260,top=270');      
    })

    $(document).on('keyup', '.dr_sec_1_type, .con1_sec_1_type, .con2_sec_2_type', function() {
      dr_con_least_fee_after_cut_sss();      
    })

    function dr_con_least_fee_after_cut_sss() {
      var dr_sec_ticket_type_box = $('.dr_sec_1_type').val();
      var con1_1_sec_ticketFee_ss_temp = $('.con1_sec_1_type').val();
      var con2_2_sec_ticketFee_ss_temp = $('.con2_sec_2_type').val();
      var con1_sec_ticket_type_box_1 = 0;
      var con2_sec_ticket_type_box_2 = 0;

        var dr_least_fee = 0;
        var con1_least_fee_1 = 0;
        var con2_least_fee_2 = 0;

        var con1_sec_ticket_drfee_prepayerd_1 = 0;
        var con1_sec_ticket_hospitalfee_prepayerd_1 = 0;

        var con2_sec_ticket_drfee_prepayerd_2 = 0;
        var con2_sec_ticket_hospitalfee_prepayerd_2 = 0;

      if (con1_1_sec_ticketFee_ss_temp == undefined) {
        con1_sec_ticket_type_box_1 = 0;
        con1_sec_ticket_hospitalfee_prepayerd_1 = 0;
      }else {
        con1_sec_ticket_type_box_1 = $('.con1_sec_1_type').val();
        con1_sec_ticket_drfee_prepayerd_1 = con1_sec_ticket_type_box_1 * consultant1_sec_ticket_charge;con1_sec_ticket_hospitalfee_prepayerd_1 = con1_sec_ticket_type_box_1 * consultant1_sec_ticket_hospital_charge;
      }

      if (con2_2_sec_ticketFee_ss_temp == undefined) {
        con2_sec_ticket_type_box_2 = 0;
        con2_sec_ticket_drfee_prepayerd_2 = 0;
        con2_sec_ticket_hospitalfee_prepayerd_2 = 0;
      }else {
        con2_sec_ticket_type_box_2 = $('.con2_sec_2_type').val();
        con2_sec_ticket_drfee_prepayerd_2 = con2_sec_ticket_type_box_2 * consultant2_sec_ticket_charge;
        con2_sec_ticket_hospitalfee_prepayerd_2 = con2_sec_ticket_type_box_2 * consultant2_sec_ticket_hospital_charge;
      }

        var dr_sec_ticket_drfee_prepayerd = dr_sec_ticket_type_box * dr_sec_ticket_charge;
        var dr_sec_ticket_hospitalfee_prepayerd = dr_sec_ticket_type_box * dr_sec_ticket_hospital_charge;

        if (dr_sec_ticket_type_box != '') {
          dr_least_fee = dr_sec_ticket_drfee_prepayerd;
          $('.dr_sec_1_val').val(dr_sec_ticket_drfee_prepayerd);
          $('.dr_sec_1_val').attr('dr_sec_ticket_fees_s', dr_sec_ticket_drfee_prepayerd);
          $('.dr_sec_1_val').attr('dr_sec_ticket_hospital_fees_s', dr_sec_ticket_hospitalfee_prepayerd);
        }else {
          dr_least_fee = 0;
          $('.dr_sec_1_val').val('0');
          $('.dr_sec_1_val').attr('dr_sec_ticket_fees_s', '0');
          $('.dr_sec_1_val').attr('dr_sec_ticket_hospital_fees_s', '0');
        }
        if (con1_1_sec_ticketFee_ss_temp != '') {
          con1_least_fee_1 = con1_sec_ticket_drfee_prepayerd_1;
          $('.con1_sec_1_val').val(con1_sec_ticket_drfee_prepayerd_1);
          $('.con1_sec_1_val').attr('dr_sec_ticket_fees_s', con1_sec_ticket_drfee_prepayerd_1);
          $('.con1_sec_1_val').attr('dr_sec_ticket_hospital_fees_s', con1_sec_ticket_hospitalfee_prepayerd_1);
        }else {
          con1_least_fee_1 = 0;
          $('.con1_sec_1_val').val('0');
          $('.con1_sec_1_val').attr('dr_sec_ticket_fees_s', '0');
          $('.con1_sec_1_val').attr('dr_sec_ticket_hospital_fees_s', '0');
        }
        if (con2_2_sec_ticketFee_ss_temp != '') {
          con2_least_fee_2 = con2_sec_ticket_drfee_prepayerd_2;
          $('.con2_sec_2_val').val(con2_sec_ticket_drfee_prepayerd_2);
          $('.con2_sec_2_val').attr('dr_sec_ticket_fees_s', con2_sec_ticket_drfee_prepayerd_2);
          $('.con2_sec_2_val').attr('dr_sec_ticket_hospital_fees_s', con2_sec_ticket_hospitalfee_prepayerd_2);
        }else {
          con2_least_fee_2 = 0;
          $('.con2_sec_2_val').val('0');
          $('.con2_sec_2_val').attr('dr_sec_ticket_fees_s', '0');
          $('.con2_sec_2_val').attr('dr_sec_ticket_hospital_fees_s', '0');
        }

        var total_dr_con_comission = dr_least_fee + con1_least_fee_1 + con2_least_fee_2;
        var dr_con_lest_tk_fee = dr_consultant_rates - total_dr_con_comission;

        if (dr_con_lest_tk_fee >= 0) {
          $('.dr_con_lest_amount').val(dr_con_lest_tk_fee);
        }else {
          $('.dr_con_lest_amount').val(dr_consultant_rates);
          $('.dr_sec_1_val').val('0');
          $('.dr_sec_1_val').attr('dr_sec_ticket_fees_s', '0');
          $('.dr_sec_1_val').attr('dr_sec_ticket_hospital_fees_s', '0');
          $('.con1_sec_1_val').val('0');
          $('.con1_sec_1_val').attr('dr_sec_ticket_fees_s', '0');
          $('.con1_sec_1_val').attr('dr_sec_ticket_hospital_fees_s', '0');
          $('.con2_sec_2_val').val('0');
          $('.con2_sec_2_val').attr('dr_sec_ticket_fees_s', '0');
          $('.con2_sec_2_val').attr('dr_sec_ticket_hospital_fees_s', '0');
          alert(' Hei! Check again and again.... ');
        }
    }

    $(document).on('keyup', '.stitch_bill_comission_type', function() {
      var stitch_bill_comission_type = $(this).val();
      if (stitch_bill_comission_type != '') {
        var least_stitch_bill_comission = stitch_fee_with_comission - stitch_bill_comission_type;
        if (least_stitch_bill_comission >= 0) {
          $('.stitch_bill_comission_tk').val(stitch_bill_comission_type);
          $('.stitch_fee_input_box').val(least_stitch_bill_comission);
        }else {
          $('.stitch_bill_comission_tk').val('0');
          $('.stitch_fee_input_box').val(stitch_fee_with_comission);
        }
      }else {
        $('.stitch_bill_comission_tk').val('0');
        $('.stitch_fee_input_box').val(stitch_fee_with_comission);
      }
    })

    $(document).on('keyup', '.dreshing_fee_bill_comission_type', function() {
      var dreshing_fee_comission_type = $(this).val();
      if (dreshing_fee_comission_type != '') {
        var least_dreshing_fees_comission = dreshing_charge_with_comission - dreshing_fee_comission_type;
        if (least_dreshing_fees_comission >= 0) {
          $('.dreshing_fee_bill_comission_tk').val(dreshing_fee_comission_type);
          $('.dreshing_fee_input_box').val(least_dreshing_fees_comission);
        }else {
          $('.dreshing_fee_bill_comission_tk').val('0');
          $('.dreshing_fee_input_box').val(dreshing_charge_with_comission);
        }
      }else {
        $('.dreshing_fee_bill_comission_tk').val('0');
        $('.dreshing_fee_input_box').val(dreshing_charge_with_comission);
      }
    })

    $(document).on('keyup', '.ng_tube_fee_bill_comission_type', function() {
      var ngtube_fees_comission_type = $(this).val();
      if (ngtube_fees_comission_type != '') {
        var least_ngtube_fees_comission = ng_tube_charge_with_comission - ngtube_fees_comission_type;
        if (least_ngtube_fees_comission >= 0) {
          $('.ng_tube_fee_bill_comission_tk').val(ngtube_fees_comission_type);
          $('.ng_tube_fee_input_box').val(least_ngtube_fees_comission);
        }else {
          $('.ng_tube_fee_bill_comission_tk').val('0');
          $('.ng_tube_fee_input_box').val(ng_tube_charge_with_comission);
        }
      }else {
        $('.ng_tube_fee_bill_comission_tk').val('0');
        $('.ng_tube_fee_input_box').val(ng_tube_charge_with_comission);
      }
    })

    $(document).on('keyup', '.catheter_fee_bill_comission_type', function() {
      var catheter_charge_comission_type = $(this).val();
      if (catheter_charge_comission_type != '') {
        var catheter_charge_fees_comission = catheter_charge_with_comission - catheter_charge_comission_type;
        if (catheter_charge_fees_comission >= 0) {
          $('.catheter_fee_bill_comission_tk').val(catheter_charge_comission_type);
          $('.catheter_fee_input_box').val(catheter_charge_fees_comission);
        }else {
          $('.catheter_fee_bill_comission_tk').val('0');
          $('.catheter_fee_input_box').val(catheter_charge_with_comission);
        }
      }else {
        $('.catheter_fee_bill_comission_tk').val('0');
        $('.catheter_fee_input_box').val(catheter_charge_with_comission);
      }
    })

    $(document).on('keyup', '.iv_canala_fee_bill_comission_type', function() {
      var iv_canala_charge_comission_type = $(this).val();
      if (iv_canala_charge_comission_type != '') {
        var iv_canala_charge_fees_comission = iv_canala_with_comission - iv_canala_charge_comission_type;
        if (iv_canala_charge_fees_comission >= 0) {
          $('.iv_canala_fee_bill_comission_tk').val(iv_canala_charge_comission_type);
          $('.iv_canala_fee_input_box').val(iv_canala_charge_fees_comission);
        }else {
          $('.iv_canala_fee_bill_comission_tk').val('0');
          $('.iv_canala_fee_input_box').val(iv_canala_with_comission);
        }
      }else {
        $('.iv_canala_fee_bill_comission_tk').val('0');
        $('.iv_canala_fee_input_box').val(iv_canala_with_comission);
      }
    })

    $(document).on('keyup', '.ot_team_dr_charge_type_ss, .ot_team_anest_charges_types_, .ot_team_assist_fees_type_ss, .ot_team_staff1_1_charge_fee_types_, .ot_team_staff2_2_charge_fees_types_, .ot_team_staff3_3_charge_fees_types_s, .ot_team_staff4_4_charges_fees_type_ss_, .ot_team_staff5_5_charge_s_fee_s_types, .ot_team_staff6_6_charge_ss_fee_types_ ', function() {
      ot_team_charge_cut_amount();
    })

    function ot_team_charge_cut_amount() {

      var ot_team_dr_amount = $('.ot_team_dr_charge_type_ss').val();
      var ot_team_annesth_amount = $('.ot_team_anest_charges_types_').val();
      var ot_team_dr_assist_amount = $('.ot_team_assist_fees_type_ss').val();
      var ot_team_staff1_1_amount = $('.ot_team_staff1_1_charge_fee_types_').val();
      var ot_team_staff2_2_amount = $('.ot_team_staff2_2_charge_fees_types_').val();
      var ot_team_staff3_3_amount = $('.ot_team_staff3_3_charge_fees_types_s').val();
      var ot_team_staff4_4_amount = $('.ot_team_staff4_4_charges_fees_type_ss_').val();
      var ot_team_staff5_5_amount = $('.ot_team_staff5_5_charge_s_fee_s_types').val();
      var ot_team_staff6_6_amount = $('.ot_team_staff6_6_charge_ss_fee_types_').val();

        var ot_team_annesth_tk = 0;
        var ot_team_dr_assist_tk = 0;

        if (ot_team_annesth_amount == undefined) {
          ot_team_annesth_tk = 0;
        }else {
          ot_team_annesth_tk = $('.ot_team_anest_charges_types_').val();
        }

        if (ot_team_dr_assist_amount == undefined) {
          ot_team_dr_assist_tk = 0;
        }else {
          ot_team_dr_assist_tk = $('.ot_team_assist_fees_type_ss').val();
        }

      var dr_amount = 0;
      var annesth_amount = 0;
      var dr_assist_amount = 0;
      var staff1_1_amount = 0;
      var staff2_2_amount = 0;
      var staff3_3_amount = 0;
      var staff4_4_amount = 0;
      var staff5_5_amount = 0;
      var staff6_6_amount = 0;

      if (ot_team_dr_amount != '') {
        dr_amount = ot_team_dr_amount;
        $('.ot_team_dr_charge').val(ot_team_dr_amount);
      }else {        
        dr_amount = 0;
        $('.ot_team_dr_charge').val('0');
      }
      if (ot_team_annesth_amount != '') {
        annesth_amount = ot_team_annesth_tk;
        $('.ot_team_anest_charges_fees_val_').val(ot_team_annesth_amount);
      }else {
        annesth_amount = 0;
        $('.ot_team_anest_charges_fees_val_').val('0');
      }
      if (ot_team_dr_assist_amount != '') {
        dr_assist_amount = ot_team_dr_assist_tk;
        $('.ot_team_assist_fees_val_').val(ot_team_dr_assist_amount);
      }else {
        dr_assist_amount = 0;
        $('.ot_team_assist_fees_val_').val('0');
      }
      if (ot_team_staff1_1_amount != '') {
        staff1_1_amount = ot_team_staff1_1_amount;
        $('.ot_team_staff1_1_fee_val').val(ot_team_staff1_1_amount);
      }else {
        staff1_1_amount = 0;
        $('.ot_team_staff1_1_fee_val').val('0');
      }
      if (ot_team_staff2_2_amount != '') {
        staff2_2_amount = ot_team_staff2_2_amount;
        $('.ot_team_staff2_2_fees_val_s_').val(ot_team_staff2_2_amount);
      }else {
        staff2_2_amount = 0;
        $('.ot_team_staff2_2_fees_val_s_').val('0');
      }
      if (ot_team_staff3_3_amount != '') {
        staff3_3_amount = ot_team_staff3_3_amount;
        $('.ot_team_staff3_3_fee_s_val_ss').val(ot_team_staff3_3_amount);
      }else {
        staff3_3_amount = 0;
        $('.ot_team_staff3_3_fee_s_val_ss').val('0');
      }
      if (ot_team_staff4_4_amount != '') {
        staff4_4_amount = ot_team_staff4_4_amount;
        $('.ot_team_staff4_4_fee_s_val_ss_').val(ot_team_staff4_4_amount);
      }else {
        staff4_4_amount = 0;
        $('.ot_team_staff4_4_fee_s_val_ss_').val('0');
      }
      if (ot_team_staff5_5_amount != '') {
        staff5_5_amount = ot_team_staff5_5_amount;
        $('.ot_team_staff5_5_fees_ss_val_').val(ot_team_staff5_5_amount);
      }else {
        staff5_5_amount = 0;
        $('.ot_team_staff5_5_fees_ss_val_').val('0');
      }
      if (ot_team_staff6_6_amount != '') {
        staff6_6_amount = ot_team_staff6_6_amount;
        $('.ot_team_staff6_6_fees_val_ss_s_ss_').val(ot_team_staff6_6_amount);
      }else {
        staff6_6_amount = 0;
        $('.ot_team_staff6_6_fees_val_ss_s_ss_').val('0');
      }
      var all_ot_ccomission_charge = parseInt(dr_amount) + parseInt(annesth_amount) + parseInt(dr_assist_amount) + parseInt(staff1_1_amount) + parseInt(staff2_2_amount) + parseInt(staff3_3_amount) + parseInt(staff4_4_amount) + parseInt(staff5_5_amount) + parseInt(staff6_6_amount);
      var ot_team_charge_after_all_cutting = ot_team_charge - all_ot_ccomission_charge;

      if (ot_team_charge_after_all_cutting >= 0) {
        $('.ot_team_least_fee_charge').val(ot_team_charge_after_all_cutting);
      }else {
        $('.ot_team_least_fee_charge').val(ot_team_charge);        
        $('.ot_team_dr_charge').val('0');
        $('.ot_team_anest_charges_fees_val_').val('0');
        $('.ot_team_assist_fees_val_').val('0');
        $('.ot_team_staff1_1_fee_val').val('0');
        $('.ot_team_staff2_2_fees_val_s_').val('0');
        $('.ot_team_staff3_3_fee_s_val_ss').val('0');
        $('.ot_team_staff4_4_fee_s_val_ss_').val('0');
        $('.ot_team_staff5_5_fees_ss_val_').val('0');
        $('.ot_team_staff6_6_fees_val_ss_s_ss_').val('0');
        alert(' Hei! Please check again and again.... ');
      }
    }

    $(document).on('keyup', '.type_receive_bill_amount', function() {
      type_receive_bill_after_discount();
      total_bill_amount();
      totalCreated_billsss();
    })

    </script>




















