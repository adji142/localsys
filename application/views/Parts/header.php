<!-- Starting PHP Console Hire -->

<?php
	$user_id = $this->session->userdata('userid');
	$KelasUsia_ID = 0;
	if($user_id == ''){
		echo "<script>location.replace('".base_url()."Id');</script>";
	}
	else
	{
		$KU = $this->GlobalVar->GetAccessKU($user_id);
		$KelasUsia_ID = $KU->row()->aksesid;
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
<title>Local System Admin Panel</title>
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
  
<!-- Mainly scripts -->
<script src="<?php echo base_url();?>Assets/js/jquery.metisMenu.js"></script>
<script src="<?php echo base_url();?>Assets/js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="<?php echo base_url();?>Assets/css/custom.css" rel="stylesheet">
<script src="<?php echo base_url();?>Assets/js/custom.js"></script>
<script src="<?php echo base_url();?>Assets/js/screenfull.js"></script>

<!-- Datatable -->
<link rel="stylesheet" href="<?php echo base_url();?>Assets/datatables.net-bs/css/dataTables.bootstrap.min.css">

<script src="<?php echo base_url();?>Assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>Assets/datatables.net/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>Assets/datatables.net/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>Assets/datatables.net/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>Assets/datatables.net/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>Assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Sweet alert -->
<script src="<?php echo base_url();?>Assets/sweetalert2-8.8.0/package/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>Assets/sweetalert2-8.8.0/package/dist/sweetalert2.min.css">

<!-- Select 2 -->
<script src="<?php echo base_url();?>Assets/select2/dist/js/select2.full.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>Assets/select2/dist/css/select2.min.css">
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}
			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
		});
		</script>



</head>
<body>
<div id="wrapper">
       <!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="<?php echo base_url()?>">Local System</a></h1>         
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
			</section>
			<form class=" navbar-left-right">
              <input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
              <input type="submit" value="" class="fa fa-search">
            </form>
            <div class="clearfix"> </div>
           </div>
     
       
            <!-- Brand and toggle get grouped for better mobile display -->
		 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="drop-men" >
		        <ul class=" nav_1">
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">Rackham<i class="caret"></i></span><img src="<?php echo base_url();?>Assets/images/wo.jpg"></a>
		              <ul class="dropdown-menu " role="menu">
		                <li><a href="<?php base_url()?>Auth/Login/Logout"><i class="fa fa-sign-out"></i>Logout</a></li>
		              </ul>
		            </li>
		           
		        </ul>
		     </div><!-- /.navbar-collapse -->
			<div class="clearfix">
       
     </div>
	  
		    <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo base_url()?>" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
                    </li>
											<?php
												$SidebarDynamic = $this->GlobalVar->GetSideBar($user_id);
												$menu = '';
												$link = '';
												foreach ($SidebarDynamic->result() as $dt) {
													if($dt->menu == $dt->menusubmenu){
														$menu .= '<li><a href="'.$dt->link.'" class=" hvr-bounce-to-right"><i class="fa '.$dt->ico.' nav_icon"></i> <span class="nav-label">'.$dt->permissionname.'</span><span class="fa arrow"></span></a>';
													}
													else{
														$menu .= '
														<ul class="nav nav-second-level">
															<li><a href="'.base_url($dt->link).'" class=" hvr-bounce-to-right"> <i class="fa '.$dt->ico.' nav_icon"></i>'.$dt->permissionname.'</a></li>
														</ul>
														
														';
													}
												}
												echo $menu;
											?>
                </ul>
            </div>
			</div>
        </nav>