<!--footer-->
		<div class="footer">
		   <p>&copy; 2016 Novus Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="<?php echo base_url();?>Assets/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="<?php echo base_url();?>Assets/js/jquery.nicescroll.js"></script>
	<script src="<?php echo base_url();?>Assets/js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo base_url();?>Assets/js/bootstrap.js"> </script>
   <!-- datatable -->
	<script src="<?php echo base_url();?>Assets/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>Assets/datatables.net/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url();?>Assets/datatables.net/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url();?>Assets/datatables.net/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url();?>Assets/datatables.net/js/buttons.print.min.js"></script>

	<script src="<?php echo base_url();?>Assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
</body>
</html>