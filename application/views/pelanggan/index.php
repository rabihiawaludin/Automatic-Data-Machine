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

      .iframe-container {
      padding-bottom: 60%;
      padding-top: 30px; height: 0; overflow: hidden;
      }

      .iframe-container iframe,
      .iframe-container object,
      .iframe-container embed{
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      }

      .modal.in .modal-dialog {
      transform: none; /*translate(0px, 0px);*/
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
                        <center><h3 style="color:green;"><img src="<?php echo base_url(); ?>assets/images/logo.png" width="5%" /> Automatic Data Machine</h3></center>
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
										$id_pelanggan = $pelanggan->id_pelanggan;
										$email = $pelanggan->email;
									}
								$i = 0;
								foreach ($file as $file){
									$i++;
									echo "<tr>";
										echo "<td>".$file->kategori."</td>";
										echo "<td><a class='view-pdf' href='".base_url()."/uploads/".$file->nama_berkas."'><strong>".$file->nama_file."</strong></a><br /><p style='font-size:xx-small'>Diupload pada : ".$file->tanggal."</p></td>";
										if($file->status_data==0){
											echo "<td><button class='btn btn-default' data-toggle='modal' data-target='#myModal".$i."'><span class='glyphicon glyphicon-ok-sign'></span> Simpan</button></td>";
										}
										else{
											echo "<td><button class='btn btn-danger' data-toggle='modal' data-target='#myModal1".$i."'><span class='glyphicon glyphicon-remove-sign'></span> Hapus</button></td>";
										}
									echo "</tr>";
								?>
								<!--modal insert cart-->
									<div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="myModalLabel">Simpan berkas pada keranjang?</h4>
											</div>
											<div class="modal-body">
												Apakah anda yakin akan menyimpan berkas yang telah dipilih pada keranjang?
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
												<a href="<?php echo site_url('pelanggan/simpan_keranjang/'.$file->id_data); ?>"><button type="submit" class="btn btn-primary"><span class='glyphicon glyphicon-ok-sign'></span> Ya</button></a>
											</div>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								<!--modal delete cart-->
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
												<a href="<?php echo site_url('pelanggan/hapus_keranjang/'.$file->id_data); ?>"><button type="submit" class="btn btn-primary"><span class='glyphicon glyphicon-ok-sign'></span> Ya</button></a>
											</div>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>


								<?php } ?>
                                </tbody>
                            </table>
						</div>
					</div>
					<div class="panel-footer panel-custom">
					<center>
						<a href="<?php echo site_url('pelanggan/view_thanks'); ?>"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-log-out"></span> Keluar</button></a>
						<a href="<?php echo site_url('pelanggan/view_keranjang/'.$id_pelanggan); ?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Lihat Keranjang</button></a>
					</center>
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
    <script src="<?php echo base_url(); ?>assets/jquery-modal/javascript/jquery.modal.js" type="text/javascript"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
	//datatable
	/* Custom filtering function which will search data in column four between two values */
	$.fn.dataTable.ext.search.push(
		function( settings, data, dataIndex ) {
			var min = parseInt( $('#min').val(), 10 );
			var max = parseInt( $('#max').val(), 10 );
			var age = parseFloat( data[3] ) || 0; // use data for the age column
	 
			if ( ( isNaN( min ) && isNaN( max ) ) ||
				 ( isNaN( min ) && age <= max ) ||
				 ( min <= age   && isNaN( max ) ) ||
				 ( min <= age   && age <= max ) )
			{
				return true;
			}
			return false;
		}
	);
	
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            "bAutoWidth": false,
			"aoColumns": [{"sWidth":"25%"},{"sWidth":"65%"},{"sWidth":"10%"}],
			"bLengthChange": false, //used to hide the property 
			"pageLength": 5
        });
		// Event listener to the two range filtering inputs to redraw on input
		$('#min, #max').keyup( function() {
			table.draw();
		} );
    });

	//timeout timer
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
	document.onscroll = function() {
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
    </script>
    </body>
</html>
