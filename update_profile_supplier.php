<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_SESSION['login_supplier'])) {
    require 'connection.php';
    $conn = Connect();

    $supplier_email = $_SESSION['login_supplier'];
    if(isset($_POST['update'])){
        $updateEmail = $_POST['email'];
        $updatePhone = $_POST['phone'];
        $updateName = $_POST['name'];

     $query="UPDATE `supplier` SET `supplier_name` = '" . $updateName . "' , `email` = '" . $updateEmail . "' , `phone` = '" . $updatePhone . "'";
     $updatedDetails=$conn->query($query);

     if($updatedDetails==TRUE){
        header("location: profile_supplier.php");
    }
    }

}
else
{
    header("location: index.php");
}

?>