<?php
		require_once(APPPATH."views/Parts/header.php");
?>

<div id="page-wrapper" class="gray-bg dashbard-1">
	<div class="content-main">
		<div class="banner">
			<h2>
				<a href="<?php echo base_url();?>">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Master Anak</span>
			</h2>
		</div>
		<div class="blank">
			<div class="blank-page">
				<!-- Code Hire -->
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<th>#</th>
						<th>No. SG</th>
						<th>Nama</th>
						<th>Kelas Usia</th>
						<th>Email</th>
						<th>No. Telepon</th>
					</thead>
					<tbody>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tbody>
				</table>
			</div>
		</div>
			<div class="copy">
				<p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
			</div>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>
	</div>
</div>
<script src="<?php echo base_url();?>Assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url();?>Assets/js/scripts.js"></script>
</body>
</html>

<script type="text/javascript">
  $(function () {
    $('#example1').DataTable();
		$.ajaxSetup({
        beforeSend:function(jqXHR, Obj){
            var value = "; " + document.cookie;
            var parts = value.split("; csrf_cookie_token=");
            if(parts.length == 2)   
            Obj.data += '&csrf_token='+parts.pop().split(";").shift();
        }
    });

		$(document).ready(function () {
			// Swal.fire({
      //     type: 'success',
      //     title: 'Sukses !!',
      //     text: 'Selamat Akun anda sudah aktif, silahkan melakukan login',
      //   })
			var value = "; " + document.cookie;
			var parts = value.split("; csrf_cookie_token=");
			var get_desc = {
					'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
			};
			// alert(parts.pop().split(";").shift());
			$.ajax({
				type: "post",
				url: "<?=base_url()?>DataController/GetDataAnak",	
				data: get_desc,
				dataType: "json",
				success: function(response){
					if(response.success == true){

					}
				}
			})
		});
  })

</script>