
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title"> Reception </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Ticket By Date </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="form-group mb-0 row">
        <div class="col-md-10">
        <form action="reception/ticketbydate" method="post" >
            <div class="input-group"  style="width: 40%; ">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Input Date </span>
                </div>
                <input class="form-control datepicker_pre search_date" name="date" type="text">
                <div class="input-group-append">
                    <button class="btn btn-primary search_btn" type="submit"> Refresh </button>
                </div>
            </div>
        </form>
        </div>
    </div>




    
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped">
                            <thead>
                                <tr>
                                    <th> Sl No </th>
                                    <th> Ticket Serial </th>
                                    <th> Patient Name </th>
                                    <th> Mobile No </th>
                                    <th> Doctor Name </th>
                                    <th> Appointment Date </th>
                                    <th> Status </th>
                                    <th> Print Emp Name </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody class="assign_app_data" > 
                        <?php $sl=1; foreach ($tickets as $all_ticket) { ?>
                            <tr>
                                <td> <?php echo $sl; ?> </td>
                                <td> <?php echo $all_ticket->ticket_serial; ?> </td>
                                <td> <?php echo $all_ticket->app_patient; ?> </td>
                                <td> <?php echo $all_ticket->mobile; ?> </td>
                                <td> <?php echo $all_ticket->dr_name; ?> </td>
                                <td> <?php echo $all_ticket->ap_date; ?> </td>
                                <td> <?php echo $all_ticket->paid; ?> </td>
                                <td> <?php echo $all_ticket->ename; ?> </td>
                                <td> <button type="button" class="btn btn-primary btn-sm view_ticket_full" title=" View " data_p_id="<?php echo $all_ticket->app_tc_id; ?>"><i class="fa fa-eye"></i> </button>                  <button type="button" class="btn btn-info btn-sm edit_ticket_info" title=" Edit " data-toggle="modal" data-target="#edit_ticket_info" data_p_id="<?php echo $all_ticket->app_tc_id; ?>"><i class="fa fa-edit"></i> </button>             <button type="button" class="btn btn-danger btn-sm " title=" Delete " data_p_id="<?php echo $all_ticket->app_tc_id; ?>"><i class="fa fa-trash"></i> </button></td>
                            </tr>
                        <?php $sl=$sl+1; }  ?>
                             </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>








<!-- Edit Ticket Modal-->
<div class="modal fade" id="edit_ticket_info" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Ticket </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="patientadd" action="reception/editTicketData" method="post" enctype="multipart/form-data">



                    <div class="form-group row">
                        <label class="col-form-label col-md-2"> Patient Name </label>
                        <div class="col-md-10">
                            <input type="text" name="p_name"  class="form-control patient_name" placeholder=" Patient Name " >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2"> Input Date </label>
                        <div class="col-md-10">
                            <input type="text" name="app_date"  class="form-control datetimepicker app_date_s" placeholder=" Date " >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2"> Patient Age </label>
                        <div class="col-md-10">
                            <input type="text" name="p_age"  class="form-control patient_age" placeholder=" Patient Age " >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2"> Mobile Number </label>
                        <div class="col-md-10">
                            <input type="text" name="mobile_no"  class="form-control patient_mobile" placeholder=" Mobile Number " >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2"> Serial Number </label>
                        <div class="col-md-10">
                            <input type="text" name="serial_no" class="form-control input_serials" placeholder=" Click Here for Auto Serial Number " >
                        </div>
                    </div>

                    <input type="hidden" name="ap_id" class="ticket_auto_idd">

                    <center><button style="padding: 20px 60px 20px 60px; font-size: 20px;" type="submit"  class="btn btn-info save_ticket_btn"> UPDATE </button></center>






                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Ticket Modal-->







<script type="text/javascript" src="include/js_plugin/reception/ticketEdit.js"></script>








