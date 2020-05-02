


    
    var add_btn_s = '<button type="button" class="btn btn-success btn-lg add_btn"><i class="fa fa-plus-circle"></i> Add New </button>';

    var view_btn_s = '<button type="button" class="btn btn-success btn-lg view_sp_btn"><i class="fa fa-eye"></i> VIEW </button>';

    var data_top = '<table><tr><th>Day</th><th>Time Start</th><th>Time End</th><th>Action</th></tr>';

    var emptyBox = '<tr><td><select class="form-control days_select" value=""><option value="">Select........</option><option value="Saturday">Saturday</option><option value="Sunday">Sunday</option><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option></select></td><td><input type="time"  id="" class="form-control inputboxs time_startss" value=""></td><td><input type="time"  id="" class="form-control inputboxs time_endss" value=""></td><td><button type="button" style="" class="btn btn-sm btn-info save_btn_s" title="Add" id="" ><i class="fa fa-save"></i> </button></td></tr></table>';

    function getDoctorSpecility(){
      var dr_auto_id = $('.dr_selects').val();
        $.ajax({
            url: 'doctor/getDoctorTimeable?dr_a_idd='+dr_auto_id,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function(dr_time_all) {
                var html = '';
                for (var i=0; i<dr_time_all.length; i++) {
                    html += '<tr class="dr_time_tble_tr"><td><input type="text" readonly id="" class="form-control inputboxs cember_days" value="'+dr_time_all[i].day+'"></td><td><input type="text" readonly id="" class="form-control inputboxs cember_time_start" value="'+dr_time_all[i].timestart+'"></td><td><input type="text" readonly id="" class="form-control inputboxs cember_time_end" value="'+dr_time_all[i].timeend+'"></td><td style="width:80px;" align="center"><button type="button" style="" class="btn btn-sm btn-primary edit_btn_s" dataIDD="'+dr_time_all[i].dr_time_id+'" title="Edit" id="" ><i class="fa fa-edit"></i></button><button type="button" style="" class="btn btn-info btn-sm delete_button del_btn_ss" dataIIDD="'+dr_time_all[i].dr_time_id+'" title="Delete" id="" ><i class="fa fa-trash"></i></button></td></tr>';
                }
        $('.data_view_opt').html(data_top+''+html+'</table>');
                    $('.error_show').html('');
            }
        })
    }

    $('.dr_selects').change(function() {
        var dr_this_val = $(this).val();
            $('.error_show').html('');
            $('.data_view_opt').html('');
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
        var daysSlt = $('.days_select').val(); 
        var tim_strt = $('.time_startss').val();
        var tim_end = $('.time_endss').val();

        if (daysSlt == '' || tim_strt == '' || tim_end == '') {
            $('.error_show').html('<center><h2> Fill-up All Input Box </h2></center>');

        }else {
            $.ajax({
                url: 'doctor/setDoctorTimable',
                method: 'POST',
                data: {
                    dr_at_idd: dr_auto_id,
                    drIddII: dr_iddr,
                    daysSelect: daysSlt,
                    timeStarts: tim_strt,
                    timeEnds: tim_end
                    },
                success: function() {
                toastr.success('Data Insert Successfull', daysSlt+' '+tim_strt+' '+tim_end); 
                    $('.data_view_opt').html('');
                    $('.error_show').html('');
                }
            })
        }
    })

    $(document).on('click', '.view_sp_btn', function() {
        getDoctorSpecility();           
    })

    $(document).on('click', '.edit_btn_s', function() {
        $(this).parents('.dr_time_tble_tr').find('.inputboxs').removeAttr('readonly');

        $(this).parents('.dr_time_tble_tr').find('.edit_btn_s').html('<i class="fa fa-arrow-right"></i>');   
        $(this).parents('.dr_time_tble_tr').find('.edit_btn_s').addClass('updateDrTimeable');
    })

    $(document).on('click', '.updateDrTimeable', function() {
        var drDays = $(this).parents('.dr_time_tble_tr').find('.cember_days').val();   
        var drTimeStart = $(this).parents('.dr_time_tble_tr').find('.cember_time_start').val();   
        var drTimeEnd = $(this).parents('.dr_time_tble_tr').find('.cember_time_end').val();   
        var iniq_id = $(this).attr('dataIDD');
        $.ajax({
            url: 'doctor/update_Dr_Timabless',
            method: 'POST',
            data: {
                drDays: drDays,
                drTimeStart: drTimeStart,
                drTimeEnd: drTimeEnd,
                iniq_id: iniq_id
                },
            cache: false,
            success: function() {
            toastr.success('Data Update Success', 'Successfully');
                getDoctorSpecility();
            }
        })
    })




    $(document).on('click', '.del_btn_ss', function() {
           
        var iniq_id = $(this).attr('dataIIDD');
        $.ajax({
            url: 'doctor/delete_Dr_Time_able',
            method: 'POST',
            data: {
                iniq_id: iniq_id
                },
            cache: false,
            success: function() {
             toastr.warning('Data Delete Success', 'Deleted');
                getDoctorSpecility();
            }
        })
    })





