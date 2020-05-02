



    
    var add_btn_s = '<button type="button" class="btn btn-success btn-lg add_btn"><i class="fa fa-plus-circle"></i> Add New </button>';

    var view_btn_s = '<button type="button" class="btn btn-success btn-lg view_sp_btn"><i class="fa fa-eye"></i> VIEW </button>';

    var data_top = '<table><tr><th>Doctor Speciality</th><th>Action</th></tr>';

    var emptyBox = '<tr><td><input type="text" size="100" id="" class="form-control inputboxs" value=""></td><td><button type="button" style="" class="btn btn-sm  btn-info save_btn_s" title="Add" id="" ><i class="fa fa-save"></i> </button></td></tr></table>';



    function getDoctorSpecility(){
    var dr_auto_id = $('.dr_selects').val();
        $.ajax({
            url: 'doctor/getDoctorAllSpeciality?dr_a_iidd='+dr_auto_id,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function(dr_sp_all) {
                var html = '';
                for (var i=0; i<dr_sp_all.length; i++) {
                    html += '<tr class="dr_spc_tble_tr"><td><input type="text" readonly size="90" id="" class="form-control inputboxs_data" value="'+dr_sp_all[i].dr_special+'"></td><td style="width:80px;" align="center"><button type="button" style="" class="btn btn-sm btn-primary edit_btn_s" dataIDD="'+dr_sp_all[i].iniq_id+'" title="Edit" id="" ><i class="fa fa-edit"></i></button><button type="button" style="" class="btn btn-info btn-sm delete_button del_btn_ss" dataIIDD="'+dr_sp_all[i].iniq_id+'" title="Delete" id="" ><i class="fa fa-trash"></i></button></td></tr>';
                }
        $('.data_view_opt').html(data_top+''+html+'</table>');
            }
        })
    }

    $('.dr_selects').change(function() {
        var dr_this_val = $(this).val();
        if (dr_this_val == '') {
            $('.btn_assign').html('');
            $('.data_view_opt').html('');
        }else {
            $('.btn_assign').html(add_btn_s+' '+view_btn_s);
        }
    });

    $(document).on('click', '.add_btn', function() {
        $('.data_view_opt').html(data_top+' '+emptyBox);
    })

    $(document).on('click', '.save_btn_s', function() {
        var dr_auto_id = $('.dr_selects').val();
        var dr_iddr = $('option:selected', '.dr_selects').attr('drIID');
        var dr_spe = $('.inputboxs').val();
        if (dr_spe == '') {

        }else {
            $.ajax({
                url: 'doctor/setDoctorSpeciality',
                method: 'POST',
                data: {
                    dr_at_idd: dr_auto_id,
                    drIddII: dr_iddr,
                    dr_sp_txt: dr_spe
                    },
                success: function() {
                    toastr.success('Data Added Success', 'Successfully');
                    $('.data_view_opt').html('');
                }
            })
        }
    })

    $(document).on('click', '.view_sp_btn', function() {
        getDoctorSpecility();
    })

    $(document).on('click', '.edit_btn_s', function() {
        $(this).parents('.dr_spc_tble_tr').find('.inputboxs_data').removeAttr('readonly');

        $(this).parents('.dr_spc_tble_tr').find('.edit_btn_s').html('<i class="fa fa-arrow-right"></i>');   
        $(this).parents('.dr_spc_tble_tr').find('.edit_btn_s').addClass('updateDrSpclty');
    })

    $(document).on('click', '.updateDrSpclty', function() {
        var drSpcl = $(this).parents('.dr_spc_tble_tr').find('.inputboxs_data').val();   
        var iniq_id = $(this).attr('dataIDD');
        $.ajax({
            url: 'doctor/update_Dr_Speciality',
            method: 'POST',
            data: {
                drSpcl: drSpcl,
                iniq_id: iniq_id
                },
            cache: false,
            success: function() {
                toastr.success('Data Update Successfully', 'Success');
                getDoctorSpecility();
            }
        })
    })




    $(document).on('click', '.del_btn_ss', function() {
           
        var iniq_id = $(this).attr('dataIIDD');
        $.ajax({
            url: 'doctor/delete_Dr_Speciality',
            method: 'POST',
            data: {
                iniq_id: iniq_id
                },
            cache: false,
            success: function() {
                toastr.warning('Data Deleted', 'Delete');
                getDoctorSpecility();
            }
        })
    })




