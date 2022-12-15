

<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "Email or Password is invalid";
}
else
{
// Define $username and $password
$supplier_email=$_POST['email'];
$supplier_password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require 'connection.php';
$conn = Connect();

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT email, supplier_password FROM supplier WHERE email=? AND supplier_password=? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt -> bind_param("ss", $supplier_email, $supplier_password);
$stmt -> execute();
$stmt -> bind_result($supplier_email, $supplier_password);
$stmt -> store_result();

if ($stmt->fetch())  //fetching the contents of the row
{
	$_SESSION['login_supplier']=$supplier_email; // Initializing Session
	header("location: index.php"); // Redirecting To Other Page
} else {
$error = "Email or Password is invalid";
echo $error;

	header("location: loginSupplier.php");
}
mysqli_close($conn); // Closing Connection
}
}
?>