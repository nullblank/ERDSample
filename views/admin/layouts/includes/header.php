<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/cvlogo.png" type="image/png">
	<title>The CovidERP System | CovidERP Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/admin/bootstrap.css" rel="stylesheet">	
    <!-- Bootstrap Dashboard-->
    <link href="<?php echo base_url();?>assets/css/admin/dashboard.css" rel="stylesheet">
	<!--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
	-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome-master/css/font-awesome.min.css">    

 <!-- Autocomplete words for textarea -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/js/admin/autocomplete/easy-autocomplete.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/js/admin/autocomplete/easy-autocomplete.themes.min.css">
    <link href="<?php echo base_url();?>assets/admin/jquery-ui.css" rel="stylesheet" type="text/css">   
	<!-- JQuery -->
    <script src="<?php echo base_url();?>assets/js/admin/list.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/loader.js"></script>  
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>       
   <style>
     .scrollable-menu { height: auto;  max-height: 200px; overflow-x: hidden;width:50%;}
    </style>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background:url(<?php echo base_url();?>assets/images/cv19.jpg) fixed ; background-size:cover;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="sidebar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">The CovidERP System | CovidERP Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
                <li style="position: relative;display: inline-block;z-index:999;" class="nav-item dropdown">      
                  <li style="position: relative;display: inline-block;" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" 
                       style="font-size: 12px;text-transform: none;font-weight: 500;letter-spacing: .5px;">
                       <span class="fa fa-user" style="color:#fff;"></span>&nbsp;&nbsp;<span style="color:#fff;">User:&nbsp;<?php echo $user->user_name;?></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="width: 200px;margin-top: -10px;">                                               
                        <li style="font-size:13px;margin-bottom: 5px;"><a href="<?php echo base_url();?>logout" style="color:rgba(0, 0, 0, 0.72);"s><i class="fa fa-sign-out" style="color:#004d00;">&nbsp;</i>Logout</a></li>
                    </ul>
                  </li>            
            </ul>
        </div>
      </div>
   </nav>