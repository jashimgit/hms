
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title"> Reception </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home"> Dashboard </a></li>
                    <li class="breadcrumb-item active"> Doctor Ticket </li>
                </ul>
            </div>
        </div>
    </div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Ticket Form </h4>
            </div>
            <div class="card-body">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2"> Select Doctor </label>
                        <div class="col-md-10">
                            <select class="form-control select2 doctors_auto_idd">
                                <option value="">-- Select --</option>
                            <?php foreach ($doctors as $doctor) { ?>
                                <option value="<?php echo $doctor->dr_auto_id; ?>"><?php echo $doctor->dr_id; ?> --------- <?php echo $doctor->dr_name; ?> </option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2"> Ticket Time </label>
                        <div class="col-md-10">
                            <select class="form-control  ticket_time ">
                                <option value=""> -- Select -- </option> 
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2"> Patient Name </label>
                        <div class="col-md-10">
                            <input type="text" class="form-control patient_name" placeholder=" Patient Name " >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2"> Input Date </label>
                        <div class="col-md-10">
                            <input type="text" class="form-control datepicker_next app_date_s" placeholder=" Date " >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2"> Patient Age </label>
                        <div class="col-md-10">
                            <input type="text" class="form-control patient_age" placeholder=" Patient Age " >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2"> Mobile Number </label>
                        <div class="col-md-10">
                            <input type="text" class="form-control patient_mobile" placeholder=" Mobile Number " >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2"> Serial Number </label>
                        <div class="col-md-10">
                            <input type="text" class="form-control input_serials" placeholder=" Click Here for Auto Serial Number " >
                        </div>
                    </div>

                    <div class="form-group row error_show">  </div>

                    <center><button style="padding: 20px 60px 20px 60px; font-size: 20px;" type="button" name="submit" class="btn btn-info save_ticket_btn"> ADD </button></center>

            </div>
        </div>

    </div>
</div>




<script type="text/javascript" src="include/js_plugin/reception/addNewTicket.js"></script>




