

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


	$('.input_serials').click(function() {
	    var doctors_auto_idds = $('.doctors_auto_idd').val();
	    var app_date_s = $('.app_date_s').val();
	    $.ajax({
	        url: 'reception/getlastTicketSerial?dr_id=' + doctors_auto_idds + '&app_date=' + app_date_s,
	        method: 'GET',
	        data: '',
	        dataType: 'json',
	        success: function (app_serial) { 
	            if (app_serial == null) {
	                $('.input_serials').val('1');
	            }else {
	                var last_idds = parseInt(app_serial.ticket_serial);
	                var now_serials = last_idds+1;
	                $('.input_serials').val(now_serials);                    
	            }
	         }
	    })
	})


	$('.save_ticket_btn').click(function() {
	    var doctors_auto_idd = $('.doctors_auto_idd').val();
	    var dr_ticket_fee = $('.ticket_time').val();
	    var hospital_ticket_fee = $('option:selected', '.ticket_time').attr('hos_fee');
	    var patient_name = $('.patient_name').val();
	    var app_date = $('.app_date_s').val();
	    var patient_age = $('.patient_age').val();
	    var patient_mobile = $('.patient_mobile').val();
	    var input_serials = $('.input_serials').val();

	    if (doctors_auto_idd == '' || dr_ticket_fee == '' || patient_name == '' || app_date == '' || input_serials == '') {
	        $('.error_show').html(' Please Fill-UP All Info '); 
	                toastr.error(" Please Fill-UP All Info ", " Empty ! ");
	    }else {
	        $.ajax({
	            url: 'reception/Newticket',
	            method: 'POST',
	            data: {
	                dr_id: doctors_auto_idd,
	                patient_name: patient_name,
	                age: patient_age,
	                mobile: patient_mobile,
	                serial: input_serials,
	                app_date: app_date,
	                doctor_fee: dr_ticket_fee,
	                hospital_fee: hospital_ticket_fee
	            },
	            beforeSend: function () {
	                $('.save_ticket_btn').css('display', 'none');
	                $('#spin_loader').modal('show');
	            },
	            complete: function () {
	                $('#spin_loader').modal('hide');
	                $('.doctors_auto_idd').val('');
	                $('.ticket_time').val('');                
	                $('.patient_name').val('');
	                $('.app_date_s').val('');
	                $('.patient_age').val('');
	                $('.patient_mobile').val('');
	                $('.input_serials').val('');
	                $('.save_ticket_btn').css('display', 'block');
	            },
	            success: function (last_id) { 
	                toastr.success(" Addedd Successfully.... ", "Success");
	                window.open('reception/print_ticket?id='+last_id,'_blank', 'width=800,height=800,left=300,top=300');
	             }
	        })
	    }

	})