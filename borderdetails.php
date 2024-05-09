<?php
include "components/dbconn.php";
session_start();
if ($_SESSION['logged_in'] != true) {
    session_abort();
    echo '<script>
    if(confirm("Please login first!")){
        window.location.href = "loginPage.php";

    }
    else{
        window.location.href = "loginPage.php"; 
    }
    </script>';
}
if ($_SERVER['REQUEST_METHOD']=='GET') {
    $Sln = $_GET['sln'];
}
$sql_fetch = "SELECT * FROM `borders` WHERE `Sl no.` = '$Sln';";
$res_fetch = mysqli_query($conn,$sql_fetch);
$data_fetch = mysqli_fetch_assoc($res_fetch);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess Fees Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #f0f0f0;
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
            width: 120px;  /* Adjust as needed for wider labels */
            text-align: right;
            margin-right: 20px; /* Added space between label and input */
        }

        .form-group input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .form-group.submit {
            text-align: center;
        }

        .form-group input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-delete {
      background-color: #0d6efd;
      color: white;
      border: 2px solid #0d6efd;
      margin: 2px 2px;
      padding: 6px 6px;
      border-radius: 10px;
      font-weight: bold;
    }
        @media only screen and (max-width: 600px) {
            .form-group label {
                width: 100%;
                text-align: left;
            }
        }
    
    <?php
    include "components/nav.php";
    ?>
    <div class="form-container">
    <div>
    <form action="components/border_edit_process.php" method="post">
    <input type="text" name="Sln" id="Sln" style="visibility: hidden; width: 0px; height: 0px;" placeholder="Enter here" value="<?php echo $data_fetch['Sl no.']; ?>" required>
    <input type="text" name="operation" id="operation" style="visibility: hidden; width: 0px; height: 0px;" placeholder="Enter here" value="1" required>
      <button type="submit" class="btn-delete">Delete border</button>
    </form>
    </div>
        <h1>Submit your Details</h1>
        <form action="components/border_edit_process.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter your name" value="<?php echo $data_fetch['Name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="rollno">Roll number</label>
                <input type="text" name="rollno" id="rollno" placeholder="Enter your roll no." value="<?php echo $data_fetch['Roll']; ?>" required>
            </div>
            <div class="form-group">
                <label for="roomno">Room number</label>
                <input type="number" name="roomno" id="roomno" placeholder="Enter your room no." value="<?php echo $data_fetch['Room']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phno">Phone number <br>(Without using +91)</label>
                <input type="number" name="phno" id="phno" placeholder="Enter your phone no." value="<?php echo $data_fetch['Phone']; ?>" required>
            </div>
            <div class="form-group">
                <label for="dept">Department</label>
                <input type="text" name="dept" id="dept" placeholder="Enter your department name" value="<?php echo urldecode($data_fetch['Department']); ?>" required>
            </div>
            <div class="form-group">
                <label for="prog">Programme</label>
                <input type="text" name="prog" id="prog" placeholder="Enter here" value="<?php echo urldecode($data_fetch['Programme']); ?>" required>
            </div>
                <input type="text" name="Sln" id="Sln" style="visibility: hidden; width: 0px; height: 0px;" placeholder="Enter here" value="<?php echo $data_fetch['Sl no.']; ?>" required>
                <input type="text" name="operation" id="operation" style="visibility: hidden; width: 0px; height: 0px;" placeholder="Enter here" value="0" required>
            <div class="form-group submit">
                <input type="submit" value="Edit">
            </div>
        </form>
    </div>
</body>
</html>
