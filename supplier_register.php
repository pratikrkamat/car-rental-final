<?php

require 'connection.php';
$conn = Connect();

$supplier_name = $conn->real_escape_string($_POST['supplier_name']);
$supplier_email = $conn->real_escape_string($_POST['supplier_email']);
$supplier_phone = $conn->real_escape_string($_POST['supplier_phone']);
$supplier_password = $conn->real_escape_string($_POST['password']);

$query = "INSERT into supplier(supplier_name,email,supplier_password, phone) VALUES('" . $supplier_name . "','". $supplier_email . "','" . $supplier_password . "','" . $supplier_phone ."')";
$success = $conn->query($query);

if (!$success){
	die("Couldnt enter data: ".$conn->error);
}

header("location: loginSupplier.php");

$conn->close();
    
?>