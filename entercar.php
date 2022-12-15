<!DOCTYPE html>
<html lang="en">
<?php 
include('session_supplier.php'); 
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<form role="form" action="entercar1.php" method="POST" enctype="multipart/form-data">
							<!-- <div class="form-group">
								<div class="form-checkbox">
									<label for="roundtrip">
										<input type="radio" id="roundtrip" name="flight-type">
										<span></span>Roundtrip
									</label>
									<label for="one-way">
										<input type="radio" id="one-way" name="flight-type">
										<span></span>One way
									</label>
									<label for="multi-city">
										<input type="radio" id="multi-city" name="flight-type">
										<span></span>Multi-City
									</label>
								</div>
							</div> -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Car Model</span>
										<input class="form-control" type="text" name="car_model" placeholder="Enter car Model" required >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Car Number</span>
										<input class="form-control" type="number" name="car_no" placeholder="Enter car no" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Type</span>
										<input class="form-control" type="text" name="car_type" placeholder="Car type" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Car color</span>
										<input class="form-control" type="text" name="car_color" placeholder="Car color" required>
				
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										
										<input class="form-control" type="file" name="car_img" placeholder="Enter Car image" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									
										<input class="form-control" type="number" name="car_price" placeholder="Enter Car Price">
									</div>
								</div>
							
								
					
							<div class="row">
								
								<div class="col-md-3">
									<div class="form-btn">
										<button class="submit-btn" name="submit">Submit</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>