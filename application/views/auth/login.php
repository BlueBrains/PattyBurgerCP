<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="<?php echo base_url()?>bassets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>bassets/css/login.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>bassets/plugins/magic/magic.css" />
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">
    	<!--
    <div class="text-center">
        <img src="<?php echo base_url()?>bassets/img/logo.png" id="logoimg" alt=" Logo" />
    </div>
    -->
    <?php if(!empty($message)) echo '<div id="infoMessage" class="alert alert-warning"><i class="fa fa-warning"></i> '.$message.'</div>';?>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
        	

    	  <form method="post" action="<?php echo base_url();?>index.php/auth/login"  class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Enter your Email and password
                </p>
                <input type="text" name="identity" id="identity"  placeholder="Email address" class="form-control" />
                <input type="password" name="password" id="password" placeholder="Password" class="form-control" />
                 <div class="checkbox">
	            <label>
	                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?> <?php echo $this->lang->line('login_remember_label'); ?>
	            </label>
	            </div>
				
                <button class="btn text-muted text-center btn-danger" type="submit">Sign in</button>
			
            </form>

        </div>
        
        <div id="forgot" class="tab-pane">
            <form method="post" action="<?php echo base_url();?>index.php/auth/forgot_password" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your valid e-mail</p>
                <input name="email" id="email" type="email"  required="required" placeholder="Your E-mail"  class="form-control" />
                <br />
                <button class="btn text-muted text-center btn-success" type="submit">Recover Password</button>
            </form>
        </div>
        
        <div id="signup" class="tab-pane">
			        
            <form method="post" action="<?php echo base_url();?>index.php/auth/create_user"  class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Please Fill Details To Register</p>
                 <input name="first_name" id="first_name" type="text" placeholder="First Name" class="form-control" />
                 <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="form-control" />
                <input type="text" name="username" id="username" placeholder="Username" class="form-control" />
                 <input type="text" name="phone" id="phone" placeholder="phone" class="form-control" />
                <input type="email" name="email" id="email" placeholder="Your E-mail" class="form-control" />
                <input type="password" name="password" id="password" placeholder="password" class="form-control" />
                <input type="password" name="password_confirm" id="password_confirm" placeholder="Re type password" class="form-control" />
                <button class="btn text-muted text-center btn-success" type="submit">Register</button>
            </form>
        </div>
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>
        </ul>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="<?php echo base_url();?>bassets/plugins/jquery-2.0.3.min.js"></script>
      <script src="<?php echo base_url();?>bassets/plugins/bootstrap/js/bootstrap.js"></script>
   <script src="<?php echo base_url();?>bassets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
