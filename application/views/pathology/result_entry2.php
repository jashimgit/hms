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
      margin-top: 10px;
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
</style>


<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">

            <header class="panel-heading">
                <i class="fa fa-vial"></i>  
                Test Report Entry 
            </header><br>



            <div class="" style="width: 85%; ">
                    <center>
                    <div class="input-group" style="width: 50%;">
                        <span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
                            Patient ID
                        </span>
                        <input type="text" class="form-control typPTNID" placeholder="Type Patient ID" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>
                        <button type="button" class="btn button green search_btn_byid">SEARCH</button>
                    </center>

                    <div class="input-group ptnInfos"></div>

                    <div class="input-group drInfos"></div>

                    <center><div class="input-group btnUpdateInvTst"></div></center>
                    
                    <div class="reportPrintOpt"></div><br>

                    <div class="TotalTstResultView"></div>
 
                    <center><div class="input-group btnPrintView"></div></center>

                    <div class="ptn_tst_infos" style="width: 80%; margin-top: 50px;"></div>
                    <center><div class="submit_btn_assgn"></div><div class="cancel_btn"></div></center>
                    
            </div>    



        </section>
    </section>
</section>




<script type="text/javascript">
    var tstGrpOpt = '<select class="form-control select TstGrupSelect" id="" name="dep_idi" value=""><option value="">Select....</option>';
    var view_PrintBtn = '<button type="button" class="btn btn-info thoughtbot PrintReportBTN" style="font-size: 20px; font-weight: bold; margin-top: 4px;">VIEW</button>';
    var UpdateTstBtn = '<button type="button" class="btn btn-info purple-candy updateBtnData" style="font-size: 20px; margin: 15px 0 0 50px; font-weight: bold;">UPDATE</button>';
    var UpdateTstBtnSubmit = '<button type="button" class="btn btn-info cupid-green updateBtnSubmit" style="font-size: 20px; margin: 15px 0 0 50px; font-weight: bold;">Submit</button>';    
    var CancelBTN = '<button type="button" class="btn btn-info cnclBTN blue-pill" style="font-size: 20px; font-weight: bold; margin-top: 4px;">Cancel</button>';
    var checkrepoEntry;

    function checkTstGrup() {
        var PtnTypID = $('.typPTNID').val();
        $.ajax({
            url: 'pathology/gettstGrupforCheck?ptn_ids='+PtnTypID,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function(data_f) {
                var i;
                var html = '';
                for (i=0; i<data_f.length; i++) {
                    html += '<option value="'+data_f[i].tst_grp_iddi+'">'+data_f[i].tst_grp_name+'</option>';
                }
  
                $('.reportPrintOpt').html(tstGrpOpt+''+html+'</select>');

                // Sibling the remove duplicate 
                var map = {};
                    $('.select option').each(function () {
                        if (map[this.value]) {
                            $(this).remove()
                        }
                        map[this.value] = true;
                    })

                $('.btnPrintView').html('');
                $('.btnUpdateInvTst').html(UpdateTstBtn);
                $('.ptn_tst_infos').html('');
                $('.submit_btn_assgn').html('');
            }
        })

    }

    function ptnInfoViewF() {
        var PtnTypID = $('.typPTNID').val();
        if (PtnTypID == '') {
            $('.ptnInfos').html('<h1>ID is Empty? Type Patient ID....</h1>');
        }else {
            $.ajax({
                url: 'pathology/getPtnByIIDD?ptn_ids='+PtnTypID,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function(ptn_infos) { 
                  if (!$.trim(ptn_infos)) {
                    $('.ptnInfos').html('<h1>Type Correct ID.....</h1>');
                    $('.drInfos').html('');
                  }else {
                    var ptnInf = '<input type="hidden" name="lab_ptn_iidds" value="'+ptn_infos.labpn_id+'" class="ptn_auto_idd" ><input type="hidden" name="lab_ptn_Rgstrid" value="'+ptn_infos.lab_rgstr_iidd+'" ><span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">Patient Name</span><div class="form-control"><b>'+ptn_infos.labpnname+'</b></div><span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">Patient Age</span><div class="form-control">'+ptn_infos.labpn_age+'</div><span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">Patient Gender</span><div class="form-control">'+ptn_infos.gndr+'</div>';

                    drInf = '<span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">Doctor Name</span><div class="form-control"><b>'+ptn_infos.dr_name+'</b></div><span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">Doctor Degree</span><div class="form-control">'+ptn_infos.profile+'</div>';
                    checkrepoEntry = ptn_infos.patho_entry_userIIDD;  
                    $('.ptnInfos').html(ptnInf);
                    $('.drInfos').html(drInf);
                    $('.cancel_btn').html('');
                    $('.TotalTstResultView').html('');


                if (checkrepoEntry == 0) {
                    tstInfoView();
                    $('.submit_btn_assgn').html('<br><br><center><button type="submit" class="btn btn-info sbmtbtn punch" style="font-size: 42px; font-weight: bold;">Submit</button></center>');
                }else {
                    checkTstGrup();
                  }
                }
                }
            })

     
        }
    }


    function tstInfoView() {

        var PtnTypID = $('.typPTNID').val();
            $.ajax({
                url: 'pathology/getPtnTstByIIDDD?ptn_ids='+PtnTypID,
                method: 'get',
                data: '',
                dataType: 'json',
                success: function(ptn_tst_inf) {
                    var full_data = '';
                    var n;
                    for (n=0; n<ptn_tst_inf.length; n++) {
                        full_data += '<div class="input-group " style="margin: 5px 0 0 0;"><span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">'+ptn_tst_inf[n].test_name+'</span><input type="hidden" class="form-control" name="test_idii_auto[]" value="'+ptn_tst_inf[n].tst_auto_iid+'" ><input type="text" class="form-control" name="lab_tst_result[]" required="required" placeholder="Type Result" ><span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">'+ptn_tst_inf[n].tst_normal_rang+'</span></div>';
                    }
                    $('.ptn_tst_infos').html(full_data);
                    $('.btnUpdateInvTst').html('');
                    $('.reportPrintOpt').html('');
                    $('.btnPrintView').html('');
                }
            })
    }


    function tstInfoViewForUpdate() {

        var ptn_auto_idd = $('.ptn_auto_idd').val();
            $.ajax({
                url: 'pathology/TstResultViewforUpdate?ptn_ids='+ptn_auto_idd,
                method: 'get',
                data: '',
                dataType: 'json',
                success: function(tst_result) {
                    var full_data = '';
                    var n;
                    for (n=0; n<tst_result.length; n++) {
                        full_data += '<div class="input-group " style="margin: 5px 0 0 0;"><span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">'+tst_result[n].test_name+'</span><input type="hidden" class="form-control" name="test_idii_auto[]" value="'+tst_result[n].tst_auto_iid+'" ><input type="text" class="form-control" name="lab_tst_result[]" required="required" value="'+tst_result[n].Inv_tst_result_+'" placeholder="Type Result" ><span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">'+tst_result[n].tst_normal_rang+'</span></div>';
                    }
                    $('.ptn_tst_infos').html(full_data);
                    $('.submit_btn_assgn').html(UpdateTstBtnSubmit);
                    $('.cancel_btn').html(CancelBTN);
                    $('.btnUpdateInvTst').html('');
                    $('.reportPrintOpt').html('');
                    $('.btnPrintView').html('');
                }
            })
    }

    function TotalTstResultView() {
        var ptnIds = $('.ptn_auto_idd').val();
        var grupIds = $('.TstGrupSelect').val();
        $.ajax({
            url: 'pathology/getTstResultForPrint?ptnIds='+ptnIds+'&grupIDss='+grupIds,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function(all_data) {
                var i;
                var tdata = '';
                for (i=0; i<all_data.length; i++) {
                    tdata += '<div class="input-group PrintViewTstData" style="margin: 5px 0 0 0;"><span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">'+all_data[i].test_name+'</span><span style="font-weight: bold; color: black; border: 1px black dashed; background: white;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">'+all_data[i].Inv_tst_result_+'</span><span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">'+all_data[i].tst_normal_rang+'</span></div>';
                }
                $('.TotalTstResultView').html(tdata);
            }
        })
    }

    $('.search_btn_byid').click(function() {
        ptnInfoViewF();
    })

    $(document).on('click', '.updateBtnData', function() {
        tstInfoViewForUpdate();
        $('.TotalTstResultView').html('');
    })

    $('form').submit(function() {
        $('.sbmtbtn').css('display', 'none');
    })

    $(document).on('change', '.TstGrupSelect', function() {
        var grupId = $(this).children("option:selected").val();
        if (grupId == '') {
            $('.btnPrintView').html('');
            $('.btnUpdateInvTst').html(UpdateTstBtn);
            $('.ptn_tst_infos').html('');
            $('.submit_btn_assgn').html('');
            $('.TotalTstResultView').html('');
        }else {
            TotalTstResultView();
            $('.btnPrintView').html(view_PrintBtn);
            $('.btnUpdateInvTst').html('');
            $('.ptn_tst_infos').html('');
            $('.submit_btn_assgn').html('');
        }
    })


    $(document).on('click', '.sbmtbtn', function() {
        if(confirm("Are you sure you want to Entry This Result ??")){

            var lab_tst_result = $('input[name="lab_tst_result[]"]').map(function(){ return this.value; }).get();
            var test_idii_auto = $('input[name="test_idii_auto[]"]').map(function(){ return this.value; }).get();
            var ptn_auto_idd = $('.ptn_auto_idd').val();
            var lab_ptn_Rgstrid = $('input[name="lab_ptn_Rgstrid"]').val();
            
            $.ajax({
                url: 'pathology/tst_result_entry',
                method: 'POST',
                data: {
                    'test_idii_auto[]': test_idii_auto,
                    'lab_tst_result[]': lab_tst_result,
                    'lab_ptn_iidds': ptn_auto_idd,
                    'lab_ptn_Rgstrid': lab_ptn_Rgstrid
                },
                dataType: 'text',
                success: function() {
                ptnInfoViewF(); 
                } 
            })         
            $('.submit_btn_assgn').html('');           
        }else {
            return false;
        }      
 
    })



    $(document).on('click', '.updateBtnSubmit', function() {
        if(confirm("Are you sure you want to UPDATE ?")){

            var lab_tst_result = $('input[name="lab_tst_result[]"]').map(function(){ return this.value; }).get();
            var test_idii_auto = $('input[name="test_idii_auto[]"]').map(function(){ return this.value; }).get();
            var ptn_auto_idd = $('.ptn_auto_idd').val();
            var lab_ptn_Rgstrid = $('input[name="lab_ptn_Rgstrid"]').val();
            
            $.ajax({
                url: 'pathology/updateTstResults',
                method: 'POST',
                data: {
                    'test_idii_auto[]': test_idii_auto,
                    'lab_tst_result[]': lab_tst_result,
                    'lab_ptn_iidds': ptn_auto_idd,
                    'lab_ptn_Rgstrid': lab_ptn_Rgstrid
                },
                dataType: 'text',
                success: function() {
                ptnInfoViewF(); 
                } 
            })         
            $('.submit_btn_assgn').html('');           
        }else {
            return false;
        }      
 
    })

    $(document).on('click', '.cnclBTN', function() {
        ptnInfoViewF();         
    })

    $(document).on('click', '.PrintReportBTN', function() {       
        var ptn_auto_idd = $('.ptn_auto_idd').val();
        var grupIds = $('.TstGrupSelect').val();
        var url = 'pathology/printReport?ptnId='+ptn_auto_idd+'&grupID='+grupIds;     
        window.open(url, '_blank', 'height=800,width=800');
       })
</script>






                        












