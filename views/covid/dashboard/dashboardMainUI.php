<?php //header('Refresh: 10'); ?>
<!--
  <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/boostrap/css/bootstrap.min.css" rel="stylesheet">
-->
<style>
th {
  cursor: pointer;
}
table {
 
  border: 1px solid #C5B798;
  margin-top: 0px;
  margin-bottom: 2px;
}
</style>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Covid Dashboard</h1>
	<br>
		
	<!--Start Table -->
	<h4 style="color:blue"  class="page-header" style="border-bottom: 1px solid #004d0029">Distribution of Patient - Gender</h4> 		

	<table align="left" width="100%">
		<tr>
			<td width="50%" align="left">				
				<div  id="gender_chart" style="width: 500px; height: 300px;"></div>					
			</td>
			<td width="50%">			
			<!--<label>Distribution of Total Enrolment by Gender</label>-->
			<table align="left"  width="100%" border="1" class="sortable">		
              <thead>			   				
                <tr>				    
                    <th bgcolor="#F2D7D5"style="font-size:20px;" width="70%">Gender</th>
					<th bgcolor="#F2D7D5"style="font-size:20px;" class="text-center" width="20%">Total</th>	
					<th bgcolor="#F2D7D5"style="font-size:20px;" class="text-center" width="10%">%</th>	
							
                </tr>
              </thead>
              <tbody>
             <?php if($genders):?>	
				    <?php $tPercent=0;?>
                    <?php foreach($genders as $gender):?>
                    <tr style="padding:0px;LINE-HEIGHT:30px">	                   				
                          <td style="font-size:20px;" width="70%"><?php echo $gender->Gender;?></td>
						  <td style="font-size:20px;" align="center" width="20%"><?php echo $gender->Total;?></td>	
						  <td style="font-size:20px;" align="center" width="10%"><?php echo number_format(($gender->Total/$totalPatient->total)*100,0);?></td>	
						  <?php $tPercent = $tPercent + ($gender->Total/$totalPatient->total)*100;?>
					</tr>
					<?php endforeach;?>	
				
                </tbody>				
				<table  width="100%" border="1" >
				<tr>			             				
                    <td style="font-size:20px;" width="70%">Total</td>
					<td style="font-size:20px;" align="center" width="20%"><?php echo $totalPatient->total;?></td>					  						  						  						  						
					<td style="font-size:20px;" align="center" width="10%"><?php echo number_format($tPercent,0);?></td>					  						  						  						  						
					</tr>										
				</table>
                <?php else:?>
					<p style="color:red;">No Gender Available.</p>
                <?php endif?>
			    </table>				
		</td>		
		</tr>
		</table><br>
	
		<div align ="right">
		    <a href="<?php echo base_url(); ?>covid/reports/print_gender" class="btn btn-primary btn-sm" title="Print"><i class="fa fa-print"></i>Print</a>
		    
		<br>
		<br>


<!--Gender -->	
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {      
        var data = google.visualization.arrayToDataTable([
          ['Gender', 'Total'],		
		  <?php foreach($genders as $gender):?>			
				
				<?php echo "['".$gender->Gender."',".$gender->Total."],"?>	
		   <?php endforeach;?>		            
        ]);
        var options = { title: ''};
        var chart = new google.visualization.BarChart(document.getElementById('gender_chart'));
        chart.draw(data, options);
      }
</script>