<?php
require "components/dbconn.php";
if ($isNewBorderTrue == 1) {
    echo '<script>
    if(confirm("This page has been temporarily closed!")){
        window.location.href = "index.php";

    }
    else{
        window.location.href = "index.php"; 
    }
    </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Meta Tags for SEO -->
    <meta name="description" content="Submit your mess fees details effortlessly on our platform. Streamline your payment process by entering your roll number and accessing your fee details for the current month. Register your roll number for seamless transactions and stay updated with your mess fee status. Simplify your mess fee submissions today.">
    <meta name="keywords" content="mess fees, submission, roll number, registration, payments, tmh, Transit Mens Hostel, tmh1, tmh1 mess, management, system, Tumjang Men's Hostel">
    <meta name="author" content="Dhritiman Saikia">
    
    <!-- Additional Meta Tags for SEO -->
    <meta name="robots" content="index, follow"> <!-- Tells search engines whether to index and follow links on the page -->
    <meta name="revisit-after" content="7 days"> <!-- Suggests how often search engines should revisit the page (in this case, 7 days) -->
    <meta name="language" content="English"> <!-- Specifies the language of the content -->
    <meta name="distribution" content="global"> <!-- Indicates the geographical distribution of the content -->
    <meta name="referrer" content="no-referrer"> <!-- Specifies how the browser should send the referrer information when navigating away from the page -->
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"> <!-- Controls the snippet length, image preview size, and video preview size in search results -->
    <link rel="shortcut icon" href="assets/pics/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/favicon/favicon.ico" type="image/x-icon">
    <title>Borders Entry Form</title>
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
        <h1>Submit your Details</h1>
        <form action="components/border_form_process.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="rollno">Roll number:</label>
                <input type="text" name="rollno" id="rollno" placeholder="Enter your roll no. eg: csb23078" required>
            </div>
            <div class="form-group">
                <label for="roomno">Room number:</label>
                <input type="number" name="roomno" id="roomno" placeholder="Enter your room no. eg. 224" required>
            </div>
            <div class="form-group">
                <label for="phno">Phone number (Without using +91):</label>
                <input type="number" name="phno" id="phno" placeholder="Enter your phone no." required>
            </div>
            <div class="form-group">
                <label for="dept">Department:</label>
                <input type="text" name="dept" id="dept" placeholder="Enter your department name" required>
            </div>
            <div class="form-group">
                <label for="prog">Programme:</label>
                <input type="text" name="prog" id="prog" placeholder="Enter here" required>
            </div>
            <div class="form-group submit">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
