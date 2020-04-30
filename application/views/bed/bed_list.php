
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title"> Bed </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Bed List </li>
                </ul>
            </div>
        </div>
    </div>

    <button type="button" data-toggle="modal" href="#add_new_bed" class="btn btn-info "><i class="fa fa-plus-circle"></i> Add New Bed </button>

    <!-- /Page Header -->
    
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped">
                            <thead>
                                <tr>
                                    <th> Sl No </th> 
                                    <th> Category </th>
                                    <th> Bed No </th> 
                                    <th> Floor </th>
                                    <th> Price </th>
                                    <th class="no-print"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                           <?php $sl = 1; foreach ($beds as $bed) { ?>
                                <tr class="">
                                    <td> <?php echo $sl; ?></td>
                                    <td> <?php echo $bed->category; ?></td>
                                    <td><?php echo $bed->b_num; ?></td>
                                    <td> <?php echo $bed->floor; ?></td>
                                    <td> <?php echo $bed->price; ?></td>

                                    <td class="no-print">
                                         <button type="button" class="btn btn-info btn-sm edit_bed" title="Edit" data-target="#edit_bed_modal" data-toggle="modal" data-id="<?php echo $bed->bed_Idi; ?>"><i class="fa fa-edit"></i> </button>
                                       
                                         <a class="btn btn-sm btn-danger" title="Delete" href="bed/delete?id=<?php echo $bed->bed_Idi; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                                       

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


<!-- Add New Doctor Modal-->
<div class="modal fade" id="add_new_bed" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Add New Bed </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="patientadd" action="bed/addbed" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Category </label>
                        <input required="required" type="text" class="form-control" name="cat_name" id="exampleInputEmail1" value='' placeholder="Type Category">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Bed No </label>
                        <input required="required" type="text" class="form-control" name="bedno" id="exampleInputEmail1" value='' placeholder="Type Bed No">
                    </div>

                    <div class="form-group">
                        <label>Bed No for Tracking</label>
                        <input required="required" class="form-control form-control-inline input-medium" type="text" name="bed_cat_i" value="" placeholder="Type Bed No Only Digit allowed" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Floor </label>
                        <input required="required" type="text" class="form-control" name="floor" id="exampleInputEmail1" value='' placeholder="Floor Number">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Description </label>
                        <input type="text" class="form-control" name="description" id="exampleInputEmail1" value='' placeholder="Full Description">
                    </div>

                    <div class="form-group">
                        <label> Price </label>
                        <input required="required" class="form-control form-control-inline input-medium" type="text" name="price" value="" placeholder="Bed Price" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" >      
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"> Save New Bed </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Doctor Modal-->



<!-- Edit Doctor Modal-->
<div class="modal fade" id="edit_bed_modal" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Bed </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="updatebed" action="bed/updatebed" method="post" enctype="multipart/form-data">


                    <div class="form-group">
                        <label for="exampleInputEmail1"> Catagory  </label>
                        <input required="required" type="text" class="form-control" name="cat_name" id="exampleInputEmail1" value='' placeholder="Type Category" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Bed No </label>
                        <input required="required" type="text" class="form-control" name="bedno" id="exampleInputEmail1" value='' placeholder="Type Bed No" >
                    </div>

                    <div class="form-group">
                        <label> Bed No for Tracking </label>
                        <input required="required" class="form-control form-control-inline input-medium" type="text" name="bed_cat_i" value="" placeholder="Type Bed No Only Digit allowed" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" >      
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Floor </label>
                        <input required="required" type="text" class="form-control" name="floor" id="exampleInputEmail1" value=''>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Description </label>
                        <input type="text" class="form-control" name="description" id="exampleInputEmail1" value='' >
                    </div>

                    <div class="form-group">
                        <label> Bed Price </label>
                        <input required="required" class="form-control form-control-inline input-medium" type="text" name="price" value="" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" >      
                    </div>

                <input type="hidden" name="id" value="">

                    <button type="submit" name="submit" class="btn btn-info  btn-block"> UPDATE BED INFO </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Doctor Modal-->









<script type="text/javascript" src="include/js_plugin/bed/getBedInfo.js"></script>








