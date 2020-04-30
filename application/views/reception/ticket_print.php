<script type="text/javascript"> 
    document.open();
    document.write();
    document.close();
    window.focus();
    window.print();
    window.close();
</script>



<style type="text/css">

    	/* transform: rotate(90deg); */ /* Equal to rotateZ(90deg) */
    @media print {
        @page { margin: 0; }
        body { margin: 0; }        
    }

    .full_body {
    	width: 100%;
    	margin: 10px 0 0 0;
    }    
    .head_section {

    }
    .vendor_name {
    	font-size: 24px;
    	font-weight: bold;
    	margin-top: -10px;
    }
    .vendor_address {
    	margin-top: -20px;
    }
    .app_na_d {
    	margin-top: -20px;
	}
    .serial_view_section {
    	margin-top: -10px;
    	border: 2px solid black;
    	border-radius: 50px;
    	width: 150px;
    	margin-bottom: 10px;
    	font-size: 22px;
    	font-weight: bold;
    }
    .p_info_section {

    }
    .p_info_section {

    }
    .data {
    	font-weight: bold;
    }
    tr {
    	width: 100%
    }
</style>



<center>
	<div class="full_body">
		<div class="head_section" >
			<p class="vendor_name"><?php echo $this->db->get('settings')->row()->system_vendor; ?></p>
			<p class="vendor_address"><?php echo $this->db->get('settings')->row()->address; ?></p>
			<p class="app_na_d">Doctor Appoinment Ticket</p>
		</div>
		<div class="serial_view_section">
			<?php echo $app_ticket->ticket_serial; ?>
		</div>
        <span style="margin-left: 300px; "><?php echo $app_ticket->app_tc_id; ?></span>
		<div class="p_info_section">            
			<table border="1px">
				<tr>
					<td>Patient Name</td>
					<td class="data"><?php echo strtoupper($app_ticket->app_patient); ?>               
                    </td>
				</tr>
				<tr>
					<td>Doctor Name</td>
					<td class="data"><?php echo $app_ticket->dr_name; ?></td>
				</tr>
				<tr>
					<td>Appoinment Date</td>
					<td class="data"><?php echo date('d-M-Y', strtotime($app_ticket->ap_date)); ?></td>
				</tr>
				<tr>
					<td>Ticket Fee</td>
					<td class="data" style="font-size: 20px;"><?php echo $app_ticket->doctor_fee + $app_ticket->hospital_fee; ?>/=</td>
				</tr>
			</table>
		</div>
	</div>
	<br><br>
	<div >
		<?php echo $app_ticket->ename; ?><br>
		(<?php echo $app_ticket->desig; ?>)
	</div>
</center>