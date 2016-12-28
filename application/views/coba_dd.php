
<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url('extras/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('extras/css/bootstrap-theme.css');?>"> 
	<link rel="stylesheet" href="<?php echo base_url('extras/css/dataTables.bootstrap.css');?>"> 
	<link rel="stylesheet" href="<?php echo base_url('extras/css/dataTables.responsive.css');?>"> 
	
	<script src="<?php echo base_url('extras/js/bootstrap.js');?>"></script>
	<script src="<?php echo base_url('extras/js/jquery.js');?>"></script>
	<script src="<?php echo base_url('extras/js/jquery.dataTables.min.js');?>"></script>
	<script src="<?php echo base_url('extras/js/dataTables.bootstrap.min.js');?>"></script>
</head>

<script type="text/javascript">// <![CDATA[
			 //untuk dropdown prov kota
			 $(document).ready(function(){
				 $('#provinsi_id').change(function(){ //any select change on the dropdown with id country trigger this code
					 $("#kota_id > option").remove(); //first of all clear select items
					 var country_id = $('#provinsi_id').val(); // here we are taking country id of the selected one.
					 $.ajax({
						 type: "POST",
						 url: "<?php echo site_url('pelanggan/get_kota')?>/"+country_id, //here we are calling our user controller and g method with the country_id
						 
						 success: function(kota_id) //we're calling the response json array 'cities'
						 {
							 $.each(kota_id,function(id,city) //here we're doing a foeach loop round each city with id as the key and city as the value
							 {
							 var opt = $('<option />'); // here we're creating a new select option with for each city
							 opt.val(id);
							 opt.text(city);
							 $('#kota_id').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
							 });
						 }
					 
					 });
				 
				 });
			 });
			 
		</script>


<body>

	
	<?php echo $error;?><br />
	<?php echo form_open_multipart('pelanggan/do_upload');?>
		<?php $provinsi['null'] = '-Provinsi-'; ?>
		<label for="country">Country: </label>
		<?php echo form_dropdown('id_provinsi', $provinsi, 'null', 'id="provinsi_id"'); ?>
		<?php $kota['null'] = '-Kota-'; ?>
		<label for="city">City: </label>
		<?php echo form_dropdown('id_kota', $kota, 'null', 'id="kota_id"'); ?><br />
		<br/>
		<input type="file" name="berkas">
		<input type="submit" value="upload" />
	</form>
			
</body>

	
	<!-- Modal Script -->
	<!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/sb-admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script>
	//script untuk datables
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true,
				//"sDom": '<"top"i>rt<"bottom"flp><"clear">'
				//"searching": false
				//bInfo: false,
				//bFilter: false,
				//bLengthChange: false
				 
        });
    });
	
    </script>
	
	
</html>

