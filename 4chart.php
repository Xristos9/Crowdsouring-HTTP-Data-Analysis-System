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
	<title>Heatmap</title>
</head>
<body>

	<?php include "adminHeader.php"; ?>

	<div id="map"></div>
	<script>
		var passedArray = <?php echo json_encode($servers); ?>;

		var mymap = L.map('map').setView([0,0], 3);
		const marker = []
		const attribution =
		'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';

		const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
		const tiles = L.tileLayer(tileUrl, { attribution });
		tiles.addTo(mymap);

		for(var i=0; i<=10; i++)
		marker[i] = L.marker([i,i]).addTo(mymap);
		
		const endpoint = 'http://ip-api.com/batch';

			var xhr = new XMLHttpRequest();
			xhr.onload = function() {
				// Result array
				var response = JSON.parse(this.responseText);
				// console.log(xhr)
				for(var i in response){
					data={}
					data.lat = response[i].lat
					data.lng = response[i].lon
					data.count = counts[unique[i]]
					testData.data.push(data)
					console.log(data)
				}
			};
			var data = JSON.stringify(unique);
			xhr.open('POST', endpoint, false);
			xhr.send(data);

	</script>

	<?php include "footer.php"; ?>

</body>
</html>