<!--Main Body-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Manage Covid Profile</h1>
      <?php if($this->session->flashdata('covid_saved')):?>
      <?php echo'<p class="alert alert-success">'.$this->session->flashdata('covid_saved').'</p>';?>
      <?php endif; ?>
      <?php if($this->session->flashdata('covid_edit')):?>
      <?php echo'<p class="alert alert-success">'.$this->session->flashdata('covid_edit').'</p>';?>
      <?php endif; ?>	  	  	  
      <?php if($this->session->flashdata('upload_error')):?>
      <?php echo'<p class="alert alert-success">'.$this->session->flashdata('upload_error').'</p>';?>
      <?php endif; ?>
      
      <table>
        <tr><h3 class="sub-header">Covid Master List</h3></tr>
		
        <tr>
           <td> 
              <a href="<?php echo base_url(); ?>covid/profile/add" class="btn btn-primary btn-sm" title="Store Covid Information"><i class="fa fa-plus"></i> Covid</a>
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
				<form class="form-inline" method="post" role="form" action="<?php echo base_url(); ?>covid/profile/search">
				<div class="form-group">
                  <input name="searchKey" id="searchKey" type="text" placeholder="Search Covid Record" class="form-control" style="width:250px;"/>
				</div>  
				</td>
  
  
          <td> 
              <a href="<?php echo base_url(); ?>covid/profile" class="btn btn-primary btn-sm" title="Reload All Student Records"><i class="fa fa-refresh"></i> Refresh</a>
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
					<th style="font-size:16px;color:red">CID</th>
	     
					<th style="font-size:16px;color:red">Covid Name</th>
                    <th style="font-size:16px;color:red">Symptom</th>
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
              <?php if($covids):?>
			  
                    <?php foreach($covids as $covid):?>
                    <tr>
                       
                          <?php if($covid->c_photo == null):?>
                              <td><img class="media-object img-circle" src="<?php echo base_url();?>photos/user.png" width="30" height="30" /></td>                                        
                          <?php elseif($covid->c_photo):?>  			  
                              <td><img class="media-object img-circle" src="<?php echo base_url();?>photos/<?php echo $covid->p_photo;?>" width="30" height="30" /></td>    								  
                          <?php endif;?>
						  
                          <td style="font-size:16px;"><?php echo $covid->c_id;?></td>
						  <td style="font-size:16px;"><?php echo $covid->c_name;?></td>
						  <td style="font-size:16px;"><?php echo $covid->c_symptom;?></td>		
                         <td> 
                            <a href="<?php echo base_url();?>covid/profile/edit/<?php echo $covid->c_id;?>" class="btn btn-primary btn-sm" title="Modify and Update Student Records"><i class="fa fa-edit"></i> Edit</a>
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
