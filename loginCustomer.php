<?php
include('login_customer.php'); // Includes Login Script
if(isset($_GET['msg'])){
	// echo '<script>alert("Working")</script>';
}
if(isset($_SESSION['login_customer'])){
header("location: index.php"); //Redirecting
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>customer Login</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/clogin.css?v=<?php echo time();?>s">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form role="form" action="customer_register.php" method="POST">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="customer_name" placeholder="User name" required="">
					<input type="email" name="customer_email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<input type="number" name="customer_phone" placeholder="phone no:" required="">
					<button type="submit">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form role="form" action="login_customer.php" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button type="submit" name="submit">Login</button>
				</form>
			</div>
	</div>
</body>
</html>