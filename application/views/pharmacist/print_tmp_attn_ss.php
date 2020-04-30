<!DOCTYPE html>
<html>
  <head>
    <base href="<?php echo base_url(); ?>">
    <style type="text/css">
      @media print {
          @page { margin:0; }
          body { margin: 1cm; }
    .page-break { display: block; page-break-before: auto; }
      }
       .hos_name {
        text-align: center;
        margin: 0;
      }
      .hos_adr {
        text-align: center;
        margin: 0;
        font-size: 14px;
      }
      .full_temp_data {
        margin: 20px 0 0 100px;
      }
      .st_data_sheet {
        margin: 20px 0 0 100px;
      }
    </style>
    <script src="include/js/jquery-3.4.1.min.js"></script>
  </head>
  <body>
  <h1 class="hos_name"><?php echo $this->db->get('settings')->row()->system_vendor; ?></h1>
  <h3 class="hos_adr"><?php echo $this->db->get('settings')->row()->address; ?></h3>
  <h3 class="hos_adr">Daily Attendence Date : <?php echo date('d-M-Y', strtotime($date_tmp)); ?></h3>
    <div class="full_temp_data"></div>
    <div class="st_data_sheet">
      Over Duty 
          <ol>
            <li></li>
            <li></li>
            <li></li>
          </ol>
    </div>
  </body>

<script type="text/javascript">      
                                     
  var n;
  var sub_html = '';
  var sub_html2 = '';
  var thisdate = '<?php echo $date_tmp; ?>'


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
              html += '<tr class="data_full_tr"><td>'+temp_attn_full[i].ename+'</td><td>'+sub_html+'</td><td>'+sub_html2+'</td><td>P</td></tr>';
            }else {
          html += '<tr class="data_full_tr"><td>'+temp_attn_full[i].ename+'</td><td>A</td><td>A</td><td>A</td></tr>';
          }
          sub_html = '';
          sub_html2 = '';
        }                 
$('.full_temp_data').html('<table id="customers" border="1"><tr><th>Emp ID</th><th>In Time</th><th>Out Time</th><th>Status</th></tr>'+html+'<tr><td colspan="4" align="center"></td></tr></table><br><br><br><br><br>');
      }
  })

</script>

</html>
