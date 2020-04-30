
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title"> Doctor's </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active"> All Doctor </li>
                </ul>
            </div>
        </div>
    </div>

                <a data-toggle="modal" href="#add_new_doctor" class="btn bg-info mr-2 edit_dept_button">
                    <i class="fa fa-plus-circle"></i> Add New Doctor
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
                                    <th> Doctor ID </th>
                                    <th> Image </th>
                                    <th> Doctor Name </th>
                                    <th> Phone </th>
                                    <th> Department </th>
                                    <th> Profile / Degree </th>
                                    <th> Activity </th>
                                    <th class="no-print"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php $sl = 1;  foreach ($doctors as $doctor) { ?>
                            <tr class="">
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $doctor->dr_id; ?></td>
                            <?php if ($doctor->img_url != '') {?>        
                                <td style="width:10%;"><img width="50px" height="50px" src="<?php echo $doctor->img_url; ?>"></td>
                            <?php }else { ?>
                                    <td><?php echo lang('no_photo'); ?></td>
                            <?php } ?>
                                <td> <?php echo $doctor->dr_name; ?></td>
                                <td><?php echo $doctor->phone; ?></td>
                                <td class="center"><?php echo $doctor->dept_name; ?></td>
                                <td><?php echo $doctor->profile; ?></td>
                                <td><?php if ($doctor->stus == '1') {
                                    echo 'Active';
                                    }else { echo 'Inactive'; }  ?></td>
                                <td class="no-print">
                                    <button type="button" class="btn btn-success btn-sm btn_width upload_btn" title="Upload Image" data-target="#upload_pic" data-toggle="modal" data-id="<?php echo $doctor->dr_auto_id; ?>"><i class="fa fa-upload"> </i> </button>
                                    <button type="button" class="btn btn-info btn-sm btn_width editbutton" title="Edit" data-target="#edit_dr_modal" data-toggle="modal" data-id="<?php echo $doctor->dr_auto_id; ?>"><i class="fa fa-edit"> </i> </button>
<!--                                     <a class="btn btn-danger btn-sm delete_button" title="<?php echo lang('delete'); ?>" href="doctor/delete?id=<?php echo $doctor->dr_auto_id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i> </a> -->
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


<!-- Add New Doctor Modal-->
<div class="modal fade" id="add_new_doctor" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Doctor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="doctor/addNew" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Doctor Name </label>
                        <input required="required" type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="Full Doctor Name">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1"> Doctor ID </label>
                        <input type="text" readonly="readonly" class="form-control" name="dr_id" id="exampleInputEmail1" value='<?php echo $dr_id->dr_id + 1 ; ?>' >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Degree</label>
                        <input required="required" type="text" class="form-control" name="profile" id="exampleInputEmail1" value='' placeholder="Full Degree">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Gender </label>
                        <select class="form-control" name="gender" value=''>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group"><!-- Department Select-->
                        <label for="exampleInputEmail1"> Department </label>
                        <select class="form-control select2 " required="required" name="department" value=''>
                            <option value=""> Select.......... </option>
                            <?php foreach ($departments as $department) { ?>
                                <option value="<?php echo $department->dept_id; ?>"> <?php echo $department->dept_name; ?> </option>
                            <?php } ?> 
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Chamber </label>
                        <input type="text" class="form-control" name="chamber" id="exampleInputEmail1" required="required" value='' placeholder="Doctor Cember">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Phone </label>
                        <input required="required" type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="Doctor ">
                    </div>

                    <div class="form-group"><!-- Activity Is Doctor Here or Out -->
                        <label for="exampleInputEmail1">Activity</label>
                        <select class="form-control" name="activity" value=''>
                            <option value="1"> Active </option>
                            <option value="0"> Inactive </option> 
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"> Save New Doctor </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Doctor Modal-->




 
<!-- Upload Photo Modal-->
<div class="modal fade" id="upload_pic" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Upload Picture </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="doctor/update_pic" id="Upload_Doctor_pic" method="post" enctype="multipart/form-data" >

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Doctor Name </label>
                        <input required="required" type="text"  class="form-control" name="name" id="exampleInputEmail1" value=''>
                    </div>

    <br><br><br><br><br>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Doctor Image </label>
                        <input required="required" style="float: left;" type="file" name="img_url" id="file" onchange="loadfile(this)" >
                        <!-- View Upload Picture  -->
                        <img id="dr_preimage_pic" width="100px" height="100px" name="img_url" src="">
                    </div>

                    <input type="hidden" name="dr_main_id" value="" >
                    <button type="submit" name="submit" class="btn btn-info  btn-block"> UPLOAD IMAGE </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Upload Photo Modal-->





<!-- Edit Doctor Modal-->
<div class="modal fade" id="edit_dr_modal" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Doctor Modal </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="doctor/update" id="editDoctorForm" method="post" enctype="multipart/form-data" >

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Doctor Name </label>
                        <input required="" type="text" class="form-control" name="name" id="exampleInputEmail1" value=''>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Degree</label>
                        <input required="" type="text" class="form-control" name="profile" id="exampleInputEmail1" value='' >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Gender </label>
                        <select class="form-control" name="gender" id="gender" value=''>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Department </label>
                        <select class="form-control " id="dept_option" name="department" value=''>
                            <option value=""> Select.......... </option>
                            <?php foreach ($departments as $department) { ?>
                                <option value="<?php echo $department->dept_id; ?>"> <?php echo $department->dept_name; ?> </option>
                            <?php } ?> 
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Chamber </label>
                        <input type="text" class="form-control" name="chamber" id="exampleInputEmail1" value='' >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Phone </label>
                        <input required="" type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Activity </label>
                        <select class="form-control" id="activity_option" name="activity" value=''>
                            <option value="1"> Active </option>
                            <option value="0"> Inactive </option> 
                        </select>
                    </div>
    <br><br><br><br><br>
                    <input type="hidden" name="dr_main_id" value="" >
                    <button type="submit" name="submit" class="btn btn-info  btn-block"> UPDATE DOCTOR INFO </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Doctor Modal-->









<script type="text/javascript" src="include/js_plugin/doctor/getDoctorInfo.js"></script>






