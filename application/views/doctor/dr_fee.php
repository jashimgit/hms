
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title"> Doctor's </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Doctor Fee </li>
                </ul>
            </div>
        </div>
    </div>



                <a data-toggle="modal" href="#add__dr_fee" class="btn bg-info mr-2 edit_dept_button">
                    <i class="fa fa-plus-circle"></i> Add Doctor Fee
                </a>

    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped">
                            <thead>
                                <tr>
                                    <th> Sl No </th>
                                    <th> Doctor Name </th>
                                    <th> DR. First Time </th>
                                    <th> DR. Second Time </th>
                                    <th> Hospital First </th>
                                    <th> Hospital Second </th>
                                    <th class="no-print"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php $sl = 1;  foreach ($doctorfee as $doctorfees) { ?>
                                <tr class="">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $doctorfees->dr_name; ?></td>
                                    <td><?php echo $doctorfees->dr_firsttime; ?></td>
                                    <td><?php echo $doctorfees->dr_sectime; ?></td>
                                    <td><?php echo $doctorfees->hospital_first; ?></td>
                                    <td><?php echo $doctorfees->hospital_sec; ?></td>
                                    <td class="no-print">

                                        <button type="button" class="btn btn-info btn-sm btn_width editbutton" title="Edit" data-toggle="modal" data-target="#edit_dr_fee" data-id="<?php echo $doctorfees->dr_fee_id; ?>"><i class="fa fa-edit"> </i> </button> 

                                        <a class="btn btn-danger btn-sm btn_width delete_button" title="Delete" href="doctor/deletedr_fee?id=<?php echo $doctorfees->dr_fee_id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i> </a>

                                    </td>
                                </tr>
                            <?php $sl += 1; } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Add Doctor Fee Modal-->
<div class="modal fade" id="add__dr_fee" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Doctor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="doctor/addfee" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Doctor Name </label>
                        <select class="form-control select2 " name="dr_id" value=''>
                            <option value=""> Select.............. </option>
                        <?php foreach ($doctors as $doctor) { ?>
                            <option value="<?php echo $doctor->dr_auto_id; ?>"><?php echo $doctor->dr_id; ?> --------- <?php echo $doctor->dr_name; ?> </option>
                        <?php } ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> DR. First Time Ticket Fee </label>
                        <input required="required" type="text" class="form-control" name="dr_firsttime" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> DR. Second Time Ticket Fee </label>
                        <input type="text" required="required" class="form-control" name="dr_sectime" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Hospital Commission Fist Ticket </label>
                        <input required="required" type="text" class="form-control" name="hospital_first" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Hospital Commission Second Ticket </label>
                        <input required="required" type="text" class="form-control" name="hospital_sec" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <br><br><br><br><br>
                    <button type="submit" name="submit" class="btn btn-info btn-block">Add Fee</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Doctor Fee Modal-->



<!-- Edit Doctor Fee Modal-->
<div class="modal fade" id="edit_dr_fee" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Doctor Modal </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="doctor/update_fee" id="doctorFeeUpdateForm" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Doctor Name </label>
                        <center><h3><div class="form-group drName"></div></h3></center>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> DR. First Time Ticket Fee </label>
                        <input required="required" type="text" class="form-control" name="dr_firsttime" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> DR. Second Time Ticket Fee </label>
                        <input type="text" required="required" class="form-control" name="dr_sectime" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Hospital Commission First Ticket </label>
                        <input required="required" type="text" class="form-control" name="hospital_first" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Hospital Commission Second Ticket </label>
                        <input required="required" type="text" class="form-control" name="hospital_sec" id="exampleInputEmail1" value='' placeholder="">
                    </div>
            
                    <input type="hidden" name="dr_fee_id" value="">
                    
                    <button type="submit" name="submit" class="btn btn-info  btn-block"> UPDATE DOCTOR FEE </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Doctor Fee Modal-->









<script type="text/javascript" src="include/js_plugin/doctor/getDoctorFee.js"></script>






