 

	<!--Main Body-->
     <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Manage Covid Reports </h1>
		
		<h3 class="sub-header">Covid Report</h3>
		<div class="row">
            <div>
					<form class="form-inline" id="report" method="post" role="form" action="<?php echo base_url(); ?>covid/reports/print_report">
						<div class="form-group ">
						<select name="list" id="list" class="form-control" style="width: 250px";>
								<option value="0">--- Please Select Report ---</option>
								<option value="1">Covid Master List</option>
								<!--<option value="2">List of Male Covid</option>
								<option value="3">List of Female Covid</option>-->								
							</select>	
						</div>  
						
						
						
						<div class="form-group"> 				        		
							<a href="<?php echo base_url(); ?>covid/report" class="btn btn-primary"><i class="fa fa-refresh"></i>Refresh</a>
						</div>						
					</form>
					 
			</div>
		</div>
<!--		
<p style="text-align:center">Please select a seller to process the report.<br/>This window will close automatically within <span id="counter">10</span> second(s).</p>
-->
<script>
  var vList = document.getElementById("list");
  
  
  /*
  document.getElementById("sectionid").style.display="none";
  document.getElementById("teacherid").style.display="none";
  document.getElementById("requirements").style.display="none";
  document.getElementById("submitted").style.display="none";
  document.getElementById("grantee").style.display="none";

    
  localStorage.changed = 0;
  document.getElementById("sectionid").value = localStorage.changed; 
  document.getElementById("teacherid").value = localStorage.changed; 
  
  document.getElementById("list").value = localStorage.changed; 
  
  vGrantee.addEventListener("change",function() {
	  document.getElementById("report").submit()	
  })
  vSubmitted.addEventListener("change",function() {
	  document.getElementById("report").submit()	
  })  
  
  vRequirements.addEventListener("change",function() {
	if(vRequirements.value == '1' || vRequirements.value == '2' ) {
		document.getElementById("grantee").style.display="block";		
	}
 	if(vRequirements.value == '7' || vRequirements.value == '8' ||
	   vRequirements.value == '9' || vRequirements.value == '10' ||
	   vRequirements.value == '11' || vRequirements.value == '12' ||
	   vRequirements.value == '13') {
		document.getElementById("submitted").style.display="block";		
	}
	if(vRequirements.value == '3' || vRequirements.value == '4' ||
	   vRequirements.value == '5' || vRequirements.value == '6' ) {
		//document.getElementById("submitted").style.display="block";	
		document.getElementById("report").submit()		
	}	
	
   
   })
  
  */
  vList.addEventListener("change",function() {
	if( vList.value == "1"){
	   document.getElementById("report").submit()	  
	}
	if( vList.value == "2"){
	  document.getElementById("report").submit()	 	  
	}
	if( vList.value == "3"){
	  document.getElementById("report").submit()	 	  
	}	
  })
 
 
  
  document.getElementById("sectionid").addEventListener("change",function()
  {

     localStorage.changed = document.getElementById("list").value;
     document.getElementById("report").submit()
	 
  })
  
   document.getElementById("teacherid").addEventListener("change",function()
  {

     localStorage.changed = document.getElementById("list").value;
     document.getElementById("report").submit()
	 
  })
  
 </script>
 <!--
 <script type="text/javascript">
function countdown() {

    var i = document.getElementById('counter');

    i.innerHTML = parseInt(i.innerHTML)-1;

if (parseInt(i.innerHTML)<=0) {

 window.close();
  history.go(-1);

}

}

setInterval(function(){ countdown(); },1000);

</script>
-->