<!DOCTYPE html>
<html lang="en">
<?php 
 include('session_customer.php');
if(!isset($_SESSION['login_customer'])){
    session_destroy();
    header("location: loginCustomer.php");
}
?> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Car</title>

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
<?php
        $car_id = $_GET["id"];
        $sql1 = "SELECT * FROM cars WHERE car_no = '$car_id'";
        $result1 = mysqli_query($conn, $sql1);

        if(mysqli_num_rows($result1)){
            while($row1 = mysqli_fetch_assoc($result1)){
				$car_no = $row1["car_no"];
		
				$car_model=$row1["car_model"];
				$car_type = $row1["car_type"];
				$car_color = $row1["car_color"];
				$car_price = $row1["car_price"];
				
            }
        }

        ?>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<form role="form" action="bookingConfirm.php" method="POST"  >
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
										<span class="form-label">selected car</span>
										<input class="form-control" type="text" name="car_model" value="<?php echo $car_model ?>" required readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Number plate</span>
										<input class="form-control" type="text" name="car_no" value="<?php echo $car_no ?>" required readonly>
									</div>
								</div>
							</div>
							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Document for verification</span>
										<select class="form-control" name="document">
											<option>drivers License</option>
											<option>Aadhar car</option>
											<option>Pan card</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Issue</span>
										<input class="form-control" type="date" name="rent_start_date" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Returning</span>
										<input class="form-control" type="date" name="rent_end_date" required>
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Mode Of Payment</span>
										<select class="form-control" name="payment">
											<option>Debit/Credit card</option>
											<option>Net Banking</option>
											<option>UPI</option>
											<option>Cash</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
							</div>
							<div class="row">
								
								<div class="col-md-3">
									<div class="form-btn">
										<button class="submit-btn" name="submit">Book Now</button>
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