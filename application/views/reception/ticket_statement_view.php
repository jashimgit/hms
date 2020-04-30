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
              <i class="fa fa-money"></i> <?php echo lang('monthlystatement'); ?>
                    <input style="width: 20%; float: right;" type="text" class="form-control" id="search_tickt" name="" value="" placeholder="Search Ticket by Ticket_ID">

            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <br><br><br>




                  <div class="form-group search_box" id="menu">
                    <label></label><li>
                        <ul>
                            <li class="assign_data">
                            </li>
                        </ul>
                    </li>
                  </div>
                    


                        <div style="margin: -25px -15px -32px -1px; padding: 0" role="form" class="form-horizontal form-inline f_report" id="form_id"><b>Total Statement By Date</b>
                              <div class="form-group">
                                <div class="col-sm-10" style="width: 40%; float: left;">
                                    <input type="text" class="form-control dtpic" id="datefrom" name="date_t" value="" placeholder="Date to date">
                                </div>
                                <div class="col-sm-10" style="width: 40%; float: left;">
                                    <input type="text" class="form-control dtpic" id="dateto" name="date_t" value="" placeholder="Date to date">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" onclick="opentotalticket()" class="btn btn-info"><?php echo lang('print'); ?></button>
                                </div> 
                              </div>
                          </div><br><br><br><br><br><br>





                      <div style="margin: -25px -15px -32px 15px; padding: 0;" role="form" class="form-horizontal form-inline f_report" id="form_id">
                        <div class="form-group" style="width: 300px; float: left;">
                            <select required="required" class="form-control m-bot15 js-example-basic-single" id="dr_idss" name="" value=''>
                                <option value="">Select....</option>
                            <?php foreach ($doctors as $doctor) { ?>
                                <option value="<?php echo $doctor->dr_id; ?>"><?php echo $doctor->dr_id; ?> --------- <?php echo $doctor->dr_name; ?> </option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-10" style="width: 40%; float: left;">
                              <input type="text" class="form-control dtpic" id="date_start" name="date_t" value="" placeholder="Date to date">
                          </div>
                          <div class="col-sm-10" style="width: 40%; float: left;">
                              <input type="text" class="form-control dtpic" id="date_end" name="date_t" value="" placeholder="Date to date">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" onclick="openwith_doctor()" class="btn btn-info"><?php echo lang('print'); ?></button>
                          </div> 
                        </div>
                    </div><br><br><br><br><br><br>















               </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

<script type="text/javascript">

function opentotalticket() {
    var datefrom = document.getElementById("datefrom").value;
    var dateto = document.getElementById("dateto").value;
    var url = 'reception/totalticket?date='+datefrom+'&todate='+dateto; 
    if (datefrom == '' || dateto == '') {
      alert('Please Fillup the date.....');
    }else {
      window.open(url, '_blank', 'height=800,width=800');
    }
}

$('#search_tickt').keyup(function() {
  var serch_type = $('#search_tickt').val();

      $.ajax({
          url: 'reception/search_ticketID?id=' + serch_type,
          method: 'GET',
          data: '',
          dataType: 'json',
          success: function (ticket) {

              var html = '';
              var n;
              var blank_text = '<a class="s_name_list">Please Type Ticket ID</a>';
              for (n = 0; n < ticket.length; n++) {
                  html += '<a class="s_name_list" id="'+ticket[n].app_tc_id+'" onclick="open_win(this.id)">'+ticket[n].app_patient+'</a>';
              }

              if (serch_type != '') {
                $('.assign_data').html(html);
              }else {
                  $('.assign_data').html(blank_text);
              }

          } 
      }) 
})




function open_win(clicked_id){
        var url = 'reception/print_ticket?id='+clicked_id;     
      window.open(url, '_blank', 'height=800,width=800');
    }



function openwith_doctor() {
    var datestart = document.getElementById("date_start").value;
    var dateend = document.getElementById("date_end").value;
    var doctor_id = document.getElementById("dr_idss").value;
    var url = 'reception/stmnt_with_dr?startdate='+datestart+'&enddate='+dateend+'&dr_id='+doctor_id; 
    if (datestart == '' || dateend == '' || doctor_id == '') {
      alert('Please Fillup the All input.....');
    }else {
      window.open(url, '_blank', 'height=800,width=800');
    }
}


</script>

