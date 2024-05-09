<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
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
            margin-bottom: 15px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .form-group label {
            width: 120px;
            text-align: right;
            margin-right: 20px;
            color: #333;
        }

        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group input[type="submit"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .form-group input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
            color: #333;
        }

        @media only screen and (max-width: 600px) {
            .form-group label {
                width: 100%;
                text-align: left;
            }
        }
    <?php include "components/nav.php"; ?>
    <div class="form-container">
        <h1>Admin Login</h1>
        <form action="components/loginProcess.php" method="post">
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="text" name="pass" id="pass" placeholder="Enter your password">
            </div>
            <div class="form-group submit">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</body>
</html>
