<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/logo.png">
    <title>AUTOMATIC DATA SERVICE BPS JABAR</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/sb-admin//bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/sb-admin//bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/sb-admin//dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/sb-admin//bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-image:url('<?php echo base_url(); ?>assets/images/bg.png');margin:7% auto;">
    <div class="container">
        <div class="row">
			<center><img src="<?php echo base_url(); ?>assets/images/logo.png" width="10%" style="margin-top:10px;" /></center>
			<h2 style="color:green;"><center><strong>Automatic Data Machine</strong></center></h2>
			<h3 style="color:green;"><center>Badan Pusat Statistik Provinsi Jawa Barat</center></h3>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><center>Silahkan Melakukan Login</center></h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open('account/login')?>
                            <fieldset>
								<?php echo validation_errors(); ?>
								<p style="color :red;"><?php echo $this->session->flashdata('notification')?></p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" id="password" type="password" required>
                                </div>
								<div class="form-group">
                                    <input type="checkbox" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'"> Lihat Password
                                </div>
								<input type="submit" name="submit" value="Login" class="btn btn-lg btn-success btn-block">
                               
                            </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/sb-admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/sb-admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/sb-admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/sb-admin/dist/js/sb-admin-2.js"></script>

</body>

</html>
