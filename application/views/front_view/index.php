
    <!-- Content Area -->
    <section class="main-section">

        <!-- Home About Us Section -->
        <div class="about-us-section">
            <div class="container">
                <div class="row">
                    <div class="section-title col-12" data-aos="fade-up">
                        <h2><span>About </span>Us</h2>
                        <p>Description text here...</p>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-4 col-sm-4">
                        <div class="box-img box-shadow" data-aos="fade-up">
                            <img src="include/front_style/images/about-img.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-8">
                        <div class="common-cnt" data-aos="fade-up">
                            <div class="section-top">
                                <p><strong><?php echo $site_set->system_vendor; ?></strong> isIt is a long established fact that a reader will be
                                    distracted by the readable content.</p>
                            </div>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                                McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of
                                the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and goingered the
                                undoubtable source.</p>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Home About Us Section -->

        <!-- Home About Us Section -->
        <div class="our-best-service xl-slategray section-65-100">
            <div class="container">
                <div class="row">
                    <div class="section-title col-12" data-aos="fade-up">
                        <h2><span>Our </span>Best Services</h2>
                        <p>Our Departnemt</p>
                    </div>
                </div>
                <div class="row">


                <?php foreach ($get_dept as $depts) { ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="service-box" data-aos="fade-up" data-aos-duration="3000">
                            <div class="service-cnt">
                                <div class="service-name"><?php echo $depts->dept_name ; ?></div>
                                <div class="service-dep">
                                    <p><?php $descr = substr($depts->description,0,150); echo $descr; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>






                </div>
            </div>
        </div>
        <!-- Home About Us Section -->

        <!-- Home Fun Fact -->
<!--         <div class="fun-fact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="fun-fact-box text-center">
                            <i class="zmdi zmdi-account"></i>
                            <span class="counter timer" data-from="0" data-to="652" data-speed="2500"
                                  data-fresh-interval="700">652</span>
                            <p>Happy Clients</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="fun-fact-box text-center">
                            <i class="zmdi zmdi-favorite"></i>
                            <span class="counter timer" data-from="0" data-to="7652" data-speed="2500"
                                  data-fresh-interval="700">7652</span>
                            <p>Heart Transplant</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="fun-fact-box text-center">
                            <i class="zmdi zmdi-thumb-up"></i>
                            <span class="counter timer" data-from="0" data-to="52" data-speed="2500"
                                  data-fresh-interval="700">52</span>
                            <p>Years Of Experience</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="fun-fact-box text-center">
                            <i class="zmdi zmdi-mood"></i>
                            <span class="counter timer" data-from="0" data-to="7652" data-speed="2500"
                                  data-fresh-interval="700">7652</span>
                            <p>Well Smiley Faces</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Home Fun Fact -->

        <!-- Home Our Team -->
        <div class="our-team">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="section-title left col-lg-4" data-aos="fade-up">
                        <h2>Our Consultant </h2>
                        <p>All Consultant List with Description</p>
                    </div>
                    <div class="section-title right col-lg-8" data-aos="fade-up">
                        <p><span class="color-212121"><?php echo $site_set->system_vendor; ?></span> The wise man therefore always holds in these
                            matters to this principle of selection: he rejects pleasures to secure.</p>
                    </div>
                </div>
                <div class="row ">

 


                    <div  class="col-lg-3 col-md-6 col-sm-12">
                        <div class="team-box text-center" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="5000">
                            <div class="doctor-pic"><img src="include/front_style/images/team-member-01.png" alt="Dr. John"></div>
                            <div class="doctor-info">
                                <h4>Dr. John <span>Dentist</span></h4>
                                <ul class="clearfix">
                                    
                                </ul>
                                <a class="btn btn-simple btn-primary btn-round" href="javascript:void(0);">View More</a>
                            </div>
                        </div>
                    </div>











                </div>
            </div>
        </div>
        <!-- Home Our Team -->

        <!-- Home Why choose us -->
        <div class="why-choose-us">
            <div class="container">
                <div class="row">
                    <div class="section-title col-12" data-aos="fade-up">
                        <h2><span>Why </span>Choose Us</h2>
                        <p>Description text here...</p>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-6 col-md-12">
                        <div class="common-cnt">
                            <div class="section-top" data-aos="fade-down">
                                <p>Our goal is to make sure<br>
                                    with advances in <br>
                                    technology</p>
                            </div>
                            <p data-aos="fade-down" data-aos-duration="3000">Professional dental clinic 32roDent offers the whole range of dentistry services:
                                treatment of caries, gum diseases, tooth whitening, implantation, dentures (crowns
                                installation), surgery, correction (braces) etc.</p>
                            <p>
                                <a class="btn btn-primary btn-round" data-aos="flip-up">More about practice</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="box-img" data-aos="fade-up" data-aos-duration="3000">
                            <img src="include/front_style/images/why-choose-img.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Home Why choose us -->


    </section>

    <!-- start footer -->
    