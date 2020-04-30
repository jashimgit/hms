

<html>
    <head>
        <style>

    @media print {
        @page { margin:0; }
        body { margin: 0.5cm; }
    }


            .header, .header-space,
            .footer, .footer-space {
              height: 100px;
            }
            .header {
              position: fixed;
              top: 0;
              left: 25%;
            }
            .footer {
              position: fixed;
              bottom: 0;
            }


        </style>
    </head>
    <body>


<table>
    <thead>
        <tr>
            <td>
                <div class="header-space">&nbsp;</div>
            </td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="content"><br>
                    <table border="1px" style="font-size: 12px;">
                        <tr>
                            <th>SL No</th>
                            <th>Patient ID</th>
                            <th>Patient Name</th>
                            <th>Doctor Name</th>
                            <th>Admission Date Time</th>
                            <th>Discharge Date Time</th>
                            <th>Bed / Cabin No</th>
                            <th>Patient Causes</th>
                            <th>Full Address</th>
                            <th>Mobile No</th>
                        </tr>
                    <?php $i = 1; foreach ($patient_data as $p_data) { ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $p_data->patient_rand_id;?></td>
                            <td><?php echo strtoupper($p_data->ptnname);?></td>
                            <td><?php echo strtoupper($p_data->dr_name);?></td>
                            <td><?php if (!empty($p_data->time_this)) {
                             echo date('d-M-y h:m a', $p_data->time_this);}?></td>
                            <td><?php if (!empty($p_data->dis_time)) {
                             echo date('d-M-y h:m a', $p_data->dis_time);}?></td>
                            <td><?php if (!empty($p_data->b_num)) {
                                echo $p_data->b_num;}?></td>
                            <td><?php if (!empty($p_data->patient_cause)) {
                             echo $p_data->patient_cause;}?></td>
                            <td><?php if (!empty($p_data->pn_address)) {
                                echo $p_data->pn_address;}?></td>
                            <td><?php if (!empty($p_data->mobile)) {
                                echo $p_data->mobile;} $i += 1;?></td>
                        </tr>
                    <?php } ?>
                    </table>
                </div>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td>
                <div class="footer-space">&nbsp;</div>
            </td>
        </tr>
    </tfoot>
</table>
<center>
    <div class="header">
        <h1 style="font-size: 40px; margin: 0; "><?php echo $this->db->get('settings')->row()->system_vendor; ?></h1>
        <p style="font-size: 20px; margin: 0;"><?php echo $this->db->get('settings')->row()->address; ?></p>
        <p style="font-size: 20px; margin: 0;">Admition Patient Report</p>
        <p style="font-size: 15px; margin: 0 0 0 0;">Date : <?php echo $s_date; ?> to <?php echo $l_date;?></p>

    </div>
</center>
<div class="footer"><hr></div>
















    </body>
</html>


















