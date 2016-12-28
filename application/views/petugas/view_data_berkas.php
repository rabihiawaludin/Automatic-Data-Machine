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
	
	<link href="<?php echo base_url(); ?>assets/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet" type="text/css">
	
	<!-- tabel -->
	<link href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <style>
	/*#loader{display: none}*/
	input {
		position: relative;
		width: 150px; height: 20px;
		color: white;
	}
	
	input:before {
		position: absolute;
		top: 3px; left: 3px;
		content: attr(data-date);
		display: inline-block;
		color: black;
	}
	
	input::-webkit-datetime-edit, input::-webkit-inner-spin-button, input::-webkit-clear-button {
		display: none;
	}
	
	input::-webkit-calendar-picker-indicator {
		position: absolute;
		top: 3px;
		right: 0;
		color: black;
		opacity: 1;
	}
	</style>
	
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
                    <h1 class="page-header">Data Berkas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">	
				<div class="col-lg-12">
					<a id="myModal1" role="dialog" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal">
						<button type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign"> Tambah Berkas</i></button>
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
									<th>Nama Berkas</th>
									<th>Subjek Statistik</th>
									<th>Kategori</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							 <?php 
							 $i=1;
							 foreach($data_berkas as $data): ?>
							 <tr>
								<th width="1%"><?php echo $i; ?></th>
								<?php echo "<td width=''><a class='view-pdf' href='".base_url()."/uploads/".$data->nama_berkas."'><strong>".$data->nama_file."</strong></a><br /><p style='font-size:xx-small'>Diupload pada : ".$data->tanggal."</p></td>";?>
								<th width="15%"><?php echo $data->kategoriUmum; ?></th>
								<th width="15%"><?php echo $data->kategoriKhusus; ?></th>
								<th>
								<a id="myModal1" role="dialog" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal2<?php echo $i;?>"><button type="button" class="btn btn-warning"><i class="glyphicon glyphicon-edit"> Sunting</i></button></a>
								<a id="myModal1" role="dialog" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal3<?php echo $i;?>"><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"> Hapus</i></button></a></th></tr>
								
								<!--Modal Update Anggota-->								
								<div class="modal fade" id="myModal2<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">								
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h3 class="modal-title">Sunting Data Berkas</h3>
											</div>
											<div class="modal-body form">
												<form enctype="multipart/form-data" action="<?php echo site_url('petugas/edit_berkas/'.$data->id_data); ?>" id="form" class="form-horizontal" method="POST">
												<div class="form-body">
													<div class="form-group">
														<label class="control-label col-md-3">Nama Berkas</label>
														<div class="col-md-9">
														<input type="text" name="nama_file" class="form-control" placeholder="Nama berkas" value="<?php echo $data->nama_file?>" required>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Subjek Statistik</label>
														<div class="col-md-9">
															<select id="umum" name="umum_" class="form-control" required>
																<?php foreach ($umum as $data1){
																	echo "<option value='$data1->id_umum'>$data1->kategori</option>";
																}?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Kategori</label>
														<div class="col-md-9">
															<select id="khusus" name="khusus" class="form-control" required>
																<?php foreach ($khusus as $data2){
																	echo "<option value='$data2->id_khusus' class='$data2->id_umum'>$data2->kategori</option>";
																}?>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Berkas</label>
														<div class="col-md-9">
														<input name="berkas" placeholder="Berkas" type="file" class="form-control" required>
														</div>
													</div>
												</div>
											</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													<button type="submit" class="btn btn-warning">Sunting Berkas</button>
												</div>
											</form>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->								
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
														Apakah anda yakin menghapus Data ini?
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
													<a href=<?php echo site_url('petugas/hapus_berkas/'.$data->id_data); ?>><button type="submit" class="btn btn-danger">Hapus</button></a>
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
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title">Tambah Dokumen</h3>
				</div>
				<div class="modal-body form">
					<form enctype="multipart/form-data" action="<?php echo site_url('petugas/tambah_berkas'); ?>" id="form" class="form-horizontal" method="POST">
					<input type="hidden" value="" name="id"/> 
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Nama Dokumen</label>
							<div class="col-md-9">
							<input type="text" name="nama_file" class="form-control" placeholder="Nama Dokumen" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Subjek Statistik</label>
							<div class="col-md-9">
								<select id="umum1" name="umum" class="form-control" required>
									<option value="default">--Pilih Jenis Dokumen--</option>
									<?php foreach ($umum as $data){
										echo "<option value='$data->id_umum'>$data->kategori</option>";
									}?>
								</select>
							</div>
						</div>
						<div id="khusus_" class="form-group">
							<label for="fielddob" class="col-md-3 control-label">Masa Berlaku</label>
								<div class="col-md-4">
									<input class="form-control" type="date" data-date="" data-date-format="DD MMMM YYYY" value="2015-08-09">
								</div>
							<span class="col-md-5 control-error">sd</span>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Berkas</label>
							<div class="col-md-9">
							<input name="berkas" placeholder="Berkas" type="file" class="form-control" required>
							</div>
						</div>
					</div>
				</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-success">Tambah Berkas</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
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
	
	<script src="<?php echo base_url(); ?>assets/js/jquery.chained.js" ></script>
	<script src="<?php echo base_url(); ?>assets/jquery-modal/javascript/jquery.modal.js" type="text/javascript"></script>
    <!--<script src="<?php echo base_url(); ?>assets/bootstrap-datepicker/bootstrap-datepicker.js" ></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
	<script>
	//$("#fielddob").datepicker({format: "dd-mm-yyyy", autoclose: true}).val();
	$("input").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
        .format( this.getAttribute("data-date-format") )
	)
	})
	
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
	$("#khusus").chained("#umum");
	$("#khusus1").chained("#umum1");
	$(".alert").delay(200).addClass("in").fadeOut(3500);
	
	//easy modal plugin untuk pdf view
	/*
	* This is the plugin
	*/
	(function(a){a.createModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);

	/*
	* Here is how you use it
	*/
	$(function(){
		$('.view-pdf').on('click',function(){
			var pdf_link = $(this).attr('href');
			//var iframe = '<div class="iframe-container"><iframe src="'+pdf_link+'"></iframe></div>'
			//var iframe = '<object data="'+pdf_link+'" type="application/pdf"><embed src="'+pdf_link+'" type="application/pdf" /></object>'
			var iframe = '<object type="application/pdf" data="'+pdf_link+'" width="100%" height="500">No Support</object>'
			$.createModal({
				title:'File Preview',
				message: iframe,
				closeButton:true,
				scrollable:false
			});
			return false;
		});
	})
	
	$('select[name=umum]').change(function () {
		if ($(this).val() == 0) {
			$('#khusus_').show();
		} else {
			$('#khusus_').hide();
		}
	});
    </script>
</body>

</html>