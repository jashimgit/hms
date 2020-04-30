<?php

    //Create QR Code
        $params['data'] = $this->db->get('settings')->row()->system_vendor."\r \n Patient Name : ".strtoupper($ptn_infos->labpnname)."\r \n Doctor Name : ".strtoupper($ptn_infos->dr_name);

        $params['level'] = 'M';
        $params['size'] = 4;
        $params['savename'] = FCPATH.'uploads/qrcode/tst_result/'.$ptn_infos->labpn_id.'.png';
        $this->ciqrcode->generate($params);
    //Create QR Code


 ?>









<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo base_url(); ?>">
    <style type="text/css">
     @media print {
        @page { margin:0; }
        body { margin: .5cm; 
        	max-width: 90%;}
    }
      *{
    margin: 0 0 0 5px;
    padding: 0px ;
    font-family: Times New Roman ;	
}
.qr_code_set {
	margin: -60px 0 0 0;
}
.cler{
    clear: both;
}
.float_left{
    float: left;
}
.float_right{
    float: right;
}
.up{
    text-transform: uppercase;
}
.information{
    border: 1px solid #000;
    border-radius: 10px;
    padding: 10px 20px;
}
.ex_report{
    max-width: 55%;
    margin: 0 auto;
    margin-bottom: 30px;
}
.urin{
    border: 2px solid #000;
    border-radius: 5px;
    font-size: 28px;
    font-weight: 600;
    padding: 5px 10px;
    text-align: center;
    
}
.test_heading{
    font-size: 16px;
    font-weight: 100;
    text-align: center;
    margin: 15px 0 0 0;
    font-style: italic; 
}
.textStl {
    font-family: Times New Roman ;	
}
.unit{
    border: 1px solid #000;
    border-radius: 10px;
    height: 25px;
    font-size: 16px;
    padding-top: 5px;
    font-weight: 700;
}
.terone{
    font-size: 16px;
    padding-top: 30px;
    font-weight: 500;
}
.value{
    max-width: 30%;
}
.age{
    font-weight: 700;
}
.full_body_ex{
    width: 200mm;
    height: 297mm;
    margin-top: 150px;
    margin-left: 10px;
    margin-right: 40px;
}

    </style>
</head>
<body class="full_body_ex">
     <div class="full_body">
       
       <div class="cler"></div>
       
        <div class="information">
         <div class="first_row">
             <span>Patient Name : <b><?php echo strtoupper($ptn_infos->labpnname); ?></b></span>
             <span class="" style="padding-left: 34px;">ID : <b><?php echo $ptn_infos->lab_rgstr_iidd; ?></b></span>
             
         </div><div class="cler"></div>
         <div class="secound_row" style="padding: 10px 00px;">
             <span>Age : <b><?php echo $ptn_infos->labpn_age; ?></b></span>
             <span style="padding-left: 150px;">Gender : <b><?php if($ptn_infos->gndr == 'm') {echo "Male";}else{echo "Female";} ?></b></span>
             <span class="float_right" style="position: absolute; margin: 50px 0 0 207px ;">Entry Date : <b><?php if (!empty($ptn_infos->this_date)) {
	             	 echo date('d-M-y', strtotime($ptn_infos->this_date));
             } ?></b></span>
             
         </div><div class="cler"></div>

        <!-- QR Code -->
        <?php if (file_exists('uploads/qrcode/tst_result/'.$ptn_infos->labpn_id.'.png')) { ?>
         <div class="qr_code_set float_right">
         	<img width="80px" height="80px" src="uploads/qrcode/tst_result/<?php echo $ptn_infos->labpn_id;?>.png">
      	 </div>
      	<?php } ?>
        <!-- QR Code -->

         <div class="third_row">
             <span>Ref. By : <b><?php echo strtoupper($ptn_infos->dr_name); ?></b> <p style="margin: 0 0 0 65px;"> [<?php echo strtoupper($ptn_infos->profile); ?>] </p></span>
             <?php if (!empty($ptn_infos->patho_repo_enrty_timestmp)) { ?>
             <span class="float_right" style="margin: 5px 0 0 0; ">Report Time : <b><?php echo date('d-M-y', $ptn_infos->patho_repo_enrty_timestmp);?></b></span> <?php } ?>
             
         </div><div class="cler"></div>
      </div>
        
       
        <div class="test_report">
           
            <div class="test_heading">
            <p class="textStl"><?php if (!empty($grup->matchine_name)) {
            		 echo '( '.$grup->matchine_name.' )';} ?></p>
            </div>

       <div class="ex_report">
          <p class="urin"><?php echo strtoupper($grup->tst_grp_name.' '.'Report'); ?></p>
      </div>

            <div class="unit">
                <p class="float_left" style="padding-left: 45px;">Test</p>
                <p class="float_left" style="padding-left: 150px;">Result</p>
                <p class="float_left" style="padding-left: 140px;">Unit</p>
                <p class="float_right" style="padding-right: 45px;">Reference Value</p>
            </div>

      <!-- Foreach loop Start -->
      <?php foreach ($report_vw as $tstResult) { ?>
            <div class="terone">
                <p class="float_left" style=" width: 220px;"><?php echo $tstResult->test_name ;?> </p>
                <p class="float_left" style="width: 180px;"> <?php echo $tstResult->Inv_tst_result_ ;?> </p>
                <p class="float_left" style="width: 60px;"><?php echo $tstResult->Test_Units ;?> </p>
            </div>
            <div class="value float_right">
               	<div class=" float_right">
                	<p class="float_left" style="padding-right: 10px;"> <?php echo $tstResult->tst_normal_rang ;?>  </p>
               	</div>
            </div> 
        <?php } ?>
      <!-- Foreach loop End --> 

    </div>
    </div>
</body>
   
    
    
</html>




















