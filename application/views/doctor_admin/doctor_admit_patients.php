


    <div class="col-md-7 col-lg-8 col-xl-9">
            <p >Total Admit Patients : <b> <?php echo count($admit_parients) ;?> </b>   persone</p>
                <div class="row row-grid">
                    <?php foreach ($admit_parients as $admit_parien) { ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card widget-profile pat-widget-profile">
                            <div class="card-body">
                                <div class="pro-widget-content">
                                    <div class="profile-info-widget">
                                        <a href="patient-profile.html" class="booking-doc-img">
                                            
                                        </a>
                                        <div class="profile-det-info">
                                            <h3>
                                                <a href="patient-profile.html" style="text-transform: uppercase; font-weight: 600; "><?php echo $admit_parien->ptnname ;?></a>
                                            </h3>
                                            
                                            <div class="patient-details">
                                                <h5><b>Patient ID :</b> <?php echo $admit_parien->patient_rand_id ;?></h5>
                                                <h5 style="text-transform: capitalize;" class="mb-0"><i class="fas fa-map-marker-alt"> </i> <?php echo $admit_parien->pn_address ;?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="patient-info">
                                    <ul>
                                        <li>Phone <span><?php echo $admit_parien->mobile ;?></span></li>
                                        <li>Age <span><?php echo $admit_parien->age ;?>, <?php echo $admit_parien->sex ;?></span></li>
                                        <li>Bed Number <span><?php echo $admit_parien->b_num ;?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php } ?>
                    
                </div>

            </div>   
   

 
