<!--Display form validation errors-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
        	<h1 class="page-header">Edit Patient Record</h1> 
		</div>
		<div class="col-lg-6"> </div>
	</div><!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
		  		<li><a href="<?php echo base_url(); ?>patient/PatientDashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  		<li><a href="<?php echo base_url(); ?>patient/profile"><i class="fa fa-user"></i> Manage Patient Profile</a></li>
				<li class="active"><i class="fa fa-plus-square-o"></i> Edit Patient Record</li>
			</ol>
		</div>  
	</div><!-- /.row -->
    <h4 style="color:blue" class="page-header" style="border-bottom: 1px solid #004d0029">Patient Information</h4> 
	<div class="row">
		<div class="col-lg-12">
			<form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>patient/profile/edit/<?php echo $patient->pid;?>" onsubmit="return checkForm(this);">								
	
				<div style="color:red;"><?php echo form_error('pid'); ?></div>
				
				<div class="form-group col-md-3">
					<label>PatientID</label>
					<input style="font-size:16px;" class="form-control" id="pid" type="text" name="pid" value="<?php echo $patient->pid; ?>" placeholder="Patient ID" autocomplete="off" autofocus/>
				</div>
				
				<div style="color:red;"><?php echo form_error('p_last'); ?></div>
				<div class="form-group col-md-3">
					<label>Last Name</label>
					<input style="font-size:16px;" class="form-control" type="text" name="p_last" value="<?php echo $patient->p_last; ?>" placeholder="Patient Lastname" />
				</div>						
				<div style="color:red;"><?php echo form_error('p_first'); ?></div>
				<div class="form-group col-md-3">
					<label>First Name</label>
					<input style="font-size:16px;" class="form-control" type="text" name="p_first" value="<?php echo $patient->p_first; ?>" placeholder="Patient Firstname" />
				</div>	
				<div style="color:red;"><?php echo form_error('p_mi'); ?></div>
				<div class="form-group col-md-3">
					<label>MI</label>		
					<input style="font-size:16px;" class="form-control" type="text" name="p_mi" value="<?php echo $patient->p_mi; ?>"placeholder="Patient MI"  />					
				</div>	
					

			<div style="color:red;"><?php echo form_error('p_brgy'); ?></div>
                   <div class="form-group col-md-6">
                       <label>Barangay </label>                            
                            <select style="font-size:16px;"name="p_brgy" class="form-control" required>
								<option value="<?php echo $patient->p_brgy;?>"><?php echo $patient->p_brgy;?></option>
					
								<?php foreach($brgy as $b) : ?>
									<option value= "<?php echo $b->barangay;?>"><?php echo $b->barangay; ?></option>
								<?php endforeach; ?>                                   
                            </select>                        
                </div>  	
				 <div style="color:red;"><?php echo form_error('p_municipality'); ?></div>
                   <div class="form-group col-md-3">
                       <label>Municipality </label>                            
                            <select style="font-size:16px;"name="p_municipality" class="form-control" required>
							
								<option value="<?php echo $patient->p_municipality;?>"><?php echo $patient->p_municipality;?></option>

								<?php foreach($municipality as $m) : ?>
									<option value= "<?php echo $m->municipality;?>"><?php echo $m->municipality; ?></option>
								<?php endforeach; ?>                                   
                            </select>                        
                </div> 

				 <div style="color:red;"><?php echo form_error('p_province'); ?></div>
                   <div class="form-group col-md-3">
                       <label>Province </label>                            
                            <select style="font-size:16px;"name="p_province" class="form-control" required>
								<option value="<?php echo $patient->p_province;?>"><?php echo $patient->p_province;?></option>

								
								<?php foreach($province as $p) : ?>
									<option value= "<?php echo $p->province;?>"><?php echo $p->province; ?></option>
								<?php endforeach; ?>                                   
                            </select>                        
                </div>  		
					






					
							
				
            	<div style="color:red;"><?php echo form_error('p_gender'); ?></div>
                <div class="form-group col-md-3">
                    <label>Gender</label>                            
                    <select style="font-size:16px;"name="p_gender" class="form-control" required>
						
						<option value="<?php echo $patient->p_gender;?>"><?php echo $patient->p_gender;?></option>

                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>                        
                </div>                     		    	
        		
			    <div style="color:red;"><?php echo form_error('[_bday'); ?></div>
				<div class="form-group col-md-3">
					<label>BirthDate</label>
					<input style="font-size:16px;"class="form-control" type="date" name="p_bday" value="<?php echo $patient->p_bday; ?>" placeholder="Patient Birthdate"/>
				</div>	
				<div style="color:red;"><?php echo form_error('p_age'); ?></div>
				<div class="form-group col-md-3">
					<label>Age</label>
					<input style="font-size:16px;"class="form-control" type="text" name="p_age" value="<?php echo $patient->p_age; ?>" placeholder="Patient Age" />
				</div>	
				

				<div style="color:red;"><?php echo form_error('p_cpnumber'); ?></div>
				<div class="form-group col-md-3">
					<label>CP Number</label>
					<input style="font-size:16px;"class="form-control" type="text" name="p_cpnumber" value="<?php echo $patient->p_cpnumber; ?>" placeholder="Patient CP Number"/>
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
						<a href="<?php echo base_url(); ?>patient/profile/showPatient/<?php echo $patient->pid; ?>" class="btn btn-danger">Close</a>

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