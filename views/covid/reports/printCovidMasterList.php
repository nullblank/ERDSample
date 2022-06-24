
  <div style="padding-top: 0px;" class="custom">
    <div style="padding-top: 0px;">
 	    <center><img src="<?php echo base_url();?>assets/images/cv19.jpg"   width="500px" height="60px"></center>				
    </div>
	    <table width="100%"> <!--class="table table-striped">	-->
			<tr>	
				<td style="font-size:14px;" align="center" width="100%">Covid Master List</td>			
							
			</tr>	
			<tr>	
							
				<td style="font-size:12px;"width="100%" align="center">Date [<?php echo date("m-d-Y") ;?>]</td>				
			</tr>			
		</table>
    <table border="1" >	
			
			<tr>
				<th width="7%">CID</th>
				<th width="11%">Name</th>
				<th width="12%">Symptoms</th>
												
			</tr>		
			<tbody>
			<?php if($covid):?>
				<?php foreach($covid as $c):?>
				<tr style="padding-bottom: .5em;">
					<td><?php echo $c->c_id;?></td>
					<td><?php echo $c->c_name;?></td>
					<td><?php echo $c->c_symptom;?></td>																																						
				</tr>
			<?php endforeach;?>			 
			</tbody>			  
            <?php else:?>
				<p style="color:red;">No Covid Recod Available...</p>
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