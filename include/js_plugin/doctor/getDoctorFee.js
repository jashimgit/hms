

    $(".editbutton").click(function () {

        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');

        $.ajax({
            url: 'doctor/editDoctorFeeByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (response) {
            // Populate the form fields with the data returned from server
            $('#doctorFeeUpdateForm').find('[name="dr_fee_id"]').val(response.dr_fee.dr_fee_id);
            $('#doctorFeeUpdateForm').find('[name="dr_firsttime"]').val(response.dr_fee.dr_firsttime);
            $('#doctorFeeUpdateForm').find('[name="dr_sectime"]').val(response.dr_fee.dr_sectime);
            $('#doctorFeeUpdateForm').find('[name="hospital_first"]').val(response.dr_fee.hospital_first);
            $('#doctorFeeUpdateForm').find('[name="hospital_sec"]').val(response.dr_fee.hospital_sec);
            $('.drName').html(response.dr_fee.dr_name); 
            }
        });
    });