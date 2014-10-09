<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pooling</title>
    <link href="<?php echo base_url();?>asset/back/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/back/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/back/css/plugins/morris.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/back/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url()?>asset/back/js/jquery-1.11.0.js"></script>
    
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('pool')?>">Pooling</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user_nama;?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo site_url('logout');?>"><i class="fa fa-fw fa-power-off"></i> <?php echo $logout_word; ?></a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li<?php if( $controller == "pool" ) echo ' class="active"'?>>
                        <a href="<?php echo site_url('pool');?>"><i class="fa fa-fw fa-bar-chart-o"></i> <?php echo $menu1; ?></a>
                    </li>
                    <li<?php if( $controller == "question" ) echo ' class="active"'?>>
                        <a href="<?php echo site_url('question');?>"><i class="fa fa-fw fa-edit"></i> <?php echo $menu2; ?></a>
                    </li>
                    <li<?php if( $controller == "export" ) echo ' class="active"'?>>
                        <a href="<?php echo site_url('export');?>"><i class="fa fa-fw fa-table"></i> <?php echo $menu4; ?></a>
                    </li>
                    <?php if( $user_level == "admin" ){ ?>
                    <li<?php if( $controller == "user" ) echo ' class="active"'?>>
                        <a href="<?php echo site_url('user');?>"><i class="fa fa-fw fa-user"></i> <?php echo $menu3; ?></a>
                    </li>
                    <li<?php if( $controller == "language" ) echo ' class="active"'?>>
                        <a href="<?php echo site_url('language');?>"><i class="fa fa-fw fa-desktop"></i> <?php echo $menu6; ?></a>
                    </li>
                    <li<?php if( $controller == "setting" ) echo ' class="active"'?>>
                        <a href="<?php echo site_url('setting');?>"><i class="fa fa-fw fa-wrench"></i> <?php echo $menu5; ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>