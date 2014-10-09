<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Pooling - Login</title>
	<link href="<?php echo base_url();?>asset/login/css/molle.css" rel="stylesheet" type="text/css" />

	<link href="<?php echo base_url();?>asset/login/css/bootstrap.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url();?>asset/login/css/icon-style.css" />
	<link href="<?php echo base_url();?>asset/login/css/bootstrap-responsive.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>asset/login/css/radmin.css" rel="stylesheet" id="main-stylesheet" />
	<link href="<?php echo base_url();?>asset/login/css/radmin-responsive.css" rel="stylesheet" />

	<script type="text/javascript" src="<?php echo base_url();?>asset/login/scripts/bootstrap.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body id="body-login">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span4">
			</div>
			<div class="span4 login-span">
    			<div class="login-radmin align-center">
			    	<h1 class="brand">
     	 				<span class="rad">Pool</span>ing
				    </h1>
				</div>
				<div class="login-wrapper">
     				<div class="login-inner">
	      				<h2 class="sign-in"><?php echo $title; ?></h2>
						<small class="muted"><?php echo $subtitle; ?></small>
						<div style="margin:20px 0;line-height:15px;font-size:11px;color:#f99;text-shadow:0 -1px 0 #aeaeae;"><?php echo validation_errors(); ?></div>
      					<div class="squiggly-border"></div>
						<div class="login-inner">
					       <form class="form-horizontal" method="post" action="<?php echo base_url();?>verifylogin">
        						<div class="input-prepend">
         						<span class="add-on"> <i class="radmin-icon radmin-user"></i></span>
         						<input class="input-large" id="input-username" size="16" type="text" name="username" placeholder="Username" autocomplete="off" /></div>
								<br /><br />
						        <div class="input-prepend">
         						<span class="add-on"> <i class="radmin-icon radmin-locked"></i></span>
         						<input class="input-large" id="input-password" size="16" type="password" name="password" placeholder="Password" /></div>
								<div class="form-actions">
   		      						<button type="submit" class="btn btn-large btn-inverse pull-right" href="index.html" id="login"><?php echo $btn; ?></a>
        						</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="span4"></div>
		</div>
	</div>
</body>
</html>