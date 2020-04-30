


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

                    <div class="input-group">
                        <span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
                            Patient ID
                        </span>
                        <select class="form-control custom-select custom-select-lg m-bot15 js-example-basic-single labPtns" required="required" name="lab_ptn_id" value=''>
                            <option value="">Select...........</option>
                        <?php foreach ($lab_ptn as $ptn) { ?>
                            <option value="<?php echo $ptn->labpn_id; ?>"><?php echo $ptn->lab_rgstr_iidd ; ?>   ---------   <?php echo $ptn->labpnname ; ?></option>
                        <?php } ?>
                        </select>
                    </div><br>

                    <div class="input-group ptnInfos"></div>

                    <div class="input-group drInfos"></div><br>

                    <div class="input-group test_name"></div><br><br>

                    <div style="width: 80%; margin-left: 20px; border-radius: 20px;" class="repoArea"></div><br>

                    <div style="width: 60%; float: right;"><center><div class="dr_Infos"></div></center></div>
                    
                    <center><button type="" class="btn btn-info sbmtbtn" style="font-size: 42px; font-weight: bold; display: none;">Print Report</button></center>

        </section>
    </section>
</section>




<script type="text/javascript">
    $('.labPtns').change(function() {
        var lab_ptn_ids = $(this).val();
        if (lab_ptn_ids == '') {
            $('.ptn_info').remove();
        }else {
            $.ajax({
                url: 'usg/ptn_tst_infobyid?id=' + lab_ptn_ids,
                method: 'GET',
                data: '',
                dataType: 'json',
                async: false,
                success: function (ptn_info) {
                    var i;
                    var testInfo = '';
                    var ptn_Infos = '';
                    var dr_Info = '';

                    for (i=0; i<ptn_info.length; i++) {
                        if (ptn_info[i].tstiiddid == ptn_info[i].lab_tst_iidds) {
                            testInfo += '<option value="'+ptn_info[i].tst_inv_id+'">'+ptn_info[i].inv_name+'</option>';
                        }

                        ptn_Infos = '<span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">Patient Name</span><div class="form-control"><b>'+ptn_info[i].labpnname+'</b></div><span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">Patient Age</span><div class="form-control">'+ptn_info[i].labpn_age+'</div><span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">Patient Gender</span><div class="form-control">'+ptn_info[i].gndr+'</div>';

                        dr_Info = '<span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">Doctor Name</span><div class="form-control"><b>'+ptn_info[i].dr_name+'</b></div><span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">Doctor Degree</span><div class="form-control">'+ptn_info[i].profile+'</div>';

                    }
                    $('.test_name').html('<span style="font-weight: bold; color: black;" class="input-group-addon" id="basic-addon3">Test Name</span><select class="form-control tstInviDD" name="testID" value="" onchange="testReport()"><option value="">Select...........</option>'+testInfo+'</select>');
                    $('.ptnInfos').html(ptn_Infos);
                    $('.drInfos').html(dr_Info);
                }
            });            
        }
    })

    function testReport() {
        var tstRpt = $('.tstInviDD').val();
        var ptnIdd = $('.labPtns').val();

            $.ajax({
                url: 'usg/getptnRepo?tst_id='+tstRpt+'&ptn_id='+ptnIdd,
                method: 'GET',
                data: '',
                dataType: 'json',
                async: false,
                success: function (repo_info) {
                    $('.repoArea').html('<div style="margin:30px 30px 30px 30px;">'+repo_info.ptn_report_final+'</div>');
                    $('.dr_Infos').html('<b style="font-size: 18px;">'+repo_info.dr_name+'</b><br>'+repo_info.profile+'<br>');
                    $('.repoArea').css('border', '1px solid black');
                    $('.sbmtbtn').css('display', 'block');                
                }
            });
    }

    $('.sbmtbtn').click(function() {        
        var tstRpt = $('.tstInviDD').val();
        var ptnIdd = $('.labPtns').val();
    var url = 'usg/print_rep?ptn_idd='+ptnIdd+'&tstID='+tstRpt;     
  window.open(url, '_blank', 'height=800,width=800');        
    })
</script>

<br><br><br><br><br>











