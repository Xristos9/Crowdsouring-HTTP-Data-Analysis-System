<?php include "select4.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<title>Document</title>
</head>
<body>

	<script>
		var kati = <?php echo json_encode($ISP1); ?>;
		var kati1 = <?php echo json_encode($array2); ?>;

	// 	async function getData(){
		
	// 	fetch('select4.php')
	// 	.then(function(response) {
	// 		if (response.status !== 200) {
	// 			console.log('Looks like there was a problem. Status Code: ' +
	// 			response.status);
	// 			return;
	// 		}
			
	// 		response.json().then(function(data) {
	// 			// console.log(data);
				
	// 			for(var i=0; i<data.length; i++){
	// 					for(var j=0; j<data[i].length; j++){
	// 						kati1.push(data[i][j])	}}
	// 						// console.log(data[i][j])
							
	// 		});
	// 		}
	// 	)
	// 	.catch(function(err) {
	// 		console.log('Fetch Error :-S', err);
	// 	});
	// 	return kati1
	// }


	var testData={}
	var filtered=[]
	var counts=[]
	const unique=[]
	// console.log(kati1)

	for(var i=0; i<kati1.length; i++){
			filtered[i] = kati1[i].filter(function (el) {
				return el != "";
			});
	}
	// console.log(filtered);

	for(var i=0; i<kati1.length; i++){
		filtered[i].forEach(function(x) {
				counts[x] = (counts[x] || 0)+1; 
		})
	}
	// console.log(counts)

	for(var i=0; i<kati1.length; i++){
		unique[i] = [...new Set(filtered[i])]
		
	}
	console.log(unique)
	console.log(kati)


	for(var i=0; i<kati1.length; i++){
		const endpoint = 'http://ip-api.com/batch'
		var xhr = new XMLHttpRequest()
		xhr.onload = function() {
			// Result array
			var response = JSON.parse(this.responseText)
			// console.log(xhr)
			for(var i in response){
				data={}
				data.lat = response[i].lat
				data.lng = response[i].lon
				for(var j=0; j<filtered[i].length; j++)
					data.count = counts[filtered[i][j]]
				// testData.push(data)
				console.log(data)
			}
		};
		var data = JSON.stringify(unique[i])
		xhr.open('POST', endpoint, false)
		xhr.send(data)
	}

	console.log(testData)
	</script>
</body>
</html>