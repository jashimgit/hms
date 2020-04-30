<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">

            <header class="panel-heading">
                    <i class="fa fa-notes-medical"></i> Test Group Info  
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
                                <th>Group ID</th> 
                                <th>Short Code</th>
                                <th>Group Name</th>
                                <th>Department</th>
                                <th class="no-print">Option</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($grp_info as $test_info) { ?>
                            <tr class="">
                                <td> <?php echo $test_info->tst_grp_iddi; ?></td>
                                <td> <?php echo $test_info->tst_grp_short; ?></td>
                                <td> <?php echo $test_info->tst_grp_name; ?></td>
                                <td> <?php echo $test_info->diag_dept_name; ?></td>

                                <td class="no-print"> 
                                    <button type="button" class="btn btn-info editGrup" data-target="#editTestData" data-toggle="modal" title="Edit" data-id="<?php echo $test_info->tst_grp_iddi; ?>"><i class="fa fa-edit"></i> </button>

                                    <a class="btn btn-danger" href="pathology/deleteGrp?grpid=<?php echo $test_info->tst_grp_iddi; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>                
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
                <form role="form" id="AddTest" action="pathology/AddNewGrp" method="post" enctype="multipart/form-data">
           
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
                        <label for="exampleInputEmail1">Test Group Name</label>
                        <input class="form-control form-control-inline input-medium" type="text" name="grp_name" value="" placeholder="Group Name">      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Group Short</label>
                        <input class="form-control form-control-inline input-medium grp_typ" type="text" name="test_grup_typ" value="" placeholder="Group Short">      
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
                <form role="form" id="editPathoForm" action="pathology/editPathoGrp" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Group Name</label>
                        <input class="form-control form-control-inline input-medium GrpName" type="text" name="grup_name" value="" placeholder="Group Name">      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Group Short</label>
                        <input class="form-control form-control-inline input-medium GRPShort" type="text" name="grp_short" value="" placeholder="Group Rate">      
                    </div>

                    <input class="grp_idi" type="hidden" name="grp_idi" >

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
    $('.editGrup').click(function() {
        var grupInv = $(this).attr('data-id');
        $.ajax({
            url: 'pathology/editGrupByIDD?grpID='+grupInv,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (grp_edit) {
                $('.grp_idi').val(grp_edit.tst_grp_iddi);
                $('.GrpName').val(grp_edit.tst_grp_name);
                $('.GRPShort').val(grp_edit.tst_grp_short);
            }
        })
    })
</script>











