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
					<!-- <tbody> -->
						<?php
							foreach ($have_post as $key) {
								echo "
									<td>
										<div class='btn-group'>
											<button type='button' class='btn btn-danger' disable>Pilih Action
											<span class='fa fa-pencil'></span>
											</button>
											<button type='button' class='btn btn-danger dropdown-toggle' data-toggle='dropdown'>
											<span class='fa fa-filter'></span>
                    						<span class='sr-only'>Toggle Dropdown</span>
                    						</button>
                    						<ul class='dropdown-menu' role='menu'>
							                    <li><a href='#' id = 'Detail' name = '".$key->id."'>Lihat Detail</a></li>
							                    <li><a href='#' id = 'Naik' name = '".$key->id."'>Naik Kelas</a></li>
							                    <li><a href='#' id = 'status' name = '".$key->id."'>Status Aktif Pasif Anak</a></li>
							                </ul>
										</div>
									</td>
									<td>".$key->NoSG."</td>
									<td>".$key->NamaAnak."</td>
									<td>".$key->KelasUsia."</td>
									<td></td>
									<td>".$key->NoTlp."</td>
								";
							}
						?>
					<!-- </tbody> -->
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

<!-- Modal -->
<div class="modal fade" id="ModalNaik" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">  
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p><h4>Naik Kelas Usia</h4></p>
				<br>
				<div class="form-group has-feedback">
					<label for="">Nomer SG :</label>
					<input type="text" name = "naikSG" id = "naikSG" class="form-control" readonly="">
				</div>

				<div class="form-group has-feedback">
					<label for="">Nama Anak :</label>
					<input type="text" name = "naikNama" id = "naikNama" class="form-control" readonly="">
				</div>

				<div class="form-group has-feedback">
					<label for="">Kelas Usia Sekarang :</label>
					<input type="text" name = "kunow" id = "kunow" class="form-control" readonly="">
				</div>
				<form id="GoSaveKU" enctype='application/json'>
					<input type="hidden" name="id" id="id">
					<div class="form-group has-feedback">
						<label for="">Naik Ke Kelas Usia :</label>
						<select class="form-control select2" style="width: 100%;" id="KelasUsiaID" name="KelasUsiaID">
							<option selected="selected">None</option>
							<?php
								$KelasUsia = $this->DataModels->GetDataKelasUsia();
								foreach ($KelasUsia->result() as $rsKU) {
									echo "<option value = ".$rsKU->id.">".$rsKU->kelasusia."</option>";
								}
							?>
						</select>
					</div>
					<button class="btn btn-general" id="btn_SaveKU">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <p><h4>Detail Anak</h4></p>
        <br>
        <div class="nav-tabs-custom">
        	<ul class="nav nav-tabs">
        		<li class="active"><a href="#tab_1" data-toggle="tab">Informasi Anak</a></li>
        		<li><a href="#tab_2" data-toggle="tab">Informasi Sponsor</a></li>
        		<li><a href="#tab_3" data-toggle="tab">Informasi Mentor</a></li>
        		<li><a href="#tab_4" data-toggle="tab">Informasi Orang Tua</a></li>
        	</ul>
        	<div class="tab-content">
				<div class="tab-pane active" id="tab_1">
	                <b>Informasi Anak</b>
	                  <div class="form-group has-feedback">
			            <label for="">No SG</label>
			            <input type="text" name = "nosg" id = "nosg" class="form-control" readonly="">
			          </div>

			          <div class="form-group has-feedback">
			            <label for="">Nama Anak</label>
			            <input type="text" name = "namaanak" id = "namaanak" class="form-control" readonly="">
			          </div>

			          <div class="form-group has-feedback">
			            <label for="">Tempat, Tanggal Lahir</label>
			            <input type="text" name = "ttl" id = "ttl" class="form-control" readonly="">
			          </div>

			          <div class="form-group has-feedback">
			            <label for="">Email</label>
			            <input type="text" name = "email" id = "email" class="form-control" readonly="">
			          </div>

			          <div class="form-group has-feedback">
			            <label for="">Nomor Telepon / HP</label>
			            <input type="text" name = "tlp" id = "tlp" class="form-control" readonly="">
			          </div>
              	</div>
              	<div class="tab-pane" id="tab_2">
	                <b>Informasi Sponsor</b>
	          	 	  <div class="form-group has-feedback">
			            <label for="">Nama Sponsor</label>
			            <input type="text" name = "sponsor" id = "sponsor" class="form-control" readonly="">
			          </div>

			          <div class="form-group has-feedback">
			            <label for="">Asal Sponsor</label>
			            <input type="text" name = "asalsponsor" id = "asalsponsor" class="form-control" readonly="">
			          </div>

			          <div class="form-group has-feedback">
			            <label for="">Di Sponsori Sejak</label>
			            <input type="text" name = "startdate" id = "startdate" class="form-control" readonly="">
			          </div>      
              	</div>
              	<div class="tab-pane" id="tab_3">
              		<b>Informasi Mentor</b>
					  <div class="form-group has-feedback">
		            	<label for="">Kelas Usia</label>
		            	<input type="text" name = "KU" id = "KU" class="form-control" readonly="">
		          	  </div>

		          	  <div class="form-group has-feedback">
		            	<label for="">Mentor Pengampu</label>
		            	<input type="text" name = "mentor" id = "mentor" class="form-control" readonly="">
		          	  </div>
		          	  <div class="form-group has-feedback">
		            	<label for="">Nomer Telepon / HP Mentor</label>
		            	<input type="text" name = "nomentor" id = "nomentor" class="form-control" readonly="">
		          	  </div>
              	</div>
              	<div class="tab-pane" id="tab_4">
					  <div class="form-group has-feedback">
			            <label for="">Nama Orang Tua (Ayah)</label>
			            <input type="text" name = "ayah" id = "ayah" class="form-control" readonly="">
			          </div>
			          <div class="form-group has-feedback">
			            <label for="">Nomer Telepon / HP Ayah</label>
			            <input type="text" name = "noayah" id = "noayah" class="form-control" readonly="">
			          </div>
			          <div class="form-group has-feedback">
			            <label for="">Pendidikan Ayah</label>
			            <input type="text" name = "pendAyah" id = "pendAyah" class="form-control" readonly="">
			          </div>
			          <div class="form-group has-feedback">
			            <label for="">Pekerjaan Ayah</label>
			            <input type="text" name = "pekerjaanayah" id = "pekerjaanayah" class="form-control" readonly="">
			          </div>

			          <div class="form-group has-feedback">
			            <label for="">Nama Orang Tua (Ibu)</label>
			            <input type="text" name = "ibu" id = "ibu" class="form-control" readonly="">
			          </div>
			          <div class="form-group has-feedback">
			            <label for="">Nomer Telepon / HP Ibu</label>
			            <input type="text" name = "noibu" id = "noibu" class="form-control" readonly="">
			          </div>
			          <div class="form-group has-feedback">
			            <label for="">Pendidikan Ibu</label>
			            <input type="text" name = "pendIbu" id = "pendIbu" class="form-control" readonly="">
			          </div>
			          <div class="form-group has-feedback">
			            <label for="">Pekerjaan Ibu</label>
			            <input type="text" name = "pekerjaanibu" id = "pekerjaanibu" class="form-control" readonly="">
			          </div>
              	</div>
        	</div>
        </div>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
