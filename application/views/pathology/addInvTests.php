


<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">

            <header class="panel-heading">
                <i class="fa fa-vial"></i>        
                Pathology Investigation Test                      
            </header><br>

                <div style="width: 90%; ">

                    <div class="input-group" style="width: 50%; float: left;">
                        <span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
                            Test Group
                        </span>
                        <select class="form-control custom-select custom-select-lg m-bot15 js-example-basic-single tstgrp" required="required" name="lab_ptn_id" value=''>
                            <option value="">Select...........</option>
                    <?php foreach ($test_grup as $grup) { ?>
                            <option value="<?php echo $grup->tst_grp_iddi ; ?>"><?php echo $grup->tst_grp_name ; ?></option>
                    <?php } ?>
                        </select>
                    </div>

                    <div class="input-group" style="width: 45%; float: left;">
                        <span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
                            INV Name
                        </span>
                        <select class="form-control custom-select custom-select-lg m-bot15 js-example-basic-single invInfo" required="required" name="lab_ptn_id" value=''>
                            <option value="">Select...........</option>
<!--                         <?php foreach ($test_Inv as $val) { ?>
                            <option value="<?php echo $val->tst_inv_id; ?>"><?php echo $val->inv_name; ?></option>
                        <?php } ?> -->
                        </select>
                    </div><br><br><br>
                    <div class="work_btn"></div>

                    <div class="patho_inv_test_vw">

<br><br><br>
                    <div class="inv_test_ad"></div>












                    </div>

                </div>
                    

        </section>
    </section>
</section>




<script type="text/javascript">
    var headofEntry = '<table border="1px"><tr style="text-align:center;"><th >Test Name</th><th>Test Type</th><th>Test Normal Range</th><th>Test Unit</th><th>Action</th></tr>';

    var AddNewForm = '<tr class="tstRangInfoCls"><td><input type="text" id="" class="form-control tstName" placeholder="Type Test Name"></td><td><input type="text" id="" placeholder="Test Type" class="form-control rangType" ></td><td><textarea class="tst_Normal_Range" placeholder="Type Test Normal Value/Range" rows="1" cols="30"></textarea></td><td><input type="text" class="form-control Test_Unitss" placeholder="Type Test Units" name=""></td><td><button type="button" class="btn btn-info addBtnSave"  style="margin-top: -30px;" title="Add" id="" ><i class="fa fa-save"></i> </button></td></tr></table>';

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
            $('.work_btn').html('<button type="button" style="font-size: 25px; margin: 0 0 0 70px;" class="btn btn-info addTestRange" title="Add New" ><i class="fa fa-plus-circle"> ADD NEW </i> </button><button type="button" style="font-size: 25px; margin: 0 0 0 70px;" class="btn btn-info TestRangeView" title="VIEW" ><i class="fa fa-eye"> VIEW </i> </button>');
            $('.inv_test_ad').html('');
        }else {
            $('.work_btn').html('<h2> Please Select a Investigation.... </h2>');
        }
    })

    $(document).on('click ','.addTestRange', function () {
        $('.inv_test_ad').html(headofEntry+' '+AddNewForm);
    })

    $(document).on('click ','.addBtnSave', function () {
        var tst_group = $('.tstgrp').val();
        var tst_inv_iids = $('.invInfo').val();
        var tstNamess = $(this).parents('.tstRangInfoCls').find('.tstName').val();
        var rng_typ = $(this).parents('.tstRangInfoCls').find('.rangType').val();                 
        var tst_Normal_Range = $(this).parents('.tstRangInfoCls').find('.tst_Normal_Range').val();                 
        var Test_Unitss = $(this).parents('.tstRangInfoCls').find('.Test_Unitss').val();                 

        if (tstNamess != '') {
            $.ajax({
                url: 'pathology/addNewINVTest',
                type: 'POST',
                data: { 
                    inv_id: tst_inv_iids, 
                    name: tstNamess, 
                    type: rng_typ, 
                    invGRP_id: tst_group, 
                    test_no_range: tst_Normal_Range, 
                    Test_Unitss: Test_Unitss
                },
                cache: false,
                success: function () {
                    $('.inv_test_ad').html('');
                }
            })
        }else {
            alert('Please Type Test Name...');
        }
    })

    function tstRangView () {
        var invs_iid = $('.invInfo').val();

        $.ajax({
            url: 'pathology/get_patho_inv_tst?inv_ids='+invs_iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function(tstRng) {
                var datass = '';
                var i;
                for (i=0; i<tstRng.length; i++) {

                    datass += '<tr class="inv_tst_infos"><td><input type="text" readonly="readonly" id="inlineFormCustomSelect" class="form-control tstName inputboxs" value="'+tstRng[i].test_name+'"> </td><td><input type="text"  id="inlineFormCustomSelect" class="form-control rangType inputboxs" readonly="readonly" value="'+tstRng[i].tst_typ+'"></td>      <td><textarea class="test_Normal_Rng inputboxs" readonly="readonly" rows="1" cols="30">'+tstRng[i].tst_normal_rang+'</textarea></td><td><input type="text" class="form-control Tst_s_Unit inputboxs" readonly="readonly" name="" value="'+tstRng[i].Test_Units+'"></td>      <td><button type="button" style="margin-top: -30px;" dataID="'+tstRng[i].tst_auto_iid+'" class="btn btn-info btn-xs EditBtns" title="Edit" id="inlineFormCustomSelect" ><i class="fa fa-edit"></i> </button> <button type="button" style="margin-top: -30px;" class="btn btn-info btn-xs DelBtns delete_button" dataID="'+tstRng[i].tst_auto_iid+'" title="Delete" id="inlineFormCustomSelect" ><i class="fa fa-trash"></i> </button> </td> </tr>';
                }
        $('.inv_test_ad').html(headofEntry+' '+datass+'</table>');
            }
        })
    }

    $(document).on('click ','.TestRangeView', function () {
        tstRangView();
    })

    $(document).on('click ','.EditBtns', function () {
        $(this).parents('.inv_tst_infos').find('.inputboxs').removeAttr('readonly');
        $(this).parents('.inv_tst_infos').find('.fa-edit').remove();    
        $(this).parents('.inv_tst_infos').find('.EditBtns').html('<i class="fa fa-arrow-right"></i>');   
        $(this).parents('.inv_tst_infos').find('.EditBtns').addClass('updateINVtst');
    })

    $(document).on('click ','.updateINVtst', function () {        
        var tstNamess = $(this).parents('.inv_tst_infos').find('.tstName').val();
        var rng_typ = $(this).parents('.inv_tst_infos').find('.rangType').val();                 
        var tst_Rangess = $(this).parents('.inv_tst_infos').find('.test_Normal_Rng').val();
        var tst_unit_s = $(this).parents('.inv_tst_infos').find('.Tst_s_Unit').val();

        var INVtstIDD = $(this).attr('dataID');
        $.ajax({
                url: 'pathology/updateINVTest',
                type: 'POST',
                data: { 
                    inv_tst_id: INVtstIDD, 
                    tst_name: tstNamess, 
                    tst_type: rng_typ, 
                    tst_Rang: tst_Rangess, 
                    tst_Unit: tst_unit_s      
                },
                cache: false,
                success: function () {
                    tstRangView();
                }
        })
    })

        $(document).on('click ','.DelBtns', function () {        
            var INVtstIdI = $(this).attr('dataID');
                $.ajax({
                    url: 'pathology/deleteINVTest',
                    type: 'POST',
                    data: { 
                        inv_tst_id: INVtstIdI       
                    },
                    cache: false,
                    success: function () {
                        tstRangView();
                    }
                })            
        })

</script>













