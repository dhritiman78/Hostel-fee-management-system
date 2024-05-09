<?php
include "components/dbconn.php";
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
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            display: flex;
            flex-wrap: wrap;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: auto; /* Adding scroll for small screen */
        }

        .receipt-details {
            margin-bottom: 20px;
        }

        .receipt-details h2 {
            margin-bottom: 10px;
            color: #333;
        }

        .receipt-details div {
            margin-bottom: 5px;
        }

        .receipt-image {
            width: 357px;
            height: auto;
            border-radius: 5px;
            display: block; /* Ensuring block display for centering */
            margin: 0 auto; /* Centering the image */
        }

        .printbtn {
            padding: 10px 45px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
            display: block; /* Ensuring block display for centering */
            margin: 38px auto; /* Centering the button */
        }
        .deletebtn {
            padding: 10px 45px;
            border: none;
            border-radius: 5px;
            background-color: Red;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
            display: block; /* Ensuring block display for centering */
            margin: 20px auto; /* Centering the button */
        }
        .receipt-details h2{
            text-decoration: underline;
        }

        .printbtn:hover {
            background-color: #45a049;
        }
        .receipt-image-div {
            height: 400px;
            overflow: auto; /* Allowing vertical scroll only for image */
            margin-bottom: 20px;
            margin-left: 5px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .buttons{
            display: flex;
        }
        @media only screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }
        }
.thank-you-message {
            text-align: center;
            color: #4CAF50;
            padding: 10px;
        }
        .back-btn-btn{
            padding: 10px 45px;
            border: none;
            border-radius: 5px;
            background-color: Blue;
            cursor: pointer;
            margin: 10px 10px;
            text-decoration: none;
            color: white;
        }
    <?php
    include "components/nav.php";
    ?>
   <div class="back-btn">
    <a class="back-btn-btn" href="index.php">&lt; Back</a>
        </div>
<div class="thank-you-message">
            <h2>Thank you for submitting!</h2>
        </div>
    <div class="container">
        <div class="receipt-details">
            <h2>Payment Details for <?php echo $month_name." ".$year; ?></h2>
            <div>Name: <b><?php echo $data_fetch['Name']; ?></b></div>
            <div>Roll no.: <b><?php echo $data_fetch['Roll']; ?></b></div>
            <div>Room no.: <b><?php echo $data_fetch['Room']; ?></b></div>
            <div>Phone no.: <b><?php echo $data_fetch['Phone']; ?></b></div>
            <div>Amount: <b><?php echo urldecode($data_fetch['Amount']); ?></b></div>
            <div>Transaction ID: <b><?php echo urldecode($data_fetch['Transaction']); ?></b></div>
            <div>Date and Time: <b><?php echo $data_fetch['Date'].' at '.$data_fetch['Time']; ?></b></div>
            <div class="buttons">
                <button class="printbtn" onclick="printreciept()">Print</button>
            </div>
        </div>
        <div class="receipt-image-div">
            <img class="receipt-image" src="<?php echo urldecode($data_fetch['Reciept']); ?>" alt="Receipt">
        </div>
    </div>
    </div>
    <script>
        function printreciept() {
            window.open("print_pages/reciept_print.php?roll=<?php echo strtolower($Roll);?>","_blank");
        }
    </script>
</body>
</html>