
<style type="text/css">

    .search_box {
        width: 250px;
        margin: 15px 0 0 0; 
        position: relative;
    }

    #menu, #menu ul {
        margin: 0;
        padding: 0;
        list-style: none;
        cursor: pointer;
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
        margin: 20px 0 0 0;
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





<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-plus-circle"></i> Patient Statement
            </header> <br><br><br>
            <div class="panel-body">



                <div class="adv-table editable-table ">
                    
                    <input style="width: 200px; float: left;" class="form-control dtpic form-control-lg" id="stdate" type="text" placeholder="Start Date">

                    <!--<button style="margin: 0 0 0 10px;" onclick="daily_report()" class="btn btn-info">Daily View</button>-->



                    <input style="width: 200px; float: left; margin: 0 0 0 10px;" class="form-control dtpic form-control-lg" id="lastdate" type="text" placeholder="End Date">

                    <button style="margin: 0 0 0 10px;" onclick="monthly_report()" class="btn btn-info">View</button>


            <center>
              <div class="form-group search_box" id="menu">
                <label>Patient ID</label><li>
                        <ul>
                            <li class="assign_data">
                            </li>
                        </ul>
                    </li>
                <input type="text" class="form-control" id="search_P_id" class="search_P_id" onkeyup="findID();" placeholder="Search by Patient ID">
                    
              </div>

                <div class="div_box" >
                </div>
            </center>


                </div><br><br><br>





<label for="exampleInputEmail1"> Statement With Doctor </label>
                <div class="adv-table editable-table ">
                    <div class="form-group" style="width: 300px; float: left;">
                        
                        <select required="required" class="form-control m-bot15 js-example-basic-single" id="dr_idss" name="" value=''>
                            <option value="">Select....</option>
                        <?php foreach ($doctors as $doctor) { ?>
                            <option value="<?php echo $doctor->dr_auto_id; ?>"><?php echo $doctor->dr_id; ?> --------- <?php echo $doctor->dr_name; ?> </option>
                        <?php } ?>
                        </select>
                    </div>

                    <input style="width: 200px; float: left;" class="form-control dtpic form-control-lg" id="stdatess" type="text" placeholder="Start Date">

                    <input style="width: 200px; float: left; margin: 0 0 0 10px;" class="form-control dtpic form-control-lg" id="lastdatesss" type="text" placeholder="End Date">

                    <button style="margin: 0 0 0 10px;" onclick="with_doctor()" class="btn btn-info">View</button>
                </div>






            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->









<script type="text/javascript">

    function with_doctor() {
        var url = 'patient/report_with_doctor?st_date='+document.getElementById("stdatess").value+'&last_date='+document.getElementById("lastdatesss").value+'&dr_a_id='+document.getElementById("dr_idss").value;   
      window.open(url, '_blank', 'height=800,width=800');
    }

    function monthly_report() {
        var url = 'patient/report_p_m?st_date='+document.getElementById("stdate").value+'&last_date='+document.getElementById("lastdate").value;    
      window.open(url, '_blank', 'height=800,width=800');
    }

    function findID() {
        var serch_type = $('#search_P_id').val();

        $.ajax({
            url: 'patient/search_patientByID?id=' + serch_type,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (response) {

                var html = '';
                var n;
                var blank_text = '<a class="s_name_list">Please Type Patient ID</a>';
                for (n = 0; n < response.length; n++) {
                    html += '<a class="s_name_list" id="'+response[n].p_n_id+'" onclick="open_win(this.id)">'+response[n].ptnname+'</a>';
                }

                if (serch_type != '') {
                  $('.assign_data').html(html);
                }else {
                    $('.assign_data').html(blank_text);
                }
            } 
        })            
    }

function open_win(clicked_id){
    var url = 'patient/reports_P?p_id='+clicked_id;     
  window.open(url, '_blank', 'height=800,width=800');
}

</script>


















