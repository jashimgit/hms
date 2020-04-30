

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
                            <th>Ticket ID</th>
                            <th>Patient Name</th>
                            <th>Appoinment Date </th>
                            <th>Mobile No</th>
                            <th>Ticket Amount</th>
                            <th>Ticket Entry Date</th>
                            <th>Entry Employee</th> 
                        </tr>
                    <?php $i = 1; foreach ($all_ticket as $tc_st) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $tc_st->app_tc_id; ?></td>
                            <td><?php echo $tc_st->app_patient; ?></td>
                            <td><?php echo $tc_st->ap_date; ?></td>
                            <td><?php echo $tc_st->mobile; ?></td>
                            <td><?php echo $tc_st->doctor_fee + $tc_st->hospital_fee; ?></td>
                            <td><?php echo $tc_st->thisdate; ?></td>
                            <td><?php echo $tc_st->ename; ?></td>
                        </tr>
                    <?php $i+=1;} ?>
                    </table><br>

                    <table border="1px">
                        <tr>
                            <th colspan="3" >User Wise Statement</th>
                        </tr>
                        <tr>
                            <th>User Name</th>
                            <th>Doctor Taka</th>
                            <th>Hospital Taka</th>
                        </tr>
                <?php foreach ($user_data as $users) { ?>
                        <tr>
                            <td><?php echo $users->ename; ?></td>
                            <td align="right">00</td>
                            <td align="right">00</td>
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
        <p style="font-size: 20px; margin: 0;">Appoinment Patient Report</p>
        <p style="font-size: 15px; margin: 0 0 0 0;">Date : <?php echo $s_date; ?> to <?php echo $l_date;?></p>

    </div>
</center>
<div class="footer"><hr></div>
















    </body>
</html>


















