



        $(".editbutton").click(function () {

            // Get the record's ID via attribute
            var iid = $(this).attr('data-id');
            $.ajax({
                url: 'doctor/editDoctorByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    // Populate the form fields with the data returned from server
                    $('#editDoctorForm').find('[name="dr_main_id"]').val(response.doctor.dr_auto_id);
                    $('#editDoctorForm').find('[name="name"]').val(response.doctor.dr_name);
                    $('#editDoctorForm').find('[name="profile"]').val(response.doctor.profile);

                    $('#activity_option option[value='+response.doctor.stus+']').attr('selected', 'selected');  

                    $('#editDoctorForm').find('[name="chamber"]').val(response.doctor.chamber);
                    $('#editDoctorForm').find('[name="phone"]').val(response.doctor.phone);
                    
                    $('#gender option[value='+response.doctor.gender+']').attr('selected', 'selected');

                    $('#dept_option option[value='+response.doctor.department+']').attr('selected', 'selected');       
                }
            });
        });




		$(".upload_btn").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute
            var iid = $(this).attr('data-id');
            $('#Upload_Doctor_pic').trigger("reset");
            $.ajax({
                url: 'doctor/editDoctorByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (response) {
                    // Populate the form fields with the data returned from server
                    $('#Upload_Doctor_pic').find('[name="dr_main_id"]').val(response.doctor.dr_auto_id);
                    $('#Upload_Doctor_pic').find('[name="name"]').val(response.doctor.dr_name);
                    $('#dr_preimage_pic').attr('src', response.doctor.img_url);
                }
            });
        });


    function loadfile(oInput){
        var output=document.getElementById('dr_preimage_pic');
        output.src=URL.createObjectURL(event.target.files[0]);

        var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];

        if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, This is invalid file, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true; 
    };
