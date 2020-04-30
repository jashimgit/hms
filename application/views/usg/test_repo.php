<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
              <i class="fa fa-hotel"></i>  Ultrasonography test
            </header> 
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix no-print">

                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Test Name </th>
                                <th> Report Check </th>
                                <th class="no-print"> <?php echo lang('options')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usg_test as $tests) { ?>
                                <tr class="">
                                    <td><?php echo $tests->rado_repo_iidd; ?></td>
                                    <td><?php echo $tests->inv_name; ?></td>
                                    <td><?php if (empty($tests->test_normal_repo)) {
                                            echo "Report Not Entry";
                                        }else { 
                                            echo " Report Entry ";} ?></td>
                                    <td class="no-print">
                                      <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" title="Edit" data-id="<?php echo $tests->rado_repo_iidd; ?>"><i class="fa fa-edit"></i> </button>   
                                    
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




<!-- Add Department Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i>  <?php echo lang('add_department')?></h4>
            </div> 
            <div class="modal-body">
                <form role="form" action="department/addNew" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('name')?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label col-md-3"> <?php echo lang('description')?></label>
                        <div class="col-md-9">
                        </div>
                    </div>                            
                    <textarea class="ckeditor form-control" name="description" value="" rows="100"></textarea>

                    <input type="hidden" name="id" value=''>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button"> <?php echo lang('submit')?></button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Department Modal-->

<!-- Edit Department Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edit USG Test Report  </h4>
            </div>
            <div class="modal-body">
                <form role="form" id="departmentEditForm" action="usg/editReport_sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Test Name </label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label col-md-3"> Test Report</label>
                        <div class="col-md-9">
                        </div>
                    </div>                            
                    <textarea class="ckeditor form-control editor" id="editor" name="description" value="" rows="10"></textarea>

                    <input type="hidden" name="id" value=''>

                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button"> <?php echo lang('submit')?></button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">
$(document).ready(function () {
    $(".editbutton").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#myModal2').modal('show');
        $.ajax({
            url: 'usg/getReportSample?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            async: false,
            success: function (tst_repo) {
            // Populate the form fields with the data returned from server
            $('#departmentEditForm').find('[name="id"]').val(tst_repo.rado_repo_iidd).end()
            $('#departmentEditForm').find('[name="name"]').val(tst_repo.inv_name).end()
            CKEDITOR.instances['editor'].setData(tst_repo.test_normal_repo)
            }
        });
    });
});
</script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
