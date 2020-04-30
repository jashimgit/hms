


<style type="text/css">
    .button {
      padding: 10px 25px;
      font-size: 24px;
      text-align: center;
      outline: none;
      color: #fff;
      border: none;
      border-radius: 85px;
      box-shadow: 5px 9px #999;
      font-weight: bold; 
      font-size: 25px; 
      margin: 10px 10px 0 0;
    }

    .reportPrintOpt {
        margin-top: 50px;
    }

    .button:hover {
        background-color: #FFFFFF;
        color: #000000;
        border: 2px solid black;
    }

    .button:active {
      box-shadow: 0 2px #666;
      transform: translateY(10px);
        color: #000000;
    }

    .ptnInfos {
        margin-top: 20px;
    }

    .drInfos {
        margin: 15px 0 0 0;
    }

#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
  font-size: 20px;
  font-weight: bold;
}
</style>







<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-user"></i>  Daily Attendance Proccess    
            </header><br>

                      <!-- <a data-toggle="modal" href="#addNewBtn">
                            <div class="btn-group">
                                <button id="" class="btn green">
                                    <i class="fa fa-plus-circle"></i> <?php echo lang('add_attn'); ?>
                                </button>
                            </div>
                        </a> -->

            <div class="" style="width: 85%; ">
                    <center>
                    <div class="input-group" style="width: 50%;">
                        <span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
                            Date Picker
                        </span>
                        <input type="text" class="form-control dtpic processDate" placeholder=" Date Picker ">
                    </div>
                        <button type="button" class="btn button green search_btn_bydate">SEARCH</button>
                        <button type="button" class="btn button green print_view_btn">PRINT</button>
                    </center>
                    
            </div>    

            <div class="false_msg_date"></div>



        </section>
        <!-- page end-->
            <div class="full_temp_data"></div>
    </section>
</section>
<!--main content end-->




<!--- Add Modal --->
<!-- 
<div class="modal fade" id="addNewBtn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> <?php echo lang('add_attn'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="pharmacist/NewAttn" method="post" enctype="multipart/form-data">
                  <tr class="data_full_tr">
                    <td>
                      <input name="user_emp_iiddd[]" type="text" value="" >
                    </td>
                    <td>
                      <input name="user_inTime_val[]" type="text" value="" >
                    </td>
                    <td>
                      <input type="text" name="user_outTime_val[]" value="" >
                    </td>
                    <td>
                      <button type="button" class="btn btn-info DelBtns delete_button" title="Delete" >
                        <i class="fa fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                </form>

            </div>
        </div>
    </div>
</div>
 -->
<!--- Add Modal --->



