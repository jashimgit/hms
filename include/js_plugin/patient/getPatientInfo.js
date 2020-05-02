






    $(".editpbutton").click(function () {
        // Get the record's ID via attribute  
        var iid = $(this).attr('data_p_id');
        
        $.ajax({
            url: 'patient/editPatientByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
          success: function (response) {
            // Populate the form fields with the data returned from server

            $('#editPatientForm').find('[name="id"]').val(response.patient.p_n_id);
            $('#editPatientForm').find('[name="name"]').val(response.patient.ptnname);
            $('#doctor_p option[value='+response.patient.dr_a_iniq_idd+']').attr('selected', 'selected');
            $('#sex option[value='+response.patient.sex+']').attr('selected', 'selected');
            $('#editPatientForm').find('[name="address"]').val(response.patient.pn_address);
            $('#editPatientForm').find('[name="phone"]').val(response.patient.mobile);
            $('#editPatientForm').find('[name="father"]').val(response.patient.f_s_name);
            $('#editPatientForm').find('[name="age"]').val(response.patient.age);
            $('#editPatientForm').find('[name="reg_no"]').val(response.patient.reg_no);

            var admit_time = response.patient.time_this;


            var timestampInMilliSeconds = admit_time*1000;
            var date = new Date(timestampInMilliSeconds);

            var day = (date.getDate() < 10 ? '0' : '') + date.getDate();
            var month = (date.getMonth() < 9 ? '0' : '') + (date.getMonth() + 1);
            var year = date.getFullYear();

            var hours = ((date.getHours() % 12 || 12) < 10 ? '0' : '') + (date.getHours() % 12 || 12);
            var minutes = (date.getMinutes() < 10 ? '0' : '') + date.getMinutes();
            var meridiem = (date.getHours() >= 12) ? 'pm' : 'am';

            var formattedDate = day + '-' + month + '-' + year + ' at ' + hours + ':' + minutes + ' ' + meridiem;
            var dateformt = day + '-' + month + '-' + year;
            var times_formates = hours + ':' + minutes + ' ' + meridiem;

            $('#admit_date').val(dateformt);
        }
        });
    });



    $('#fa').click(function() {
        $('.reltn').val('fa');
        $('#f_name_box').css('display', 'block');
    })

    $('#hus').click(function() {
        $('.reltn').val('hus');
        $('#f_name_box').css('display', 'block');
    })




    $(".edit_p_bed").click(function () {

        // Get the record's ID via attribute  
        var iid = $(this).attr('data_p_id');
        $('#editbedinfoForm').trigger("reset");
        $('#edit_p_bed').modal('show');

        $('#p_id_editbed').val(iid);


        $.ajax({
            url: 'patient/editPatientByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (respon) {
            // Populate the form fields with the data returned from server
              $('#bed_id option[value='+respon.patient.b_num+']').attr('selected', 'selected');
            }
        })

    })
    


