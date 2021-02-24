<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!--include jquery - use ajax -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Sympols -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>HAR Upload</title>
</head>

<body>

	<?php include "header.php"; ?>
	
	<script src="upload.js"></script>

	<div class="page-wrapper">

		<h1>Upload your HAR file</h1>
		<br>

		<label class="custom">
			<input class="uBt" type="file" accept=".json, .har" onchange="readFile(this)">Choose file
		</label>

		<br>
		<br>
		<br>
		<br>
		<br>
		<button class="uBt" onclick="onDownload()">Download</button>
		<br>
		<br>
		<button class="uBt" id="up">Upload to server</button>
	</div>
	
	<?php include "footer.php"; ?>

</body>
</html>