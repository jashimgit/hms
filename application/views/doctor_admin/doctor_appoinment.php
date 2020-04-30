
   
   
   
<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="appointments">
        <?php foreach ($today_app as $today_ap) { ?>
        <!-- Appointment List -->
        <div class="appointment-list">
            <div class="profile-info-widget">
                <a href="patient-profile.html" class="booking-doc-img">
                    <!--img src="assets/img/patients/patient.jpg" alt="User Image" style="height: 50px; width: 50px; border-radius: 50px;"-->
                </a>
                <div class="profile-det-info">
                    <h3><a href="patient-profile.html" style="font-size: 20px;"><?php echo $today_ap->app_patient ;?></a></h3>
                    <div class="patient-details">
                        <!--h5><i class="far fa-clock"></i> 14 Nov 2019, 10.00 AM</h5>
												<h5><i class="fas fa-map-marker-alt"></i> Newyork, United States</h5>
												<h5><i class="fas fa-envelope"></i> richard@example.com</h5-->
                        <h5 class="mb-0">Sl No : <?php echo $today_ap->ticket_serial ;?><span style="margin-left:20px;">Age : <?php echo $today_ap->age ;?></span></h5>
                    </div>
                </div>
            </div>
            <div class="appointment-action">
                <!--a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
											<i class="far fa-eye"></i> View
										</a-->
                <a app_idd="<?php echo $today_ap->app_tc_id ;?>" href="javascript:void(0);" class="btn btn-sm bg-success-light btn_option">
                    <i class="fas fa-check"></i> Accept
                </a>
                
                <a app_idd="<?php echo $today_ap->app_tc_id ;?>" href="javascript:void(0);" class="btn btn-sm bg-danger-light btn_option">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </div>
        <!-- /Appointment List -->
    <?php } ?>

    </div>
</div>