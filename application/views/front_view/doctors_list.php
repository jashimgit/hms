






    <!-- Content Area -->
    <section class="main-section">

        <!-- Our Team -->
        <div class="our-team doctors-team">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="section-title left col-lg-4" data-aos="fade-right">
                        <h2><span>Our </span>Doctor and Consultant </h2>
                        <p>All Dortor Department Wise</p>
                    </div>
                    <div class="section-title right col-lg-8" data-aos="fade-left">
                        <p><span class="color-212121"><?php echo $site_set->system_vendor; ?></span> The wise man therefore always holds in these
                            matters to this principle of selection: he rejects pleasures to secure.</p>
                    </div>
                </div>


        <?php foreach ($get_dept as $depts) { ?>
                <div class="" style="font-weight: bold; font-size: 24px; border-top: 2px dashed #800020 ; border-bottom: 2px dashed #800020 ;"> <center> <?php echo $depts->dept_name; ?> </center> </div><br>
                <div class="row">

            <?php foreach ($get_doctor as $dr_info) { 
                if ($depts->dept_id == $dr_info->department) { ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="team-box text-center" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="5000">
                            <div class="doctor-pic"><img style="width:400px; height: 300px;" src="<?php 
                                if (!empty($dr_info->img_url)){
                                    echo $dr_info->img_url;
                                    }else {
                                        if ($dr_info->gender == 'Male') {
                                            echo 'uploads/MaleDoctor.jpg';
                                        }else{
                                            echo 'uploads/FemaleDoctor.jpg';
                                        }
                                    } ?>"></div>
                            <div class="doctor-info">
                                <h4> <?php echo $dr_info->dr_name; ?> <span><?php echo $dr_info->dept_name; ?></span></h4>
                                <ul class="clearfix">
                                    <div>Specialist</div>
                                </ul>
                                <a class="btn btn-simple btn-primary btn-round" href="front_view/doctor_profile?id=<?php echo $dr_info->dr_auto_id; ?>">View More</a>
                            </div>
                        </div>
                    </div>
            <?php } } ?>


                    <div class="col-md-4 col-sm-6">
                        <div class="team-box text-center" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="5000">
                            <div class="doctor-pic"><img style="width:400px; height: 300px;" src="uploads/FemaleDoctor.jpg"></div>
                            <div class="doctor-info">
                                <h4> Up Coming <span><?php echo $depts->dept_name; ?></span></h4>
                                <ul class="clearfix">
                                    <div>Specialist</div>
                                </ul>


                            </div>
                        </div>
                    </div>

                </div>
        <?php } ?>



            </div>
        </div>
        <!-- Our Team -->

    </section>
