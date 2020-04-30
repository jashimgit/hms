<!--sidebar end-->
<!--main content start-->

<style type="text/css">
    @media print {
        @page { margin:0; }
        body { margin: 0.1cm; }
    }
</style>


<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-user"></i>  <?php  echo lang('today').' '.lang('ticket'); ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">

      
                <form style="margin: -25px -15px -32px -16px; padding: 0" role="form" class="f_report">
                    <div align="center" class="form-group">
                        
                        <div class="input-group input-large" data-date="13/07/2018" data-date-format="mm/dd/yyyy">
                            <input type="text" class="form-control dtpic " id="printdate" name="date" value="" placeholder="<?php echo lang('date'); ?>">                           
                            <button type="button" name="submit" class="btn btn-info range_submit"><?php echo lang('submit'); ?></button>

                        </div>
                    </div>
                 </form><br>

                    <div class="clearfix">
                        <a data-toggle="modal" href="#myModal">
                            <div class="btn-group">
                                <button id="" class="btn green">
                                   <i class="fa fa-plus-circle"></i>  <?php  echo lang('add_ticket'); ?> 
                                </button>
                            </div>
                        </a> 
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th> <?php  echo lang('serial'); ?></th>
                                <th> <?php  echo lang('name'); ?></th>
                                <th> <?php  echo lang('age'); ?></th>
                                <th> <?php  echo lang('mobile'); ?></th>
                                <th> <?php  echo lang('doctor'); ?></th>
                                <th> <?php  echo lang('appointment'). " " .lang('date'); ?></th>
                                <th> <?php  echo lang('status'); ?></th>
                                <th> <?php  echo lang('print'). ' ' .lang('emp'). ' ' .lang('name'); ?></th>
                                <th><?php  echo lang('entry'). ' '.lang('date'); ?></th>
                                <th> <?php  echo lang('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody class="datatavl" id="datatab1">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->



<!-- Add Ticket Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i>  <?php  echo lang('add_ticket'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="reception/Newticket" method="post" id="ticketform" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php  echo lang('doctor'); ?></label>
                        <select class="form-control m-bot15 js-example-basic-single" id="doctor" name="dr_id" value=''>
                            <option value="">Select....</option>
                        <?php foreach ($doctors as $doctor) { ?>
                            <option value="<?php echo $doctor->dr_auto_id; ?>"><?php echo $doctor->dr_id; ?> --------- <?php echo $doctor->dr_name; ?> </option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php  echo lang('ticket').' '.lang('time'); ?></label>
                        <select required="required" class="form-control" name="tickettime" id="tickettime" value='' onchange="changeval()">
                            <option value="">Select.........</option>
                            <option value="firsttime"><?php  echo lang('first_ticket'); ?></option>
                            <option value="secondtime"><?php  echo lang('second_ticket'); ?></option>
                        </select>
                    </div>
                    <input type="text" required="required" name="doctor_fee" class="doctor_fee" value=''>
                    <input type="text" required="required" name="hospital_fee" class="hospital_fee" value=''>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php  echo lang('patient'); ?> <?php  echo lang('name'); ?></label>
                        <input required="required" type="text" class="form-control" name="patient" id="exampleInputEmail1" placeholder="Full Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php  echo lang('appointment'); ?> <?php  echo lang('date'); ?></label>
                        <input required="required" type="text" class="form-control  dtpic " name="date" id="app_date" value='' placeholder="">
                    </div>

                    <div class="form-group col-auto">
                        <label for="exampleInputEmail1"> <?php  echo lang('age'); ?></label>
                        <input required="required" type="text" class="form-control" name="age" id="exampleInputEmail1" value='' placeholder="Type age number">
                        <select  class="form-control ageymd" id="doctor" name="y_m_d" value=''>
                            <option value="y">Y</option>
                            <option value="m">M</option>
                            <option value="d">D</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php  echo lang('mobile'); ?></label>
                        <input required="required" type="text" class="form-control" name="mobile" id="exampleInputEmail1" value='' placeholder="Mobile Number">
                    </div><br>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('serial'); ?></label>
                        <input required="required" type="text" class="form-control" name="serial" id="appoinment_serial" placeholder="">
                    </div>

                    <center><button style="padding: 20px 60px 20px 60px; font-size: 20px;" type="submit" name="submit" class="btn btn-info"> <?php  echo lang('add'); ?></button></center>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Ticket Modal-->







<!-- Edit Ticket Modal-->
<div class="modal fade" id="editTicket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i>  <?php  echo lang('edit').' '.lang('ticket'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="reception/editTicketData" method="post" id="editTicketForm" enctype="multipart/form-data">


                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php  echo lang('doctor'); ?></label>
                        <select class="form-control" id="doctor_id" name="dcr_id" value=''>
                            <option>Select....</option>
                        <?php foreach ($doctors as $doctor) { ?>
                            <option value="<?php echo $doctor->dr_auto_id; ?>"><?php echo $doctor->dr_id; ?> --------- <?php echo $doctor->dr_name; ?> </option>

                        <?php } ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php  echo lang('ticket').' '.lang('time'); ?></label>
                        <select class="form-control" name="tmticket" id="tmticket" value='' onchange="changetc()">
                            <option value="">Select.........</option>
                            <option value="firsttime"><?php  echo lang('first_ticket'); ?></option>
                            <option value="secondtime"><?php  echo lang('second_ticket'); ?></option>
                        </select>
                    </div>
                    <input type="text" name="docr_fee" class="docr_fee" value=''>
                    <input type="text" name="hospl_fee" class="hosp_fee" value=''>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php  echo lang('patient'); ?> <?php  echo lang('name'); ?></label>
                        <input required="required" type="text" class="form-control" name="p_name" id="exampleInputEmail1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php  echo lang('appointment'); ?> <?php  echo lang('date'); ?></label>
                        <input required="required" type="text" class="form-control" name="app_date" id="exampleInputEmail1" value='' placeholder="">
                    </div>





                    <div class="form-group col-auto">
                        <label for="exampleInputEmail1"> <?php  echo lang('age'); ?></label>
                        <input required="required" type="text" class="form-control" name="p_age" id="exampleInputEmail1" value='' placeholder="Type age number">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php  echo lang('mobile'); ?></label>
                        <input required="required" type="text" class="form-control" name="mobile_no" id="exampleInputEmail1" value='' placeholder="Mobile Number">
                    </div><br>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('serial'); ?></label>
                        <input required="required" type="text" class="form-control" name="serial_no" id="exampleInputEmail1" placeholder="">
                    </div>


                    <input type="hidden" name="ap_id" value=''>


                    <center><button style="padding: 20px 60px 20px 60px; font-size: 20px;" type="submit" name="submit" class="btn btn-info"> <?php  echo lang('update'); ?></button></center>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Ticket Modal-->






 
<script>

var log_user = '<?php echo $this->ion_auth->get_users_groups()->row()->name; ?>';
var thisdate = '<?php echo date('Y-m-d', time()); ?>'

getTicketQuery();


    /* Event for Date Wise Ticket */
$(document).on('click ','.range_submit', function () {
    thisdate = $('#printdate').val();
    

getTicketQuery();
});
    /* Event for Date Wise Ticket */

    function getTicketQuery() {

        $.ajax({
            type: 'ajax',
            url: 'reception/getTicketJsonEncode?date='+thisdate,
            data: '',
            method: 'GET',
            dataType: 'json',
        success: function(edata) {
            
            var html = '';
            var i;
            for (var i=0; i < edata.length; i++) {
            var unixTimeStamp = edata[i].thistime;
        //Unix timestamp to Date & Time
            var timestampInMilliSeconds = unixTimeStamp*1000;
            var date = new Date(timestampInMilliSeconds);

            var day = (date.getDate() < 10 ? '0' : '') + date.getDate();
            var month = (date.getMonth() < 9 ? '0' : '') + (date.getMonth() + 1);
            var year = date.getFullYear();

            var hours = ((date.getHours() % 12 || 12) < 10 ? '0' : '') + (date.getHours() % 12 || 12);
            var minutes = (date.getMinutes() < 10 ? '0' : '') + date.getMinutes();
            var meridiem = (date.getHours() >= 12) ? 'pm' : 'am';

            var this_date_time = day + '-' + month + '-' + year + ' at ' + hours + ':' + minutes + ' ' + meridiem;

                if (log_user == 'admin') {
                    if (edata[i].print == 'printed') {
                        html += '<tr>'+
                                '<td>'+edata[i].app_tc_id+'</td>'+
                                '<td>'+edata[i].ticket_serial+'</td>'+
                                '<td>'+edata[i].app_patient+'</td>'+
                                '<td>'+edata[i].age+'</td>'+
                                '<td>'+edata[i].mobile+'</td>'+
                                '<td>'+edata[i].dr_name+'</td>'+
                                '<td>'+edata[i].ap_date+'</td>'+
                                '<td>Already Printed & Paid</td>'+
                                '<td>'+edata[i].ename+'</td>'+
                                '<td>'+this_date_time+'</td>'+
                                '<td><button id="printbnt" style="font-size: 16px; padding-right: 10px;" type="button" class="btn btn-info btn-xs btn_width printbnt" title="View" data-toggle="modal" data-id="'+edata[i].app_tc_id+'">'+
                        '<i class="fa fa-eye"> </i>View</button><button style="margin-left: 20px;" type="button" class="btn btn-info btn-xs btn_width editbutton" id="editbutton" title="Edit" data-toggle="modal" data-target="#editTicket" data_id="'+edata[i].app_tc_id+'"><i class="fa fa-edit"> </i></button><a class="btn btn-info btn-xs btn_width delete_button" href="reception/deleteticket?id='+edata[i].app_tc_id+'" title="Delete" onclick="return confirm("Are you sure you want to delete this item?");"><i class="fa fa-trash"></i></a></td>'+
                            '</tr>';   
                        }else {
                        html += '<tr>'+
                                '<td>'+edata[i].app_tc_id+'</td>'+
                                '<td>'+edata[i].ticket_serial+'</td>'+
                                '<td>'+edata[i].app_patient+'</td>'+
                                '<td>'+edata[i].age+'</td>'+
                                '<td>'+edata[i].mobile+'</td>'+
                                '<td>'+edata[i].dr_name+'</td>'+
                                '<td>'+edata[i].ap_date+'</td>'+
                                '<td>Not Print</td>'+
                                '<td>'+edata[i].ename+'</td>'+
                                '<td>'+this_date_time+'</td>'+
                                '<td><button id="printbnt" style="font-size: 16px; padding-right: 10px;" type="button" class="btn btn-info btn-xs btn_width printbnt print_paid" title="View" data-toggle="modal" data-id="'+edata[i].app_tc_id+'">'+
                        '<i class="fa fa-eye"> </i>View</button><button style="margin-left: 20px;" type="button" class="btn btn-info btn-xs btn_width editbutton" id="editbutton" title="Edit" data-toggle="modal" data-target="#editTicket" data_id="'+edata[i].app_tc_id+'"><i class="fa fa-edit"> </i></button><a class="btn btn-info btn-xs btn_width delete_button" href="reception/deleteticket?id='+edata[i].app_tc_id+'" title="Delete" onclick="return confirm("Are you sure you want to delete this item?");"><i class="fa fa-trash"></i></a></td>'+
                            '</tr>';  
                        }
                    }else {
                    if (edata[i].print == 'printed') {
                        html += '<tr>'+
                                '<td>'+edata[i].app_tc_id+'</td>'+
                                '<td>'+edata[i].ticket_serial+'</td>'+
                                '<td>'+edata[i].app_patient+'</td>'+
                                '<td>'+edata[i].age+'</td>'+
                                '<td>'+edata[i].mobile+'</td>'+
                                '<td>'+edata[i].dr_name+'</td>'+
                                '<td>'+edata[i].ap_date+'</td>'+
                                '<td>Already Printed & Paid</td>'+
                                '<td>'+edata[i].ename+'</td>'+
                                '<td>'+this_date_time+'</td>'+
                                '<td><button id="printbnt" style="font-size: 16px; padding-right: 10px;" type="button" class="btn btn-info btn-xs btn_width printbnt" title="View" data-toggle="modal" data-id="'+edata[i].app_tc_id+'">'+
                        '<i class="fa fa-eye"> </i>View</button></td>'+
                            '</tr>';   
                        }else {
                        html += '<tr>'+
                                '<td>'+edata[i].app_tc_id+'</td>'+
                                '<td>'+edata[i].ticket_serial+'</td>'+
                                '<td>'+edata[i].app_patient+'</td>'+
                                '<td>'+edata[i].age+'</td>'+
                                '<td>'+edata[i].mobile+'</td>'+
                                '<td>'+edata[i].dr_name+'</td>'+
                                '<td>'+edata[i].ap_date+'</td>'+
                                '<td>Not Print</td>'+
                                '<td>'+edata[i].ename+'</td>'+
                                '<td>'+this_date_time+'</td>'+
                                '<td><button id="printbnt" style="font-size: 16px; padding-right: 10px;" type="button" class="btn btn-info btn-xs btn_width printbnt print_paid" title="View" data-toggle="modal" data-id="'+edata[i].app_tc_id+'">'+
                        '<i class="fa fa-eye"> </i>View</button></td>'+
                            '</tr>';  
                        }
                    }
                }
                $('.datatavl').html(html);
                 }
            });

}


    function changeval(){
        var doctor_id = $('#doctor').val();
        var select_status = $('#tickettime').val();
        $.ajax({
            url: 'reception/getdrfeeByJason?id=' + doctor_id,
            method: 'GET',
            data: '',
            dataType: 'json',
        success: function (ticket_fees_s) {
            var dr_st_fee = parseInt(ticket_fees_s.dr_firsttime);
            var hos_st_fee = parseInt(ticket_fees_s.hospital_first);
            var dr_nd_fee = parseInt(ticket_fees_s.dr_sectime);
            var hos_nd_fee = parseInt(ticket_fees_s.hospital_sec);
            var dr_first_fee = dr_st_fee - hos_st_fee;
            var dr_second_fee = dr_nd_fee - hos_nd_fee;
        if (select_status == 'firsttime') {
            $('.doctor_fee').val(dr_first_fee).end()
            $('.hospital_fee').val(hos_st_fee).end()      
        }else{
            $('.doctor_fee').val(dr_second_fee).end()
            $('.hospital_fee').val(hos_nd_fee).end()
        }

            }
        });
    }










    function changetc(){
        var dcr_id = $('#doctor_id').val();
        var select_sts = $('#tmticket').val();
        $.ajax({
            url: 'reception/getdrfeeByJason?id=' + dcr_id,
            method: 'GET',
            data: '',
            dataType: 'json',
        success: function (tc_dr) {
            var dcr_1st_fee = parseInt(tc_dr.dr_firsttime);
            var hosp_1st_fee = parseInt(tc_dr.hospital_first);
            var dcr_2nd_fee = parseInt(tc_dr.dr_sectime);
            var hosp_2nd_fee = parseInt(tc_dr.hospital_sec);
            var dr_1st_fee = dcr_1st_fee - hosp_1st_fee;
            var dr_2nd_fee = dcr_2nd_fee - hosp_2nd_fee;
        if (select_sts == 'firsttime') {
            $('.docr_fee').val(dr_1st_fee).end()
            $('.hospl_fee').val(hosp_1st_fee).end()      
        }else{
            $('.docr_fee').val(dr_2nd_fee).end()
            $('.hospl_fee').val(hosp_2nd_fee).end()
        }

            }
        });
    }




    /* Event for Print */
$(document).on('click ','#printbnt', function () {
    var app_iid = $(this).attr('data-id');
    window.open('reception/print_ticket?id='+app_iid,'_blank', 'width=800,height=800,left=300,top=300');
});
    /* Event for Print */



</script>


<script type="text/javascript">

    /* Event for Edit */
$(document).on('click ','#editbutton', function () {  
        // Get the record's ID via attribute  
        var iid = $(this).attr('data_id');

        $('#editTicketForm').trigger("reset");
        $.ajax({
            url: 'reception/editTicketByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        success: function (editTc) {
            // Populate the form fields with the data returned from server
            $('#editTicketForm').find('[name="ap_id"]').val(editTc.app_tc_id).end()
            $('#editTicketForm').find('[name="p_name"]').val(editTc.app_patient).end()
            $('#editTicketForm').find('[name="p_age"]').val(editTc.age).end()
            $('#editTicketForm').find('[name="mobile_no"]').val(editTc.mobile).end()
            $('#editTicketForm').find('[name="serial_no"]').val(editTc.ticket_serial).end()
            $('#editTicketForm').find('[name="docr_fee"]').val(editTc.doctor_fee).end()
            $('#editTicketForm').find('[name="hospl_fee"]').val(editTc.hospital_fee).end()
            $('#editTicketForm').find('[name="app_date"]').val(editTc.ap_date).end()
            $('#doctor_id option[value='+editTc.dr_id+']').attr('selected', 'selected');
        }
    });
    });
    /* Event for Edit */


    /* Event for Appoinment Serial */
    $('#appoinment_serial').click(function() {
        var date = $('#app_date').val();
        var dr_id = $('#doctor').val();
        var last_serial = 0;
        if (date == '' || dr_id == '') {
            alert('Please Select Doctor and Appointment Date');
        }else { 
            $.ajax({
                url: 'reception/getlastTicketSerial?dr_id='+dr_id+'&app_date='+date,
                method: 'GET',
                data: '',
                dataType: 'json',
               success: function (getSerialss) {
                    last_serial = parseInt(getSerialss.ticket_serial);
                var new_serial = last_serial+1;

                    if (last_serial != 0) {
                        $('#appoinment_serial').val(new_serial);
                    }
                } 
            })    
            $('#appoinment_serial').val('001');      
        }
    })
    /* Event for Appoinment Serial */


</script>