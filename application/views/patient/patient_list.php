
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title"> Patient </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Patient List </li>
                </ul>
            </div>
        </div>
    </div>




    <button type="button" data-toggle="modal" href="#add_new_patient" class="btn btn-info "><i class="fa fa-plus-circle"></i> Addmission New Patient </button>

    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped">

                            <thead>
                                <tr>
	                                <th> SL No </th> 
	                                <th> Patient Name </th>
	                                <th> Bed No </th>
	                                <th> Full Address </th>
	                                <th> Doctor Name </th>
	                                <th> Register No </th> 
	                                <th> Admmission Time </th>
	                                <th> Mobile No </th>
	                                <th> Employee </th>
	                                <th> Entry Time </th>
	                                <th> Action </th>
                            	</tr>
                            </thead>
                            <tbody>
                                
                        <?php $sl = 1; foreach ($patients as $patient) { ?>
                                <tr class="">
	                                <td> <?php echo $sl; ?></td>
	                                <td> <?php echo $patient->ptnname; ?></td>
	                                <td> <a type="button" class="btn btn-primary edit_p_bed" title="Change Bed" data-target="#edit_patient_bed" data-toggle="modal" data_p_id="<?php echo $patient->p_n_id; ?>"><?php echo $patient->b_num; ?></a>
	                                </td>
	                                <td> <?php echo $patient->pn_address; ?></td>
	                                <td>  <?php echo $patient->dr_name; ?> </td>
	                                <td align="right"><?php echo $patient->reg_no; ?></td>
	                                <td><?php echo date('d-M-y h:m a', $patient->time_this); ?></td>
	                                <td><?php echo $patient->mobile; ?></td>
	                                <td><?php echo $patient->ename; ?></td>
	                                <td><?php if ($patient->reg_time_stamp_now != '') {
	                                    echo date('d-M-y h:m:s a', $patient->reg_time_stamp_now);
	                                } ?></td>
	                                <td class="no-print">
	                                    <?php if ($this->ion_auth->in_group(array('admin', 'Supervisor'))) { ?>
	                                     <a type="button" class="btn btn-info btn-sm editpbutton" title="Edit" data-toggle="modal" data-target="#edit_patient_info" data_p_id="<?php echo $patient->p_n_id; ?>"><i class="fa fa-edit"></i> </a>
	                                    <?php } ?>
 

	                                    <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
	                                     <a class="btn btn-danger btn-sm" title="Delete" href="patient/delete?id=<?php echo $patient->p_n_id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
	                                    <?php } ?>
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


