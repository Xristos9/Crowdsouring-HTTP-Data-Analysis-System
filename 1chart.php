<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Sympols -->
	<link rel="stylesheet" type="text/css" href="style.css"> 
	<title>Question 1</title>
</head>
<body>

	<?php
		include "adminHeader.php";
		include "select1.php";
	?>
	<div style="width: 50%;">
		<canvas id="myChart" width="0" height="0"></canvas>
		<canvas id="myChart2" width="0" height="0"></canvas>
		<canvas id="myChart3" width="0" height="0"></canvas>
		<canvas id="myChart4" width="0" height="0"></canvas>
	</div>
	<div class="page-wrapper">
		
	</div>
	
	<script>
		function countArr(arr){
			var unique = [...new Set(arr)];
			return unique
		}

		const myChart = document.getElementById('myChart').getContext('2d')
		const myChart2 = document.getElementById('myChart2').getContext('2d')
		const myChart3 = document.getElementById('myChart3').getContext('2d')
		const myChart4 = document.getElementById('myChart4').getContext('2d')
		const users = <?php echo $result; ?>;
		const nep = <?php echo $method1; ?>;
		const neg = <?php echo $method2; ?>;
		const nef = <?php echo $method3; ?>;

		const s1 = <?php echo $status1; ?>;
		const s2 = <?php echo $status2; ?>;
		const s3 = <?php echo $status3; ?>;
		const s4 = <?php echo $status4; ?>;
		const s5 = <?php echo $status5; ?>;

		const u1 = <?php echo json_encode($url1); ?>;
		u2 = countArr(u1).length

		const par1 = <?php echo json_encode($ISP1); ?>;
		par2 = countArr(par1).length

		// console.log(par2)
	
		// Chart Options
		Chart.defaults.global.defaultFontFamily = 'Lato'
		Chart.defaults.global.defaultFontSize = 16
		Chart.defaults.global.defaultFontColor = '#777'


		let massPopChart = new Chart(myChart, {
			type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
			data:{
				labels:['Users','Unique ISPs'],
				datasets:[{
					label:'',
					data:[users,par2],
					backgroundColor:[
						'rgba(75, 192, 192, 0.8)',
						'rgba(255, 159, 64, 0.8)'					
					],
					borderWidth:1,
					borderColor:'#777',
					hoverBorderWidth:3,
					hoverBorderColor:'black'
				}]
			},
			options:{
				title:{
					display: true,
					text:'Number of Users and unique ISPs',
					fontSize:25
				},
				legend:{
					display: false
				},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		})

		let massPopChart2 = new Chart(myChart2, {
			type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
			data:{
				labels:['GET','POST','OPTIONS'],
				datasets:[{
					label:'',
					data:[neg, nep ,nef],
					backgroundColor:[
						'rgba(255, 99, 132, 0.8)',
						'rgba(54, 162, 235, 0.8)',
						'rgba(255, 159, 64, 0.8)'
					],
					borderWidth:1,
					borderColor:'#777',
					hoverBorderWidth:3,
					hoverBorderColor:'black'
				}]
			},
			options:{
				title:{
					display:true,
					text:'Entries per method',
					fontSize:25
				},
				legend:{
					display: false,
					position:'bottom'
				},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}

			}
		})

		let massPopChart3 = new Chart(myChart3, {
			type: 'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
			data:{
				labels:['0','Successful responses','Redirects','Client errors','Server errors'],
				datasets:[{
					label:'',
					data:[s1, s2 ,s3,s4,s5],
					backgroundColor:[
						'rgba(54, 162, 235, 0.8)',
						'rgba(75, 192, 192, 0.8)',
						'rgba(255, 206, 86, 0.8)',
						'rgba(153, 102, 255, 0.8)',
						'rgba(255, 159, 64, 0.8)'
					],
					borderWidth:1,
					borderColor:'#777',
					hoverBorderWidth:3,
					hoverBorderColor:'black'
				}]
			},
			options:{
				title:{
					display:true,
					text:'Entries per stauts',
					fontSize:25
				},
				legend:{
					display: true,
					position:'right'
				}

			}
		})

		let massPopChart4 = new Chart(myChart4, {
			type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
			data:{
				labels:[''],
				datasets:[{
					label:'Unique Domains',
					data:[u2],
					backgroundColor:[
						'rgba(153, 102, 255, 0.8)'
					],
					borderWidth:1,
					borderColor:'#777',
					hoverBorderWidth:3,
					hoverBorderColor:'black'
				}]
			},
			options:{
				title:{
					display:true,
					text:'Number of unique domains',
					fontSize:25
				},
				legend:{
					display: true,
					position:'bottom'
				},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}

			}
		})

	</script>

	<?php include "footer.php"; ?>
</body>
</html>