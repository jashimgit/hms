
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title"> Departments </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Departments </li>
                </ul>

                <a data-toggle="modal" href="#add_new_dept" class="btn bg-info mr-2 edit_dept_button">
                    <i class="fa fa-plus-circle"></i> Add New
                </a> 

            </div>
        </div>
    </div>
    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Dept Name </th>
                                    <th class="no-print"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php $sl = 1; foreach ($departments as $department) { ?>
                                <tr class="">
                                    <td><?php echo $sl; ?></td>
                                    <td ><?php echo $department->dept_name; ?></td>
                                    <td class="no-print">
                                        <a data-toggle="modal" data-id="<?php echo $department->dept_id; ?>" href="#edit_dept_info" class="btn btn-sm bg-info mr-2 edit_dept_button">
                                            <i class="fe fe-edit"></i>
                                        </a> 
                                        <a class="btn btn-danger btn-sm btn_width delete_button" title="Delete" href="department/delete?id=<?php echo $department->dept_id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                            <?php $sl += 1; } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>











<!-- Add Department Modal -->
<div class="modal fade" id="add_new_dept" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="department/addNew" method="post" enctype="multipart/form-data" >
                    <div class="row form-row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Department Name</label>
                                <input type="text" name="name" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label col-md-3"> Description </label>
                            <div class="col-md-9">
                            </div>
                        </div>            

        <textarea class="ckeditor form-control editor" id="editor" name="description" value="" rows="40"></textarea>

                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Department Modal -->












<!-- Edit Department Modal -->
<div class="modal fade" id="edit_dept_info" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Department Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="departmentEditForm" action="department/updatedepartment_info" method="post" enctype="multipart/form-data">
                    <div class="row form-row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Department Name</label>
                                <input type="text" name="name" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label col-md-3"> Description </label>
                            <div class="col-md-9">
                            </div>
                        </div>            
                        <textarea class="ckeditor form-control editor" id="editor" name="description" value="" rows="40"></textarea>
                        <input type="hidden" name="id" value=''>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Department Modal -->


<script type="text/javascript" src="include/js_plugin/dept/getDeptInfo.js"></script>



