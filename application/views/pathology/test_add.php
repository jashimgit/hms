<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">

            <header class="panel-heading">
                    <i class="fa fa-notes-medical"></i> Test Info  
            </header>
            <div class="panel-body">
                
                <div class="adv-table editable-table ">
                    
                      <div class=" no-print">
                        <a data-toggle="modal" href="#myModal2">
                            <div class="btn-group">
                                <button id="" class="btn green">
                                     <i class="fa fa-plus-circle"></i> Add New
                                </button>
                            </div>
                        </a> 
                    </div>
                    
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th>Test ID</th> 
                                <th>Short Code</th>
                                <th>Test Name</th>
                                <th>Test Rate</th>
                                <th>Group</th>
                                <th>Department</th>
                                <th class="no-print">Option</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($test_info as $test_info) { ?>
                            <tr class="">
                                <td> <?php echo $test_info->tst_inv_id; ?></td>
                                <td> <?php echo $test_info->inv_code; ?></td>
                                <td> <?php echo $test_info->inv_name; ?></td>
                                <td align="right"> <?php echo $test_info->rate; ?></td>
                                <td> <?php echo $test_info->tst_grp_name; ?></td>
                                <td> <?php echo $test_info->diag_dept_name; ?></td>

                                <td class="no-print"> 
                                    <button type="button" class="btn btn-info editTest" data-target="#editTestData" data-toggle="modal" title="Edit" data-id="<?php echo $test_info->tst_inv_id; ?>"><i class="fa fa-edit"></i> </button>

                                    <a class="btn btn-danger" href="pathology/deleteTst?tstid=<?php echo $test_info->tst_inv_id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>                
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->








<!-- Create Bill Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Add New Test</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="AddTest" action="pathology/AddNewTest" method="post" enctype="multipart/form-data">


                    <div class="form-group">
                        <label for="exampleInputEmail1"> Test Department </label>
                        <select required="required" class="form-control m-bot15 js-example-basic-single tstDept" id="" name="dep_idi" value=''>
                            <option value="">Select....</option>
                        <?php foreach ($test_dept as $test_dept) { ?>
                            <option value="<?php echo $test_dept->diag_dept_idii; ?>"><?php echo $test_dept->diag_dept_name; ?> </option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Test Group </label>
                        <select required="required" class="form-control m-bot15 js-example-basic-single tstGrup" id="" name="grup_id" value=''>
                            <option value="">Select....</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Test Name</label>
                        <input class="form-control form-control-inline input-medium" type="text" name="test_name" value="" placeholder="Test Name">      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Test Normal Rate</label>
                        <input class="form-control form-control-inline input-medium" type="text" name="test_rate_normal" value="" placeholder="Test Normal Rate">      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Test Argent Rate</label>
                        <input class="form-control form-control-inline input-medium" type="text" name="test_rate_argnt" value="" placeholder="Test Argent Rate">      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Group Type</label>
                        <input class="form-control form-control-inline input-medium grp_typ" type="text" name="test_grup_typ" value="">      
                    </div>

                    <center>
                        <button style="font-size: 40px;" type="submit" name="submit" class="btn btn-info">ADD</button>
                    </center>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Create Bill Modal-->











<!-- Edit Bill -->
<div class="modal fade" id="editTestData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Test Info</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editPathoForm" action="pathology/editPathoTest" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Test Name</label>
                        <input class="form-control form-control-inline input-medium tstname" type="text" name="test_name" value="" placeholder="Test Name">      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Test Normal Rate</label>
                        <input class="form-control form-control-inline input-medium tstNRate" type="text" name="test_rate_normal" value="" placeholder="Test Normal Rate">      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Test Argent Rate</label>
                        <input class="form-control form-control-inline input-medium tstARate" type="text" name="test_rate_argnt" value="" placeholder="Test Argent Rate">      
                    </div>

                    <input class="inv_idi" type="hidden" name="inv_idi" >

                    <center>
                        <section class="">
                            <button style="font-size: 20px;" type="submit" name="submit" class="btn btn-info">Update</button>
                        </section>
                    </center>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Bill -->











<script type="text/javascript">
    $('.tstDept').change(function() {
        var deptIID = $('.tstDept').val();
         $.ajax({
            url: 'pathology/get_TestGrup?deptId=' + deptIID,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (test_grup) {
                var html = '';
                var i;
                for (i=0; i<test_grup.length; i++) {
                    html += '<option value="'+test_grup[i].tst_grp_iddi+'">'+test_grup[i].tst_grp_name+'</option>';
                }
                $('.tstGrup').html('<option value="">Select....</option>'+html);
            }
        })
    })

    $('.tstGrup').change(function() {
        var tstGrup = $('.tstGrup').val();
        if (tstGrup == '') {
            $('.grp_typ').val();
        }else {
            $.ajax({
                url: 'pathology/get_tst_grup_byID?tst_Grp_id='+tstGrup,
                method: 'GET',
                data: '',
                dataType: 'json',
                success: function (tst_grp) {
                    $('.grp_typ').val(tst_grp.tst_grp_short);
                }
            })
        }
    })

    $('.editTest').click(function() { 
        var test_inv_iid = $(this).attr('data-id');
        $.ajax({
            url: 'pathology/getTestInfobyID?tstID='+test_inv_iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (tst_edit) {
                $('.inv_idi').val(tst_edit.tst_inv_id);         
                $('.tstname').val(tst_edit.inv_name);         
                $('.tstNRate').val(tst_edit.rate);         
                $('.tstARate').val(tst_edit.argent_rate);      
            }
        })
    })
</script>











