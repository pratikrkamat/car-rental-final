<!DOCTYPE html>
<html>

<?php 
   
 include('session_customer.php');
if(!isset($_SESSION['login_customer'])){
    session_destroy();
    header("location: loginCustomer.php");
}
?>

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bookingconfirm.css" />
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</head>

<body>

<?php


    $document = $_POST['document'];
    $payment = $_POST['payment'];
    
    $customer_username = $_SESSION["login_customer"];
    $car_no = $conn->real_escape_string($_POST['car_no']);
    $rent_start_date = date('Y-m-d', strtotime($_POST['rent_start_date']));
    $rent_end_date = date('Y-m-d', strtotime($_POST['rent_end_date']));
   // $return_status = "NR"; // not returned
    //$fare = "NA";
    

    function dateDiff($start, $end) {
        $start_ts = strtotime($start);
        $end_ts = strtotime($end);
        $diff = $end_ts - $start_ts;
        return round($diff / 86400);
    }
    
    $err_date = dateDiff("$rent_start_date", "$rent_end_date");

    $sql0 = "SELECT * FROM cars WHERE car_no = '$car_no'";
    $result0 = $conn->query($sql0);

    

    if($err_date >= 0) { 
   $sql1 = "INSERT into booking(rent_start_date,rent_end_date,payment_type,document_type,customer_email,car_no,booking_date) 
 VALUES('" . $rent_start_date . "','" .  $rent_end_date . "','" . $payment . "','" . $document ."','" . $customer_username ."','" . $car_no . "','" . date("Y-m-d") . "')";
    $result1 = $conn->query($sql1);

    $sql2 = "UPDATE cars SET car_availability = 'no' WHERE car_no = '$car_no'";
    $result2 = $conn->query($sql2);

$sql4 = "SELECT * FROM  cars c,supplier s, customer cu,booking b WHERE c.car_no = '$car_no' AND cu.email=b.customer_email AND s.email=c.supplier_email";
  //  $sql4 = "SELECT * FROM  booking";
    $result4 = $conn->query($sql4);


    if (mysqli_num_rows($result4) > 0) {
        while($row = mysqli_fetch_assoc($result4)) {
            $car_no = $row["car_no"];
            $car_model = $row["car_model"];
            $booking_id=$row["booking_id"];
            $rent_start_date=$row["rent_start_date"];
            $rent_end_date=$row["rent_end_date"];
            $payment_type=$row["payment_type"];
            $document_type=$row["document_type"];
            $customer_name=$row["customer_name"];
            $booking_date=$row["booking_date"];
        
        }
    }

    if (!$result1 | !$result2 ){
        die("Couldnt enter data: ".$conn->error);
    }

?>

<div class="container">
        <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Booking Confirmed.</h1>
        </div>
    </div>
    <br>

    <h2 class="text-center"> Thank you for using Car Rental System! We wish you have a safe ride. </h2>

    <h3 class="text-center"> <strong>Your Order Number:</strong> <span style="color: blue;"><?php echo "$booking_id"; ?></span> </h3>


    <div class="container">
        <h5 class="text-center">Please read the following information about your order.</h5>
        <div class="box">
            <div class="col-md-10" style="float: none; margin: 0 auto; text-align: center;">
                <h3 style="color: orange;">Your booking has been received and placed into out order processing system.</h3>
                <br>
                <h4>Please make a note of your <strong>order number</strong> now and keep in the event you need to communicate with us about your order.</h4>
                <br>
                <h3 style="color: orange;">Invoice</h3>
                <br>
            </div>
            <div class="col-md-10" style="float: none; margin: 0 auto; ">
                <h4> <strong>Vehicle Name: </strong> <?php echo $car_model; ?></h4>
                <br>
                <h4> <strong>Vehicle Number:</strong> <?php echo $car_no; ?></h4>
        
                

                <br>
                <h4> <strong>Booking Date: </strong> <?php echo date("Y-m-d"); ?> </h4>
                <br>
                <h4> <strong>Start Date: </strong> <?php echo $rent_start_date; ?></h4>
                <br>
                <h4> <strong>Return Date: </strong> <?php echo $rent_end_date; ?></h4>
                <br>
                <h4> <strong>Booking id: </strong> <?php echo $booking_id; ?> </h4>
                <br>
                <h4> <strong>Payment Type: </strong> <?php echo $payment_type; ?> </h4>
                <br>
                <h4> <strong>Document Type: </strong>  <?php echo  $document_type; ?> </h4>
                <br>
                <h4> <strong>customer name:</strong>  <?php echo $customer_name; ?></h4>
                <br>
        
            </div>
        </div>
        <div class="col-md-12" style="float: none; margin: 0 auto; text-align: center;">
            <h6>Warning! <strong>Do not reload this page</strong> or the above display will be lost. If you want a hardcopy of this page, please print it now.</h6>
        </div>
    </div>
</body>
</html>
<?php }

