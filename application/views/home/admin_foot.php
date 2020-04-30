
				</div>	
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
	



		<!-- Loader Spinner -->
	<div class="modal fade" id="spin_loader" aria-hidden="true" role="dialog">
    	<div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-body">
				<div class="loader"></div> 
			</div>
		</div>
	</div>
		<!-- Loader Spinner -->








	<script type="text/javascript">
	    <?php if ($this->session->flashdata('success')) {?>
	        toastr.success("<?php echo $this->session->flashdata('success'); ?>", "Success");
	    <?php } else if ($this->session->flashdata('error')) {?>
	        toastr.error("<?php echo $this->session->flashdata('error'); ?>", "Error");
	    <?php } else if ($this->session->flashdata('warning')) {?>
	        toastr.warning("<?php echo $this->session->flashdata('warning'); ?>", "Deleted");
	    <?php } else if ($this->session->flashdata('info')) {?>
	        toastr.info("<?php echo $this->session->flashdata('info'); ?>", "Info");
	    <?php }?>
	</script>