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
	<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
		
	
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
                <a class="navbar-brand" href="<?php echo site_url('petugas/view_beranda'); ?>">Automatic Data Machine BPS Jabar</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <a class="navbar-brand" href="<?php echo site_url('petugas/view_profil_petugas'); ?>"><?php foreach($identitas as $identitas){echo $identitas->nama_petugas." | ".$identitas->jabatan;}?></a>
				<!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo site_url('petugas/view_profil_petugas'); ?>"><i class="fa fa-user fa-fw"></i> Profil Petugas</a>
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
                            <a href="<?php echo site_url('petugas/view_beranda'); ?>"><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
                        </li>						
                        <li>
                            <a href="<?php echo site_url('petugas/view_petugas'); ?>"><i class="fa fa-users fa-fw"></i> Data petugas</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('petugas/view_data_berkas'); ?>"><i class="fa fa-book fa-fw"></i> Data Berkas</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('petugas/view_kategori'); ?>"><i class="fa fa-book fa-fw"></i> Data Kategori</a>
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
                    <h1 class="page-header">Profil Petugas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-user"> Data Petugas</i>
							<a id="myModal" role="dialog" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModalEditProfil"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"> Sunting Profil</i></button></a>													
						</div>
						<div class="panel-body">
							<div class="col col-sm-9">
								<div class="panel">
									<?php echo $this->session->flashdata('pemberitahuan'); ?>
									<?php echo form_error('nama'); ?>
									<?php echo form_error('jabatan'); ?>
									<?php echo form_error('email'); ?>
									<?php echo form_error('username'); ?>
									<?php echo form_error('password'); ?>
									<h3>Data Identitas</h3>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="col-xs-4 control-label">NIP</label>
												<label class="col-xs-8 control-label">: <?php echo $identitas->nip;?></label>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="col-xs-4 control-label">Nama</label>
												<label class="col-xs-8 control-label">: <?php echo $identitas->nama_petugas;?></label>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="col-xs-4 control-label">Jabatan</label>
												<label class="col-xs-8 control-label">: <?php echo $identitas->jabatan;?></label>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="col-xs-4 control-label">Email</label>
												<label class="col-xs-8 control-label">: <?php echo $identitas->email;?></label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
		</div>
    </div>
    <!-- /#wrapper -->
	<!--modal sunting petugas-->
	<div class="modal fade" id="myModalEditProfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<?php echo form_open('petugas/proses_edit_profil');?>
			<div class="modal-dialog" role="form-control">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Sunting Identitas</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-xs-4 control-label" for="disabledSelect">NIP</label>
									<div class="col-xs-8">
										<input class="form-control" id="disabledInput" type="text" placeholder="NIP" value="<?php echo $identitas->nip?>" disabled="">
										<input type="hidden" name="nip" value="<?php echo $identitas->nip?>">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-xs-4 control-label">Nama</label>
									<div class="col-xs-8">
										<input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo $identitas->nama_petugas?>" required/>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-xs-4 control-label">Jabatan</label>
									<div class="col-xs-8">
										<input type="text" class="form-control" placeholder="Jabatan" name="jabatan" value="<?php echo $identitas->jabatan?>" required/>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-xs-4 control-label">Email</label>
									<div class="col-xs-8">
										<input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $identitas->email?>" required/>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-xs-4 control-label">Username</label>
									<div class="col-xs-8">
										<input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $identitas->username?>" required/>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-xs-4 control-label">Password</label>
									<div class="col-xs-8">
										<input type="password" class="form-control" placeholder="Password" id="pass" name="password" onclick="showpass()" value="<?php echo $identitas->password?>" required/>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-warning">Sunting</button>
					</div>
				</div>
			</div>
			</form>
		</div>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script>
	$(".alert").delay(200).addClass("in").fadeOut(3500);
	function showpass(){
		var obj = document.getElementById('pass');
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
	</script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/raphael/raphael-min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/dist/js/sb-admin-2.js"></script>
	
</body>

</html>
