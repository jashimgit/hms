


<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">

            <header class="panel-heading">
                <i class="fa fa-vial"></i>        
                Test Normal Range Entry                      
            </header><br>

                <div style="width: 90%; ">

                    <div class="input-group">
                        <span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
                            Test Group
                        </span>
                        <select class="form-control custom-select custom-select-lg m-bot15 js-example-basic-single tstgrp" required="required" name="lab_ptn_id" value=''>
                            <option value="">Select...........</option>
                    <?php foreach ($test_grup as $grup) { ?>
                            <option value="<?php echo $grup->tst_grp_iddi ; ?>"><?php echo $grup->tst_grp_name ; ?></option>
                    <?php } ?>
                        </select>


                        <span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
                            INV Name
                        </span>
                        <select class="form-control custom-select custom-select-lg m-bot15 js-example-basic-single invInfo" required="required" name="lab_ptn_id" value=''>
                            <option value="">Select...........</option>
                        <?php foreach ($test_Inv as $val) { ?>
                            <option value="<?php echo $val->tst_inv_id; ?>"><?php echo $val->inv_name; ?></option>
                        <?php } ?>
                        </select>
                    </div><br>
                    <div class="work_btn"></div>

                    <div class="tst_rng_vw">

<br><br><br>
                    <div class="rng_Info_ad"></div>








                    </div>

                </div>
                    

        </section>
    </section>
</section>













<script type="text/javascript">
    var headofEntry = '<table border="1px"><tr><th align="center">Test Name</th><th align="center">Units</th><th align="center">Normal Range</th><th align="center">Action</th></tr>';

    var AddNewForm = '<tr class="tstRangInfoCls"><td><input type="text" id="" class="form-control tstName" ></td><td><input type="text" id="" class="form-control Tst_Units" ></td><td><input id="" class="form-control orgnal_rng"  ></td><td><button style="margin-top:-40px;" type="button" class="btn btn-info addBtnSave" title="Add" id="" ><i class="fa fa-save"></i> </button></td></tr></table>';





    $('.tstgrp').change(function() {
        var tstgrp = $(this).val();
        $.ajax({
            url: 'pathology/get_invBygID?grpID='+tstgrp,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (inv_info) {
                var html = '';
                var n;
                for (n=0; n<inv_info.length; n++) {
                    html += '<option value="'+inv_info[n].tst_inv_id+'">'+inv_info[n].inv_name+'</option>';
                }
                $('.invInfo').html('<option value="">Select................</option>'+html);
            }
        })
    })

    $('.invInfo').change(function() {
        var inv_idii = $(this).val();
        if (inv_idii != '') {
            $('.work_btn').html('<button type="button" style="font-size: 25px; margin: 0 0 0 70px;" class="btn btn-info addTestRange" title="Add New" ><i class="fa fa-plus-circle"> ADD NEW </i> </button><button type="button" style="font-size: 25px; margin: 0 0 0 70px;" class="btn btn-info TestRangeView" title="Add New" ><i class="fa fa-eye"> VIEW </i> </button>');
            $('.rng_Info_ad').html('');
        }else {
            $('.work_btn').html('<h2> Please Select a Investigation.... </h2>');
            $('.rng_Info_ad').html('');
        }
    })

    $(document).on('click ','.addTestRange', function () {
        $('.rng_Info_ad').html(headofEntry+' '+AddNewForm);
    })

    $(document).on('click ','.addBtnSave', function () {
        var tst_inv_iids = $('.invInfo').val();
        var tst_a_idds = $(this).parents('.tstRangInfoCls').find('.tst_a_idds').val();
        var Tst_Units = $(this).parents('.tstRangInfoCls').find('.Tst_Units').val();
        var normalVal = $(this).parents('.tstRangInfoCls').find('.orgnal_rng').val();


        $.ajax({
            url: 'pathology/addNewRangess',
            type: 'POST',
            data: { 
                inv_id: tst_inv_iids, 
                Tst_Units: Tst_Units, 
                tst_a_idds: tst_a_idds,
                nVal: normalVal
            },
            cache: false,
            success: function () {
                $('.rng_Info_ad').html('');
            }
        })
    })

    function tstRangView () {
        var invs_iid = $('.invInfo').val();

        $.ajax({
            url: 'pathology/tstRngbyINV?inv_ids='+invs_iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function(tstRng) {
                var datass = '';
                var i;
                for (i=0; i<tstRng.length; i++) {

                    datass += '<tr class="tstRangInfoCls"><td><input type="text" readonly="readonly" id="inlineFormCustomSelect" class="form-control tstName inputboxs" value="'+tstRng[i].tst_rang_nam+'"> </td><td><input type="text" readonly="readonly" id="inlineFormCustomSelect" class="form-control rangType inputboxs" value="'+tstRng[i].rang_type+'"> </td><td><input type="text" readonly="readonly" id="inlineFormCustomSelect" class="form-control gender inputboxs" value="'+tstRng[i].gender+'"> </td> <td> <input type="text" readonly="readonly" id="inlineFormCustomSelect" class="form-control gender inputboxs" value="'+tstRng[i].gender_period+'"> </td> <td> <input type="text" readonly="readonly" id="inlineFormCustomSelect" class="form-control agess inputboxs" value="'+tstRng[i].age+'"> </td> <td> <input type="text" readonly="readonly" id="inlineFormCustomSelect" class="form-control var_Time inputboxs" value="'+tstRng[i].days_time+'"> </td> <td> <input type="text" readonly="readonly" id="inlineFormCustomSelect" class="form-control var_weight inputboxs" value="'+tstRng[i].weight+'"> </td> <td> <input type="text" readonly="readonly" id="inlineFormCustomSelect" class="form-control man_temp inputboxs" value="'+tstRng[i].temp+'"> </td> <td> <input type="text" readonly="readonly" id="inlineFormCustomSelect" class="form-control orgnal_rng inputboxs" value="'+tstRng[i].tst_normal_rang+'"> </td> <td> <button type="button" class="btn btn-info btn-xs EditBtns" title="Edit" id="inlineFormCustomSelect" ><i class="fa fa-edit"></i> </button> <button type="button" class="btn btn-info btn-xs DelBtns delete_button" title="Delete" id="inlineFormCustomSelect" ><i class="fa fa-trash"></i> </button> </td> </tr>';
                }
        $('.rng_Info_ad').html(headofEntry+' '+datass+'</table>');
            }
        })
    }

    $(document).on('click ','.TestRangeView', function () {
        tstRangView();
    })



</script>













