<!doctype html>
<html lang="en">
<head>
    <!--CDN Bootstrap-->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--END of CDN Bootstrap-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <br><br><br><br>
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/cvlogo.jpg" type="image/png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="The Covid ERP System">
    <meta name="author" content="Adonis V. Garces">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/cvlogo.jpg" type="image/png">

    <title>Sign In | Covid ERP System</title>

</head>

<body class="text-center" style="background:url(<?php echo base_url();?>assets/images/cv2.jpg) fixed ; background-size:cover;">
    <div class="row">
        <div class="col s4 offset-s4">
        <div class="card blue-grey darken-4">
            <div class="card-content white-text">
                <span class="card-title bold">Covid ERP Login</span>
                <form class="form-signin" method="post" action="<?php echo base_url(); ?>login">
                
                            <?php if($this->session->flashdata('fail_login')):?>
                                <?php echo'<p class="alert alert-dismissable alert-danger">'.$this->session->flashdata('fail_login').'</p>';?>
                            <?php endif; ?>

                            <div style="margin-top:20px;"></div>
                            <div style="color:#ffff;"><?php echo form_error('username'); ?></div>
                            <label for="inputEmail" class="sr-only">Username</label>
                            <input style="color:#ffff;" type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>" />
                            <div style="margin-top:10px;"></div>
                            <div style="color:#ffff;"><?php echo form_error('password'); ?></div>
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input style="color:#ffff;" type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" />
                            <div style="margin-top:20px;"></div>
                            <input type="submit" name="submit" class="btn btn-primary red darken-4"  value="Login" style="width:100%;"/>
                </form>
            </div>
        </div>
        </div>
    </div>
</body>
</html>