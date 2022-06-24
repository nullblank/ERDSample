
 <div > <!--class="table-responsive">-->
  
   
   
 	<center><img src="<?php echo base_url();?>assets/images/cv19.jpg"   width="500px" height="60px"></center>				
	<center>
 	
	<label>Distribution of Total Patient by Gender</label> 			
 
	</center>
	<!--Start Table -->
	<h4 style="color:blue"  class="page-header" style="border-bottom: 1px solid #004d0029">Distribution of Patient Data - Gender</h4> 		

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
					<p style="color:red;">No Patient Gender Available.</p>
                <?php endif?>
			    </table>				
		</td>		
		</tr>
		</table><br>
		<br><br><br>
	<!--hr style="color:blue"  class="page-header" style="border-bottom: 1px solid #004d0029">		-->
	 <hr style="border: 1px solid blue;" />
	<table width = "100%">
		<tr>		    
			<td style="font-size:16px;" width="100%"><?php echo $user->user_name;?></td>			
		</tr>
		<tr>		    
			<td><?php echo $user->user_role;?></td>
		</tr>
	</table>
	<center>
		<p>Copyright @2019 | The CovidERP System | All Rights Reserved.</p>
	</center>
</div>	

			
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
        var chart = new google.visualization.PieChart(document.getElementById('gender_chart'));
        chart.draw(data, options);
      }
</script>
	

<script type="text/javascript">
    $(document).ready(function(){
        window.print();
    })
    window.onafterprint = function() {
        history.go(-1);
    };
</script>