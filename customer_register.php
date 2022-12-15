<?php

require 'connection.php';
$conn = Connect();

$customer_name = $conn->real_escape_string($_POST['customer_name']);
$customer_email = $conn->real_escape_string($_POST['customer_email']);
$customer_phone = $conn->real_escape_string($_POST['customer_phone']);
$customer_password = $conn->real_escape_string($_POST['password']);

$query = "INSERT into customer(customer_name,email,customer_password, phone) VALUES('" . $customer_name . "','". $customer_email . "','" . $customer_password . "','" . $customer_phone ."')";
$success = $conn->query($query);

if (!$success){
	die("Couldnt enter data: ".$conn->error);
}
else
{
	
	// sleep(1000);
	header("location: loginCustomer.php?msg='success'");
}

$conn->close();
    
?>
