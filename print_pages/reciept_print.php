<?php
include "../components/dbconn.php";
session_start();
if ($_SERVER['REQUEST_METHOD']=='GET') {
    $Roll = strtoupper($_GET['roll']);
}
$sql_fetch = "SELECT * FROM `reciepts` WHERE `Roll`= '$Roll';";
$res_fetch = mysqli_query($conn,$sql_fetch);
$data_fetch = mysqli_fetch_assoc($res_fetch);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid blue;
            border-radius: 6px;
        }
        .receipt-details h2{
            text-decoration: underline;
        }
        .receipt-details {
            margin-bottom: 20px;
        }
        .receipt-details div {
            margin-bottom: 10px;
        }
        .receipt-image-div {
            width: 200px;
            margin-left: 20px;
        }
        .receipt-image {
            width: 322px;
            height: 638px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="receipt-details">
            <h2>Payment Details for <?php echo $month_name." ".$year; ?></h2>
            <div>Name: <?php echo $data_fetch['Name']; ?></div>
            <div>Roll no.: <?php echo $data_fetch['Roll']; ?></div>
            <div>Room no.: <?php echo $data_fetch['Room']; ?></div>
            <div>Phone no.: <?php echo $data_fetch['Phone']; ?></div>
            <div>Amount: <?php echo urldecode($data_fetch['Amount']); ?></div>
            <div>Transaction ID: <?php echo urldecode($data_fetch['Transaction']); ?></div>
        </div>
        <div class="receipt-image-div">
            <img class="receipt-image" src="../<?php echo urldecode($data_fetch['Reciept']); ?>" alt="Receipt">
        </div>
    </div>
    <script>
            window.print();
    </script>
</body>
</html>
