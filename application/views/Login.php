<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Login to Get access</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="<?php echo base_url();?>Assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="<?php echo base_url();?>Assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="<?php echo base_url();?>Assets/js/jquery-1.11.1.min.js"></script> 
<!--icons-css-->
<link href="<?php echo base_url();?>Assets/css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
<!-- Sweet alert -->
<link href="<?php echo base_url();?>Assets/sweetalert2-8.8.0/package/dist/sweetalert2.min.css" rel="stylesheet"> 
</head>
<body>	
<div id="page-wrapper">
	<br><br>
	<div class="main-page login-page ">
		<h3 class="title1">SignIn Page</h3>
		<div class="widget-shadow">
			<div class="login-top">
				<h4>Welcome back LKPA AdminPanel ! </h4>
			</div>
			<div class="login-body">
				<form id="Login" enctype='application/json'>
					<div class="form-group">
						<input type="text" class="user" name="user" placeholder="Username" required="" id="user">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="lock" placeholder="password" required="" id="password">
					</div>
					<!-- <input type="submit" name="Sign In" value="Sign In"> -->
					<button class="btn btn-general" id="btn_submit">Login</button>
				</form>
			</div>
		</div>
		
		<div class="login-page-bottom">
			<h5></h5>
	</div>
</div>

<!--scrolling js-->
<script src="<?php echo base_url();?>Assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url();?>Assets/js/scripts.js"></script>		
<!--//scrolling js-->
<script src="<?php echo base_url();?>Assets/js/bootstrap.js"> </script>
<!-- Sweet alert -->
<script src="<?php echo base_url();?>Assets/sweetalert2-8.8.0/package/dist/sweetalert2.all.min.js"> </script>
<!-- mother grid end here-->
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
						location.replace("<?=base_url()?>")
					}
					else{
						if(response.message == 'L-01'){
							// Swal.fire(
			// 'Good job!',
			// 'You clicked the button!',
			// 'success'
			// )
						}
					}
		        }
        	});
		});
	});
</script>