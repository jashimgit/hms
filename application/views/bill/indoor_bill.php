
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title"> Patient </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Create Patient Bill </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="form-group mb-0 row" style="width: 60%; ">
        <div class="col-md-10">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Type Patient Registration No </span>
                </div>
                <input class="form-control input_reg_no" type="text">
                <div class="input-group-append">
                    <button class="btn btn-primary reg_search_btn" type="button">Button</button>
                </div>
            </div>
        </div>
    </div>

    <div class="error_show">  </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body patients_data_a_bill">
<!--  Patient Information Here ...   -->
                </div>
                <div class="card-body consultant_data_ss">
<!--  Consultant Info   -->
                </div>
            </div>
        </div>
    </div>

    <center> 
       <div class="add_bill_cat"  style="width: 75%;"></div> 
       <div style="font-size: 20px; font-weight: bold; width: 30%;" align="right" class="total_bill t_b"></div><br><br>
       <div class="save_bill_btn"></div>
    </center>
    
<br><br><br><br><br><br><br><br><br><br>

<script type="text/javascript">
    
        var consultant_datass = '<div class="row">'+
                                    '<div class="col-xl-6">'+
                                        '<div class="form-group row">'+
                                            '<label class="col-lg-3 col-form-label"> Consultant Name </label>'+
                                            '<div class="col-lg-9">'+
                                                '<select class="form-control select2 consultant1 " id="" value="">'+
                                                    '<option value=""> Select.... </option>'+
                                                 '<?php foreach ($doctors as $doctor) { ?>'+
                                                    '<option value="<?php echo $doctor->dr_auto_id; ?>"><?php echo $doctor->dr_id; ?> ------- <?php echo $doctor->dr_name; ?> </option>'+
                                                '<?php } ?> '+
                                                '</select>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-xl-6">'+
                                        '<div class="form-group row">'+
                                            '<label class="col-lg-3 col-form-label consultant2 "> Consultant Name </label>'+
                                            '<div class="col-lg-9">'+
                                                '<select class="form-control select2 consultant2" id="" value="">'+
                                                    '<option value=""> Select.... </option>'+
                                                 '<?php foreach ($doctors as $doctor) { ?>'+
                                                    '<option value="<?php echo $doctor->dr_auto_id; ?>"><?php echo $doctor->dr_id; ?> ------- <?php echo $doctor->dr_name; ?> </option>'+
                                                '<?php } ?> '+
                                                '</select>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
</script>
<script type="text/javascript" src="include/js_plugin/bill/create_indoor_bill.js"></script>
