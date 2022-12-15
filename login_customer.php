<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$customer_email=$_POST['email'];
$customer_password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require 'connection.php';
$conn = Connect();

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT email, customer_password FROM customer WHERE email=? AND customer_password=? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt -> bind_param("ss", $customer_email, $customer_password);
$stmt -> execute();
$stmt -> bind_result($customer_email, $customer_password);
$stmt -> store_result();

if ($stmt->fetch())  //fetching the contents of the row
{
	$_SESSION['login_customer']=$customer_email; // Initializing Session
			// echo "successfull";
	header("location: index.php?success=1"); // Redirecting To Other Page
} else {
	$error = "Email or Password is invalid";
	echo $error;
}

mysqli_close($conn); // Closing Connection
}
}
?>