<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #2E3440;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
		text-decoration: none;
	}

	a:hover {
		color: #97310e;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
	}

	p {
		margin: 0 0 10px;
		padding:0;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div class="row">
    <div class="col s12 m6">
      <div class="card blue-grey darken-3">
        <div class="card-content white-text">
          <span class="card-title">Welcome to Diego's Workspace!</span>
          <p>Lol im just testing stuff out</p>
        </div>
      </div>
    </div>
  </div>


<div class="row">
	<div class="col s12 m12">
		<div class="card blue-grey darken-3">
			<div class="card-content white-text">
				<span class="card-title">Welcome to CodeIgniter!</span>
				<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>
				<p>If you would like to edit this page you'll find it located at:</p>
				<code>application/views/main_page.php</code>

				<p>The corresponding controller for this page is found at:</p>
				<code>application/controllers/Welcome.php</code>
				<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="userguide3/">User Guide</a>.</p>
			</div>
		</div>
	</div>
</div>

<!--EXPERMENTAL SHIT BELOW-->

<form class="col s12">
            <div class="row">
               <div class="input-field col s6">
                  <i class="material-icons prefix">account_circle</i>
                  <input placeholder="Username" value="Mahesh" id="name" type="text" class="active validate" required>
                  <label for="name">Username</label>
               </div>
               <div class="input-field col s6">
                  <label for="password">Password</label>
                  <input id="password" type="password" placeholder="Password" class="validate" required>
               </div>
            </div>
            <div class="row">
               <div class="input-field col s12">
                  <input placeholder="Email" id="email" type="email" class="validate">
                  <label for="email">Email</label>
               </div>
            </div>
            <div class="row">
               <div class="input-field col s12">
                  <i class="material-icons prefix">mode_edit</i>
                  <textarea id="address" class="materialize-textarea"></textarea>
                  <label for="address">Address</label>
               </div>
            </div>
            <div class="row">
               <div class="input-field col s12">
                  <input placeholder="Comments (Disabled)" id="comments" type="text" disabled>
                  <label for="comments">Comments</label>
               </div>
            </div>
            <div class="row">
               <div class="input-field col s12">
                  <p>
                     <input id="married" type="checkbox" checked="checked">
                     <label for="married">Married</label>
                  </p>
                  <p>
                     <input id="single" type="checkbox" class="filled-in" >
                     <label for="single">Single </label>
                  </p>
                  <p>
                     <input id="dontknow" type="checkbox" disabled="disabled">
                     <label for="dontknow">Don't know (Disabled)</label>
                  </p>
               </div>
            </div>
            <div class="row">
               <div class="input-field col s12">
                  <p>
                     <input id="male" type="radio" name="gender" value="male" checked>
                     <label for="male">Male</label>
                  </p>
                  <p>
                     <input id="female" type="radio" name="gender" value="female" checked>
                     <label for="female">Female  </label>
                  </p>
                  <p>
                     <input id="dontknow1" type="radio" name="gender" value="female" disabled>
                     <label for="dontknow1">Don't know (Disabled)</label>
                  </p>
               </div>
            </div>
         </form>

</body>
</html>
