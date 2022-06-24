
<div id="navbar" class="container-fluid">
	<div id="sd">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar" style="text-transform: uppercase;font-size: 10.5px;font-weight: 500;">
			<li class="<?php if ($this->uri->segment(2)=="AdminDashboard"){echo "active";}?>">
			<a href="<?php echo base_url();?>admin/AdminDashboard"><i class="fa fa-dashboard" style="font-size:15px;width:21px;" >&nbsp;</i> Dashboard <span class="sr-only">(current)</span></a></li>
  			
			<li class="<?php if ($this->uri->segment(2)=="PatientDashboard"){echo "active";}?>">
			<a href="<?php echo base_url();?>patient/PatientDashboard" title ="Profile, Reports"><i class="fa fa-calculator" style="width:21px;font-size:15px;">&nbsp;</i>Patient</a></li>
			
			<li class="<?php if ($this->uri->segment(2)=="CovidDashboard"){echo "active";}?>">
			<a href="<?php echo base_url();?>covid/CovidDashboard" title="Variant, Reports"><i class="fa fa-user" style="width:21px;font-size:15px">&nbsp;</i> Covid</a></li>
			
			<li class="<?php if ($this->uri->segment(2)=="VaccinationDashboard"){echo "active";}?>">			
			<a href="<?php echo base_url();?>vaccination/VaccinationDashboard" title="Vacinne, Vaccination, Reports"><i class="fa fa-book" style="width:21px;font-size:15px">&nbsp;</i> Vaccination</a></li>		

			<li class="<?php if ($this->uri->segment(2)=="QuarantineDashboard"){echo "active";}?>">		
			<a href="<?php echo base_url();?>quarantine/QuarantineDashboard" title="Facilities, Quarantine, Reports"><i class="fa fa-newspaper-o" style="width:21px;font-size:15px;">&nbsp;</i> Quarantine</a></li>			

			<li class="<?php if ($this->uri->segment(2)=="AnalyticsDashboard"){echo "active";}?>">						
			<a href="<?php echo base_url();?>analytics/AnalyticsDashboard" title ="Patient, Covid, Vaccine, Quarantine"><i class="fa fa-calendar-check-o" style="width:21px;font-size:15px">&nbsp;</i>Analytics</a></li>

	
			<li class="<?php if ($this->uri->segment(2)=="SettingDashboard"){echo "active";}?>">
			<a href="<?php echo base_url();?>settings/SettingDashboard" title="ERP Users, AuditLogs"><i class="fa fa-cog" style="font-size:15px;width:21px;">&nbsp;</i>Settings</a></li>
         </ul>
       </div>
     </div>
   </div>
 </div>
