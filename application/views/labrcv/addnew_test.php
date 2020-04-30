
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title"> Patient </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active"> Patient List </li>
                </ul>
            </div>
                <div class="col-sm-5 col">
                    <div class="top-nav-search">
                            <input type="text" class="form-control" placeholder="Search Single Patient">
                    </div>
                </div>
        </div>
    </div>










    <center>
        <form action="labrcv/newtest" method="post" enctype="multipart/form-data" style="width: 65%; ">


            <div class="input-group">
                <span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
                    Patient Name
                </span>
                <input type="text" required="required" name="ptnname" class="form-control" placeholder="Type Patient Name" aria-describedby="basic-addon3">
            </div>


            <br>
            <div class="input-group">
                <span style="font-weight: bold; color: black;" class="input-group-addon" id="basic-addon3">
                    Patient Age
                </span>
                <input type="text" name="ptnage" required="required" class="form-control" style="width: 25%; float: left;" placeholder="Type Age" aria-describedby="basic-addon3">
                <select class="form-control custom-select custom-select-lg mb-3" name="ymd" style="width: 15%; float: left;">
                  <option value="y">Years</option>
                  <option value="m">Months</option>
                  <option value="d">Days</option>
                </select>
                <select class="form-control custom-select custom-select-lg mb-3" name="gender" style="width: 15%; float: left;">
                  <option value="m">Male</option>
                  <option value="f">Female</option>
                </select>
            </div>
            <br>
            <div class="input-group">
                <span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
                    Doctor's Name
                </span>
                <select class="form-control custom-select custom-select-lg select2 dri_id" required="required" name="dctr_id" value=''>
                  <option value="">Select.........</option>
            <?php foreach ($doctor as $dctr) { ?>
                  <option value="<?php echo $dctr->dr_auto_id; ?>"><?php echo  $dctr->dr_id.'----------'.$dctr->dr_name; ?></option>
            <?php } ?>
                </select>
            </div><br>

        <div class="optdrad"></div>


            <br><br>

            <div class="testDivFull" style="margin-top: 15px;">
                <div class="input-group apndBox">
                    <span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
                        Test ID / Name
                    </span>
                    <div style="width: 55%; float: left;">
                        <select required="required" class="form-control tstiids custom-select custom-select-lg select2" id="tstiids" name="test_iiddd[]">
                          <option value="">Select.........</option>
                    <?php foreach ($labtest as $tst) { ?>
                          <option value="<?php echo $tst->tst_inv_id; ?>"><?php echo $tst->inv_name; ?></option>
                    <?php } ?>
                        </select>
                    </div>
                    <input type="text" name="testtakk[]" readonly="readonly" class="form-control tstrate tstrtval" style="width: 20%; float: left; text-align: right;" >
<!--                            <input type="hidden" name="testtypss[]" class="form-control tsttypes" > -->



                    <div class="" style="width: 90px; float: right;">
                        <img style="cursor: pointer; float: left;" width="40px" height="40px" src="uploads/ad_plus.png" class="plusAddBtn">                 
                    </div>
                </div>
            </div>
                <br><br><br>

            <div class="input-group" style="width: 300px; float: right;">
                <span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
                    Total Taka
                </span>
                <input type="text" readonly="readonly" name="ttlrattte" style="text-align: right; font-weight: bold; border: 1px solid black" class="form-control tttltstrtval" aria-describedby="basic-addon3">
            </div><br><br><br>


            <div class="input-group" style="width: 300px; float: right;">
                <span style="font-weight: bold; color: black;" class="input-group-addon " id="basic-addon3">
                    Discount
                </span>
                <input required="required" type="text" name="discnt" style="text-align: right; font-weight: bold; border: 1px solid black" class="form-control dscntamnt " aria-describedby="basic-addon3" value="0">
            </div><br><br><br>



            <div class="input-group" style="width: 300px; float: right;">
                <span style="font-weight: bold; color: black;" class="input-group-addon" id="basic-addon3">
                    Received
                </span>
                <input required="required" type="text" name="ttlrcvamnt" style="text-align: right; font-weight: bold; border: 1px solid black" class="form-control  rcvtakkak " aria-describedby="basic-addon3">
            </div><br><br><br>

            <div style="width: 50%; float: left; margin-top: -150px" class="discntrfrs">
                
            </div>

            <div class="ttlrcvtakkatk" style="font-size: 25px; font-weight: bold; text-align: right;"></div>

            <br>

            <div class="input-group" style="width: 300px; float: right;">
                <span style="transform: rotate(290deg); position: absolute; margin: -80px 0 0 -220px; font-weight: bold; color: black; font-size: 35px;" class="input-group-addon pdtxtval" id="basic-addon3">
                </span>
<!--                        <input type="text" name="ttldueamnt" style="text-align: right; font-weight: bold; border: 1px solid black" class="form-control " aria-describedby="basic-addon3">-->
            </div><br><br><br>  

            <div class="input-group rfrtxvl" style="width: 400px; float: right;">
            </div>

            <button type="submit" class="btn btn-info sbmtbtn" style="font-size: 42px; font-weight: bold;">Submit</button>

        </form>
    </center>



<!--       <h1 style="transform: rotate(290deg); position: absolute; margin: -300px 0 0 -90px; font-family: solaimanlipi;"> Enter চাপ দিবেন না।</h1>
-->



