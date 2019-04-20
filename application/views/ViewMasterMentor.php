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
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<th>#</th>
						<th>Nama Mentor</th>
						<th>Kelas Usia</th>
						<th>No. Telepon</th>
					</thead>
					<!-- <tbody> -->
						<?php
							$Recordset = $this->DataModels->ShowMentor()->result();
							foreach ($Recordset as $key) {
								echo "
								<tr>
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
							                    <li><a href='#' id = 'Edit' name = '".$key->id."'>Edit</a></li>
							                    <li><a href='#' id = 'Delete' name = '".$key->id."'>Delete</a></li>
							                </ul>
										</div>
									</td>
									<td>".$key->NamaMentor."</td>
									<td>".$key->KelasUsia."</td>
									<td>".$key->NoTlp."</td>
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
				<p><h4>Aktif Pasif Anak</h4></p>
				<br>
				<div class="form-group has-feedback">
					<label for="">Nomer SG :</label>
					<input type="text" name = "naikSG" id = "naikSG" class="form-control" readonly="">
				</div>

				<div class="form-group has-feedback">
					<label for="">Nama Anak :</label>
					<input type="text" name = "naikNama" id = "naikNama" class="form-control" readonly="">
				</div>
				<form id="GoSaveKet" enctype='application/json'>
					<input type="hidden" name="id" id="id">
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
						<select class="form-control select2" style="width: 100%;" id="ket" name="ket">
							<option selected="selected">None</option>
							<?php
								$Keterangan = $this->DataModels->GetKeteranganStatus();
								foreach ($Keterangan->result() as $rsKet) {
									echo "<option value = ".$rsKet->id.">".$rsKet->KeteranganStatus."</option>";
								}
							?>
						</select>
					</div>
					<button class="btn btn-general" id="btn_SaveKet">Simpan</button>
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
				<form id="SaveAnak" enctype='application/json'>
					<div class="form-group has-feedback">
						<label for="">Nama Mentor :</label>
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
	$('#ModalsAddmentor').on('hidden.bs.modal', function () {
	  location.reload();
	});
	$('#Addmentor').click(function () {
		$('#ModalsAddmentor').modal('show');
	});
	// Validating and action
	$("#SaveAnak").submit(function (e){
		$('#btn_SaveAnak').text('Tunggu Sebentar...');
        $('#btn_SaveAnak').attr('disabled',true);
        e.preventDefault();
        var me = $(this);

        // tambahdata
        // if(form_mode == 'add'){
        	$.ajax({
        		type 	:'post',
        		url 	:'<?=base_url()?>ExecuteMaster/Savedataanak_Add',
        		data 	:me.serialize(),
        		dataType:'json',
        		success:function (response) {
        			if(success.response == true){
        				Swal.fire({
						  type: 'success',
						  title: 'Sukses....',
						  text: 'Data Berhasil di tambahkan ke database anak !',
						  // footer: '<a href>Why do I have this issue?</a>'
						});
        				saved = 1;
        			}
        			else{
        				Swal.fire({
						  type: 'error',
						  title: 'Peringatan....',
						  text: 'Data gagal di tambahkan ke database anak !, silahkan hubungi administrator',
						  // footer: '<a href>Why do I have this issue?</a>'
						});
						saved = 0;
        			}
        		}
        	});
        // }
      //   else if(form_mode == 'edit'){
      //   	$.ajax({
      //   		type 	:'post',
      //   		url 	:'<?=base_url()?>ExecuteMaster/GetDataOrtu',
      //   		data 	:me.serialize(),
      //   		dataType:'json',
      //   		success:function (response) {
      //   			if(success.response == true){
      //   				Swal.fire({
						//   type: 'success',
						//   title: 'Sukses....',
						//   text: 'Data Berhasil di Rubah !',
						//   // footer: '<a href>Why do I have this issue?</a>'
						// });
      //   				saved = 1;
      //   			}
      //   			else{
      //   				Swal.fire({
						//   type: 'error',
						//   title: 'Peringatan....',
						//   text: 'Data gagal di Rubah !, silahkan hubungi administrator',
						//   // footer: '<a href>Why do I have this issue?</a>'
						// });
						// saved = 0;
      //   			}
      //   		}
      //   	});

      //   }
	});

  });

</script>