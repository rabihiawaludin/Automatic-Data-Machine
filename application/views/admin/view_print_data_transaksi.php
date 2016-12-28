<?php
	session_start();
	if($this->session->userdata('No_Anggota') == 0){
		//redirect(site_url('account'));
	}
?>

<!DOCTYPE html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/logo.png"/>
		<title>Info Laporan Data Pelanggan</title>
		
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet">
		<script type= 'text/javascript' src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
		<script type= 'text/javascript' src="<?php echo base_url();?>assets/js/script.js"></script>
		<script type= 'text/javascript' src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
	
	<style type="text/css">
		/*
Table Style - This is what you want
------------------------------------------------------------------ */
table{
	border-spacing:0;	
}
table a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
table a:visited {
	color: #999999;
	font-weight:bold;
	text-decoration:none;
}
table a:active,
table a:hover {
	color: #bd5a35;
	text-decoration:underline;
}
table {
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	margin:0px;
	border:#ccc 1px solid;

	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;

	-moz-box-shadow: 0 1px 2px #d1d1d1;
	-webkit-box-shadow: 0 1px 2px #d1d1d1;
	box-shadow: 0 1px 2px #d1d1d1;
}
table th {
	padding:21px 25px 22px 25px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;

	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
table th:first-child{
	text-align: left;
	padding-left:20px;
}
table tr:first-child th:first-child{
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
table tr:first-child th:last-child{
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}
table tr{
	text-align: center;
	padding-left:20px;
}
table tr td:first-child{
	text-align: left;
	padding-left:20px;
	border-left: 0;
}
table tr td {
	padding:18px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;
	
	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
table tr.even td{
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
table tr:last-child td{
	border-bottom:0;
}
table tr:last-child td:first-child{
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}
table tr:last-child td:last-child{
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}
table tr:hover td{
	background: #f2f2f2;
	background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
	background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);	
}
	</style>	
	</head>
<body>

<header class="masthead">
  <div class="container">
    <div class="row">
      <div class="col col-sm-12">
		<img src="<?php echo base_url();?>assets/images/logo.png" width="10%" style="float:left;"/>
        <h1 style="text-align:center;">Rekapitulasi Transaksi Data ADM <br>
        <p class="lead">BPS Provinsi Jawa Barat</p></h1>
		<?php date_default_timezone_set('Asia/Jakarta');?>
      </div>
    </div>
  </div>
</header>

<!-- Begin Body -->
<div class="container">
	<div class="row">
		<h3>Data Transaksi Data Bulan 
		<?php 
		if($bulan==1){
			$bulan='Januari';
		}
		else if($bulan==2){
			$bulan='Februari';
		}
		else if($bulan==3){
			$bulan='Maret';
		}
		else if($bulan==4){
			$bulan='April';
		}
		else if($bulan==5){
			$bulan='Mei';
		}
		else if($bulan==6){
			$bulan='Juni';
		}
		else if($bulan==7){
			$bulan='Juli';
		}
		else if($bulan==8){
			$bulan='Agustus';
		}
		else if($bulan==9){
			$bulan='September';
		}
		else if($bulan==10){
			$bulan='Oktober';
		}
		else if($bulan==11){
			$bulan='Nopember';
		}
		else if($bulan==12){
			$bulan='Desember';
		}
		echo $bulan.' Tahun '.$tahun?></h3>
		<?php $no = 1;?>
			<table width="100%">
					<tr>
						<td rowspan="2">No</td>
						<td rowspan="2">Nama Data</td>
						<td colspan="4">Pekerjaan</td>
						<td rowspan="2">Hit</td>
					</tr>
					<tr>
					  <td>PNS</td>
					  <td>Pekerja Swasta</td>
					  <td>Wirausaha</td>
					  <td>Mahasiswa/Pelajar</td>
					</tr>
				<?php 
				$i=1;
				$totaljp=0;
				$totalPNS=0;
				$totalPS=0;
				$totalWirausaha=0;
				$totalMP=0;
				foreach($data_transaksi as $data){ ?>
				<tr>
					<td><?php echo $i?></td>
					<td><?php echo $data->nama_file?></td>
					<td><?php echo $data->PNS?></td>
					<td><?php echo $data->PS?></td>
					<td><?php echo $data->Wirausaha?></td>
					<td><?php echo $data->MP?></td>
					<td><?php echo $data->total?></td>
				</tr>
				<?php
				$i++;
				}
				?>
			</table>
	</div>
</div>

<!-- Begin Footer -->
<footer>
	<h4 style="text-align:center;">Dicetak pada :<?php echo date(" d-M-Y"); ?></h4>
</footer>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/dist/js/sb-admin-2.js"></script>
		 <!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/scripts.js"></script>
	</body>