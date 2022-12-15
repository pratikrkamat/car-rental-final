<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_SESSION['login_supplier'])) {
    require 'connection.php';
$conn = Connect();

$supplier_email = $_SESSION['login_supplier'];

$email = mysqli_real_escape_string($conn, $supplier_email);
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT email, supplier_name, phone FROM supplier WHERE email='" . $email . "'";

$userDetails = $conn->query($query);

if ($userDetails->num_rows > 0)  //fetching the contents of the row
{
    $row = $userDetails->fetch_assoc();
    $dbEmail = $row['email'];
    $dbPhone = $row['phone'];
    $dbName = $row['supplier_name'];
} else {
$error = "Please Login";
}
mysqli_close($conn);
}
else
{
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <form role="form" method="POST" action="update_profile_supplier.php">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $dbName ?></span><span class="text-black-50"><?php echo $dbEmail?></span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="<?php echo $dbName ?>" name="name"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="<?php echo $dbPhone ?>"  name="phone"></div>
                        <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="<?php echo $dbEmail ?>" name="email"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="update">Update Profile</button></div>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
    </div>
</body>
</html>