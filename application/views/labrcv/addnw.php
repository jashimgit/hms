



<style type="text/css">

    .search_box {
        width: 250px;
        margin: 15px 0 0 0; 
        position: relative;
    }

    #menu, #menu ul {
        margin: -130px -20px 0 0;
        padding: 0;
        list-style: none;
        cursor: pointer;
        float: right;
    }
    
    #menu li {
        float: left;
        border-right: 1px solid #222;
        -moz-box-shadow: 1px 0 0 #444;
        -webkit-box-shadow: 1px 0 0 #444;
        box-shadow: 1px 0 0 #444;
        position: relative;
    }
    
    #menu a {
        float: left;
        padding: 12px 30px;
        color: #999;
        text-transform: uppercase;
        font: bold 16px Arial, Helvetica;
        text-decoration: none;
        text-shadow: 0 1px 0 #000;
    }
    
    #menu li:hover > a {
        color: #fafafa;
    }
    
    *html #menu li a:hover { /* IE6 only */
        color: #fafafa;
    }
    
    #menu ul {
        margin: 88px 0 0 0;
        visibility: visible;
        position: absolute;
        top: 38px;
        left: 0;
        z-index: 1;    
        background: #444;
        background: -moz-linear-gradient(#444, #111);
        background-image: -webkit-gradient(linear, left top, left bottom, from(#444), to(#111));
        background: -webkit-linear-gradient(#444, #111);    
        background: -o-linear-gradient(#444, #111); 
        background: -ms-linear-gradient(#444, #111);    
        background: linear-gradient(#444, #111);
        -moz-box-shadow: 0 -1px rgba(255,255,255,.3);
        -webkit-box-shadow: 0 -1px 0 rgba(255,255,255,.3);
        box-shadow: 0 -1px 0 rgba(255,255,255,.3);  
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -ms-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;  
    }

    #menu ul ul {
        top: 0;
        left: 150px;
        margin: 0 0 0 20px;
        _margin: 0; /*IE6 only*/
        -moz-box-shadow: -1px 0 0 rgba(255,255,255,.3);
        -webkit-box-shadow: -1px 0 0 rgba(255,255,255,.3);
        box-shadow: -1px 0 0 rgba(255,255,255,.3);      
    }
    
    #menu ul li {
        float: none;
        display: block;
        border: 0;
        _line-height: 0; /*IE6 only*/
        -moz-box-shadow: 0 1px 0 #111, 0 2px 0 #666;
        -webkit-box-shadow: 0 1px 0 #111, 0 2px 0 #666;
        box-shadow: 0 1px 0 #111, 0 2px 0 #666;
    }
    
    #menu ul li:last-child {   
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        box-shadow: none;    
    }
    
    #menu ul a {    
        padding: 10px;
        width: 250px;
        _height: 10px; /*IE6 only*/
        display: block;
        white-space: nowrap;
        float: none;
        text-transform: none;
    }
    
    #menu ul a:hover {
        background-color: #0186ba;
        background-image: -moz-linear-gradient(#04acec,  #0186ba);  
        background-image: -webkit-gradient(linear, left top, left bottom, from(#04acec), to(#0186ba));
        background-image: -webkit-linear-gradient(#04acec, #0186ba);
        background-image: -o-linear-gradient(#04acec, #0186ba);
        background-image: -ms-linear-gradient(#04acec, #0186ba);
        background-image: linear-gradient(#04acec, #0186ba);
    }
    
    #menu ul li:first-child > a {
        -moz-border-radius: 3px 3px 0 0;
        -webkit-border-radius: 3px 3px 0 0;
        border-radius: 3px 3px 0 0;
    }
    
    #menu ul li:first-child > a:after {
        content: '';
        position: absolute;
        left: 40px;
        top: -6px;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-bottom: 6px solid #444;
    }
    
    #menu ul ul li:first-child a:after {
        left: -6px;
        top: 50%;
        margin-top: 0;
        border-left: 0; 
        border-bottom: 6px solid transparent;
        border-top: 6px solid transparent;
        border-right: 6px solid #3b3b3b;
    }
    
    #menu ul li:first-child a:hover:after {
        border-bottom-color: #04acec; 
    }
    
    #menu ul ul li:first-child a:hover:after {
        border-right-color: #0299d3; 
        border-bottom-color: transparent;   
    }
    
    #menu ul li:last-child > a {
        -moz-border-radius: 0 0 3px 3px;
        -webkit-border-radius: 0 0 3px 3px;
        border-radius: 0 0 3px 3px;
    }

    #menu li:hover > .no-transition {
        display: block;
    }

</style>











<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">

            <header class="panel-heading">
	            <i class="fa fa-diagnoses"></i>  
	            Test Receive                     
	            <input style="width: 20%; float: right;" type="text" class="form-control" id="search_for_print" name="" value="" placeholder="Search Patient for Print">

            </header>
            	 <div class="form-group search_box" id="menu">
                    <label></label><li>
                        <ul>
                            <li class="assign_data">
                            </li>
                        </ul>
                    </li>
                  </div><br>



			<center>
				<form action="labrcv/newtest" method="post" enctype="multipart/form-data" style="width: 65%; ">


					<div class="input-group">
						<span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
							Patient Name
						</span>
						<input type="text" required="required" name="ptnname" class="form-control" placeholder="Type Patient Name" aria-describedby="basic-addon3">
					</div>


					<br>
					<div class="input-group">
						<span style="font-weight: bold; color: black;" class="input-group-addon" id="basic-addon3">
							Patient Age
						</span>
						<input type="text" name="ptnage" required="required" class="form-control" style="width: 25%; float: left;" placeholder="Type Age" aria-describedby="basic-addon3">
						<select class="form-control custom-select custom-select-lg mb-3" name="ymd" style="width: 15%; float: left;">
						  <option value="y">Years</option>
						  <option value="m">Months</option>
						  <option value="d">Days</option>
						</select>
						<select class="form-control custom-select custom-select-lg mb-3" name="gender" style="width: 15%; float: left;">
						  <option value="m">Male</option>
						  <option value="f">Female</option>
						</select>
					</div>
					<br>
					<div class="input-group">
						<span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
							Doctor's Name
						</span>
                        <select class="form-control custom-select custom-select-lg m-bot15 js-example-basic-single dri_id" required="required" name="dctr_id" value=''>
						  <option value="">Select.........</option>
					<?php foreach ($doctor as $dctr) { ?>
						  <option value="<?php echo $dctr->dr_auto_id; ?>"><?php echo  $dctr->dr_id.'----------'.$dctr->dr_name; ?></option>
					<?php } ?>
						</select>
					</div><br>

				<div class="optdrad"></div>


					<br><br>

					<div class="testDivFull" style="margin-top: 15px;">
						<div class="input-group apndBox">
							<span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
								Test ID / Name
							</span>
							<div style="width: 55%; float: left;">
		                        <select required="required" class="form-control tstiids custom-select custom-select-lg m-bot15 js-example-basic-single" id="tstiids" name="test_iiddd[]">
								  <option value="">Select.........</option>
							<?php foreach ($labtest as $tst) { ?>
								  <option value="<?php echo $tst->tst_inv_id; ?>"><?php echo $tst->inv_name; ?></option>
							<?php } ?>
								</select>
							</div>
							<input type="text" name="testtakk[]" readonly="readonly" class="form-control tstrate tstrtval" style="width: 20%; float: left; text-align: right;" >
<!-- 							<input type="hidden" name="testtypss[]" class="form-control tsttypes" > -->



							<div class="" style="width: 90px; float: right;">
								<img style="cursor: pointer; float: left;" width="40px" height="40px" src="uploads/ad_plus.png" class="plusAddBtn">					
							</div>
						</div>
					</div>
						<br><br><br>

					<div class="input-group" style="width: 300px; float: right;">
						<span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
							Total Taka
						</span>
						<input type="text" readonly="readonly" name="ttlrattte" style="text-align: right; font-weight: bold; border: 1px solid black" class="form-control tttltstrtval" aria-describedby="basic-addon3">
					</div><br><br><br>


					<div class="input-group" style="width: 300px; float: right;">
						<span style="font-weight: bold; color: black;" class="input-group-addon " id="basic-addon3">
							Discount
						</span>
						<input required="required" type="text" name="discnt" style="text-align: right; font-weight: bold; border: 1px solid black" class="form-control dscntamnt " aria-describedby="basic-addon3" value="0">
					</div><br><br><br>



					<div class="input-group" style="width: 300px; float: right;">
						<span style="font-weight: bold; color: black;" class="input-group-addon" id="basic-addon3">
							Received
						</span>
						<input required="required" type="text" name="ttlrcvamnt" style="text-align: right; font-weight: bold; border: 1px solid black" class="form-control  rcvtakkak " aria-describedby="basic-addon3">
					</div><br><br><br>

					<div style="width: 50%; float: left; margin-top: -150px" class="discntrfrs">
						
					</div>

					<div class="ttlrcvtakkatk" style="font-size: 25px; font-weight: bold; text-align: right;"></div>

					<br>

					<div class="input-group" style="width: 300px; float: right;">
						<span style="transform: rotate(290deg); position: absolute; margin: -80px 0 0 -220px; font-weight: bold; color: black; font-size: 35px;" class="input-group-addon pdtxtval" id="basic-addon3">
						</span>
<!--						<input type="text" name="ttldueamnt" style="text-align: right; font-weight: bold; border: 1px solid black" class="form-control " aria-describedby="basic-addon3">-->
					</div><br><br><br>  

					<div class="input-group rfrtxvl" style="width: 400px; float: right;">
					</div><br><br><br>




						<br><br><br><br>

					<button type="submit" class="btn btn-info sbmtbtn" style="font-size: 42px; font-weight: bold;">Submit</button>

				</form>
			</center>



      <!--       <h1 style="transform: rotate(290deg); position: absolute; margin: -300px 0 0 -90px; font-family: solaimanlipi;"> Enter চাপ দিবেন না।</h1>
 -->







        </section>
    </section>
</section>




<script type="text/javascript">

var ttltstamnt;
var dscnttakka;
var sum_t = 0;
var rcvamnttaka;
var dscntprsntg;

var optionaldr = '<div class="optdrassd"><div class="input-group"><span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">Doctor Name</span><input type="text" name="optdrname" required="required" class="form-control" placeholder="Type Doctor Name" aria-describedby="basic-addon3"></div><br><div class="input-group"><span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">Doctor Degree</span><input type="text" required="required" name="optdrdgre" class="form-control" placeholder="Type Doctor Degree" aria-describedby="basic-addon3"></div></div>';

var rfrtxtvl = '<div class="rfrbxtxt"><span style="font-weight: bold; color: black;" class="input-group-addon" id="basic-addon3"> Name of Reffer</span><input type="text"  required="required" name="hsprfrname" style="text-align: right; font-weight: bold; border: 1px solid black" class="form-control " aria-describedby="basic-addon3"><span style="font-weight: bold; color: black;" class="input-group-addon" id="basic-addon3"> Mobile No </span><input type="text" required="required" name="ptnmblno" style="text-align: right; font-weight: bold; border: 1px solid black" class="form-control " aria-describedby="basic-addon3"></div>';

var discntrfr = '<div class="duerfrtxt"><span style="font-weight: bold; color: black;" class="input-group-addon" id="basic-addon3"> Discount Reffer Name </span><input type="text" required="required" name="discntrfstxs" style=" font-weight: bold; border: 2px solid black" class="form-control " aria-describedby="basic-addon3"></div>'; 

	function tstttlval() {
		var sum_tss = 0;
        $('.tstrtval').each(function(){
            var bill_r = $(this).val();
        if (bill_r != 0) {
            sum_tss += parseInt(bill_r);
            }
        });
        $('.tttltstrtval').val(sum_tss);

	sum_t = sum_tss;

		$('.ttlrcvtakkatk').html(sum_t);

		rcvamnttaka = sum_t;
	}


tstttlval();


	function chngval() {
       $(document).on('change', '.tstiids', function(){
        var tstsiid = $(this).children("option:selected").val();
        var rrratte = 0;
        var tsttp = 0;

			$.ajax({
	            url: "labrcv/testbill?tstiid=" + tstsiid, 
	            method: 'GET',
	            data: '',
	            dataType: 'json',
	            async: false,
	            success: function(tstinf){ 
	            	rrratte   = tstinf.tstinfo.rate;
	            }
	        })


	        $(this).parents('.apndBox').find('.tstrate').val(rrratte);
			tstttlval();



		})
	}



chngval();










	$('.plusAddBtn').click(function() {

		var nwtst = "<div class='input-group apndBox' style='margin-top: 10px;'><span style='font-weight: bold; color: black;' class='input-group-addon lanr sp_dr_name' id='basic-addon3'>Test ID / Name</span><div style='width: 55%; float: left;'><select class='form-control tstiids m-bot15 js-example-basic-single' id='tstiids' name='test_iiddd[]'><option value=''>Select......</option><?php foreach ($labtest as $tst) { ?> <option value='<?php echo $tst->tst_inv_id; ?>'><?php echo $tst->inv_name; ?></option> <?php } ?></select></div><input type='text' name='testtakk[]' readonly='readonly' class='form-control tstrate tstrtval' style='width: 20%; float: left; text-align: right;' value='0'><div class='' style='width: 90px; float: right;'><img style='cursor: pointer; float: right;' class='dltBtnS' width='40px' height='40px' src='uploads/delete.png'></div></div>";

		$('.testDivFull').append(nwtst); 
		chngval();

        $(".js-example-basic-single").select2();

	})


	$("body").on("click",".dltBtnS",function(e){
	       $(this).parents('.apndBox').remove();
			tstttlval();
	  });


	$('.dscntamnt').keyup(function() {
		dscnttakka = $('.dscntamnt').val();
		rcvamnttaka = sum_t - dscnttakka;
		if (rcvamnttaka < 0 ) {
			alert('Hei Check Again and Again');
		}else {
			$('.ttlrcvtakkatk').html(rcvamnttaka); 
		}

		dscntprsntg = (sum_t * 20) / 100;
		if (dscnttakka > dscntprsntg) {
			$('.discntrfrs').html(discntrfr);
		}else {
			$('.duerfrtxt').remove();
		}



	});


	$('.rcvtakkak').keyup(function() {
		dscnttakka = $('.rcvtakkak').val();		
		obosisto = rcvamnttaka - dscnttakka;
		if (obosisto < 0 ) {
			alert('Hei Check Again and Again');			
	  	$('.sbmtbtn').css('display', 'none');
		}else if (obosisto == 0) {
		$('.ttlrcvtakkatk').html(obosisto);
			$('.pdtxtval').html('Full Paid');		
	  	$('.sbmtbtn').css('display', 'block');
		$('.rfrbxtxt').remove();
		}else if (obosisto > 0) {
		$('.ttlrcvtakkatk').html(obosisto);
		$('.pdtxtval').html('Due '+ obosisto +' Taka');
		$('.rfrtxvl').html(rfrtxtvl);			
	  	$('.sbmtbtn').css('display', 'block');		
		}
	});


  $("form").submit(function(){
  	$('.sbmtbtn').attr('disabled', 'disabled');
  });


$('.dri_id').change(function() {
	var idval = $(this).val();
	if (idval == 99) {
		$('.optdrad').html(optionaldr);
	}else {
		$('.optdrassd').remove();
	}
});




$('#search_for_print').keyup(function() {
  var serch_type = $('#search_for_print').val();

      $.ajax({
          url: 'pathology/search_printID?id=' + serch_type,
          method: 'GET',
          data: '',
          dataType: 'json',
          success: function (lab_ptn) {

              var html = '';
              var n;
              var blank_text = '<a class="s_name_list">Please Type Ticket ID</a>';
              for (n = 0; n < lab_ptn.length; n++) {
                  html += '<a class="s_name_list" id="'+lab_ptn[n].lab_rgstr_iidd+'" onclick="open_win(this.id)">'+lab_ptn[n].labpnname+'</a>';
              }

              if (serch_type != '') {
                $('.assign_data').html(html);
              }else {
                  $('.assign_data').html(blank_text);
              }

          } 
      }) 
})




function open_win(clicked_id){
        var url = 'labrcv/print_memo?labrcvid='+clicked_id;     
      window.open(url, '_blank', 'height=800,width=800');
    }





</script>















