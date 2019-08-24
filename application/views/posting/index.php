<p class="text-center"><span class="badge badge-danger"><?=$this->session->userdata("msg")?></span></p>
<nav>
	<div class="nav nav-tabs w-100" id="nav-tab" role="tablist">
		<a class="nav-item nav-link <?= $active == false ? 'active' : '' ?> w-50 text-center" id="nav-home-tab"
		   data-toggle="tab" href="#nav-home"
		   role="tab" aria-controls="nav-home" aria-selected="true">POST</a>
		<a class="nav-item nav-link <?= $active == 'active' ? 'active' : '' ?>  w-50 text-center" id="nav-profile-tab"
		   data-toggle="tab" href="#nav-profile"
		   role="tab" aria-controls="nav-profile" aria-selected="false">LIST</a>
	</div>
</nav>
<div class="tab-content pt-3" id="nav-tabContent">
	<div class="tab-pane fade show <?= $active == false ? 'active' : '' ?> " id="nav-home" role="tabpanel"
		 aria-labelledby="nav-home-tab">
		<h6 class="text-center">Lengkapi informasi</h6>
		<h5 class="text-center"><span
				class="text-center badge badge-primary"><?= $this->session->flashdata('msg') ?></span></h5>

		<form action="<?= base_url("post_iklan/post_iklan_kostan") ?>" method="post">
			<div class="form-group">
				<label for="nama_kost">Nama Kost</label>
				<input type="text" class="form-control" id="nama_kost" name="_nama_kost"
					   placeholder="Masukkan nama kost">
			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect1" style="display: block;">Tipe kost</label>
				<!-- <select class="form-control" name="_tipe_kost" id="exampleFormControlSelect1">
					<option value="putra">Putra</option>
					<option value="putri">Putri</option>
					<option value="campur">Campur</option>
				</select> -->

				<div class="custom-control custom-radio d-inline">
				  <input type="radio" id="customRadio1" name="_tipe_kost" value="putra" class="custom-control-input">
				  <label class="custom-control-label" for="customRadio1">Putra</label>
				</div>
				<div class="custom-control custom-radio d-inline">
				  <input type="radio" id="customRadio2" value="putri" name="_tipe_kost" class="custom-control-input">
				  <label class="custom-control-label" for="customRadio2">Putri</label>
				</div>
				<div class="custom-control custom-radio d-inline">
				  <input type="radio" id="customRadio3" value="campur" name="_tipe_kost" class="custom-control-input">
				  <label class="custom-control-label" for="customRadio3">Campur</label>
				</div>

			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect2" style="display: block;">Tipe bayar</label>
				<!-- <select class="form-control" name="_tipe_bayar" id="exampleFormControlSelect2">
					<option value="1bulana">Per Bulanan</option>
					<option value="3bulana">per 3 Bulanan</option>
					<option value="1tahun">Per Tahunan</option>
				</select> -->
				<div class="custom-control custom-radio d-inline">
				  <input type="radio" id="customRadio4" name="_tipe_bayar" value="1bulan" class="custom-control-input">
				  <label class="custom-control-label" for="customRadio4">1Bulan</label>
				</div>
				<div class="custom-control custom-radio d-inline">
				  <input type="radio" id="customRadio5" value="3bulan" name="_tipe_bayar" class="custom-control-input">
				  <label class="custom-control-label" for="customRadio5">3Bulan</label>
				</div>
				<div class="custom-control custom-radio d-inline">
				  <input type="radio" id="customRadio6" value="1tahun" name="_tipe_bayar" class="custom-control-input">
				  <label class="custom-control-label" for="customRadio6">1Tahun</label>
				</div>
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<input type="text" class="form-control" id="alamat" name="_alamat" placeholder="Masukkan alamat">
			</div>
			<div class="form-group">
				<label for="">Latitude</label>
				<input type="text" class="form-control" id="latitude" name="_latitude" placeholder="terisi otomatis"
					   readonly>
			</div>
			<div class="form-group">
				<label for="">Longitude</label>
				<input type="text" class="form-control" id="longitude" name="_longitude" placeholder="terisi otomaris"
					   readonly>
			</div>
			<div class="form-group">
				<label for="no_telp">No. Telp</label>
				<input type="text" class="form-control" id="no_telp" name="_no_telp" placeholder="Masukkan no.telp">
			</div>
			<div class="form-group">
				<label for="harga">Harga</label>
				<input type="text" class="form-control" id="harga" name="_harga" placeholder="Masukkan harga">
			</div>
			<div class="form-group">
				<p>Fasilitas</p>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="_fasilitas1" id="customCheck1" value="ac">
					<label class="custom-control-label" for="customCheck1">AC</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="_fasilitas2" value="tempat tidur"
						   id="customCheck2">
					<label class="custom-control-label" for="customCheck2">Tempat tidur</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="_fasilitas3" value="kamar mandi dalam"
						   id="customCheck3">
					<label class="custom-control-label" for="customCheck3">Kamar mandi dalam</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="_fasilitas4" value="wifi"
						   id="customCheck5">
					<label class="custom-control-label" for="customCheck5">Wifi</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" name="_fasilitas5" id="customCheck4"
						   value="kamar mandi luar">
					<label class="custom-control-label" for="customCheck4">Kamar mandi luar</label>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Deskripsi</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" name="_deskripsi"
						  rows="3" placeholder="Tulis deskripsi"></textarea>
			</div>
			<button class="btn btn-primary w-100 rounded-pill my-2" type="submit" name="_post_iklan">POST
				IKLAN
			</button>
		</form>

	</div>
	<div class="tab-pane fade <?= $active == 'active' ? 'active show' : '' ?> " id="nav-profile" role="tabpanel"
		 aria-labelledby="nav-profile-tab">
		<div class="accordion" id="accordionExample">
			<?php foreach ($data_kost as $key => $value): ?>
				<div class="card">
					<div class="card-header" id="headingOne<?= $key ?>" style="padding: unset;">
						<h2 class="mb-0">
							<button class="btn btn-link" type="button" data-toggle="collapse"
									data-target="#collapseOne<?= $key ?>"
									aria-expanded="true" aria-controls="collapseOne">
								<?= strtoupper($value->nama_kost) ?>
							</button>
							<a class="far fa-fw fa-minus-square float-right text-danger ml-2 delete"
							   href="<?= base_url("post_iklan/delete/$value->kostan_id") ?>"
							   style="margin-top: 5px;"></a>
							<a data-value="value"
							   href="<?= base_url("post_iklan/edit/$value->kostan_id") ?>"
							   class="far fa-fw fa-edit float-right text-primary edit" style="margin-top: 5px;"></a>
						</h2>
					</div>

					<div id="collapseOne<?= $key ?>" class="collapse hidden" aria-labelledby="headingOne<?= $key ?>"
						 data-parent="#accordionExample">
						<div class="card-body">
							<!--						<div class="row">-->
							<!--							<div class="col-1">-->
							<!--								<i class="fas fa-fw fa-street-view text-primary"></i>-->
							<!--							</div>-->
							<!--							<div class="col-10">-->
							<!--								<span>18km dari sini</span>-->
							<!--							</div>-->
							<!--						</div>-->
							<div class="row">
								<div class="col-1">
									<i class="fas fa-fw fa-map-marked-alt text-primary"></i>
								</div>
								<div class="col-10">
									<span>Alamat : <?= $value->alamat_kost ?></span>
								</div>
							</div>
							<div class="row">
								<div class="col-1">
									<i class="fas fa-restroom text-primary"></i>
								</div>
								<div class="col-10">
									<span>Tipe kost : <?= $value->type_kost ?></span>
								</div>
							</div>
							<div class="row">
								<div class="col-1">
									<i class="far fa-fw fa-calendar-alt text-primary"></i>
								</div>
								<div class="col-10">
									<span>Tipe bayar : <?= $value->type_bayar_kost ?></span>
								</div>
							</div>
							<div class="row">
								<div class="col-1">
									<i class="fas fa-fw fa-dollar-sign text-primary"></i>
								</div>
								<div class="col-10">
									<span>Harga : Rp.<?= str_replace(",", ".", number_format($value->harga_kost)) ?>,-</span>
								</div>
							</div>
							<div class="row">
								<div class="col-1">
									<i class="fas fa-fw fa-bed text-primary"></i>
								</div>
								<div class="col-10">
								<span>Fasilitas : <?php
									$faslitas = json_decode($value->fasilitas_kost);
//									print_r($faslitas);
									$isi = "";
									foreach ($faslitas as $item) {
										if ($item != "")
											$isi .= ucwords($item) . ", ";
									}
									echo substr($isi, 0, -2);
									?></span>
								</div>
							</div>
							<div class="row">
								<div class="col-1">
									<i class="fas fa-fw fa-question-circle text-primary"></i>
								</div>
								<div class="col-10">
								<span>Deskripsi : <?=$value->deskripsi_kost?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBHk3cqxCVMl-YTNuagHQm6AZBBQLfv9IE&libraries=places"
		type="text/javascript"></script>
<!-- AIzaSyDj-hFGBMNwgXz91WdQn5O1N6mgxKJcX1U -->
<!-- AIzaSyBHk3cqxCVMl-YTNuagHQm6AZBBQLfv9IE -->

<script type="text/javascript">
    function initialize() {
        var input = document.getElementById('alamat');
        var autocomplete = new google.maps.places.Autocomplete(input);
        var options = {
            componentRestrictions: {country: 'id'}
        };
        autocomplete.setOptions(options);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            var lat = place.geometry.location.lat();
            var lng = place.geometry.location.lng();
            $("#latitude").val(lat);
            $("#longitude").val(lng);

        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
		
		
