
  <div id="navbar" class="container-fluid">
	<div id="sd">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar" style="text-transform: uppercase;font-size: 10.5px;font-weight: 500;">
			
			<li class="<?php if ($this->uri->segment(2)=="PatientDashboard"){echo "active";}?>">
			<a href="<?php echo base_url();?>patient/PatientDashboard"><i class="fa fa-dashboard" style="font-size:15px;width:21px;">&nbsp;</i> Dashboard <span class="sr-only">(current)</span></a></li>

            <li class="<?php if ($this->uri->segment(2)=="profile"){echo "active";}?>">
			<a href="<?php echo base_url();?>patient/profile"><i class="fa fa-address-card-o" style="font-size:15px;width:21px;" >&nbsp;</i>Profle<span class="sr-only"></span></a></li>
 						
			<li class="<?php if ($this->uri->segment(2)=="report"){echo "active";}?>">
			<a href="<?php echo base_url();?>patient/reports"><i class="fa fa-calendar-check-o" style="width:21px;font-size:15px">&nbsp;</i>Reports</a></li>
				
			<?php if($user->user_role =='Administrator'):?>			
				<li class="<?php if ($this->uri->segment(2)=="AdminDashboard"){echo "active";}?>">
				<a href="<?php echo base_url();?>admin/AdminDashboard"><i class="fa fa-home" style="width:21px;font-size:15px;">&nbsp;</i> Home</a></li>
			<?php endif ?>				
			
          </ul>
        </div>
        </div>
      </div>
	 </div>
