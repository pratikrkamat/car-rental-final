<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_SESSION['login_customer'])) {
    require 'connection.php';
    $conn = Connect();

    $customer_email = $_SESSION['login_customer'];
    if(isset($_POST['update'])){
        $updateEmail = $_POST['email'];
        $updatePhone = $_POST['phone'];
        $updateName = $_POST['name'];

     $query="UPDATE `customer` SET `customer_name` = '" . $updateName . "' , `email` = '" . $updateEmail . "' , `phone` = '" . $updatePhone . "'";
     $updatedDetails=$conn->query($query);

     if($updatedDetails==TRUE){
        header("location: profile_customer.php");
    }
    }

}
else
{
    header("location: index.php");
}

?>