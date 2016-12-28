<!DOCTYPE html>
<html>

	<!-- Copyright 2016, PLA UPI 2016 Dino Aviano, Muhamad Faizal, Muhammad Rizfardi Metafiliana, Rabihi Awaludin -->
	
    
    <head>
        <meta charset="UTF-8"/>
        <title>ADM BPS JABAR</title>
        <!--[if IE]> <script> (function() { var html5 = ("abbr,article,aside,audio,canvas,datalist,details," + "figure,footer,header,hgroup,mark,menu,meter,nav,output," + "progress,section,time,video").split(','); for (var i = 0; i < html5.length; i++) { document.createElement(html5[i]); } try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {} })(); </script> <![endif]-->
		
		<!-- icon title -->
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/images/logo.png" />
		
		 <!-- Bootstrap Core CSS -->
		<link href="<?php echo base_url(); ?>assets/sb-admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css"/>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
		<style type= 'text/css'>
			body {
				background-image: url('<?php echo base_url(); ?>assets/images/bg.png');
			}
		</style>
    </head>
    <body>
		<div class="container">
		<div class="row">
			<center><img src="<?php echo base_url(); ?>assets/images/logo.png" width="10%" style="margin-top:10px;" /></center>
			<h2 style="color:green;"><center><strong>Automatic Data Machine</strong></center></h2>
			<h3 style="color:green;"><center>Badan Pusat Statistik Provinsi Jawa Barat</center></h3>
			<br /><br /><br />
			<center><h3 style="color:green;">Terimakasih telah menggunakan Automatic Data Machine di PST Badan Pusat Statistik Provinsi Jawa Barat</h3><center>
		</div>
		</div>
    <script>
	//timeout timer
	var IDLE_TIMEOUT = 4; //seconds
	var _idleSecondsCounter = 0;
	
	window.setInterval(CheckIdleTime, 1000);

	function CheckIdleTime() {
		_idleSecondsCounter++;
		var oPanel = document.getElementById("SecondsUntilExpire");
		if (oPanel)
			oPanel.innerHTML = (IDLE_TIMEOUT - _idleSecondsCounter) + " seconds to timeout";
		if (_idleSecondsCounter >= IDLE_TIMEOUT) {
			document.location.href = "<?php echo site_url('pelanggan/'); ?>";
		}
	}
    </script>
    </body>
</html>
