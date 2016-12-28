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
			<br />
			
			<div class="col-md-4 col-md-offset-4">
				<?php echo form_open('pelanggan/input_biodata');?>
				<div class="form-group">
					<p align="center" style="color:green;">Masukkan nama anda <font color="red">*</font></p>
					<input class="form-control" placeholder=" Masukkan Nama Anda" name="nama" type="text" autofocus required>
				</div>
				 <div class="form-group">
					<p align="center" style="color:green;">Masukkan alamat e-mail anda <font color="red">*</font></p>
					<input class="form-control" placeholder=" Masukkan alamat E-Mail Anda" name="email" type="email" required>
				</div>
				 <div class="form-group">
					<p align="center" style="color:green;">Masukkan alamat anda <font color="red">*</font></p>
					<textarea class="form-control" placeholder=" Masukkan alamat Anda" name="alamat" required></textarea>
				</div>
				<div class="form-group">
					<p align="center" style="color:green;">Pilih pekerjaan/profesi anda <font color="red">*</font></p>
					<select class="form-control" name="pekerjaan" required>
						<option>Pilih Pekerjaan</option>
						<?php foreach ($pekerjaan as $pekerjaan){
						echo "<option value='".$pekerjaan->id_pekerjaan."'>".$pekerjaan->nama_pekerjaan."</option>";
						} ?>
					</select>
				</div>
				<p align="right" style="font-size:xx-small;color:green;">(<font color="red">*</font>) wajib diisi</p>
				<center><button class="btn btn-default" type="reset" >Ulang</button>&nbsp <button class="btn btn-success" type="submit" >Selesai</button></center>
				</form>
			</div>
		</div>
		<div class="row">
			
		</div>
    </div>
        
    </body>
</html>