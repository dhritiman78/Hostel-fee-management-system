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
$sql_fetch_admin = "SELECT * FROM `adminbody`;";
$res_fetch_admin = mysqli_query($conn, $sql_fetch_admin);
$num_rows = mysqli_num_rows($res_fetch_admin);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responses</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        .container h2{
            text-decoration: underline;
        }
        .btn {
            background-color: red;
            color: white;
            border-color: red;
            margin: 2px 2px;
        }
        .newadmin{
            padding: 3px 3px;
            margin: 3px 3px;
        }
<?php
require "components/nav.php";
require "components/adminNav.php";
?>
<div class="container">
<h2>Add new admin</h2>
<div class="newadmin">
    <form action="components/admin_process.php" method="post" class="d-flex">
        <input type="text" name="adminroll" id="adminroll" class="form-control me-2" placeholder="Enter the roll number...">
        <input type="text" name="oprn" id="oprn" style="visibility: hidden; width: 0px; height: 0px;" placeholder="Enter here" value="0" required>
        <button class="btn btn-primary" type="submit">Add</button>
    </form>
</div>
<h2>List of Admin body</h2>
    <table id="myTable" class="table my-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Roll no.</th>
                <th>Room no.</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($num_rows == 0) {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            } else {
                while ($data_fetch_admin = mysqli_fetch_assoc($res_fetch_admin)) {
                    $Roll = $data_fetch_admin['Roll'];
                    $sql_rest = "SELECT * FROM `borders` WHERE `Roll` = '$Roll';";
                    $res_rest = mysqli_query($conn, $sql_rest);
                    $data_fetch_rest = mysqli_fetch_assoc($res_rest);

                    echo '<tr>
                            <td>' . $data_fetch_rest['Name'] . '</td>
                            <td>' . $Roll . '</td>
                            <td>' . $data_fetch_rest['Room'] . '</td>
                            <td><form action="components/admin_process.php" method="post" class="d-flex"><input type="text" name="adminroll" id="adminroll" style="visibility: hidden; width: 0px; height: 0px;" placeholder="Enter here" value="'.$Roll.'" required><input type="text" name="oprn" id="oprn" style="visibility: hidden; width: 0px; height: 0px;" placeholder="Enter here" value="1" required><button class="btn" type="submit">Delete</button>
                            </form></td>
                          </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });

    function goto(roll) {
        window.location.href = 'viewdetails.php?roll=' + roll;
    }
</script>
</body>
</html>
