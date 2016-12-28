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
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/sb-admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>assets/sb-admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo base_url(); ?>assets/sb-admin/dist/css/timeline.css" rel="stylesheet">
	
	<!-- DataTables CSS -->
    <link href="<?php echo base_url(); ?>assets/sb-admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url(); ?>assets/sb-admin/bower_components/datatables-responsive/css/responsive.dataTables.scss" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/sb-admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>assets/sb-admin/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/sb-admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- tabel -->
	<link href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <style>#loader{display: none}</style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link href="<?php echo base_url();?>assets/css/loading.css" rel="stylesheet">
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
                <a class="navbar-brand" href="<?php echo site_url('admin/view_beranda'); ?>">Automatic Data Machine BPS Jabar</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
				<a class="navbar-brand" href="<?php echo site_url('admin/view_profil_petugas'); ?>"><?php foreach($identitas as $identitas){echo $identitas->nama_petugas." | ".$identitas->jabatan;}?></a>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo site_url('admin/view_profil_petugas'); ?>"><i class="fa fa-user fa-fw"></i> Profil admin</a>
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
                            <a href="<?php echo site_url('admin/view_beranda'); ?>"><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
                        </li>						
                        <li>
                            <a href="<?php echo site_url('admin/view_petugas'); ?>"><i class="fa fa-users fa-fw"></i> Data petugas</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/view_data_berkas'); ?>"><i class="fa fa-book fa-fw"></i> Data Berkas</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/view_kategori'); ?>"><i class="fa fa-book fa-fw"></i> Data Kategori</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/view_laporan/'.date('m').'/'.date('Y').''); ?>"><i class="fa fa-book fa-fw"></i> Laporan</a>
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
                    <h1 class="page-header">Data Petugas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">	
				<div class="col-lg-12">
					<a id="myModal1" role="dialog" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal">
						<button type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"> Tambah Petugas</i></button>
					</a>
					</br>
					</br>
					<div class="col-lq-12">
						<?php echo $this -> session -> flashdata('pemberitahuan');?>
						<div id="response"></div>        
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th width="1%">No</th>
									<th>NIP</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Username</th>
									<th>Password</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							 <?php 
							 $i=1;
							 foreach($data_petugas as $data): ?>
							 <tr>
								<th width="1%"><?php echo $i; ?></th>
								<th width="10%"><?php echo $data->nip; ?></th>
								<th width="20%"><?php echo $data->nama_petugas; ?></th>
								<th width="20%"><?php echo $data->email; ?></th>
								<th width="15%"><?php echo $data->username; ?></th>
								<th width="15%"><?php echo $data->password; ?></th>
								<th>
								<a id="myModal1" role="dialog" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal2<?php echo $i;?>"><button type="button" class="btn btn-warning"><i class="glyphicon glyphicon-edit"> Sunting</i></button></a>
								<a id="myModal1" role="dialog" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal3<?php echo $i;?>"><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"> Hapus</i></button></a></th></tr>
								
								<!--Modal Update Anggota-->								
								<div class="modal fade" id="myModal2<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<?php echo form_open_multipart('admin/proses_edit_petugas');?>
									<div class="modal-dialog" role="form-control">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Sunting Petugas</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="col-xs-4 control-label">NIP</label>
															<div class="col-xs-8">
																<input type="text" class="form-control" placeholder="NIP" name="nip" maxlength="18" value="<?php echo $data->nip?>" disabled="disabled"/>
																<input type="hidden" name="nip" value="<?php echo $data->nip?>">
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="col-xs-4 control-label">Nama</label>
															<div class="col-xs-8">
																<input type="text" class="form-control" placeholder="Nama" name="Nama" value="<?php echo $data->nama_petugas?>"/>
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="col-xs-4 control-label">Email</label>
															<div class="col-xs-8">
																<input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $data->email?>"/>
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="col-xs-4 control-label">Username</label>
															<div class="col-xs-8">
																<input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $data->username?>"/>
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="col-xs-4 control-label" for="disabledSelect">Password</label>
															<div class="col-xs-8">
																<input class="form-control" onclick="showpass1()" id="pass1" name="password" type="password" placeholder="Password" value="<?php echo $data->password?>">		
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="col-xs-4 control-label">Jabatan</label>
															<div class="col-xs-8">
																<select class="form-control" placeholder="Jabatan" name="jabatan">
																	<?php 
																	if($data->jabatan=='Petugas'){
																		echo "<option value='Petugas' selected=''>Petugas</option>";
																		echo "<option value='Pimpinan'>Pimpinan</option>";
																	}else{
																		echo "<option value='petugas'>Petugas</option>";
																		echo "<option value='Pimpinan' selected=''>Pimpinan</option>";
																	}?>
																</select>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
												<button type="submit" class="btn btn-warning">Sunting</button>
											</div>
										</div>
									</div>
									</form>
								</div>						
								<!--Modal Delete-->
								<div class="modal fade" id="myModal3<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-8">
														Apakah anda yakin menghapus Petugas ini?
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
													<a href=<?php echo site_url('admin/hapus_petugas/'.$data->nip); ?>><button type="submit" class="btn btn-danger">Hapus</button></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<script>
									$('#myModal2<?php echo $i;?>').on('shown.bs.modal', function () {});
									$('#myModal3<?php echo $i;?>').on('shown.bs.modal', function () {});							
								</script>
								
							<?php $i++; endforeach ?>
							</tbody>
						</table>					
					</div>				
				</div>				
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	<!--Modal Insert Anggota-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php echo form_open_multipart('admin/proses_tambah_petugas');?>
		<div class="modal-dialog" role="form-control">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Tambah Petugas</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-xs-4 control-label">NIP</label>
								<div class="col-xs-8">
									<input type="text" onkeypress='return onlyNumbers()' class="form-control" placeholder="NIP" name="nip" maxlength="18" required/>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-xs-4 control-label">Nama</label>
								<div class="col-xs-8">
									<input type="text" class="form-control" placeholder="Nama" name="Nama" required/>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-xs-4 control-label">Email</label>
								<div class="col-xs-8">
									<input type="email" class="form-control" placeholder="Email" name="email" required/>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-xs-4 control-label">Username</label>
								<div class="col-xs-8">
									<input type="text" class="form-control" placeholder="Username" name="username" required/>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-xs-4 control-label">Password</label>
								<div class="col-xs-8">
									<input type="password" class="form-control" placeholder="Password" id="pass" name="password" onclick="showpass()"  required/>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-xs-4 control-label">Jabatan</label>
								<div class="col-xs-8">
									<select class="form-control" placeholder="Jabatan" name="jabatan" required>
										<option value="Petugas">Petugas</option>
										<option value="Pimpinan">Pimpinan</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-success">Tambah</button>
				</div>
			</div>
		</div>
		</form>
	</div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/raphael/raphael-min.js"></script>
	
	<!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/dist/js/sb-admin-2.js"></script>
	
	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
	function showpass(){
		var obj = document.getElementById('pass');
		obj.disabled = false;
		if (obj.type == 'text') {
			obj.type = 'password';
		} else {
			obj.type = 'text';
		}
		obj.disabled = true;
	}
	function showpass1(){
		var obj = document.getElementById('pass1');
		obj.disabled = false;
		if (obj.type == 'text') {
			obj.type = 'password';
		} else {
			obj.type = 'text';
		}
	}	
	function onlyNumbers(evt){
	var e = event || evt; // for trans-browser compatibility
	var charCode = e.which || e.keyCode;

	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;
	}
	$(".alert").delay(200).addClass("in").fadeOut(3500);
    </script>
</body>

</html>
