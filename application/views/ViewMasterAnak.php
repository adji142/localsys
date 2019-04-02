<?php
    require_once(APPPATH."views/Parts/header.php");
?>

<div id="page-wrapper">
	<div class="main-page">
		<!-- Code Hire -->
		<!-- <div class="tables"> -->
			<!-- <div class="panel-body widget-shadow"> -->
				<!-- <table id="example1" class="table table-bordered table-hover">
					<thead>
						<th>Nama Stock</th>
				        <th>Warna</th>
				        <th>Nomer Mesin</th>
				        <th>Nomer Rangka</th>
				        <th>Stock Gudang</th>
					</thead>
					<tbody>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tbody>
				</table> -->
			<!-- </div> -->
		<!-- </div> -->
	</div>
</div>
<script>
  $(function () {
    $('#example1').DataTable({
    	dom: 'Bfrtip',
    	buttons: [
            'copy', 'excel', 'pdf', 'print'
        ],
        'ordering'    : false,
    });
  })
</script>
<?php
    require_once(APPPATH."views/Parts/footer.php");
?>