<!-- Add New Patient Modal-->
<div class="modal fade" id="add_new_patient" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Add New Patient </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="patientadd" action="patient/addpatient" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Doctor Name </label>
                        <select required="required" class="form-control select2 " id="doctor" name="dr_id" value=''>
                            <option value="">Select....</option>
                        <?php foreach ($doctors as $doctor) { ?>
                            <option value="<?php echo $doctor->dr_auto_id; ?>"><?php echo $doctor->dr_id; ?> --------- <?php echo $doctor->dr_name; ?> </option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Patient Name </label>
                       <!-- <select class="form-control m-bot15 js-example-basic-single" id="app_id" name="app_id" value='' onchange="changeid()">
                            <option>Select....</option>
                        <?php foreach ($appoints as $appoint) { ?>
                            <option value="<?php echo $appoint->id; ?>"><?php echo $appoint->serial; ?> --------- <?php echo $appoint->patient; ?> </option>
                        <?php } ?>
                        </select>-->
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="Patient Name">
                    </div>


                    <div class="form-group">
                        <label for="date_pic"> Admission Date Time </label>
                        <input required="required" type="text" class="form-control  datepicker_pre " name="date" id="date_pic" value='' placeholder="Admission Date">

                        <input type="time" required="required" class="form-control" name="time" id="exampleInputEmail1" value='' placeholder="Admission Time">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Gender </label>
                        <select class="form-control " name="sex" value=''>
                            <option value="Male"> Male </option>
                            <option value="Female"> Female </option>
                            <option value="Others"> Others </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Patient Age </label>
                        <input class="form-control form-control-inline input-medium" type="text" name="age" value="" placeholder="Patient Age">      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Bed No </label>
                        <select class="form-control m-bot15 js-example-basic-single" required="required" id="app_id" name="b_num" value=''>
                            <option value="">Select....</option>
                        <?php foreach ($beds as $bed) { ?>
                            <option value="<?php echo $bed->b_num; ?>"><?php echo $bed->b_num; ?> </option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">                        
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="fa" value="option1">
                          <label class="form-check-label" for="inlineRadio1">Father Name</label>
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="hus" value="option2">
                          <label class="form-check-label" for="inlineRadio2">Husband Name</label>
                        </div>

                        <input type="hidden" class="form-control reltn" name="actv" id="exampleInputEmail1" value='' placeholder="">

                        <input type="text" style="display: none;" class="form-control" name="f_name" id="f_name_box" value='' placeholder="Type Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Address </label>
                        <input required="required" type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="Type Full Address">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Mobile </label>
                        <input type="text" class="form-control" required="required" name="mobile" id="exampleInputEmail1" value='' placeholder="Patient Mobile Number">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Patient Cause</label>
                        <input type="text" class="form-control" required="required" name="ptn_cause" id="exampleInputEmail1" value='' placeholder="Patient Causes">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block"> Admit New Patient </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Patient Modal-->






<!-- Edit Patient Bed -->
<div class="modal fade" id="edit_patient_bed" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Change Patient Bed </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="editbedinfoForm" action="patient/editBed_data" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Bed No </label>
                        <select class="form-control  " id="bed_id" name="b_num" value=''>
                            <option>Select....</option>
                        <?php foreach ($beds as $bed) { ?>
                            <option value="<?php echo $bed->b_num; ?>"><?php echo $bed->b_num; ?> </option>
                        <?php } ?>
                        </select>
                    </div>

                    <input type="hidden" name="p_id_for_bed" id="p_id_editbed" value=''>


                    <button type="submit" class="btn btn-primary btn-block"> Change Bed No </button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Patient Bed-->






<!-- Edit Patient Modal-->
<div class="modal fade" id="edit_patient_info" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Bed </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="editPatientForm" action="patient/editPatientData" method="post" enctype="multipart/form-data">
                    		<div class="form-group">
                                    <label for="exampleInputEmail1"> Doctor Name </label>
                                    <select class="form-control " name="doctor_p" id="doctor_p" value=''> 
                                        <?php foreach ($doctors as $doctor) { ?>
                                            <option value="<?php echo $doctor->dr_auto_id; ?>">
                                                <?php echo $doctor->dr_id.'---'.$doctor->dr_name; ?> 
                                            </option>
                                        <?php } ?>
                                    </select>
                            </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Patient Name </label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Register No </label>
                        <input type="text" class="form-control" name="reg_no" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        
            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                        <label for="admit_date"> Admmission Date </label>
                        <input required="required" type="text" class="form-control datepicker_pre" name="date" id="admit_date" value='' placeholder="">

                        <input type="time" required="required" class="form-control" name="time" id="admits_times" value='' placeholder="">
            <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Address </label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Father / Husband Name</label>
                        <input type="text" class="form-control" name="father" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Mobile </label>
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Age </label>
                        <input type="text" class="form-control" name="age" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Gender </label>
                        <select class="form-control " id="sex" name="sex" value=''>
                            <option value="Male"> Male </option>
                            <option value="Female"> Female </option>
                            <option value="Others"> Others </option>
                        </select>
                    </div>

                    <input type="hidden" name="id" value=''>

                    <button type="submit" name="submit" class="btn btn-info  btn-block"> UPDATE PATIENT INFO </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Patient Modal-->








 

<script type="text/javascript" src="include/js_plugin/patient/getPatientInfo.js"></script>

  




