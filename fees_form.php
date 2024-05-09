<?php
include "components/dbconn.php";
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $Roll = strtoupper(trim($_POST['rollno']));
    $sql_fetch = "SELECT * FROM `borders` WHERE `Roll` = '$Roll';";
    $res_fetch = mysqli_query($conn,$sql_fetch);
    $sql_check_duplicate = "SELECT * FROM `reciepts` WHERE `Roll` = '$Roll';";
$res_check_duplicate = mysqli_query($conn,$sql_check_duplicate);
    if (mysqli_num_rows($res_fetch)==0) {
        echo '<script>
        if(confirm("This roll number has not been registered yet!")){
            window.location.href = "index.php";
        }
        else{
            window.location.href = "../index.php";
        }
        </script>';
    }
    else if (mysqli_num_rows($res_check_duplicate)==1) {
        echo '<script>
        window.location.href = "viewdetails.php?roll="+"'.strtolower($Roll).'";
        </script>';
    }
    elseif ($isNewMessRecieptTrue == 1) {
        echo '<script>
        if(confirm("This page has been temporarily closed!")){
            window.location.href = "index.php";
        }
        else{
            window.location.href = "index.php"; 
        }
        </script>';
    }
    else {
        $data_fetch = mysqli_fetch_assoc($res_fetch);
        $Name = $data_fetch['Name'];
        $Room = $data_fetch['Room'];
        $Phone = $data_fetch['Phone'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Reciept Submission Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="tel"],
        .form-group input[type="file"],
        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        @media only screen and (max-width: 600px) {
            .form-container {
                padding: 20px;
            }
        }
<?php
    include "components/nav.php";
    ?>
    <div class="form-container">
        <h1>Submit your Mess Fees Details for <?php echo $month_name." ".$year; ?></h1>
        <form action="components/fees_form_process.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Enter your name" value="<?php echo $Name; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="rollno">Roll number:</label>
                <input type="text" name="rollno" id="rollno" placeholder="Enter your roll no." value="<?php echo $Roll; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="roomno">Room number:</label>
                <input type="text" name="roomno" id="roomno" placeholder="Enter your room no." value="<?php echo $Room; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="phno">Phone number:</label>
                <input type="tel" name="phno" id="phno" placeholder="Enter your phone no." value="<?php echo $Phone; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="amount">Amount paid:</label>
                <input type="text" name="amount" id="amount" placeholder="Enter the amount paid" required>
            </div>
            <div class="form-group">
                <label for="transno">Transaction number:</label>
                <input type="text" name="transno" id="transno" placeholder="Enter your Transaction number" required>
            </div>
            <div class="form-group">
                <label for="reciept">Upload the Transaction Receipt:</label>
                <input type="file" name="reciept" id="reciept" accept="image/*">
            </div>
            <div class="form-group submit">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
