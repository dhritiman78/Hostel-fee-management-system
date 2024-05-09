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
$sql_fetch = "SELECT * FROM `borders` ORDER BY `borders`.`Room` ASC";
$res_fetch = mysqli_query($conn,$sql_fetch);
$num_rows = mysqli_num_rows($res_fetch);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Defaulters List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
      <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      <style>
    /* Style the print button as a slightly dark blue (primary color in Bootstrap) */
    .btn-print {
      background-color: #0d6efd;
      color: white;
      border-color: #0d6efd;
      margin: 2px 2px;
    }
    <?php
    require "components/nav.php";
    require "components/adminNav.php"
    ?>
<div class="container">
<div>
      <button class="btn btn-print" onclick="printTable()">Print</button>
    </div>
  <table id="myTable" class="table my-3">
    <thead>
        <tr>
        <th>Name</th>
        <th>Roll no.</th>
        <th>Room no.</th>
        </tr>
    </thead>
    <tbody>
    <?php
        if ($num_rows == 0) {
            echo "No records found";
        }
        else {
            for ($i=0; $i < $num_rows; $i++) { 
                $data_fetch = mysqli_fetch_assoc($res_fetch);
                $roll_check = $data_fetch['Roll'];
                $sql_check = "SELECT * FROM `reciepts` WHERE `Roll` = '$roll_check';";
                $res_check = mysqli_query($conn,$sql_check);
                $sql_check_admin = "SELECT * FROM `adminbody` WHERE `Roll` = '$roll_check';";
                $res_check_admin = mysqli_query($conn,$sql_check_admin);
                if (mysqli_num_rows($res_check)==0 && mysqli_num_rows($res_check_admin)==0) {
                    echo '<tr>
                <td>'.$data_fetch['Name'].'</td>
                <td>'.$data_fetch['Roll'].'</td>
                <td>'.$data_fetch['Room'].'</td>
                </tr>';
                }
                
            }
        }
        ?>
    </tbody>
</table>
  </div>
</div>

</body>
<script>
    function printTable() {
      window.open("print_pages/unpaid_print.php","_blank");
    }
    </script>
</html>