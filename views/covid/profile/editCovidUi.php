<!--Display form validation errors-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
        	<h1 class="page-header">Edit Covid Record</h1> 
		</div>
		<div class="col-lg-6"> </div>
	</div><!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
		  		<li><a href="<?php echo base_url(); ?>covid/CovidDashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  		<li><a href="<?php echo base_url(); ?>covid/profile"><i class="fa fa-user"></i> Manage Covid Profile</a></li>
				<li class="active"><i class="fa fa-plus-square-o"></i> Edit Covid Record</li>
			</ol>
		</div>  
	</div><!-- /.row -->
    <h4 style="color:blue" class="page-header" style="border-bottom: 1px solid #004d0029">Covid Information</h4> 
	<div class="row">
		<div class="col-lg-12">
			<form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>covid/profile/edit/<?php echo $covid->c_id;?>" onsubmit="return checkForm(this);">								
	
				<div style="color:red;"><?php echo form_error('c_id'); ?></div>
				
				<div class="form-group col-md-3">
					<label>CovidID</label>
					<input style="font-size:16px;" class="form-control" id="c_id" type="text" name="c_id" value="<?php echo $covid->c_id; ?>" placeholder="Covid ID" autocomplete="off" autofocus/>
				</div>
				
				<div style="color:red;"><?php echo form_error('c_name'); ?></div>
				<div class="form-group col-md-3">
					<label>Name</label>
					<input style="font-size:16px;" class="form-control" type="text" name="c_name" value="<?php echo $covid->c_name; ?>" placeholder="Covid Name" />
				</div>						
				<div style="color:red;"><?php echo form_error('c_symptom'); ?></div>
				<div class="form-group col-md-3">
					<label>Symptom</label>
					<input style="font-size:16px;" class="form-control" type="text" name="c_symptom" value="<?php echo $covid->c_symptom; ?>" placeholder="Covid Symptoms" />
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








	
							
				<input type="submit" name="submit" class="btn btn-primary" value="Update" />
						<!--<a href="<?php echo base_url(); ?>registrar/student/search2/<?php echo $student->studno; ?>" class="btn btn-danger">Close</a>-->
						<a href="<?php echo base_url(); ?>covid/profile/showCovid/<?php echo $covid->c_id; ?>" class="btn btn-danger">Close</a>

						</div>
				</div>									
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	 function checkForm(form)
	 {		
		form.submit.disabled = true;
		return true;
	}
	</script>