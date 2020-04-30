<!--sidebar end-->

<!--main content start-->


<style type="text/css">
    
    .adv-table table tr td {
        margin: 0;
        padding: 0;
    }

    th {
        text-align: center;
        font-size: 14px;
        margin-bottom: 15px;
    }

</style>



<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-user"></i>  Doctors Speciality    
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table " style="width: 60%;">

                    <label style="font-size: 14px; "> Select Doctor </label>
                    <select class="form-control m-bot15 js-example-basic-single dr_selects" name="doctor" value='' >
                            <option value=""> Select...... </option>
                        <?php foreach ($doctors as $doctor) { ?>
                            <option drIID="<?php echo $doctor->dr_id; ?>" value="<?php echo $doctor->dr_auto_id; ?>"> <?php echo $doctor->dr_name; ?> </option>
                        <?php } ?> 
                    </select><br><br>
                    <div class="btn_assign"></div><br><br>

                    <div class="data_view_opt"></div>
                    

                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->



<script type="text/javascript">

    var add_btn_s = '<button type="button" style="font-size: 15px; margin: 0 0 0 70px;" class="btn btn-info add_btn" title="Add New" ><i class="fa fa-plus-circle"> ADD NEW </i> </button>';

    var view_btn_s = '<button type="button" style="font-size: 15px; margin: 0 0 0 70px;" class="btn btn-info view_sp_btn" title="View All" ><i class="fa fa-eye"> VIEW </i> </button>';

    var data_top = '<table><tr><th>Doctor Speciality</th><th>Action</th></tr>';

    var emptyBox = '<tr><td><input type="text" size="100" id="" class="form-control inputboxs" value=""></td><td><button type="button" style="margin-top: -30px;" class="btn btn-info save_btn_s" title="Add" id="" ><i class="fa fa-save"></i> </button></td></tr></table>';

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
                    html += '<tr class="dr_spc_tble_tr"><td><input type="text" readonly size="90" id="" class="form-control inputboxs_data" value="'+dr_sp_all[i].dr_special+'"></td><td style="width:80px;" align="center"><button type="button" style="margin-top: -30px;" class="btn btn-xs btn-primary edit_btn_s" dataIDD="'+dr_sp_all[i].iniq_id+'" title="Edit" id="" ><i class="fa fa-edit"></i></button><button type="button" style="margin-top: -30px;" class="btn btn-info btn-xs delete_button del_btn_ss" dataIIDD="'+dr_sp_all[i].iniq_id+'" title="Delete" id="" ><i class="fa fa-trash"></i></button></td></tr>';
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
                    toastr.success('Have fun storming the castle!', 'Miracle Max Says');                    $('.data_view_opt').html('');
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
                getDoctorSpecility();
            }
        })
    })



</script>






