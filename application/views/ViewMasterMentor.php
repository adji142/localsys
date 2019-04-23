<?php
		require_once(APPPATH."views/Parts/header.php");
?>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<div id="page-wrapper" class="gray-bg dashbard-1">
	<div class="content-main">
		<div class="banner">
			<h2>
				<a href="<?php echo base_url();?>">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Master Mentor</span>
			</h2>
		</div>
		<div class="blank">
			<div class="blank-page">
				<!-- Code Hire -->
				<button type='button' class='btn btn-danger' id="Addmentor" name="">Tambah</button>
				<button type='button' class='btn btn-warning' id="Viewmentor" name="">View Mentor</button>
				<button type='button' class='btn btn-info' id="AktifPasifMentor" name="">Aktif Pasif Mentor</button>

				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<th>Nama Mentor</th>
						<th>Kelas Usia</th>
						<th>No. Telepon</th>
						<th>Jumlah Anak</th>
					</thead>
					<!-- <tbody> -->
						<?php
							$Recordset = $this->DataModels->ShowMentor()->result();
							foreach ($Recordset as $key) {
								echo "
								<tr>
									<td>".$key->namaMentor."</td>
									<td>".$key->KelasUsia."</td>
									<td>".$key->noTlp."</td>
									<td>".$key->jml."</td>
								</tr>
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
<div class="modal fade" id="ModalAktifPasif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">  
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p><h4>Aktif Pasif Mentor</h4></p>
				<br>
				<form id="GoSaveAP" enctype='application/json'>
					<div class="form-group has-feedback">
						<label for="">Nama Mentor :</label>
						<input type="text" name = "mtrNamaAP" id = "mtrNamaAP" class="form-control">
					</div>
					<input type="hidden" name="idMentorAP" id="idMentorAP">
					<div class="form-group has-feedback">
						<label for="">Aktif / Pasif :</label>
						<br>
						<label class="switch">
						  <input type="checkbox" class="form-control" id="checked">
						  <span class="slider round"></span>
						</label>
					</div>
					<div class="form-group has-feedback">
						<label for="">Keterangan :</label>
						<input type="text" name = "keterangan" id = "keterangan" class="form-control">
					</div>
					<button class="btn btn-general" id="btn_SaveAP">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="ModalsAddmentor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p><h4>Detail Anak</h4></p>
				<br>
				<form id="SaveMentor" enctype='application/json'>
					<div class="form-group has-feedback">
						<label for="">Nama Mentor :</label>
						<input type="hidden" name = "RecordOnerid" id = "RecordOnerid" value="<?php echo $RecordOnerid;?>" class="form-control">
						<input type="hidden" name = "idmentor" id = "idmentor" class="form-control">
						<input type="text" name = "nmMentor" id = "nmMentor" class="form-control" required="">
					</div>
					<div class="form-group has-feedback">
						<label for="">Kelas Usia :</label>
						<select class="form-control select2" style="width: 100%;" id="KelasUsiaID" name="KelasUsiaID" required="">
							<option selected="selected">None</option>
							<?php
								$KelasUsia = $this->DataModels->GetDataKelasUsia();
								foreach ($KelasUsia->result() as $rsKU) {
									echo "<option value = ".$rsKU->id.">".$rsKU->kelasusia."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group has-feedback">
						<label for="">Email Mentor :</label>
						<input type="email" name = "emailMentor" id = "emailMentor" class="form-control" required="">
					</div>
					<div class="form-group has-feedback">
						<label for="">No. Tlp Mentor :</label>
						<input type="text" name = "tlpMentor" id = "tlpMentor" class="form-control" required="">
					</div>
					<button class="btn btn-general" id="btn_SaveMentor">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
    </div><!-- /.modal-dialog -->
  </div>
<script src="<?php echo base_url();?>Assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url();?>Assets/js/scripts.js"></script>
</body>
</html>

<script type="text/javascript">
  $(function () {
  	var form_mode = '';
  	var saved = 0;
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
	$("#Edit").click(function () {
		// alert($('#RecordOnerid').val())
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
	$('#mtrNamaAP').focusout(function () {
		var namaMentor = $('#mtrNamaAP').val();
		$.ajax({
			type 	: 'post',
			url 	: '<?=base_url()?>ExecuteMaster/GetMentor',
			data 	: {namaMentor,namaMentor},
			dataType: 'json',
			success:function (response) {
				if (response.success == true) {
					$.each(response.data,function (k,v) {
						$('#idMentorAP').val(v.id);
						$('#mtrNamaAP').val(v.NamaMentor);
						$('#keterangan').val(v.Keterangan);
						if(v.status == 1){
							$('#checked').attr('checked','checked');
						}
						else{
							$('#checked').attr('readonly',true);
							$('#ket').attr('readonly',true);
						}
					});
				}
				else
				{
					Swal.fire({
					  type: 'error',
					  title: 'Peringatan....',
					  text: 'Data Tidak Di temukan',
					  // footer: '<a href>Why do I have this issue?</a>'
					});
					$('#idMentorAP').val('');
					$('#mtrNamaAP').val('');
					$('#keterangan').val('');
				}
			}
		});
	});
	$('#nmMentor').focusout(function () {
		var namaMentor = $('#nmMentor').val();
		if(form_mode == 'edit'){
			$.ajax({
				type 	: 'post',
				url 	: '<?=base_url()?>ExecuteMaster/GetMentor',
				data 	: {namaMentor,namaMentor},
				dataType: 'json',
				success:function(response){
					if(response.success == true){
						$.each(response.data,function (k,v) {
							$('#idmentor').val(v.id);
							$('#nmMentor').val(v.NamaMentor);
							$('#KelasUsiaID').val(v.KelasUsiaID).change();
							$('#emailMentor').val(v.Email);
							$('#tlpMentor').val(v.NoTlp);
						});
					}
					else{
						Swal.fire({
						  type: 'error',
						  title: 'Peringatan....',
						  text: 'Data Tidak Di temukan',
						  // footer: '<a href>Why do I have this issue?</a>'
						});
						$('#idmentor').val('');
						$('#nmMentor').val('');
						$('#KelasUsiaID').val('').change();
						$('#emailMentor').val('');
						$('#tlpMentor').val('');
					}
				}
			});
		}
	});
	$('#ModalsAddmentor').on('hidden.bs.modal', function () {
	  location.reload();
	});
	$('#ModalAktifPasif').on('hidden.bs.modal', function () {
	  location.reload();
	});
	$('#Addmentor').click(function () {
		form_mode = 'add';
		$('#ModalsAddmentor').modal('show');
	});
	$('#Viewmentor').click(function () {
		form_mode = 'edit';
		$('#ModalsAddmentor').modal('show');
	});
	$('#AktifPasifMentor').click(function () {
		$('#ModalAktifPasif').modal('show');
	});
	// Validating and action
	// Aktif pasif
	$("#GoSaveAP").submit(function (e) {
		$('#btn_SaveAP').text('Tunggu Sebentar...');
        $('#btn_SaveAP').attr('disabled',true);
        e.preventDefault();
        var me = $(this);
        $.ajax({
        	type 	:'post',
    		url 	:'<?=base_url()?>ExecuteMaster/Savedatamentor_Add',
    		data 	:me.serialize(),
    		dataType:'json',
    		success:function (response) {
    			if (response.success == true) {
    				Swal.fire({
					  type: 'success',
					  title: 'Sukses....',
					  text: 'Data Berhasil di tambahkan ke database anak !',
					  // footer: '<a href>Why do I have this issue?</a>'
					}).then((result)=>{
						location.reload();
					});
    			}
    			else{
    				Swal.fire({
					  type: 'error',
					  title: 'Peringatan....',
					  text: 'Data gagal di Simpan !, silahkan hubungi administrator',
					  // footer: '<a href>Why do I have this issue?</a>'
					});
    				$('#btn_SaveAP').text('Simpan');
        			$('#btn_SaveAP').attr('disabled',false);
    			}
    		}
        });
	});
	// Mentor add / edit
	$("#SaveMentor").submit(function (e){
		$('#btn_SaveMentor').text('Tunggu Sebentar...');
        $('#btn_SaveMentor').attr('disabled',true);
        e.preventDefault();
        var me = $(this);
        if (form_mode == 'add'){ 
	    	$.ajax({
	    		type 	:'post',
	    		url 	:'<?=base_url()?>ExecuteMaster/Savedatamentor_Add',
	    		data 	:me.serialize(),
	    		dataType:'json',
	    		success:function (response) {
	    			if(response.success == true){
	    				Swal.fire({
						  type: 'success',
						  title: 'Sukses....',
						  text: 'Data Berhasil di tambahkan ke database anak !',
						  // footer: '<a href>Why do I have this issue?</a>'
						}).then((result)=>{
							location.reload();
						});
	    			}
	    			else{
	    				Swal.fire({
						  type: 'error',
						  title: 'Peringatan....',
						  text: 'Data gagal di tambahkan ke database anak !, silahkan hubungi administrator',
						  // footer: '<a href>Why do I have this issue?</a>'
						});
						saved = 0;
						$('#btn_SaveMentor').text('Simpan');
        				$('#btn_SaveMentor').attr('disabled',false);
	    			}
	    		}
	    	});
	    }
	    else{
	    	$.ajax({
	    		type 	:'post',
	    		url 	:'<?=base_url()?>ExecuteMaster/Savedatamentor_Edit',
	    		data 	:me.serialize(),
	    		dataType:'json',
	    		success:function (response) {
	    			if(response.success == true){
	    				Swal.fire({
						  type: 'success',
						  title: 'Sukses....',
						  text: 'Data Berhasil di simpan ke database anak !',
						  // footer: '<a href>Why do I have this issue?</a>'
						}).then((result)=>{
							location.reload();
						});
	    			}
	    			else{
	    				Swal.fire({
						  type: 'error',
						  title: 'Peringatan....',
						  text: 'Data gagal di tambahkan ke database anak !, silahkan hubungi administrator',
						  // footer: '<a href>Why do I have this issue?</a>'
						});
						saved = 0;
						$('#btn_SaveMentor').text('Simpan');
        				$('#btn_SaveMentor').attr('disabled',false);
	    			}
	    		}
	    	});
	    }
	});

  });

</script>