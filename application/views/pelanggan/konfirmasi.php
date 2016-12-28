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
		<!-- DataTables CSS -->
		<link href="<?php echo base_url(); ?>assets/sb-admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
		<!-- DataTables Responsive CSS -->
		<link href="<?php echo base_url(); ?>assets/sb-admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css"/>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
		<style type= 'text/css'>
			body {
				background-image: url('<?php echo base_url(); ?>assets/images/bg.png');
			}
			
			.panel-heading.panel-custom {
			background: #ECF0F1;
			color: black;
			}
			.panel-body.panel-custom {
			background: #ECF0F1;
			color: black;
			}
			.panel-footer.panel-custom {
			background: #ECF0F1;
			color: black;
			}
		</style>
    </head>
    <body>
		<div class="container">
        <div class="row">
            <div class="col-lg-12" style="margin-top:15px;">
                <div class="panel panel-default">
                    <div class="panel-heading panel-custom">
                        Konfirmasi
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body panel-custom">
						<h3>Akan melakukan pengambilan data lain?</h3>
					</div>
					<div class="panel-footer panel-custom">
						<a href="<?php echo site_url('pelanggan/view_thanks'); ?>"><button class='btn btn-default'>Tidak</button></a>
						<a href="<?php echo site_url('pelanggan/view_pelanggan'); ?>"><button class='btn btn-primary'>Ya</button></a>
					</div>
				</div>
			</div>
		</div>
		<!-- timer -->
		<div id="SecondsUntilExpire" style="font-size:10px;color:grey;"></div>
		</div>
	
	<!-- modal thanks -->
	<div id="myModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h4></h4>
				</div>
				<div class="modal-body">
					Terimakasih telah menggunakan ADSM
				</div>
			</div> 
		</div>
	</div>
	
	<!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	<script>
	var IDLE_TIMEOUT = 901; //seconds
	var _idleSecondsCounter = 0;
	document.onclick = function() {
		_idleSecondsCounter = 0;
	};
	document.onmousemove = function() {
		_idleSecondsCounter = 0;
	};
	document.onkeypress = function() {
		_idleSecondsCounter = 0;
	};
	window.setInterval(CheckIdleTime, 1000);

	function CheckIdleTime() {
		_idleSecondsCounter++;
		var oPanel = document.getElementById("SecondsUntilExpire");
		if (oPanel)
			oPanel.innerHTML = (IDLE_TIMEOUT - _idleSecondsCounter) + " seconds to timeout";
		if (_idleSecondsCounter >= IDLE_TIMEOUT) {
			alert("Time expired!");
			document.location.href = "<?php echo site_url('pelanggan/'); ?>";
		}
	}
	</script>
    </body>
</html>