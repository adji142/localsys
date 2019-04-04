
<?php
	$user_id = $this->session->userdata('userid');
	if($user_id != ''){
		echo "<script>location.replace('".base_url()."Home');</script>";
	}
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Minimal an Admin Panel Category Flat Bootstrap Responsive Website Template | Signin :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo base_url();?>Assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo base_url();?>Assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url();?>Assets/css/font-awesome.css" rel="stylesheet"> 
<script src="<?php echo base_url();?>Assets/js/jquery.min.js"> </script>
<script src="<?php echo base_url();?>Assets/js/bootstrap.min.js"> </script>

<!-- Sweet alert -->
<script src="<?php echo base_url();?>Assets/sweetalert2-8.8.0/package/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>Assets/sweetalert2-8.8.0/package/dist/sweetalert2.min.css">

</head>
<body>
	<div class="login">
		<h1><a href="index.html">Minimal </a></h1>
		<div class="login-bottom">
			<h2>Login</h2>
			<form id="Login" enctype='application/json'>
			<div class="col-md-12">
				<div class="login-mail">
					<input type="text" placeholder="Username" required="" name="user" id="user">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" required="" name="password" id="password">
					<i class="fa fa-lock"></i>
				</div>
				   <a class="news-letter " href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>Forget Password</label>
						 </a>
				<button class="btn btn-general hvr-shutter-in-horizontal login-sub" id="btn_submit">Login</button>
			</div>
			<div class="clearfix"> </div>
			</form>
		</div>
	</div>
		<!---->
<div class="copy-right">
    <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>	    
</div>  
<!---->
<!--scrolling js-->
	<script src="<?php echo base_url();?>Assets/js/jquery.nicescroll.js"></script>
	<script src="<?php echo base_url();?>Assets/js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>



<script type="text/javascript">
	$(function () {
		$.ajaxSetup({
	        beforeSend:function(jqXHR, Obj){
	            var value = "; " + document.cookie;
	            var parts = value.split("; csrf_cookie_token=");
	            if(parts.length == 2)
	            Obj.data += '&csrf_token='+parts.pop().split(";").shift();
	        }
	    });
		// Reset Form
		$(document).ready(function () {
			// Swal.fire(
			// 'Good job!',
			// 'You clicked the button!',
			// 'success'
			// )
			$('#user').text('');
			$('#password').text('');
			
		});
		// Begin Starting Validating
		$('#Login').submit(function(e) {
			$('#btn_submit').text('Tunggu Sebentar...');
        	$('#btn_submit').attr('disabled',true);
        	e.preventDefault();
        	var me = $(this);
        	$.ajax({
				type: "post",
		        url: "<?=base_url()?>Auth/Login/Auth_Login",
		        data: me.serialize(),
		        dataType: "json",

		        success: function (response) {
		        	if(response.success == true){
						location.replace("<?=base_url()?>Home")
					}
					else{
						if(response.message == 'L-01'){
							Swal.fire({
							  type: 'error',
							  title: 'Oops...',
							  text: 'User dan password tidak sesuai dengan database!',
							  // footer: '<a href>Why do I have this issue?</a>'
							});
							$('#user').text('');
							$('#password').text('');
							$('#btn_submit').text('Login');
        					$('#btn_submit').attr('disabled',false);
						}
						else if(response.message == 'L-02'){
							Swal.fire({
							  type: 'error',
							  title: 'Oops...',
							  text: 'User tidak di temukan!',
							  footer: '<a href>Why do I have this issue?</a>'
							});
							$('#user').text('');
							$('#password').text('');
							$('#btn_submit').text('Login');
        					$('#btn_submit').attr('disabled',false);
						}
						else{
							Swal.fire({
							  type: 'error',
							  title: 'Oops...',
							  text: 'Undefine Error Contact your system administrator!',
							  footer: '<a href>Why do I have this issue?</a>'
							});
							$('#user').text('');
							$('#password').text('');
							$('#btn_submit').text('Login');
        					$('#btn_submit').attr('disabled',false);
						}
					}
		        }
        	});
		});
	});
</script>