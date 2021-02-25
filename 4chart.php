<?php include "select.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Sympols -->
	<link rel="stylesheet" type="text/css" href="style.css"> 
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
	integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
	crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
	integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
	crossorigin=""></script>
	<title>Question 4</title>
</head>
<body>

	<?php include "adminHeader.php"; ?>

	<div id="map"></div>

	<script>
		var testData = []
		var temp = []
		var counts = {};
		// assoc array to js array
		var passedArray = <?php echo json_encode($servers); ?>;
		// console.log(passedArray)

		// Remove null from passedArray
		for(var i of passedArray)
			i && temp.push(i); // copy each non-empty value to the 'temp' array
			// console.log(temp)

		// count the duplicate ips
		temp.forEach(function(x) { counts[x] = (counts[x] || 0)+1; });
		// console.log(counts)

		// Remove the duplicate ips
		const unique = [...new Set(temp)];
		// console.log(unique)

		const endpoint = 'http://ip-api.com/batch';

		var xhr = new XMLHttpRequest();
			xhr.onload = function() {
				// Result array
				var response = JSON.parse(this.responseText);
				// console.log(xhr)
				for(var i in response){
					data = {}
					data.lat = response[i].lat
					data.lng = response[i].lon
					data.count = counts[unique[i]]
					testData.push(data)
				}
			};

		var data = JSON.stringify(unique);
		xhr.open('POST', endpoint, false);
		xhr.send(data);
		console.log(testData)

		
		var mymap = L.map('map').setView([0,0], 3);
		const marker = []
		const attribution =
		'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';

		const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
		const tiles = L.tileLayer(tileUrl, { attribution });
		tiles.addTo(mymap);

		userMarker(38.246361, 21.734966)

		for(var i in testData){
			serverMarker(testData[i].lat,testData[i].lng)
			polyline(38.246361, 21.734966,testData[i].lat,testData[i].lng,testData[i].count/6)
		}
		function userMarker(lat,lng){
			var myIcon = L.icon({
				iconUrl: 'icon1.png',
				iconSize: [38, 32],
				iconAnchor: [20, 30]
			});
			L.marker([lat,lng],{icon: myIcon}).addTo(mymap);
		}

		function serverMarker(lat,lng){
			var myIcon = L.icon({
				iconUrl: 'icon2.png',
				iconSize: [38, 32],
				iconAnchor: [20, 30]
			});
			L.marker([lat,lng],{icon: myIcon}).addTo(mymap);
		}

		function polyline(lat1,lng1,lat2,lng2,wt){
			L.polyline([[lat1, lng1],[lat2, lng2]], {color: 'purple',weight: wt}).addTo(mymap);
		}


	</script>

	<?php include "footer.php"; ?>

</body>
</html>