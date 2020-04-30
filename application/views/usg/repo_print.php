
<style type="text/css">
    @media print {
        @page { margin:0; }
        body { margin: 4cm 2cm 2cm 2cm;}
    }

</style>


<div style="border: 1px solid black; border-radius: 15px; width: 98%; height: 100px;">
	<div style="margin: 10px 10px 10px 10px; font-family: Helvetica;">
		<table style="float: left;" >
			<tr>
				<td>ID No</td>
				<td style="font-size: 18px; font-weight: bold;"> : <?php echo $ptn_info->lab_rgstr_iidd ;?></td>
			</tr>
			<tr>
				<td>Patient's Name</td>
				<td style="font-size: 16px; font-weight: bold;"> : <?php echo $ptn_info->labpnname ;?></td>
			</tr>
			<tr>
				<td>Refd. By</td>
				<td> : <?php echo strtoupper($ptn_info->dr_name) ;?><br> <span style="margin-left: 10px;"> <?php echo $ptn_info->profile ;?></span></td>
			</tr>
		</table>
		<table style="float: right;">
			<tr>
				<td>Received Date : <?php echo date('d-M-y',$ptn_info->this_tim );?>, Report Print : <?php echo date('d-m-y', time()); ?></td>
			</tr>
			<tr>
				<td>Age : <?php echo $ptn_info->labpn_age ;?>, Gender : <?php if ($ptn_info->gndr == 'm') {
					echo "Male";
				}else { echo "Female"; }  ;?></td>
			</tr>
		</table>
	</div>
</div><br>
<center><h2><u><?php echo $all_Info->inv_name ;?></u></h2></center>
<div style="line-height: 15px;">
	<?php echo $all_Info->ptn_report_final ;?>
</div>
<div style="float: right; width: 40%">
	<center><span style="font-size: 18px; font-weight: bold;"><?php echo strtoupper($all_Info->dr_name) ;?></span><br><?php echo $all_Info->profile ;?></center>
</div>