<script src="<?php echo base_url();?>Assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url();?>Assets/js/scripts.js"></script>
</body>
</html>

<script type="text/javascript">
  $(function () {
    $('#example1').DataTable();
    $('.select2').select2();
		$.ajaxSetup({
        beforeSend:function(jqXHR, Obj){
            var value = "; " + document.cookie;
            var parts = value.split("; csrf_cookie_token=");
            if(parts.length == 2)   
            Obj.data += '&csrf_token='+parts.pop().split(";").shift();
        }
    });
	// Action button
	$("#Detail").click(function () {
		var id = $(this).prop("name");
		$.ajax({
			type: "post",
			url: "<?=base_url()?>DataController/GetDataAnak",
			data: {id:id},
			dataType: "json",
			success: function (response) {
				if(response.success==true){
					$.each(response.data,function (k,v) {
						$('#nosg').val(v.NoSG);
						$('#namaanak').val(v.NamaAnak);
						$('#ttl').val(v.TempatLahir+', '+v.TanggalLahir);
						$('#email').val(v.email);
						$('#tlp').val(v.NoTlp);
						$('#sponsor').val(v.NamaSponsor);
						$('#asalsponsor').val(v.AsalSponsor);
						$('#startdate').val(v.StartSponsoring);
						$('#KU').val(v.KelasUsia);
						$('#mentor').val(v.namaMentor);
						$('#nomentor').val(v.notlpmentor);
						$('#ayah').val(v.NamaAyah);
						$('#noayah').val(v.NoTlpAyah);
						$('#pendAyah').val(v.PendidikanAyah);
						$('#pekerjaanayah').val(v.PekerjaanAyah);
						$('#ibu').val(v.NamaIbu);
						$('#noibu').val(v.NoTlpIbu);
						$('#pendIbu').val(v.PendidikanIbu);
						$('#pekerjaanibu').val(v.PekerjaanIbu);
					});
					$('#ModalDetail').modal('show');
				}
				else{
					if(response.message=="404-02"){
						Swal.fire({
						  type: 'error',
						  title: 'Oops...',
						  text: 'User tidak di temukan!'
						});
					}
					else{
						Swal.fire({
						  type: 'error',
						  title: 'Oops...',
						  text: 'Unidentified error!',
						  footer: '<a href>Why do I have this issue?</a>'
						});
					}
				}
			}
		});
		// $('#ModalDetail').modal('show');
	});
	// Naik Kelas
	$('#Naik').click(function () {
		var id = $(this).prop("name");
		$.ajax({
			type: "post",
			url: "<?=base_url()?>DataController/GetDataAnak",
			data: {id:id},
			dataType: "json",
			success: function (response) {
				if(response.success==true){
					$.each(response.data,function (k,v) {
						$('#id').val(v.id);
						$('#naikSG').val(v.NoSG);
						$('#naikNama').val(v.NamaAnak);
						$('#kunow').val(v.KelasUsia);
					});
				}
			}
		});
		$('#ModalNaik').modal('show');
	});
	// Function Update Kelas USia
	$("#GoSaveKU").submit(function (e) {
		$('#btn_SaveKU').text('Tunggu Sebentar...');
        $('#btn_SaveKU').attr('disabled',true);
		e.preventDefault();
        var me = $(this);
		$.ajax({
			type: "post",
			url: "<?=base_url()?>ExecuteMaster/SaveUpdateKU",
			data: me.serialize(),
			dataType: "json",
			success: function (response) {
				if(response.success == true){
					Swal.fire({
					  type: 'success',
					  title: 'Horay..',
					  text: 'Data Berhasil disimpan!',
					  // footer: '<a href>Why do I have this issue?</a>'
					}).then((result)=>{
						location.reload();
					});
					$('#btn_SaveKU').text('Simpan');
        			$('#btn_SaveKU').attr('disabled',false);
				}
				else{
					if(response.message == '500-02'){
						Swal.fire({
						  type: 'error',
						  title: 'Oops...',
						  text: 'Kesalahan Server, Data gagal disimpan!',
						  // footer: '<a href>Why do I have this issue?</a>'
						});
						$('#btn_SaveKU').text('Simpan');
	        			$('#btn_SaveKU').attr('disabled',false);
					}
					else{
						Swal.fire({
						  type: 'error',
						  title: 'Oops...',
						  text: 'Unidentified Error !',
						  // footer: '<a href>Why do I have this issue?</a>'
						});
						$('#btn_SaveKU').text('Simpan');
	        			$('#btn_SaveKU').attr('disabled',false);
					}
				}
			}
		});
	});
  });

</script>