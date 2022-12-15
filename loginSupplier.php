<?php
include('login_supplier.php'); // Includes Login Script

if(isset($_SESSION['login_supplier'])){
header("location: index.php"); //Redirecting
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Supplier Login</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form role="form" action="supplier_register.php" method="POST">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="supplier_name" placeholder="user name" required="">
					<input type="email" name="supplier_email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<input type="number" name="supplier_phone" placeholder="phone no:" required="">
					<button type="submit">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form role="form" action="login_supplier.php" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button type="submit" name="submit">Login</button>
				</form>
			</div>
	</div>
</body>
</html>