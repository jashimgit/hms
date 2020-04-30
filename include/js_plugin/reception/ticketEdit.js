


    $('.view_ticket_full').click(function() {
        var tc_app_iidd = $(this).attr('data_p_id');
        window.open('reception/print_ticket?id='+tc_app_iidd,'_blank', 'width=800,height=800,left=300,top=300');
    })

    $('.doctors_auto_idd').change(function() {
        var dr_auto_ids = $(this).val();
        $.ajax({
            url: 'reception/getdrfeeByJason?id=' + dr_auto_ids,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (dr_fee) {  
                $('.ticket_time').html('<option value="" > -- Select -- </option><option hos_fee="'+dr_fee.hospital_first+'" value="'+dr_fee.dr_firsttime+'"> First Time Ticket </option><option hos_fee="'+dr_fee.hospital_sec+'" value="'+dr_fee.dr_sectime+'"> Second Time Ticket </option>');
            }
        })
    })


        $('.edit_ticket_info').click(function() {
            var tc_app_iidd = $(this).attr('data_p_id');
             $.ajax({
                url: 'reception/getticketByJason?id='+tc_app_iidd,
                data: '',
                method: 'GET',
                dataType: 'json',
                success: function(ticket_edata) {
                    $('.ticket_auto_idd').val(ticket_edata.app_tc_id);
                    $('.patient_name').val(ticket_edata.app_patient);
                    $('.app_date_s').val(ticket_edata.ap_date);
                    $('.patient_age').val(ticket_edata.age);
                    $('.patient_mobile').val(ticket_edata.mobile);
                    $('.input_serials').val(ticket_edata.ticket_serial);
                    $('.doctors_auto_idd option[value='+ticket_edata.auto_iddd_for_dr+']').attr('selected', 'selected');
                }
            })
        })
