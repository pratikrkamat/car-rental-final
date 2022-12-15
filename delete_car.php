<?php

include('login_supplier.php');
require 'connection.php';
$conn = Connect();

$car_no = $conn->real_escape_string($_GET['id']);

echo $car_no;
if(isset($car_no)){
    $sql="DELETE FROM cars WHERE  car_no = $car_no;";
    $success = $conn->query($sql);
    echo $success;
    if($success){
        header("location: index.php#menu-content");
    }

}

?>
