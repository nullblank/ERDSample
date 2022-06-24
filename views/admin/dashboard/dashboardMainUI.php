  <?php //header('Refresh: 10'); ?>

<div  class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Welcome...</h1>
	<br>
	<center><img src="<?php echo base_url();?>assets/images/cv19.jpg" alt="The eGatePass Logo"  width="960px" height="380px"></center>				
	<br>
	<h4 style="color:blue" class="page-header" style="border-bottom: 1px solid #004d0029">Vision</h4> 	
	<div class="row">
        <div class="col-sm-12">                 
			<style>  p {  text-indent: 3.0em;  }  </style>  
			<p style="font-size:18px;" align = "justify">To be a Centre of Excellence for regional cooperation and specialized service delivery to Member States for Disaster Risk Reduction, Response and Recovery for Sustainable Development. </p>
        </div>
    </div>	
	<br>
	<h4 style="color:blue" class="page-header" style="border-bottom: 1px solid #004d0029">Mission</h4> 		
  <div class="row">
    <div class="col-sm-12">                 
      <style>  p {  text-indent: 3.0em;  }  </style>  
      <p style="font-size:18px;" align = "justify">To support Member States in their DRR initiatives through application of Science & Technology, Knowledge from Multiple Disciplines, Exchange of Good Practices, Capacity Development, Collaborative Research and Networking in line with the Global Priorities and Goals and other relevant Frameworks adopted by Member States. </p>
    </div>
  </div>	

<script src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
 	
	
	
	
	<!--
	<div class="col-sm-12">
	 <h3 class="sub-header">Notice Board</h3>
		<center>
			<div id="erp_user_roles" style="width: 550px; height: 200px;"></div>
		</center>	
	</div>	
	
	-->
	
	
	
	
	
	
	<!--
	
	<div>		
		<h3 class="sub-header">Summary of Enrollees by Year Section</h3>
		<center>
			<div id="piechart_total" style="width: 1200px; height: 700px;"></div>
		</center>
	</div>	
	<br><br>
	-->
	<!--<div class="col-lg-6">-->
	<!--
	<div>
          <h3 class="sub-header">Summary of Attendance Report Today</h3>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th rowspan = 2>Section</th>
                  <th rowspan = 2>Total GateLogs</th>
                  <th colspan = 3>Male</th>				  				  				  
				  <th colspan = 3>Female</th>				  				  				  
                </tr>
				<tr>
				  <th>Present</th>
                  <th>Late</th>
                  <th>Absent</th>
		          <th>Present</th>
                  <th>Late</th>
                  <th>Absent</th>
				</tr>
              </thead>
              <tbody>
                <?php foreach($absences_today as $absent):?>
                  <tr>
                    <td width="20%"><?php echo $absent->section;?></td>
                    <td width="10%" align="center"><?php echo $absent->Total;?></td>   
	                <td width="10%" align="center"><?php echo $absent->MalePresent;?></td>
                    <td width="10%" align="center"><?php echo $absent->MaleLate;?></td>   
	                <td width="10%" align="center"> <?php echo $absent->MaleAbsent;?></td>   
	                <td width="10%" align="center"><?php echo $absent->FemalePresent;?></td>
                    <td width="10%" align="center"><?php echo $absent->FemaleLate;?></td>   
	                <td width="10%" align="center"><?php echo $absent->FemaleAbsent;?></td>   				
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
        </div>
	</div>
	
	<br>
	<div>
	<center>
		<div id="barchart_today" style="width: 750px; height: 400px;"></div>
	</center>	
	<br>
	</div>
	-->
	<!--<div class="col-lg-6">-->
	<!--
	<div>
        <h3 class="sub-header">Summary of Attendance Report OverAll</h3>
        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
			     <tr>
                  <th rowspan = 2>Section</th>
                  <th rowspan = 2>Total GateLogs</th>
                  <th colspan = 3>Male</th>				  				  				  
				  <th colspan = 3>Female</th>				  				  				  
                </tr>
                <tr>
                  <th>Present</th>
                  <th>Late</th>
                  <th>Absent</th>
		          <th>Present</th>
                  <th>Late</th>
                  <th>Absent</th>				  				  				  
                </tr>
              </thead>
              <tbody>
                <?php foreach($absences_overall as $absent):?>
                  <tr>
                    <td width="20%"><?php echo $absent->section;?></td>
                    <td width="10%" align="center"><?php echo $absent->Total;?></td>   
	                <td width="10%" align="center"><?php echo $absent->MalePresent;?></td>
                    <td width="10%" align="center"><?php echo $absent->MaleLate;?></td>   
	                <td width="10%" align="center"><?php echo $absent->MaleAbsent;?></td>   
	                <td width="10%" align="center"><?php echo $absent->FemalePresent;?></td>
                    <td width="10%" align="center"><?php echo $absent->FemaleLate;?></td>   
	                <td width="10%" align="center"><?php echo $absent->FemaleAbsent;?></td>   				
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
		
        </div>	
			<center>
				<div id="barchart_overall" style="width: 750px; height: 400px;"></div>
			</center>
		</div>
	</div>
		
		
	-->
		

			
<!-- 
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {      
        var data = google.visualization.arrayToDataTable([
          ['Section', 'Total','MalePresent','MaleLate','MaleAbsent','FemalePresent',
		  'FemaleLate','FemaleAbsent'],		
		  <?php foreach($absences_today as $absent):?>			
				
				<?php echo "['".$absent->section."',".$absent->Total.",
				".$absent->MalePresent.",".$absent->MaleLate.",".$absent->MaleAbsent.",
				".$absent->FemalePresent.",".$absent->FemaleLate.",".$absent->FemaleAbsent."],"?>	
		   <?php endforeach;?>		            
        ]);
        var options = { title: 'Summary of Absences Report Today'};
        var chart = new google.visualization.BarChart(document.getElementById('barchart_today'));
        chart.draw(data, options);
      }
</script>
	    
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {     
        var data = google.visualization.arrayToDataTable([
          ['Section', 'Total','MalePresent','MaleLate','MaleAbsent','FemalePresent',
		  'FemaleLate','FemaleAbsent'],		
		  <?php foreach($absences_overall as $absent):?>							
				<?php echo "['".$absent->section."',".$absent->Total.",
				".$absent->MalePresent.",".$absent->MaleLate.",".$absent->MaleAbsent.",
				".$absent->FemalePresent.",".$absent->FemaleLate.",".$absent->FemaleAbsent."],"?>		
		   <?php endforeach;?>		            
        ]);
        var options = {title: 'Summary of Absences Report Overall'};
        var chart = new google.visualization.BarChart(document.getElementById('barchart_overall'));
        chart.draw(data, options);
      }
</script>
	
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {     
        var data = google.visualization.arrayToDataTable([
          ['Section', 'Total'],
			<?php foreach($total_pupils as $absent):?>							
				<?php echo "['".$absent->section."',".$absent->total."],"?>							
		   <?php endforeach;?>  
        ]);
        var options = { title: 'Summary of Total Pupils by Year/Section', pieHole: 0.4,};
        var chart = new google.visualization.PieChart(document.getElementById('piechart_total'));
        chart.draw(data, options);
      }
</script>
	
	-->
	
	