<script type="text/javascript">      
                                     
  var emp_login_id = '<?php echo $this->ion_auth->user()->row()->emp_id; ?>';
  var n;
  var sub_html = '';
  var sub_html2 = '';
  var userEmpIIDD;

  function checkTotalAttn() {
        var thisdate = $('.processDate').val();
        if (thisdate == '') {
          $('.false_msg_date').html('<br><h2> Hei ..... ! Select date in Date Picker Box.... </h2>');
        }else {            
            $.ajax({
                url: 'pharmacist/checkAttnProcess?date='+thisdate,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function(attn_check) {
                  if (!$.trim(attn_check)) {
                    $('.false_msg_date').html('');
                    assignDataInhtml();
                  }else {
                    if (emp_login_id == attn_check.this_emp_userss) {
                      $('.false_msg_date').html('<br><h2> Hei '+attn_check.ename+' You processed this date Attendance in '+attn_check.this_date_t+'</h2>');
                    }else {
                    $('.false_msg_date').html('<br><h2> Hei ..... ! '+attn_check.ename+' was processed this date Attendance in '+attn_check.this_date_t+'</h2>');
                    } 
                  }
                }
            })
        }       
  }

  function assignDataInhtml() {
        var thisdate = $('.processDate').val();
    $.ajax({
        url: 'pharmacist/getTempAttn_Log',
        method: 'GET',
        data: '',
        dataType: 'json',
        success: function(temp_attn_full) {
          var i;
          var html = '';
          for (i=0; i<temp_attn_full.length; i++) {
            var attn_emp_id = temp_attn_full[i].emp_id;

              $.ajax({
                url: 'pharmacist/getTempAttn_Log_sub_query?temp_date='+thisdate+'&empUser='+attn_emp_id,
                type: 'GET',
                data: '',
                async: false, 
                dataType: 'json',
                success: function(attn_sub_query) {    
                  
                  for (n=0; n<attn_sub_query.length; n++) {
                    userEmpIIDD = attn_sub_query[n].user_e_idd;
                    if (attn_sub_query[n].attn_time <= '13:00:00') {
                     
                        sub_html = attn_sub_query[0].attn_time;
                      
                    }else if (attn_sub_query[n].attn_time >= '13:00:00') {
                    sub_html2 = attn_sub_query[attn_sub_query.length-1].attn_time;
                    }                  
                  } 

                }           
              })        
              if (temp_attn_full[i].emp_id == userEmpIIDD) {
                html += '<tr class="data_full_tr"><td><input name="user_emp_iiddd[]" type="hidden" value="'+temp_attn_full[i].emp_id+'" >'+temp_attn_full[i].ename+'</td><td><input name="user_inTime_val[]" type="text" value="'+sub_html+'" ></td><td><input type="text" name="user_outTime_val[]" value="'+sub_html2+'" ></td><td><button type="button" class="btn btn-info DelBtns delete_button" title="Delete" ><i class="fa fa-trash"></i> </button></td></tr>';
              }else {
            html += '<tr class="data_full_tr"><td><input name="user_emp_iiddd[]" type="hidden" value="'+temp_attn_full[i].emp_id+'" >'+temp_attn_full[i].ename+'</td><td><input name="user_inTime_val[]" type="text" value="" ></td><td><input type="text" name="user_outTime_val[]" value="" ></td><td><button type="button" class="btn btn-info DelBtns delete_button" title="Delete" ><i class="fa fa-trash"></i> </button></td></tr>';
            }
            sub_html = '';
            sub_html2 = '';
          }                 
  $('.full_temp_data').html('<table id="customers" border="1"><tr><th>Emp ID</th><th>In Time</th><th>Out Time</th><th>Delete</th></tr>'+html+'<tr><td colspan="4" align="center"><button type="button" style="font-size: 40px; " class="btn btn-info submit_all_attn_log"  ><i> Proccessing </i> </button></td></tr></table><br><br><br><br><br>');
        }
    })    
  }


    $('.search_btn_bydate').click(function() {
      checkTotalAttn();
    })

    $(document).on('click', '.DelBtns', function() {
      $(this).parents('.data_full_tr').remove();
    })

    $('.print_view_btn').click(function() {
        var thisdate = $('.processDate').val();
        if (thisdate == '') {
          $('.false_msg_date').html('<br><h2> Hei ..... ! Select date in Date Picker Box.... </h2>');          
        }else {
          var url = 'pharmacist/print_temp_attn?temp_date='+thisdate;     
          window.open(url, '_blank', 'height=800,width=800');
        }
    })

    function insertTotalAttns() {

      var user_emp_iiddd = $('input[name="user_emp_iiddd[]"]').map(function(){ return this.value; }).get();
      var user_inTime_val = $('input[name="user_inTime_val[]"]').map(function(){ return this.value; }).get();
      var user_outTime_val = $('input[name="user_outTime_val[]"]').map(function(){ return this.value; }).get();
      var processDate = $('.processDate').val();
      
      $.ajax({
          url: 'pharmacist/InsertAnntTtl',
          method: 'POST',
          data: {
              'user_empIdd[]': user_emp_iiddd,
              'user_in_time[]': user_inTime_val,
              'userOut_time[]': user_outTime_val,
              'prcssDate': processDate
          },
          dataType: 'text',
          success: function() {
            $('.full_temp_data').html('');
            $('.false_msg_date').html('<br><h2> Data Proccessing Successfully..... </h2>');
          } 
      })       

    }

    $(document).on('click', '.submit_all_attn_log', function() {
      insertTotalAttns();
    })
</script>