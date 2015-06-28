$(document).ready(function () {
	InitMap();
	ListenKelurahanSelect();
});

/*
function LoadMapProperty() {
	locations = new Array(
		[34.01312, -118.496808]
	);
	
	var mapOptions = {
		center: new google.maps.LatLng(-6.889025, 107.615872),
		zoom: 14,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false
	};

	map = new google.maps.Map(document.getElementById('property-map'), mapOptions);

	$.each(locations, function (index, location) {
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(location[0], location[1]),
			map: map,
			icon: 'assets/img/marker-transparent.png'
		});

		var myOptions = {
			content: '<div class="infobox"><div class="image"><img src="http://html.realia.byaviators.com/assets/img/tmp/property-tiny-1.png" alt=""></div><div class="title"><a href="detail.html">1041 Fife Ave</a></div><div class="area"><span class="key">Area:</span><span class="value">200m<sup>2</sup></span></div><div class="price">€450 000.00</div><div class="link"><a href="detail.html">View more</a></div></div>',
			disableAutoPan: false,
			maxWidth: 0,
			pixelOffset: new google.maps.Size(-146, -190),
			zIndex: null,
			closeBoxURL: "",
			infoBoxClearance: new google.maps.Size(1, 1),
			position: new google.maps.LatLng(location[0], location[1]),
			isHidden: false,
			pane: "floatPane",
			enableEventPropagation: false
		};
		marker.infobox = new InfoBox(myOptions);
		marker.infobox.isOpen = false;

		var myOptions = {
			draggable: true,
			content: '<div class="marker"><div class="marker-inner"></div></div>',
			disableAutoPan: true,
			pixelOffset: new google.maps.Size(-21, -58),
			position: new google.maps.LatLng(location[0], location[1]),
			closeBoxURL: "",
			isHidden: false,
			// pane: "mapPane",
			enableEventPropagation: true
		};
		marker.marker = new InfoBox(myOptions);
		marker.marker.open(map, marker);
		markers.push(marker);

		google.maps.event.addListener(marker, "click", function (e) {
			var curMarker = this;

			$.each(markers, function (index, marker) {
				// if marker is not the clicked marker, close the marker
				if (marker !== curMarker) {
					marker.infobox.close();
					marker.infobox.isOpen = false;
				}
			});


			if (curMarker.infobox.isOpen === false) {
				curMarker.infobox.open(map, this);
				curMarker.infobox.isOpen = true;
				map.panTo(curMarker.getPosition());
			} else {
				curMarker.infobox.close();
				curMarker.infobox.isOpen = false;
			}

		});
	});
}
*/

var map;
var markers = [];
var locations;

// Inisialisasi Map
function LoadMap(lokasi) {
	
	var mapOptions = {
		center: new google.maps.LatLng(-6.8678485, 107.605138),
		zoom: 9,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false
	};

	map = new google.maps.Map(document.getElementById('map'), mapOptions);

	loadUsaha('proses/daftar_usaha.php');
}

// Reset Marker dan Menambahkan Semua Marker dari Array Locations
function prepareMarker() {
	for(var i = 0; i < markers.length; i++) {
		markers[i].setMap(null);
		markers[i].marker.setMap(null);
		markers[i].infobox.setMap(null);
		markers[i].infobox.close();
	}
	markers = [];
	
	$.each(locations, function (index, location) {
		addMarker(location);
	});
	
	calculateBound();
}

// Membuat Marker
function addMarker(location) {
	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(location.latitude, location.longtitude),
		map: map,
		icon: 'assets/img/marker-transparent.png'
	});

	var myOptions = {
		content: '<div class="infobox"><div class="title"><a href="detail.php?id_usaha=' + location.idUsaha + '">' + location.namaUsaha + '</a></div><div class="area"><span class="key">Alamat: </span><span class="value">' + location.alamatUsaha + '</span></div><div class="link"><a href="detail.php?id_usaha=' + location.idUsaha + '">Detail usaha</a></div></div>',
		disableAutoPan: false,
		maxWidth: 0,
		pixelOffset: new google.maps.Size(-146, -190),
		zIndex: null,
		closeBoxURL: "",
		infoBoxClearance: new google.maps.Size(1, 1),
		position: new google.maps.LatLng(location.latitude, location.longtitude),
		isHidden: false,
		pane: "floatPane",
		enableEventPropagation: false
	};
	marker.infobox = new InfoBox(myOptions);
	marker.infobox.isOpen = false;

	var myOptions = {
		draggable: true,
		content: '<div class="marker"><div class="marker-inner"></div></div>',
		disableAutoPan: true,
		pixelOffset: new google.maps.Size(-21, -58),
		position: new google.maps.LatLng(location.latitude, location.longtitude),
		closeBoxURL: "",
		isHidden: false,
		// pane: "mapPane",
		enableEventPropagation: true
	};
	marker.marker = new InfoBox(myOptions);
	marker.marker.open(map, marker);

	google.maps.event.addListener(marker, "click", function (e) {
		var curMarker = this;

		$.each(markers, function (index, marker) {
			// if marker is not the clicked marker, close the marker
			if (marker !== curMarker) {
				marker.infobox.close();
				marker.infobox.isOpen = false;
			}
		});

		if (curMarker.infobox.isOpen === false) {
			curMarker.infobox.open(map, this);
			curMarker.infobox.isOpen = true;
			map.panTo(curMarker.getPosition());
		} else {
			curMarker.infobox.close();
			curMarker.infobox.isOpen = false;
		}

	});
	
	markers.push(marker);
}

// Mengatur Map Fit Dengan Seluruh Marker
function calculateBound() {
	var bounds = new google.maps.LatLngBounds();
	for(var i = 0; i < locations.length; i++) {
		bounds.extend(new google.maps.LatLng(locations[i].latitude, locations[i].longtitude));
	}
	
	map.fitBounds(bounds);
}

// Listen Ketika Web Terload Semua
function InitMap() {
	google.maps.event.addDomListener(window, 'load', LoadMap);
	//google.maps.event.addDomListener(window, 'load', LoadMapProperty);
}

// Listen Perubahan Value Select Kelurahan
function ListenKelurahanSelect() {
	$('#kelurahan').chained('#kecamatan');
	$('#kelurahan, #kecamatan').on('change', function(){
		$('#kelurahan, #kecamatan').trigger("liszt:updated");
	});
	
	$("#search_map").on("submit", function( event ) {
		event.preventDefault();
		
		var url = $(this).attr('action');
		var data = $(this).serialize();
		loadUsaha(url, data);
	});
}

// Load Data JSON Usaha Dan Simpan Di Array Locations
function loadUsaha(url, data) {	
	var jqxhr = $.getJSON(url, data, function(result) {
		if(result.status == 200) {
			var daftar_usaha = result.usaha;
			
			if(daftar_usaha.length < 1) {
				alert('Daftar usaha tidak ditemukan untuk wilayah ini');
				return;
			}
			
			locations = [];
			
			for(var i = 0; i < daftar_usaha.length; i++) {
				
				var usaha = {
					idUsaha: daftar_usaha[i].idUsaha,
					namaUsaha: daftar_usaha[i].namaUsaha,
					latitude: daftar_usaha[i].latitude,
					longtitude: daftar_usaha[i].longtitude,
					alamatUsaha: daftar_usaha[i].alamatUsaha
				};
				
				locations.push(usaha);
			}
			
			prepareMarker();
		} else {
			alert('Gagal mendapatkan daftar usaha');
		}
	});
}