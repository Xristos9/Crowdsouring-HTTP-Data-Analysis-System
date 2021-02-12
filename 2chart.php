<!doctype html>
<html lang="en">
  <head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Sympols -->
	<link rel="stylesheet" type="text/css" href="style.css"> 
	<style>
		.topnav {
		overflow: auto;
		background-color: #333;
		margin-top: 10px;
	}

	.topnav a {
		float: left;
		display: block;
		color: #f2f2f2;
		text-align: center;
		text-decoration: none;
		font-size: 17px;
	}

	.active {
		background-color: #4CAF50;
		color: white;
		}

		.dropdown {
		float: left;
		overflow: hidden;
		}

		.dropdown .dropbtn {
		font-size: 17px;    
		border: none;
		outline: none;
		color: white;
		padding: 14px 16px;
		background-color: inherit;
		font-family: inherit;
		margin: 0;
		}

		.dropdown-content {
		display: none;
		position: absolute;
		background-color: #f9f9f9;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
		}

		.dropdown-content a {
		float: none;
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
		text-align: center;
		}

		.topnav a:hover, .dropdown:hover .dropbtn {
		background-color: #555;
		color: white;
		}

		.dropdown-content a:hover {
		background-color: #ddd;
		color: black;
		}

		.dropdown:hover .dropdown-content {
		display: block;
		}
	</style>

	<title>Question 2</title>
</head>
<body>

	<?php include "adminHeader.php";?>

	<div class="topnav" id="myTopnav">
		<div class="dropdown">
			<button class="dropbtn">Content-Type <i class="fa fa-caret-down"></i></button>
			<div class="dropdown-content">
				<a onclick="myFunction()" href="#">All</a>
				<a onclick="myFunction()" href="#">Link 1</a>
				<a onclick="myFunction()" href="#">Link 1</a>
				<a onclick="myFunction()" href="#">Link 1</a>
				<a onclick="myFunction()" href="#">Link 1</a>
			</div>
			</div> 
			<div class="dropdown">
			<button class="dropbtn">Days <i class="fa fa-caret-down"></i></button>
			<div class="dropdown-content">
				<a onclick="myFunction()" href="#">All</a>
				<a onclick="myFunction()" href="#">Δευτέρα</a>
				<a onclick="myFunction()" href="#">Τρίτη</a>
				<a onclick="myFunction()" href="#">Τετάρτη</a>
				<a onclick="myFunction()" href="#">Πέμπτη</a>
				<a onclick="myFunction()" href="#">Παρασκευή</a>
				<a onclick="myFunction()" href="#">Σάββατο</a>
				<a onclick="myFunction()" href="#">Κυριακή</a>
			</div>
			</div>
			<div class="dropdown">
			<button class="dropbtn">Methods <i class="fa fa-caret-down"></i></button>
			<div class="dropdown-content">
				<a onclick="myFunction()" href="#">All</a>
				<a onclick="myFunction()" href="#">GET</a>
				<a onclick="myFunction()" href="#">POST</a>
				<a onclick="myFunction()" href="#">OPTIONS</a>
			</div>
			</div>
			<div class="dropdown">
			<button class="dropbtn">Πάροχος <i class="fa fa-caret-down"></i></button>
			<div class="dropdown-content">
			<a onclick="myFunction()" href="#">All</a>
			<a onclick="myFunction()" href="#">Cosmote</a>
			<a onclick="myFunction()" href="#">Vodafone</a>
			<a onclick="myFunction()" href="#">Wind</a>
			<a onclick="myFunction()" href="#">Forthnet</a>
			</div>
		</div>
	</div>
	<div class="page-wrapper"><canvas id="myChart" width="400" height="400"></canvas></div>

	<script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['0', '1', '2', '3', '4', '5','6', '7', '8', '9', '10', '11','12', '13', '14', '15', '16', '17','18', '19', '20', '21', '22', '23'],
			datasets: [{
				label: '# of Votes',
				data: [12, 19, 3, 5, 2, 3,12, 19, 3, 5, 2, 3,12, 19, 3, 5, 2, 3,12, 19, 3, 5, 2, 3,0],
				backgroundColor:'rgba(255, 99, 132, 0.2)',
				borderColor: 'rgba(255, 99, 132, 1)',
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
	</script>
		<?php include "footer.php"; ?>
  </body>
</html>