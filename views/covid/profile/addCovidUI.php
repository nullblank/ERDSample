<!--Display form validation errors-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
        	<h1 class="page-header">Add Covid Record</h1> 
		</div>
		<div class="col-lg-6"> </div>
	</div><!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
		  		<li><a href="<?php echo base_url(); ?>covid/PatientDashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  		<li><a href="<?php echo base_url(); ?>covid/profile"><i class="fa fa-user"></i> Manage Patient Profile</a></li>
				<li class="active"><i class="fa fa-plus-square-o"></i> Add Covid Record</li>
			</ol>
		</div>  
	</div><!-- /.row -->
    <h4 style="color:blue"  class="page-header" style="border-bottom: 1px solid #004d0029">Covid Information</h4> 	
	<div class="row">
		<div class="col-lg-12">
		<!--
		<div class="alert alert-danger print-error-msg" style="display:none"> </div>
        <?php echo validation_errors(); ?>
		-->
		
			<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>covid/profile/add" onsubmit="return checkForm(this);">
				<!--<div style="color:red;"><?php echo form_error('pid'); ?></div>	-->		
				<div class="form-group col-md-3">
					<label>Covid ID</label>
					<input style="font-size:16px;" class="form-control" id="c_id" type="text" name="c_id" value="<?php echo set_value('pic'); ?>"  autocomplete="off" autofocus/>
					<span style="color:red;"><?php echo form_error('c_id');?></span> 
				</div>
				
				<!--<div style="color:red;"><?php echo form_error('c_name'); ?></div>-->
				<div class="form-group col-md-3">
					<label>Name</label>
					<input style="font-size:16px;" class="form-control" type="text" name="c_name" value="<?php echo set_value('c_name'); ?>" placeholder="Covid Name" />
					<span style="color:red;"><?php echo form_error('p_last');?></span> 
				</div>						
				<div style="color:red;"><?php echo form_error('c_symptom'); ?></div>
				<div class="form-group col-md-3">
					<label>Symptom</label>		
					<input style="font-size:16px;" class="form-control" type="text" name="c_symptom" value="<?php echo set_value('p_mi'); ?>"placeholder="Covid Symptom"  />					
				</div>	
														
				<?php if($this->session->flashdata('upload_error')):?>
							<?php echo'<p class="alert alert-danger">'.$this->session->flashdata('upload_error').'</p>';?>
				<?php endif; ?>		
				<div style="color:red;"><?php echo form_error('avatar'); ?></div>
						<div class="form-group col-md-12">
							<label>Photo</label>
							<!--<p style="font-size:12px;">Note: The photo size must not be greater than 1 mb.</p>-->
							<input class="form-control" type="file" name="photo" size="1000" value="<?php echo set_value('avatar'); ?>">
				</div>											
				
				<br><br>

				<div class="form-group col-md-3">
				<input type="submit" name="submit" class="btn btn-primary" value="Submit" />
						<a href="<?php echo base_url(); ?>covid/profile" class="btn btn-danger"><i class="fa fa-window-close"></i>Close</a>
				</div>
				</div>
				</div>				
				</form>
			</div>
		</div><!-- /.row -->
	</div>
	<script type="text/javascript">
	function checkForm(form)
	{
		form.submit.disabled = true;
		return true;
		
		
	}
	$(document).keypress(
	function(event){
		if (event.which == '13') {
		event.preventDefault();
		}
	}); 
	</script>