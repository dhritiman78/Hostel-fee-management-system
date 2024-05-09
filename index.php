<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Meta Tags for SEO -->
    <meta name="description" content="Submit your mess fees details effortlessly on our platform. Streamline your payment process by entering your roll number and accessing your fee details for the current month. Register your roll number for seamless transactions and stay updated with your mess fee status. Simplify your mess fee submissions today.">
    <meta name="keywords" content="mess fees, submission, roll number, registration, payments, tmh, Transit Mens Hostel, tmh1, tmh1 mess, management, system">
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
    <title>Home</title>
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

        .register-link {
            text-align: center;
            margin-top: 10px;
            color: #333;
        }

        @media only screen and (max-width: 600px) {
            .form-container {
                padding: 20px;
            }
        }
  
    <?php
    include "components/nav.php";
    include "components/dbconn.php";
    ?>
    <div class="form-container">
        <h1>Submit your Mess Fees Details for <?php echo $month_name." ".$year; ?></h1>
        <form action="fees_form.php" method="post">
            <div class="form-group">
                <label for="rollno">Roll number:</label>
                <input type="text" name="rollno" id="rollno" placeholder="Enter your roll no. eg: csb23078">
            </div>
            <div class="form-group submit">
                <input type="submit" value="Get details">
            </div>
            <div class="register-link">
                <a href="boardersform.php">Register your roll number by clicking here</a>
            </div>
        </form>
    </div>
    <a href="loginPage.php" style="display: block; text-align: center; margin-top: 20px; color: #333; text-decoration: none;">Admin</a>
</body>
</html>
