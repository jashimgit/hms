
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title"> Doctor's </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home"> Dashboard </a></li>
                    <li class="breadcrumb-item active"> Doctor Chamber Time </li>
                </ul>
            </div>
        </div>
    </div>



    <label style="font-size: 14px; "> Select Doctor </label>
    <select class="form-control select2 dr_selects" name="doctor" value='' >
            <option value=""> Select...... </option>
        <?php foreach ($doctors as $doctor) { ?>
            <option drIID="<?php echo $doctor->dr_id; ?>" value="<?php echo $doctor->dr_auto_id; ?>"> <?php echo $doctor->dr_name; ?> </option>
        <?php } ?> 
    </select><br><br>
    <div class="btn_assign"></div><br><br>

    <div class="data_view_opt"></div>                    
    
    <div class="error_show"></div>                    




<script type="text/javascript" src="include/js_plugin/doctor/drChamberTimeInfo.js"></script>


