        
        var bed_fee_admit_patient = 0;
        var total_admit_day = 0;
        var bed_rate_s = 0;
        var bed_amount_hours = 0;
        var consultant1_data;
        var consultant2_data;
        var anesth_data;
        var ot_assist_data;
        var admit_days;
        var remain_hours;
        var remain_minutes;


        var ot_assist_team = '<div class="row">'+
                                '<div class="col-xl-6">'+
                                    '<div class="form-group row">'+
                                        '<label class="col-lg-3 col-form-label"> Doctor Assistant Name </label>'+
                                        '<div class="col-lg-9">'+
                                            '<input type="text" class="form-control assistant_name_s input-group-text" value=""> '+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-xl-6">'+
                                    '<div class="form-group row">'+
                                        '<label class="col-lg-3 col-form-label "> Anesthesiologist Name </label>'+
                                        '<div class="col-lg-9">'+
                                            '<input type="text" class="form-control anesthesiologist_name_s input-group-text" value="">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';

        $('.reg_search_btn').click(function() { 
            getPatientInfoByRegNo();
        })

    function getPatientInfoByRegNo() {
            var input_reg_no = $('.input_reg_no').val();
            if (input_reg_no == '') {
                $('.error_show').html(' Empty Please Type Registration Number....');
            }else {
                $.ajax({
                    url: 'bill/getPatientByRegNo?reg_no='+input_reg_no,
                    data: '',
                    method: 'GET',
                    dataType: 'json',
                    success: function(ptn_info) {
                        if (!$.trim(ptn_info)){   
                            $('.error_show').html(' Wrong Registration No.. Type Correct Registration No.. ');
                            $('.patients_data_a_bill').html('');
                        }else{      
                            $('.error_show').html('  ');

                            if (ptn_info.bill_cr_date == '' && ptn_info.bill_create_emp == 0) {
                                var bill_opt = '<select class="form-control bill_type" style="width: 50%; ">'+
                                        '<option value=""> Select Bill Type </option>'+
                                        '<option value="1"> Indoor </option>'+
                                        '<option value="2"> DNC </option>'+
                                        '<option value="3"> NVD </option>'+
                                        '<option value="4"> OT </option>'+
                                    '</select>';
                                
                            }else {
                                var bill_opt = '<button type="button" patient_status="'+ptn_info.p_stus+'" class="btn btn-warning btn-lg update_btn_ss"><i class="fa fa-edit"></i> UPDATE </button> <button type="button" class="btn btn-dark btn-lg print_indoor_bill"><i class="fa fa-print"></i> PRINT </button><center class="bill_option_for_update" ></center>';
                                $('.consultant_data_ss').html(''); 
                            }

        consultant1_data = ptn_info.consultant_id;
        consultant2_data = ptn_info.consul_sec_id;
        anesth_data = ptn_info.anes_id;
        ot_assist_data = ptn_info.assistant_id;

                // Bed Rates 
        bed_rate_s = ptn_info.price;
        bed_amount_hours = bed_rate_s / 24;
                // Bed Rates 

                    // Timestamp to Admitted Date and Time 
            var admit_time = ptn_info.time_this;
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
                                                    '<div class="form-control patient_name input-group-text" patient_auto_idd="'+ptn_info.p_n_id+'"> '+ptn_info.ptnname+' </div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-xl-6">'+
                                            '<div class="form-group row">'+
                                                '<label class="col-lg-3 col-form-label "> Doctor Name </label>'+
                                                '<div class="col-lg-9">'+
                                                    '<div class="form-control doctor_name input-group-text"> '+ptn_info.dr_name+' </div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-xl-6">'+
                                            '<div class="form-group row">'+
                                                '<label class="col-lg-3 col-form-label"> Bed No </label>'+
                                                '<div class="col-lg-9">'+
                                                    '<div class="form-control patient_name input-group-text"> '+ptn_info.b_num+' </div>'+
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
                                        '<div class="col-xl-6">'+
                                            '<div class="form-group row">'+
                                                '<label class="col-lg-3 col-form-label"> Total Admitted </label>'+
                                                '<div class="col-lg-9">'+
                                                    '<div class="form-control  input-group-text"> '+admit_days+' days '+remain_hours+' Hours '+remain_minutes+' Minutes </div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<center class="bill_option_add" >'+bill_opt+'</center>');
                            $('.add_bill_cat').html('');
                            $('.total_bill').html(''); 
                            $('.save_bill_btn').html('');             
                        }
                    },
                    error: function(){
                        $('.error_show').html(' Server Error Please Reload Again .... ');
                        $('.patients_data_a_bill').html('');
                    }
                })
            }
        }

    $(document).on('change', '.bill_type', function() {
        var bill_type_val = $(this).val();

if (bill_type_val == 2 || bill_type_val == 3 || bill_type_val == 4) {
    $('.consultant_data_ss').html(ot_assist_team);
}else if (bill_type_val == 1) {
    $('.consultant_data_ss').html(consultant_datass); 
}

        if (bill_type_val != '') {
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
                                              '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" style="text-align: right; border: 1px solid black;" class="form-control cat_type_num">'+
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
                        $('.save_bill_btn').html('<button class="btn ui_extra_btn ui_extra_btn_green rounded create_bill_btn" > SAVE </button>');             
                        total_bill_amount();
                    } 
                }
             })      
        }else {
            $('.add_bill_cat').html('');
            $('.total_bill').html(''); 
            $('.save_bill_btn').html('');
        }
    })

    $(document).on('click', '.create_bill_btn', function() {
        save_create_bill_info();
    })



    function save_create_bill_info() { 
        var cat_rate_ss = $('.cat_rates_value').map(function() {
            return this.value;
        }).get();
        var bill_cat_num = $('.billcat_info').map(function() {
            return $(this).data('bill_cat_num');
        }).get();
        var patient_a_idd = $('.patient_name').attr('patient_auto_idd');
        var pStatus = $('.bill_type option:selected').val();
        var consultant1 = $('.consultant1 option:selected').val();;
        var consultant2 = $('.consultant2 option:selected').val();;
        var anesthesiologist_namesss = $('.anesthesiologist_name_s').val();
        var assistant = $('.assistant_name_s').val();



        $.ajax({
            url: 'bill/create_newbill',
            method: 'POST',
            data: {
                'cat_cid[]': bill_cat_num,
                'cat_cvalue[]': cat_rate_ss,
                'patient_auto_id': patient_a_idd,
                'pStatus': pStatus,
                'consul': consultant1,
                'consul_sec': consultant2,
                'anesthe': anesthesiologist_namesss,
                'assis': assistant
            },
            beforeSend: function () {
                $('.create_bill_btn').css('display', 'none');
                $('#spin_loader').modal('show');
            },
            complete: function () {
                $('#spin_loader').modal('hide');
            },
            success: function() {
                toastr.success("Bill Create Successfully", "Success");
                window.open('bill/printbill?id='+patient_a_idd,'_blank', 'width=800,height=800,left=300,top=300');
                getPatientInfoByRegNo();
            } 
        })
    }

    $(document).on('keyup', '.bill_tk', function() {
        total_bill_amount();
    })

    function total_bill_amount() {
        var sum_total = 0;
        $('.bill_tk').each(function(){
            var bill_num = $(this).val();
        if (bill_num != 0) {
            sum_total += parseInt(bill_num);
            }
        });
        $('.total_bill').html('Total Bill '+sum_total);        
    }

    $(document).on('keyup', '.cat_type_num', function() {
        var cat_type_num = $(this).val();
        var cat_speacial_rates = $(this).parents('.bill_cat_main_div').find('.billcat_info').attr('bill_cat_rates');
        if (cat_type_num != '') {
            var cat_rates_value = cat_speacial_rates * cat_type_num;
            $(this).parents('.bill_cat_main_div').find('.cat_rates_value').val(cat_rates_value);
        }else if (cat_type_num == '') {
            $(this).parents('.bill_cat_main_div').find('.cat_rates_value').val('0');
        }
        total_bill_amount();
    })

    $(document).on('click', '.update_btn_ss', function() {
        $('.bill_option_for_update').html('<select class="form-control bill_type_for_update" style="width: 50%; ">'+
                                        '<option value=""> Select Bill Type </option>'+
                                        '<option value="1"> Indoor </option>'+
                                        '<option value="2"> DNC </option>'+
                                        '<option value="3"> NVD </option>'+
                                        '<option value="4"> OT </option>'+
                                    '</select>');
        getBillForUpdate();
    })

    function getBillForUpdate() {
        var patients_auto_id_id_id = $('.patient_name').attr('patient_auto_idd');
        var patients_status = $('.update_btn_ss').attr('patient_status');
        var p_select_status = 0;
        if (patients_status == 'indoor') {
            p_select_status = 1;
        }else if (patients_status == 'dnc') {
            p_select_status = 2;
        }else if (patients_status == 'nvd') {
            p_select_status = 3;
        }else if (patients_status == 'ot') {
            p_select_status = 4;
        } 

if (p_select_status == 2 || p_select_status == 3 || p_select_status == 4) {
    $('.consultant_data_ss').html(ot_assist_team);
    $('.assistant_name_s').val(ot_assist_data);
    $('.anesthesiologist_name_s').val(anesth_data);
}else if (p_select_status == 1) {
    $('.consultant_data_ss').html(consultant_datass); 
    if (consultant1_data != '' || consultant1_data != '') {
        $('.consultant1 option[value='+consultant1_data+']').attr('selected', 'selected');
        $('.consultant2 option[value='+consultant2_data+']').attr('selected', 'selected');
    }
}

    $.ajax({
        url: 'bill/getIndoorBillForUpdate?p_id='+patients_auto_id_id_id,
        data: '',
        method: 'GET',
        dataType: 'json',
        success: function(get_all_bill) {

        var html_full_data = '';
        if (!$.trim(get_all_bill)){   
            $('.error_show').html(' Something is Error ... ');
        }else {
            for (var i = 0; i < get_all_bill.length; i++) {

                if (p_select_status == 1) {
                    if (get_all_bill[i].c_num == '9' || get_all_bill[i].c_num == '10' ||  get_all_bill[i].c_num == '15' || get_all_bill[i].c_num == '16' ||  get_all_bill[i].c_num == '21' || get_all_bill[i].c_num == '23' || get_all_bill[i].c_num == '19') {
                        var get_bill_rates = parseInt(get_all_bill[i].create_bill_taka);
                        html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                  '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_all_bill[i].c_num+'" bill_cat_rates="'+get_bill_rates+'" billcat_idd="'+get_all_bill[i].bill_cat_auto_id+'">'+
                                    '<span class="input-group-text" id=""> '+get_all_bill[i].category+' </span>'+
                                  '</div>'+
                                  '<input type="text" style="text-align: right; border: 1px solid black;" class="form-control cat_type_num">'+
                                  '<input type="text" style="text-align: right;" class="form-control cat_rates_value bill_tk" value="'+get_bill_rates+'" >'+
                                '</div>';

                    }else if (get_all_bill[i].c_num == '8') {

                        html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                  '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_all_bill[i].c_num+'" bill_cat_rates="'+get_all_bill[i].create_bill_taka+'" billcat_idd="'+get_all_bill[i].bill_cat_auto_id+'">'+
                                    '<span class="input-group-text" id=""> '+get_all_bill[i].category+' </span>'+
                                  '</div>'+
                                  '<input type="text" style="text-align: right;" class="form-control cat_rates_value bill_tk" value="'+get_all_bill[i].create_bill_taka+'" >'+
                                '</div>';
                    }else if (get_all_bill[i].c_num == '2' || get_all_bill[i].c_num == '24' ) {

                        html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                  '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_all_bill[i].c_num+'" bill_cat_rates="'+get_all_bill[i].create_bill_taka+'" billcat_idd="'+get_all_bill[i].bill_cat_auto_id+'">'+
                                    '<span class="input-group-text" id=""> '+get_all_bill[i].category+' </span>'+
                                  '</div>'+
                                  '<input type="text" style="text-align: right;" class="form-control cat_rates_value  bill_tk" value="'+get_all_bill[i].create_bill_taka+'" >'+
                                '</div>';
                    }else {

                        html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                  '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_all_bill[i].c_num+'" bill_cat_rates="'+get_all_bill[i].create_bill_taka+'" billcat_idd="'+get_all_bill[i].bill_cat_auto_id+'">'+
                                    '<span class="input-group-text" id=""> '+get_all_bill[i].category+' </span>'+
                                  '</div>'+
                                  '<input type="text" style="text-align: right;" class="form-control cat_rates_value  bill_tk" value="'+get_all_bill[i].create_bill_taka+'" >'+
                                '</div>';
                    }
                }else {

                    html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                  '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_all_bill[i].c_num+'" bill_cat_rates="'+get_all_bill[i].create_bill_taka+'" billcat_idd="'+get_all_bill[i].bill_cat_auto_id+'">'+
                                    '<span class="input-group-text" id=""> '+get_all_bill[i].category+' </span>'+
                                  '</div>'+
                                  '<input type="text" style="text-align: right;" class="form-control cat_rates_value  bill_tk"  value="'+get_all_bill[i].create_bill_taka+'">'+
                                '</div>';
                        }
                    }
                    $('.add_bill_cat').html(html_full_data);
                    $('.save_bill_btn').html('<button class="btn ui_extra_btn ui_extra_btn_orange rounded update_bill_btn" > UPDATE BILL </button>');             
                    total_bill_amount();
                }
            }
        })

        $(document).on('change', '.bill_type_for_update', function() {
            var bill_select_status = $(this).val();
            if (bill_select_status == p_select_status) {

if (p_select_status == 2 || p_select_status == 3 || p_select_status == 4) {
    $('.consultant_data_ss').html(ot_assist_team);
    $('.assistant_name_s').val(ot_assist_data);
    $('.anesthesiologist_name_s').val(anesth_data);
}else if (p_select_status == 1) {
    $('.consultant_data_ss').html(consultant_datass); 
    if (consultant1_data != '' || consultant1_data != '') {
        $('.consultant1 option[value='+consultant1_data+']').attr('selected', 'selected');
        $('.consultant2 option[value='+consultant2_data+']').attr('selected', 'selected');
    }
}
                $.ajax({
                    url: 'bill/getIndoorBillForUpdate?p_id='+patients_auto_id_id_id,
                    data: '',
                    method: 'GET',
                    dataType: 'json',
                    success: function(get_all_bill) {














                var html_full_data = '';
                    if (!$.trim(get_all_bill)){   
                        $('.error_show').html(' Something is Error ... ');
                    }else {
                        for (var i = 0; i < get_all_bill.length; i++) {

                            if (p_select_status == 1) {
                                if (get_all_bill[i].c_num == '9' || get_all_bill[i].c_num == '10' ||  get_all_bill[i].c_num == '15' || get_all_bill[i].c_num == '16' ||  get_all_bill[i].c_num == '21' || get_all_bill[i].c_num == '23' || get_all_bill[i].c_num == '19') {
                                    var get_bill_rates = parseInt(get_all_bill[i].create_bill_taka);
                                    html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_all_bill[i].c_num+'" bill_cat_rates="'+get_bill_rates+'" billcat_idd="'+get_all_bill[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_all_bill[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right; border: 1px solid black;" class="form-control cat_type_num">'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value bill_tk" value="'+get_bill_rates+'" >'+
                                            '</div>';

                                }else if (get_all_bill[i].c_num == '8') {

                                    html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_all_bill[i].c_num+'" bill_cat_rates="'+get_all_bill[i].create_bill_taka+'" billcat_idd="'+get_all_bill[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_all_bill[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value bill_tk" value="'+get_all_bill[i].create_bill_taka+'" >'+
                                            '</div>';
                                }else if (get_all_bill[i].c_num == '2' || get_all_bill[i].c_num == '24' ) {

                                    html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_all_bill[i].c_num+'" bill_cat_rates="'+get_all_bill[i].create_bill_taka+'" billcat_idd="'+get_all_bill[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_all_bill[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value  bill_tk" value="'+get_all_bill[i].create_bill_taka+'" >'+
                                            '</div>';
                                }else {

                                    html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_all_bill[i].c_num+'" bill_cat_rates="'+get_all_bill[i].create_bill_taka+'" billcat_idd="'+get_all_bill[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_all_bill[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value  bill_tk" value="'+get_all_bill[i].create_bill_taka+'" >'+
                                            '</div>';
                                }
                            }else {

                                html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_all_bill[i].c_num+'" bill_cat_rates="'+get_all_bill[i].create_bill_taka+'" billcat_idd="'+get_all_bill[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_all_bill[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value  bill_tk"  value="'+get_all_bill[i].create_bill_taka+'">'+
                                            '</div>';
                            }
                        }
                        $('.add_bill_cat').html(html_full_data);
                        $('.save_bill_btn').html('<button class="btn ui_extra_btn ui_extra_btn_orange rounded update_bill_btn" > UPDATE BILL </button>');             
                        total_bill_amount();
                    }




















                    }
                })

            }else {












// This is End of Work ..........
if (bill_select_status == 2 || bill_select_status == 3 || bill_select_status == 4) {
    $('.consultant_data_ss').html(ot_assist_team);
    $('.assistant_name_s').val(ot_assist_data);
    $('.anesthesiologist_name_s').val(anesth_data);
}else if (bill_select_status == 1) {
    $('.consultant_data_ss').html(consultant_datass); 
    if (consultant1_data != '' || consultant1_data != '') {
        $('.consultant1 option[value='+consultant1_data+']').attr('selected', 'selected');
        $('.consultant2 option[value='+consultant2_data+']').attr('selected', 'selected');
    }
}

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

                            if (bill_select_status == 1) {
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
                                    var total_services_dr_rates = services_dr_rates * total_admit_day;
                                    html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_bil_cat[i].c_num+'" bill_cat_rates="'+services_dr_rates+'" billcat_idd="'+get_bil_cat[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_bil_cat[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value  bill_tk" value="'+total_services_dr_rates+'" >'+
                                            '</div>';
                                }else {
                                    var ex_cat_rates = parseInt(get_bil_cat[i].indore_rate);
                                    html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_bil_cat[i].c_num+'" bill_cat_rates="'+ex_cat_rates+'" billcat_idd="'+get_bil_cat[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_bil_cat[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value  bill_tk" value="'+ex_cat_rates+'" >'+
                                            '</div>';
                                }
                            }else if (bill_select_status == 2) {
                                var dnc_rates = parseInt(get_bil_cat[i].dnc_rate);
                                html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_bil_cat[i].c_num+'" bill_cat_rates="'+dnc_rates+'" billcat_idd="'+get_bil_cat[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_bil_cat[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value  bill_tk"  value="'+dnc_rates+'">'+
                                            '</div>';
                            }else if (bill_select_status == 3) {
                                var nvd_rates = parseInt(get_bil_cat[i].nvd_rate);
                                html_full_data += '<div class="input-group bill_cat_main_div" style="width: 50%;">'+
                                              '<div class="input-group-prepend billcat_info" data-bill_cat_num="'+get_bil_cat[i].c_num+'" bill_cat_rates="'+nvd_rates+'" billcat_idd="'+get_bil_cat[i].bill_cat_auto_id+'">'+
                                                '<span class="input-group-text" id=""> '+get_bil_cat[i].category+' </span>'+
                                              '</div>'+
                                              '<input type="text" style="text-align: right;" class="form-control cat_rates_value  bill_tk" value="'+nvd_rates+'">'+
                                            '</div>';
                            }else if (bill_select_status == 4) {
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
                        $('.save_bill_btn').html('<button class="btn ui_extra_btn ui_extra_btn_orange rounded update_bill_btn" > UPDATE BILL </button>');             
                        total_bill_amount();
                    } 
                }
             })  
// This is End of Work ..........











            }
        })
        
    }






    $(document).on('click', '.update_bill_btn', function() {
        update_create_bill_info();
    })


    function update_create_bill_info() { 
        var cat_rate_ss = $('.cat_rates_value').map(function() {
            return this.value;
        }).get();
        var bill_cat_num = $('.billcat_info').map(function() {
            return $(this).data('bill_cat_num');
        }).get();
        var patient_a_idd = $('.patient_name').attr('patient_auto_idd');
        var pStatus = $('.bill_type_for_update option:selected').val();
        var consultant1 = $('.consultant1 option:selected').val();;
        var consultant2 = $('.consultant2 option:selected').val();;
        var anesthesiologist_namesss = $('.anesthesiologist_name_s').val();
        var assistant = $('.assistant_name_s').val();

        $.ajax({
            url: 'bill/update_create_bill',
            method: 'POST',
            data: {
                'cat_cid[]': bill_cat_num,
                'cat_cvalue[]': cat_rate_ss,
                'patient_auto_id': patient_a_idd,
                'pStatus': pStatus,
                'consul': consultant1,
                'consul_sec': consultant2,
                'anesthe': anesthesiologist_namesss,
                'assis': assistant
            },
            beforeSend: function () {
                $('.create_bill_btn').css('display', 'none');
                $('#spin_loader').modal('show');
            },
            complete: function () {
                $('#spin_loader').modal('hide');
            },
            success: function() {
                toastr.success("Bill UPDATE Successfully", "Success");
                window.open('bill/printbill?id='+patient_a_idd,'_blank', 'width=800,height=800,left=300,top=300');
                getPatientInfoByRegNo();
            } 
        })
    }

    $(document).on('click', '.print_indoor_bill', function() {
        $('.bill_option_for_update').html('');
        $('.consultant_data_ss').html(''); 
        $('.add_bill_cat').html('');
        $('.total_bill').html(''); 
        $('.save_bill_btn').html('');             
        var patient_a_idd = $('.patient_name').attr('patient_auto_idd');
        window.open('bill/printbill?id='+patient_a_idd,'_blank', 'width=800,height=800,left=300,top=300');
    })











