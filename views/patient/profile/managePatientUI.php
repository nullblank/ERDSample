<!--Main Body-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Manage Patient Profile</h1>
      <?php if($this->session->flashdata('patient_saved')):?>
      <?php echo'<p class="alert alert-success">'.$this->session->flashdata('patient_saved').'</p>';?>
      <?php endif; ?>
      <?php if($this->session->flashdata('patient_edit')):?>
      <?php echo'<p class="alert alert-success">'.$this->session->flashdata('patient_edit').'</p>';?>
      <?php endif; ?>	  	  	  
      <?php if($this->session->flashdata('upload_error')):?>
      <?php echo'<p class="alert alert-success">'.$this->session->flashdata('upload_error').'</p>';?>
      <?php endif; ?>
      
      <table>
        <tr><h3 class="sub-header">Patient Master List</h3></tr>
		
        <tr>
           <td> 
              <a href="<?php echo base_url(); ?>patient/profile/add" class="btn btn-primary btn-sm" title="Store Patient Information"><i class="fa fa-plus"></i> Patient</a>
           </td>
		   <!--
           <td> Search by </td>
		   -->
				<td>            
				<form class="form-inline"><!-- method="post" role="form"  action="<?php echo base_url(); ?>registrar/student/search1" >-->
				<!--<form class="form-inline" method="post" role="form" action="<?php echo base_url(); ?>registrar/SearchAjax/ajaxRFID" >-->
					<!--			
				<div class="form-group">
						<input name="search" id="search" type="text" placeholder="Type Lastname" autofocus autocomplete="off" class="form-control" style="width:250px;"/>
						<!--
						<input name="stud_id" id="stud_id" type="hidden" value="<?php echo $studID; ?>"placeholder="Type Lastname"  class="form-control" style="width:250px;"/>
						
					</div>  -->												
			</form>
				</td>	
			<!--	
           <td>
               <form class="form-inline" id = "s" method="post" role="form" action="<?php echo base_url(); ?>registrar/student/search">
                  
               </form>  
				</td>	
				
  -->
			<td>             
				<form class="form-inline" method="post" role="form" action="<?php echo base_url(); ?>patient/profile/search">
				<div class="form-group">
                  <input name="searchKey" id="searchKey" type="text" placeholder="Search Patient Record" class="form-control" style="width:250px;"/>
				</div>  
				</td>
  
  
          <td> 
              <a href="<?php echo base_url(); ?>patient/profile" class="btn btn-primary btn-sm" title="Reload All Student Records"><i class="fa fa-refresh"></i> Refresh</a>
          </td>
        </tr>
      </table>     
	  <br>	  
	  
      <div class="table-responsive">
            <!--<table class="table table-striped">-->
			
			<table class="table table-striped table-hover;sortable">
              <thead>
                <tr>
                    <!--<th>#</th>                  -->
                    <th style="font-size:16px;color:red">Photo</th>
					<th style="font-size:16px;color:red">PID</th>
	     
					<th style="font-size:16px;color:red">LastName</th>
					<!--th>LRN</th>-->
					<th style="font-size:16px;color:red">FirstName</th>
					<th style="font-size:16px;color:red">MI</th>   
					<th style="font-size:16px;color:red">Bday</th>	
                    <!--<th style="font-size:16px;color:red">Grade/Section</th>-->
                    <th style="font-size:16px;color:red">Age</th>
					<!--
                    <th>MobileNo</th>
					-->
					<!--
					<th>Status</th>
					-->
					<th style="font-size:16px;color:red">Action</th>					
                </tr>
              </thead>
			  <tbody id="result"></tbody>
            
			<tbody >
              <?php if($patients):?>
			  
                    <?php foreach($patients as $patient):?>
                    <tr>
                       
                          <?php if($patient->p_photo == null):?>
                              <td><img class="media-object img-circle" src="<?php echo base_url();?>photos/user.png" width="30" height="30" /></td>                                        
                          <?php elseif($patient->p_photo):?>  			  
                              <td><img class="media-object img-circle" src="<?php echo base_url();?>photos/<?php echo $patient->p_photo;?>" width="30" height="30" /></td>    								  
                          <?php endif;?>
						  
                          <td style="font-size:16px;"><?php echo $patient->pid;?></td>
						 
						  <td style="font-size:16px;"><?php echo $patient->p_last;?></td>
                          <td style="font-size:16px;"><?php echo $patient->p_first;?></td>
						  <td style="font-size:16px;"><?php echo $patient->p_mi;?></td>
						   <td style="font-size:16px;"><?php echo $patient->p_bday;?></td>
						 
                          <td style="font-size:16px;"><?php echo $patient->p_age;?></td>
					
                         <td> 
                            <a href="<?php echo base_url();?>patient/profile/edit/<?php echo $patient->pid;?>" class="btn btn-primary btn-sm" title="Modify and Update Student Records"><i class="fa fa-edit"></i> Edit</a>
                         </td>
                      </tr>  
                 <?php endforeach;?>
				
        </tbody>
		
        <?php else:?>
            <p style="color:red;">No Student Record Found.</p>
        <?php endif?>
		
      </table>
	 
    <!--<?php echo $links ?>-->
    </div>
</div>

 <style type="text/css">
.custom {
	font-family: ArialNarrow;
	font-size:12px;
}
.mt {
	margin-top:0px;
}
</style>
