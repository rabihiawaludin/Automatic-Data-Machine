<!DOCTYPE html>
<!--

-->
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
                        <center><h3 style="color:green;">Daftar Keranjang</h3></center>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body panel-custom">
						<?php echo $this->session->flashdata('pemberitahuan'); ?>
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Subjek</th>
                                        <th>Data</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
									foreach($pelanggan as $pelanggan){
										$email = $pelanggan->email;
										$id_pelanggan = $pelanggan->id_pelanggan;
									}
								$i = 0;
								foreach ($keranjang as $file){
									$i++;
                                    echo "<tr>";
										echo "<td>".$file->kategori."</td>";
										echo "<td><strong><a class='view-pdf' href='".base_url()."/uploads/".$file->nama_berkas."'>".$file->nama_file."</a></strong><br /><p style='font-size:xx-small'>Diupload pada : ".$file->tanggal."</p></td>";
										echo "<td><button class='btn btn-danger' data-toggle='modal' data-target='#myModal1".$i."'>Hapus dari Keranjang</button></td>";
										
									echo "</tr>";
								?>
								<div class="modal fade" id="myModal1<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="myModalLabel">Hapus berkas pada keranjang?</h4>
											</div>
											<div class="modal-body">
												Apakah anda yakin akan menghapus berkas yang telah dipilih pada keranjang?
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
												<a href="<?php echo site_url('pelanggan/hapus_keranjang_view/'.$file->id_data); ?>"><button type="submit" class="btn btn-primary">Ya</button></a>
											</div>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								<!-- /.modal -->
									
								<?php } ?>
                                </tbody>
                            </table>
						</div>
					</div>
					<div class="panel-footer panel-custom">
						<center>
							<a href="<?php echo site_url('pelanggan/view_pelanggan'); ?>"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-step-backward"></span> Kembali</button></a>
							<button class='btn btn-warning' data-toggle='modal' data-target='#clearCartModal'><span class="glyphicon glyphicon-download-alt"></span> Bersihkan Keranjang</button>
							<button class='btn btn-info' data-toggle='modal' data-target='#myModal2'><span class="glyphicon glyphicon-download-alt"></span> Kirim Berkas</button>
						</center>
					</div>
					
					<!--modal kirim berkas-->
					<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">Pilih Media Unduh Berkas</h4>
								</div>
								<div class="modal-body">
									Media yang digunakan untuk penyimpanan berkas<br />
									E-mail yang digunakan : 
									<?php
										echo "<strong>".$email."</strong>";
									?>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-step-backward"></span> Kembali</button>
									<button class="btn btn-success" data-toggle="modal" data-target="#modalEdit"><span class="glyphicon glyphicon-edit"></span> Edit Email</button>
									<button class="btn btn-info" data-toggle="modal" data-target="#modalFd"><span class="glyphicon glyphicon-download-alt"></span> Flashdisk</button>
									<a href="<?php echo site_url('pelanggan/download_email'); ?>"><button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-download-alt"></span> Email</button></a>
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
					<!-- /.modal -->
					<!--modal edit email-->
					<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<form action="<?php echo site_url('pelanggan/update_email/'.$id_pelanggan); ?>" method="POST">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Edit Email</h4>
							</div>
							<div class="modal-body">
								<label>Masukkan E-mail : </label><input type="text" placeholder="<?php echo $email; ?>" name="email" value="<?php echo $email; ?>">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-step-backward"></span> Kembali</button>
								<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span> Submit</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					</form>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
					<!--modal konfirmasi kirim flashdisk-->
					<div class="modal fade" id="modalFd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Konfirmasi Kirim Flashdisk</h4>
							</div>
							<div class="modal-body">
								<h5><strong>PERHATIAN</strong><br />Masukkan Flashdisk pada port USB yang telah disediakan, tekan tombol Kirim untuk mengirim data melalui Flashdisk</h5>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
								<a href="<?php echo site_url('pelanggan/download_fd'); ?>"><button type="submit" class="btn btn-success">Kirim</button></a>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
					</div>
				<!-- /.modal -->
				<!-- modal konfirmasi clear keranjang -->
				<div id="clearCartModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
								<h4 class="modal-title" id="myModalLabel">Konfirmasi Bersihkan Keranjang</h4>
								<h4></h4>
							</div>
							<div class="modal-body">
								<strong>Yakin menghapus keranjang?</strong><br />
								Seluruh berkas akan dihapus dari keranjang.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
								<a href="<?php echo site_url('pelanggan/clear_keranjang/'.$id_pelanggan); ?>"><button type="button" class="btn btn-primary">Ya</button></a>
							</div>
						</div> 
					</div>
				</div>
				</div>
			</div>
		</div>
		<!-- timer -->
		<div id="SecondsUntilExpire" style="font-size:10px;color:grey;"></div>
		</div>
	
	<!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
	$(".alert").delay(200).addClass("in").fadeOut(3500);
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            "bAutoWidth": false,
			"aoColumns": [{"sWidth":"25%"},{"sWidth":"65%"},{"sWidth":"10%"}],
			"bLengthChange": false, //used to hide the property 
			"pageLength": 5
        });
    });
	
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