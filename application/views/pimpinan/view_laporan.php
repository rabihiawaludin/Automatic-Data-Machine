<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/logo.png"/>
    <title>AUTOMATIC DATA SERVICE BPS JABAR</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/sb-admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>assets/sb-admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo base_url(); ?>assets/sb-admin/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/sb-admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>assets/sb-admin/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/sb-admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->	
	
</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<img width="30px" src="<?php echo base_url('assets/images/logo.png')?>" style="float:left;margin:10px;"/>
                <a class="navbar-brand" href="<?php echo site_url('pimpinan/view_beranda'); ?>">Automatic Data Machine BPS Jabar</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
				<a class="navbar-brand" href="<?php echo site_url('pimpinan/view_profil_petugas'); ?>"><?php foreach($identitas as $identitas){echo $identitas->nama_petugas." | ".$identitas->jabatan;}?></a>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo site_url('pimpinan/view_profil_petugas'); ?>"><i class="fa fa-user fa-fw"></i> Profil Petugas</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('account/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Keluar</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo site_url('pimpinan/view_beranda'); ?>"><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
                        </li>						
                        <li>
                            <a href="<?php echo site_url('pimpinan/view_petugas'); ?>"><i class="fa fa-users fa-fw"></i> Data petugas</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('pimpinan/view_laporan/'.date('m').'/'.date('Y').''); ?>"><i class="fa fa-book fa-fw"></i> Laporan</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<div id="graph"></div>			
				<div class="col-md-12">
					<div class="panel-body">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs">
							<li class="active"><a href="#grafik" data-toggle="tab" aria-expanded="false">Grafik</a>
							</li>
							<li class=""><a href="#data_transaksi" data-toggle="tab" aria-expanded="true">Data Transaksi</a>
							</li>
							<li class=""><a href="#data_pelanggan" data-toggle="tab" aria-expanded="false">Data Pelanggan</a>
							</li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane fade" id="data_transaksi"><br />
							<?php echo form_open_multipart('pimpinan/print_data_transaksi');?>
								<div class="form-group">
									<label class="control-label col-md-2" id="nama">Pilih Bulan</label>
									<div class="col-md-2">
										<select class="form-control" name="bulan" >
											<option value="1">Januari</option>
											<option value="2">Februari</option>
											<option value="3">Maret</option>
											<option value="4">April</option>
											<option value="5">Mei</option>
											<option value="6">Juni</option>
											<option value="7">Juli</option>
											<option value="8">Agustus</option>
											<option value="9">September</option>
											<option value="10">Oktober</option>
											<option value="11">Nopember</option>
											<option value="12">Desember</option>
										</select>
										<select class="form-control" name="tahun" >
											<?php for($i=2016;$i<=date('Y');$i++){
												echo "<option value='$i'>$i</option>";
											}?>
										</select>
									</div>
									<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Cetak Data Pelanggan</button>
								</div>
							</form>
							<br />
							<br />
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							  <thead>
								<tr>
									<th style="width:50px;" rowspan="2">No</th>
									<th style="width:400px;" rowspan="2">Nama Berkas</th>
									<th colspan="4">Pekerjaan</th>
									<th rowspan="2">Hit</th>
								</tr>
								<tr>
								  <th>PNS</th>
								  <th>Pekerja Swasta</th>
								  <th>Wirausaha</th>
								  <th>Mahasiswa/Pelajar</th>
								</tr>
							  </thead>
							  <tbody>
							  <?php 
								$i=1;
								foreach($data_transaksi as $data){ ?>
								<tr>
									<th><?php echo $i?></th>
									<th><?php echo $data->nama_file?></th>
									<th><?php echo $data->PNS?></th>
									<th><?php echo $data->PS?></th>
									<th><?php echo $data->Wirausaha?></th>
									<th><?php echo $data->MP?></th>
									<th><?php echo $data->total?></th>
								</tr>
								<?php
								$i++;
								}
								?>
							  </tbody>
							</table>
							</div>
							<div class="tab-pane fade" id="data_pelanggan"><br />
							<?php echo form_open_multipart('pimpinan/print_data_pelanggan');?>
								<div class="form-group">
									<label class="control-label col-md-2" id="nama">Pilih Bulan</label>
									<div class="col-md-2">
										<select class="form-control" name="bulan" >
											<option value="1">Januari</option>
											<option value="2">Februari</option>
											<option value="3">Maret</option>
											<option value="4">April</option>
											<option value="5">Mei</option>
											<option value="6">Juni</option>
											<option value="7">Juli</option>
											<option value="8">Agustus</option>
											<option value="9">September</option>
											<option value="10">Oktober</option>
											<option value="11">Nopember</option>
											<option value="12">Desember</option>
										</select>
										<select class="form-control" name="tahun" >
											<?php for($i=2016;$i<=date('Y');$i++){
												echo "<option value='$i'>$i</option>";
											}?>
										</select>
									</div>
									<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Cetak Data Pelanggan</button>
								</div>
							</form>
							<br />
							<br />
							<table class="table table-striped table-bordered table-hover" id="dataTables-example1">
							  <thead valign="middle">
								<tr>
									<th rowspan="2" style="width:50px;">No</th>
									<th rowspan="2">Tanggal</th>
									<th rowspan="2">Jumlah Pelanggan</th>
									<th colspan="4" style="vertical-align: middle;">Pekerjaan</th>
								</tr>
								<tr>
								  <th>PNS</th>
								  <th>Pekerja Swasta</th>
								  <th>Wirausaha</th>
								  <th>Mahasiswa/Pelajar</th>
								</tr>
							  </thead>
							  <tbody>
							  <?php 
								$i=1;
								$totaljp=0;
								$totalPNS=0;
								$totalPS=0;
								$totalWirausaha=0;
								$totalMP=0;
								foreach($data_pelanggan as $data){ ?>
								<tr>
									<th><?php echo $i;?></th>
									<th><?php echo $data->tanggal;?></th>
									<th><?php echo $data->Jp;?></th>
									<?php $totaljp = $totaljp + $data->Jp;?>
									<th><?php echo $data->PNS;?></th>
									<?php $totalPNS = $totalPNS + $data->PNS;?>
									<th><?php echo $data->PS;?></th>
									<?php $totalPS = $totalPS + $data->PS;?>
									<th><?php echo $data->Wirausaha;?></th>
									<?php $totalWirausaha = $totalWirausaha + $data->Wirausaha;?>
									<th><?php echo $data->MP;?></th>
									<?php $totalMP = $totalMP + $data->MP;?>
								</tr>
								<?php
								$i++;
								}
								?>
							  </tbody>
								<tfoot>
									<th colspan="2">Total</th>
									<th><?php echo $totaljp?></th>
									<th><?php echo $totalPNS?></th>
									<th><?php echo $totalPS?></th>
									<th><?php echo $totalWirausaha?></th>
									<th><?php echo $totalMP?></th>
								</tfoot>
							</table>
						  
						    <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>						  
						    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
						    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
							<script type="text/javascript">
								$(document).ready(function() {
									$('#dataTables-example').DataTable({
										responsive: true
									});
									$('#dataTables-example1').DataTable({
										responsive: true
									});
								});

							</script>
							</div>
							<div class="tab-pane fade active in" id="grafik"><br />
								<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
								<script src="http://code.highcharts.com/highcharts.js"></script>
								<script type="text/javascript">
								 
								$(function () {
									$('#container').highcharts({
										chart: {
											plotBackgroundColor: null,
											plotBorderWidth: null,
											plotShadow: false
										},
										title: {
											text: 'Data Pelanggan Bulan <?php echo $bulan?> Tahun <?php echo $tahun?>'
										},
										tooltip: {
											pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
										},
										plotOptions: {
											pie: {
												allowPointSelect: true,
												cursor: 'pointer',
												dataLabels: {
													enabled: true,
													format: '<b>{point.name}</b>: {point.percentage:.1f} %',
													style: {
														color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
													}
												},
												showInLegend: true
											}
										},
										series: [{
											type: 'pie',
											name: 'Persentase Penduduk',
											data: [
													<?php 
													// data yang diambil dari database
													if(count($graph)>0)
													{
													   foreach ($graph as $data) {
													   echo "['" .$data->nama_pekerjaan . "'," . $data->jumlah ."],\n";
													   }
													}
													?>
											]
										}]
									});
								});
								 
								</script>
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title">Grafik Pelanggan</h3>
											</div>
											<div class="panel-body">
												<?php echo form_open_multipart('pimpinan/cek_ke_bulan');?>
												<div class="form-group">
													<label class="control-label col-md-2" id="nama">Pilih Bulan</label>
													<div class="col-md-2">
														<select class="form-control" name="pilihbulan" >
															<option value="1">Januari</option>
															<option value="2">Februari</option>
															<option value="3">Maret</option>
															<option value="4">April</option>
															<option value="5">Mei</option>
															<option value="6">Juni</option>
															<option value="7">Juli</option>
															<option value="8">Agustus</option>
															<option value="9">September</option>
															<option value="10">Oktober</option>
															<option value="11">Nopember</option>
															<option value="12">Desember</option>
														</select>
														<select class="form-control" name="pilihtahun" >
															<?php for($i=2016;$i<=date('Y');$i++){
																echo "<option value='$i'>$i</option>";
															}?>
														</select>
													</div>
													<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Cari</button>
												</div>
											</form>
											</br>
											<?php 
												if($jumlah_row==0){
											 ?>
											 Data Tidak Tersedia
											<?php
												}else{
											?>
											<div id="container" style="min-width:976px;min-height:400px;"></div>
											</div>
											<?php 
												} 
											?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/raphael/raphael-min.js"></script>
	
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/dist/js/sb-admin-2.js"></script>
	
</body>

</html>
