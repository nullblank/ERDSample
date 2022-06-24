
  <div style="padding-top: 0px;" class="custom">
    <div style="padding-top: 0px;">
 	    <center><img src="<?php echo base_url();?>assets/images/cv19.jpg"   width="500px" height="60px"></center>				
    </div>
	    <table width="100%"> <!--class="table table-striped">	-->
			<tr>	
				<td style="font-size:14px;" align="center" width="100%">Patient Master List</td>			
							
			</tr>	
			<tr>	
							
				<td style="font-size:12px;"width="100%" align="center">Date [<?php echo date("m-d-Y") ;?>]</td>				
			</tr>			
		</table>
    <table border="1" >	
			
			<tr>
				<th width="7%">PID</th>
				<th width="11%">LastName</th>
				<th width="12%">FirstName</th>
				<th width="10%">MiddleName</th>
				<th style="text-align:center" width="3%">Gender</th>
				
				<th width="8%">BirhtDay</th>				
				<th width="10%">Age</th>
						
				<th width="33%">Address</th>	
												
			</tr>		
			<tbody>
			<?php if($patient):?>
				<?php foreach($patient as $p):?>
				<tr style="padding-bottom: .5em;">
					<td><?php echo $p->pid;?></td>
					<td><?php echo $p->p_last;?></td>
					<td><?php echo $p->p_first;?></td>									
					<td><?php echo $p->p_mi;?></td>
					<td align="center"><?php echo substr($p->p_gender,0,1);?></td>					
					<td><?php echo $p->p_bday;?></td>
					<td><?php echo $p->p_age;?></td>									
					<td><?php echo $p->p_brgy.', '.$p->p_municipality.', '.$p->p_province;?></td>																																
				</tr>
			<?php endforeach;?>			 
			</tbody>			  
            <?php else:?>
				<p style="color:red;">No Patient Recod Available...</p>
            <?php endif?>
			
    </table>
	<br><br>	
	
	<table width = "100%">
		<tr>
		    
			<td style="font-size:16px;" width="100%"><?php echo $user->user_name;?></td>			
		</tr>
		<tr>
		    
			<td><?php echo $user->user_role;?></td>
		</tr>
	</table>
	
	
	<br><br>
	<br><br>
	<center>
		<p>Copyright @2019 | The CovidERP System | All Rights Reserved.</p>
	</center>
</div>	

<style type="text/css">
.custom {
	font-family: ArialNarrow;
	font-size:12px;
}
</style>

<script type="text/javascript">
    $(document).ready(function(){
        window.print();
    })
    window.onafterprint = function() {
        history.go(-1);
    };
</script>