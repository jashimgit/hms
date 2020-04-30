
<style type="text/css">
    
    .search_box {
        width: 250px;
        margin: 15px 0 0 0; 
        position: relative;
    }

    #menu, #menu ul {
        margin: -130px -20px 0 0;
        padding: 0;
        list-style: none;
        cursor: pointer;
        float: right;
    }
    
    #menu li {
        float: left;
        border-right: 1px solid #222;
        -moz-box-shadow: 1px 0 0 #444;
        -webkit-box-shadow: 1px 0 0 #444;
        box-shadow: 1px 0 0 #444;
        position: relative;
    }
    
    #menu a {
        float: left;
        padding: 12px 30px;
        color: #999;
        text-transform: uppercase;
        font: bold 16px Arial, Helvetica;
        text-decoration: none;
        text-shadow: 0 1px 0 #000;
    }
    
    #menu li:hover > a {
        color: #fafafa;
    }
    
    *html #menu li a:hover { /* IE6 only */
        color: #fafafa;
    }
    
    #menu ul {
        margin: 88px 0 0 0;
        visibility: visible;
        position: absolute;
        top: 38px;
        left: 0;
        z-index: 1;    
        background: #444;
        background: -moz-linear-gradient(#444, #111);
        background-image: -webkit-gradient(linear, left top, left bottom, from(#444), to(#111));
        background: -webkit-linear-gradient(#444, #111);    
        background: -o-linear-gradient(#444, #111); 
        background: -ms-linear-gradient(#444, #111);    
        background: linear-gradient(#444, #111);
        -moz-box-shadow: 0 -1px rgba(255,255,255,.3);
        -webkit-box-shadow: 0 -1px 0 rgba(255,255,255,.3);
        box-shadow: 0 -1px 0 rgba(255,255,255,.3);  
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -ms-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;  
    }

    #menu ul ul {
        top: 0;
        left: 150px;
        margin: 0 0 0 20px;
        _margin: 0; /*IE6 only*/
        -moz-box-shadow: -1px 0 0 rgba(255,255,255,.3);
        -webkit-box-shadow: -1px 0 0 rgba(255,255,255,.3);
        box-shadow: -1px 0 0 rgba(255,255,255,.3);      
    }
    
    #menu ul li {
        float: none;
        display: block;
        border: 0;
        _line-height: 0; /*IE6 only*/
        -moz-box-shadow: 0 1px 0 #111, 0 2px 0 #666;
        -webkit-box-shadow: 0 1px 0 #111, 0 2px 0 #666;
        box-shadow: 0 1px 0 #111, 0 2px 0 #666;
    }
    
    #menu ul li:last-child {   
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        box-shadow: none;    
    }
    
    #menu ul a {    
        padding: 10px;
        width: 250px;
        _height: 10px; /*IE6 only*/
        display: block;
        white-space: nowrap;
        float: none;
        text-transform: none;
    }
    
    #menu ul a:hover {
        background-color: #0186ba;
        background-image: -moz-linear-gradient(#04acec,  #0186ba);  
        background-image: -webkit-gradient(linear, left top, left bottom, from(#04acec), to(#0186ba));
        background-image: -webkit-linear-gradient(#04acec, #0186ba);
        background-image: -o-linear-gradient(#04acec, #0186ba);
        background-image: -ms-linear-gradient(#04acec, #0186ba);
        background-image: linear-gradient(#04acec, #0186ba);
    }
    
    #menu ul li:first-child > a {
        -moz-border-radius: 3px 3px 0 0;
        -webkit-border-radius: 3px 3px 0 0;
        border-radius: 3px 3px 0 0;
    }
    
    #menu ul li:first-child > a:after {
        content: '';
        position: absolute;
        left: 40px;
        top: -6px;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-bottom: 6px solid #444;
    }
    
    #menu ul ul li:first-child a:after {
        left: -6px;
        top: 50%;
        margin-top: 0;
        border-left: 0; 
        border-bottom: 6px solid transparent;
        border-top: 6px solid transparent;
        border-right: 6px solid #3b3b3b;
    }
    
    #menu ul li:first-child a:hover:after {
        border-bottom-color: #04acec; 
    }
    
    #menu ul ul li:first-child a:hover:after {
        border-right-color: #0299d3; 
        border-bottom-color: transparent;   
    }
    
    #menu ul li:last-child > a {
        -moz-border-radius: 0 0 3px 3px;
        -webkit-border-radius: 0 0 3px 3px;
        border-radius: 0 0 3px 3px;
    }

    #menu li:hover > .no-transition {
        display: block;
    }

</style>












    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title"> Patient </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home"> Dashboard </a></li>
                    <li class="breadcrumb-item active"> Addmission Statement </li>
                </ul>
            </div>
                <div class="col-sm-5 col">
                    <div class="top-nav-search">
                            <input type="text" class="form-control popover search_id" placeholder="Search Single Patient By ID">
                    </div>
                </div>
        </div>
    </div>


    <!-- Addmission Statement -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Addmission Statement </h3>
        </div>
        <div class="card-body">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01"> First Date </label>
                        <input type="text" class="form-control datepicker_pre start_date" id="validationTooltip01" placeholder=" First Date " value="" >
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02"> Last Date </label>
                        <input type="text" class="form-control datepicker_pre end_date" id="validationTooltip02" placeholder=" Last Date " value="" >
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltipUsername"> Report Button </label>
                        <button type="button"  id="validationTooltipUsername" class="form-control btn btn-info addmission_full_statement"><i class="fa fa-eye"></i> VIEW </button>
                    </div>
                </div>

        </div>
    </div>
    <!-- Addmission Statement -->







    <!-- Addmission Statement With Doctor -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Addmission Statement Doctor Wise </h3>
        </div>
        <div class="card-body">
                <div class="form-row">
                    <div class="col-md-3 mb-4">
                        <label for="validationTooltip01112"> First Date </label>
                        <input type="text" class="form-control datepicker_pre start_date_dr" id="validationTooltip01112" placeholder=" First Date " value="" >
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="validationTooltip02112"> Last Date </label>
                        <input type="text" class="form-control datepicker_pre end_date_dr" id="validationTooltip02112" placeholder=" Last Date " value="" >
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="validationTooltip01333"> Doctor Name </label>

                        <select required="required" class="form-control select2 dr_auto_id" id="validationTooltip01333" name="dr_id" value=''>
                            <option value="">Select....</option>
                        <?php foreach ($doctors as $doctor) { ?>
                            <option value="<?php echo $doctor->dr_auto_id; ?>"><?php echo $doctor->dr_id; ?> --------- <?php echo $doctor->dr_name; ?> </option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="validationTooltipUsername"> Report Button </label>
                        <button type="button"  id="validationTooltipUsername" class="form-control btn btn-info addmission_statement_doctor"><i class="fa fa-eye"></i> VIEW </button>
                    </div>
                </div>

        </div>
    </div>
    <!-- Addmission Statement With Doctor -->




















<script type="text/javascript">
    

    $('.addmission_full_statement').click(function() {
        var start_date = $('.start_date').val();
        var end_date = $('.end_date').val();
        var url = 'patient/admit_statement_report?st_date='+start_date+'&last_date='+end_date;     
      window.open(url, '_blank', 'height=800,width=800');

    })


    $('.addmission_statement_doctor').click(function() {
        var start_date_dr   = $('.start_date_dr').val();
        var end_date_dr     = $('.end_date_dr').val();
        var dr_auto_id      = $('.dr_auto_id').val();
        var url = 'patient/report_with_doctor?st_date='+start_date_dr+'&last_date='+end_date_dr+'&dr_a_id='+dr_auto_id;     
      window.open(url, '_blank', 'height=800,width=800');

    })








    $('.popover').keyup(function() {
        $(".popover").popover("show");
    })



  $('.popover').popover({ 
        title:'Hello Popover',  
        html:true,  
        content: search_data,
        placement:'bottom',
 });



 
           function search_data(){  
                var search_id = $('.search_id').val();  
                var fetch_data = '';
                var fetch_html_data = '';
                $.ajax({
                    url: 'patient/search_patientByID?id=' + search_id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                   success: function (patient_data) { 
                    for (var i = 0; i < patient_data.length; i++) {
                        fetch_data = '<a class="s_name_list" id="'+patient_data[i].p_n_id+'" onclick="open_win(this.id)">'+patient_data[i].ptnname+' -- '+patient_data[i].dr_name+'</a>';
                    }
                   }
                });
                return patient_data;  
           }  



/***** Dismiss all popovers by clicking outside, don't dismiss if clicking inside the popover content  **************/

$('html').on('click', function(e) {
  if (typeof $(e.target).data('original-title') == 'undefined' &&
     !$(e.target).parents().is('.popover.in')) {
    $('[data-original-title]').popover('hide');
  }
});














/*

$('body').on('click', function (e) {
    //did not click a popover toggle or popover
    if ($(e.target).data('toggle') !== 'popover'
        && $(e.target).parents('.popover.in').length === 0) { 
        $('.popover').popover('hide');
    }
});

*/
</script>