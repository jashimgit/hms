
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title"> Pathology </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Group Information </li>
                </ul>
            </div>
        </div>
    </div>




    <button type="button" data-toggle="modal" href="#add_new_group" class="btn btn-info "><i class="fa fa-plus-circle"></i> Add New Group </button>

    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped">

                            <thead>
                                <tr>
                                    <th> Group ID </th> 
                                    <th> Short Code </th>
                                    <th> Group Name </th>
                                    <th> Department </th>
                                    <th> Option </th>
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
                                        <button type="button" class="btn btn-info btn-sm editGrup" data-target="#editTestData" data-toggle="modal" title="Edit" data-id="<?php echo $test_info->tst_grp_iddi; ?>"><i class="fa fa-edit"></i> </button>

                                        <a class="btn btn-danger btn-sm" href="pathology/deleteGrp?grpid=<?php echo $test_info->tst_grp_iddi; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>                
                                    </td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Add New Patient Modal-->
<div class="modal fade" id="add_new_group" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Add New Group </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
<!-- Add Group Modal-->









<!-- Edit Group Modal-->
<div class="modal fade" id="editTestData" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Group </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
<!-- Edit Patient Modal-->








 
<script type="text/javascript" src="include/js_plugin/pathology/getGroupInfo.js"></script>






