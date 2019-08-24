<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBHk3cqxCVMl-YTNuagHQm6AZBBQLfv9IE&libraries=places"
		type="text/javascript"></script>
<div class="accordion" id="accordionExample">
	<?php foreach ($list_kost as $key => $value): ?>
		<div class="card">
			<div class="card-header" id="headingOne<?= $key ?>">
				<h2 class="mb-0">
					<button class="btn btn-link" type="button" data-toggle="collapse"
							data-target="#collapseOne<?= $key ?>"
							aria-expanded="true" aria-controls="collapseOne">
						<?= strtoupper($value->nama_kost) ?>
					</button>
					<i class="fas fa-chevron-right float-right text-primary"></i>
				</h2>
			</div>

			<div id="collapseOne<?= $key ?>" class="collapse <?= $key == 0 ? 'show' : 'hidden' ?>"
				 aria-labelledby="headingOne<?= $key ?>" data-parent="#accordionExample">
				<div class="card-body">
					<?php if ($this->session->userdata("alamat") != "" && $this->session->userdata("latitude") != "" && $this->session->userdata("longitude")): ?>
						<div class="row">
							<div class="col-1">
								<i class="fas fa-fw fa-street-view text-primary"></i>
							</div>
							<div class="col-10">
								<span>Jarak : <b><?= $value->distance ?>km</b> dari kamu</span>
							</div>
						</div>
					<?php endif; ?>
					<div class="row">
						<div class="col-1">
							<i class="fas fa-fw fa-map-marked-alt text-primary"></i>
						</div>
						<div class="col-10">
							<span>Alamat : <b><?= $value->alamat_kost ?></b></span>
						</div>
					</div>
					<div class="row">
						<div class="col-1">
							<i class="far fa-fw fa-calendar-alt text-primary"></i>
						</div>
						<div class="col-10">
							<span>Tipe bayar : <b><?= $value->type_bayar_kost ?></b></span>
						</div>
					</div>
					<div class="row">
						<div class="col-1">
							<i class="fas fa-restroom text-primary"></i>
						</div>
						<div class="col-10">
							<span>Tipe kostan : <b><?= $value->type_kost ?></b></span>
						</div>
					</div>
					<div class="row">
						<div class="col-1">
							<i class="fas fa-fw fa-dollar-sign text-primary"></i>
						</div>
						<div class="col-10">
							<span>Harga : <b>Rp<?= str_replace(",", ".", number_format($value->harga_kost)) ?>,-</b></span>
						</div>
					</div>
					<div class="row">
						<div class="col-1">
							<i class="fas fa-fw fa-bed text-primary"></i>
						</div>
						<div class="col-10">
							<span>Fasilitas : <b><?php
									$fasilitas = json_decode($value->fasilitas_kost);
									$isi = "";
									foreach ($fasilitas as $item) {
										$isi .= ucwords($item) . ", ";
									}
									echo substr($isi, 0, -2);
									?></b></span>
						</div>
					</div>
					<div class="row">
						<div class="col-1">
							<i class="fas fa-book text-primary"></i>
						</div>
						<div class="col-10">
							<span>Deskripsi : <i style="font-weight: bold"
												 class="text-info">"<?= $value->deskripsi_kost ?>"</i>.</span>
						</div>
					</div>
					<div class="row mt-2">
						<?php if ($this->session->userdata("alamat") != "" && $this->session->userdata("latitude") != "" && $this->session->userdata("longitude")): ?>
							<div id="rute<?= $key ?>" style="width:100%;height:380px;"></div>
							<script type="text/javascript">
                                var customLabel = {
                                    restaurant: {
                                        label: 'R'
                                    },
                                    bar: {
                                        label: 'B'
                                    }
                                };

                                function initMap<?=$key?>() {
                                    var lat = <?=$this->session->userdata("latitude")?>;
                                    var lng = <?=$this->session->userdata("longitude")?>;
                                    //var options<?//=$key?>// = {
                                    //    componentRestrictions: {country: 'id'},
                                    //    zoom: 25,
                                    //    center: '<?//=$this->session->userdata("alamat")?>//',
                                    //    mapTypeId: google.maps.MapTypeId.ROADMAP
                                    //}
                                    var directionsService = new google.maps.DirectionsService;
                                    var directionsDisplay = new google.maps.DirectionsRenderer;
                                    var location = {
                                        lat: parseFloat(<?=$value->latitude?>),
                                        lng: parseFloat(<?=$value->longitude?>)
                                    };

                                    var map = new google.maps.Map(document.getElementById('rute<?=$key?>'), {
                                        scaleControl: false,
                                        center: location,
                                        zoom: 25,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    });
                                    // end outo completeF
                                    directionsDisplay.setMap(map);

                                    var infoWindow = new google.maps.InfoWindow;
                                    infoWindow.setContent("<?=$value->nama_kost?>");

                                    var marker = new google.maps.Marker({map: map, position: location});
                                    marker.addListener('click', function () {
                                        infoWindow.open(map, marker);
                                    });

                                    // show rute dari titik user ke tujuan terdekat
                                    var start = {
                                        lat: parseFloat(<?=$this->session->userdata("latitude")?>,),
                                        lng: parseFloat(<?=$this->session->userdata("longitude")?>,)
                                    };
                                    var end = location
                                    directionsService.route({
                                        origin: start,
                                        destination: end,
                                        travelMode: 'DRIVING'
                                    }, function (response, status) {
                                        if (status === 'OK') {
                                            directionsDisplay.setDirections(response);
                                        } else {
                                            window.alert('Directions request failed due to ' + status);
                                        }
                                    });
                                }

                                function downloadUrl(url, callback) {
                                    var request = window.ActiveXObject ?
                                        new ActiveXObject('Microsoft.XMLHTTP') :
                                        new XMLHttpRequest;

                                    request.onreadystatechange = function () {
                                        if (request.readyState == 4) {
                                            request.onreadystatechange = doNothing;
                                            callback(request, request.status);
                                        }
                                    };

                                    request.open('GET', url, true);
                                    request.send(null);
                                }

                                function doNothing() {
                                }

                                // google.maps.event.addDomListener(window, 'load', initialize);
                                google.maps.event.addDomListener(window, 'load', initMap<?=$key?>);
							</script>
						<?php else: ?>
						<div id="showMaps<?= $key ?>" style="width:100%;height:380px;"></div>
						<script>
                            function initializeList<?=$key?>() {
                                var propertiPeta = {
                                    center: new google.maps.LatLng(<?=$value->latitude?>,<?=$value->longitude?>),
                                    zoom: 18,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                };

                                var peta = new google.maps.Map(document.getElementById("showMaps<?=$key?>"), propertiPeta);

                                // membuat Marker
                                var marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(<?=$value->latitude?>,<?=$value->longitude?>),
                                    map: peta
                                });
                            }

                            // event jendela di-load
                            google.maps.event.addDomListener(window, 'load', initializeList<?=$key?>);
						</script>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
