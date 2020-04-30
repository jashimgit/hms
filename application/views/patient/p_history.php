<?php
$total_tc_taka = 0;


if (!empty($ticket)) {
    foreach ($ticket as $tc) {
        $h_tk[] = $tc->hospital_fee;
        $dr_tk[] = $tc->doctor_fee;
    }
    $hos_tk = array_sum($h_tk);
    $dr_tc_tk = array_sum($dr_tk);
    $total_tc_taka = $hos_tk + $dr_tc_tk;
}
 ?>

<html>
    <head>
        <style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin: 0cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 3.5cm;
                margin-left: 1cm;
                margin-right: 1cm;
                margin-bottom: 1cm;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0.5cm;
                left: 0cm;
                right: 0cm;

                /** Extra personal styles **/
                color: black;
                text-align: center;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 0.5cm;

                /** Extra personal styles **/
                color: black;
                text-align: center;
                font-size: 12px;
            }

            table {
                width: 100%;
                font-size: 20px;
                margin-top: -15px;
            }
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            <h1 style="font-size: 40px; margin: 0; "><?php echo $this->db->get('settings')->row()->system_vendor; ?></h1>
            <p style="font-size: 20px; margin: 0;"><?php echo $this->db->get('settings')->row()->address; ?></p>
            <p style="font-size: 20px; margin: 0;">Admition Patient Report</p>
<hr>
        </header>

        <footer>
            <hr>

        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>


<center><h1>Patient Information</h1></center>

            <table border="1px">
                <tr>
                    <td>Patient Name : <?php echo strtoupper($patient_info->ptnname); ?> </td>
                    <td>Doctor's Name : <?php echo strtoupper($patient_info->dr_name); ?></td>
                </tr>
                <tr>
                    <td>Age: <?php echo $patient_info->age; ?></td>
                    <td>Gender: <?php echo $patient_info->sex; ?></td>
                </tr>
                <tr>
                    <td>Guardian Name: <?php echo $patient_info->f_s_name; ?></td>
                    <td>Mobile No: <?php echo $patient_info->mobile; ?></td>
                </tr>
                <tr>
                    <td colspan="2">Address: <?php echo $patient_info->pn_address; ?></td>
                </tr>
                <tr>
                    <td>Admission Date: <?php echo date('d-M-y', $patient_info->time_this); ?></td>
                    <td>Discharge Date: <?php if (!empty($patient_info->dis_time)) { echo date('d-M-y', $patient_info->dis_time) ; } ?></td>
                </tr>
                <tr>
                    <td>Bed No : <?php echo $patient_info->b_num; ?></td>
                    <td>Reg No : <?php echo $patient_info->patient_rand_id; ?></td>
                </tr>
            </table>
<br><br>
<?php if (!empty($patient_info->dis_time)) { ?>
<center><h1>Billing Information</h1></center>
    <table border="1px" style="width: 70%; font-size: 18px; ">
        <tr>
            <th>Particular Name</th>
            <th align="right">Amount</th>
        </tr>
    <?php $b_tk = array(); foreach ($creat_bill as $cr_b) { 
        $b_tk[] = $cr_b->create_bill_taka;
         ?>
        <tr>
            <td><?php echo $cr_b->category; ?></td>
            <td align="right"><?php echo $cr_b->create_bill_taka; ?></td>
        </tr>
    <?php } 
    $totalTK = array_sum($b_tk);
    $total_receive_tk = $total_tc_taka + $bill_cumission + $receive_bill;
    $total_discount = $totalTK - $total_receive_tk;
     ?>
        <tr>
            <th align="right">Total Bill</th>
            <th align="right"><?php echo $totalTK; ?></th>
        </tr>
        <tr>
            <th align="right">Discount</th>
            <td align="right"><?php echo $total_discount; ?></td>
        </tr>
        <tr>
            <th align="right">Receive Amount</th>
            <th align="right"><?php echo $total_receive_tk; ?></th>
        </tr>
    </table>


<?php }else echo " <center><h1>Bill Do not Create......</h1></center>
"; ?>



        </main>
    </body>
</html>

