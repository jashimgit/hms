


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

            <div class="" >
                    <center>
                        <div class="input-group" style="width: 90%;">
                            <span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
                                Select Employee
                            </span>
                        <select class="form-control ProcessEmp" >
                            <option value=""> Select.... </option>
                          <?php foreach ($getemp as $emp) { ?>
                            <option value="<?php echo $emp->emp_id; ?>"> <?php echo $emp->ename; ?> </option>
                          <?php } ?>
                        </select>
                          <span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
                                Select Month
                            </span>
                            <select class="form-control ProccessMonth" >
                              <option value=""> Select.... </option>
                              <option value="01"> January </option>
                              <option value="02"> February </option>
                              <option value="03"> March </option>
                              <option value="04"> April </option>
                              <option value="05"> May </option>
                              <option value="06"> June </option>
                              <option value="07"> July </option>
                              <option value="08"> August </option>
                              <option value="09"> September </option>
                              <option value="10"> October </option>
                              <option value="11"> November </option>
                              <option value="12"> December </option>
                            </select>
                            <span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
                                Type Year
                            </span>
                            <input type="text" class="form-control processYear" placeholder=" Type Year " >
                        </div>
                            <button type="button" class="btn button green search_btn_forEmp">SEARCH</button>
                    </center>
                    
            </div>    
<br>
            <div class="false_msg_data"></div>



        </section>
        <!-- page end-->
            <div class="full_emp_data"></div>
    </section>
</section>
<!--main content end-->

<input type="" disabled name="">

<script type="text/javascript">

  function getAtnEMP_Data() {
    var processEmployee = $('.ProcessEmp').val();
    var proccessMonth = $('.ProccessMonth').val();
    var processYear = $('.processYear').val();
    var tableTopTag = '<table class="table table-striped table-hover table-bordered"><thead><tr><th> Date </th><th> In Time </th><th> Out Time </th><th> Action </th></tr></thead><tbody class="dataTbody">';
    $.ajax({
      url: 'pharmacist/getAttnFullEmpData',
      method: 'POST',
      data: {
        ProssEMP_ID: processEmployee,
        getMonthss: proccessMonth,
        getYearss: processYear
      },
      async: false, 
      dataType: 'json',
      success: function(attnData) {
        var i;
        var html = '';
        for (i=0; i<attnData.length; i++) {
          html += '<tr class="fullDataTr"><td><input type="hidden" class="attn_i_id" value="'+attnData[i].attn_id+'" >'+attnData[i].attn_date+'</td><td><input disabled type="text" class="attnInTimeVal inputboxs" value="'+attnData[i].intim+'" ></td><td><input type="text" disabled class="attnOutTimeData inputboxs" value="'+attnData[i].outtim+'" ></td><td> <button type="button" class="btn btn-info btn-xs EditBtns" title="Edit" ><i class="fa fa-edit"></i> </button> <button type="button" data_IID="'+attnData[i].attn_id+'" class="btn btn-info btn-xs DelBtnss delete_button" title="Delete" ><i class="fa fa-trash"></i> </button> </td></tr>';
        }
        $('.full_emp_data').html(tableTopTag+' '+html+ '</tbody></table>');
      }
    })    
  }

  $('.search_btn_forEmp').click(function() {
    var processEmployee = $('.ProcessEmp').val();
    var proccessMonth = $('.ProccessMonth').val();
    var processYear = $('.processYear').val();

    if (processEmployee == '' || proccessMonth == '' || processYear == '') {
      $('.false_msg_data').html(' <h2 style="color:red; font-family: Times New Roman; font-weight: bold; text-align: center;"> Please Select Employee, Month and Year </h2> ');
        $('.full_emp_data').html(' ');
    }else {
      $('.false_msg_data').html(' ');
      getAtnEMP_Data();
    }
  })

  $(document).on('click', '.EditBtns', function() {
    $(this).parents('.fullDataTr').find('.inputboxs').removeAttr('disabled');
    $(this).html('<i class="fa fa-arrow-right"></i>');   
    $(this).parents('.fullDataTr').find('.EditBtns').addClass('updateAttnData');
  })

  $(document).on('click', '.updateAttnData', function() {   
    var attn_i_id = $('.attn_i_id').val();   
    var empAttnInTimesss = $('.attnInTimeVal').val();   
    var empAtnOutTimes = $('.attnOutTimeData').val();
    $.ajax({
      url: '',
      method: '',
      data: {
        attn_auto_id: attn_i_id,
        empInSys: empAttnInTimesss,
        empOutSys: empAtnOutTimes
      },
      async: false, 
      success: function() {
        getAtnEMP_Data();
      }

    })
  })
</script>