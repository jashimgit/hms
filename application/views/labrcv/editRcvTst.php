<style type="text/css">
    .button {
      padding: 10px 25px;
      font-size: 24px;
      text-align: center;
      outline: none;
      color: #fff;
      border: none;
      border-radius: 85px;
      box-shadow: 5px 9px #999;
      font-weight: bold; 
      font-size: 25px; 
      margin-top: 10px;
    }

    .reportPrintOpt {
        margin-top: 50px;
    }

    .button:hover {
        background-color: #FFFFFF;
        color: #000000;
        border: 2px solid black;
    }

    .button:active {
      box-shadow: 0 2px #666;
      transform: translateY(10px);
        color: #000000;
    }

    .ptnInfos {
        margin-top: 20px;
    }

    .drInfos {
        margin: 15px 0 0 0;
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
            </header>

            <div class="panel-body">
            	<center>
                    <div class="input-group" style="width: 50%;">
                        <span style="font-weight: bold; color: black;" class="input-group-addon lanr sp_dr_name" id="basic-addon3">
                            Patient ID
                        </span>
                        <input type="text" class="form-control typPTNID" placeholder="Type Patient ID" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>
                        <button type="button" class="btn button green search_btn_byid">SEARCH</button>
                    </center>
            </div><br>

            <div class="show_error"></div>




		</section>
	</section>
</section>





<script type="text/javascript">
	$('.typPTNID').keyup(function() {
		$('.show_error').html(' ');
	})

	$('.search_btn_byid').click(function() {
		var lab_ptn_idd = $('.typPTNID').val();
		if (lab_ptn_idd == '') {
			$('.show_error').html('<center><h2 style="color:red;font-weight:bold;"> Patient ID box is empty! Please Type Patient ID </h2></center>');
		}else {
			$.ajax({
				url: 'labrcv/getAllTstData',
				method: 'POST',
				data: {
					labPtnIIDD: lab_ptn_idd
				},
				dataType: 'text',
				success: function() {

				}
			})
		}
	})
</script>

