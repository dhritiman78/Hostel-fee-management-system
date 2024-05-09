<?php
include "../components/dbconn.php";
$sl = 1;
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
         .logo{
        height: 95px;
        width: 102px;
        margin: auto;
        }
        body{
            margin: 0;
            padding: 0;
        }
        .nav{
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-items: center;
            padding: 2px 2px;
            margin-bottom: 5px;
            border-bottom: 2px solid black;
        }
        .container {
            max-width: 90%;
            margin: auto;
        }
    .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
            color: #333;
        }
        .notification{
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-items: center;
            padding: 2px 2px;
            margin-bottom: 20px;
            text-decoration: underline;
        }
        .headline{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="nav">
        <div>
            <img  class="logo" src="../assets/pics/logo.png" alt="logo">
        </div>
        <div>
            <h3>Transit Men's Hostel 1</h3>
        </div>
        <div>
        <h4>Tezpur University</h4>
        </div>
        <div>
        <h4>Napaam :: Tezpur - 784028</h4>
        </div>
    </div>
    <div class="notification">
    <div>
        <h5>NOTIFICATION</h5>
        </div>
        <div>
        <h5>Date - <?php
$current_date = date("jS F Y");
echo $current_date;
?></h5>
        </div>
    </div>
<div class="container">
    <div class="headline">
        <h5>List of defaulters for <?php echo $month_name." ".$year; ?></h5>
    </div>
  <table id="myTable" class="table my-3">
    <thead>
        <tr>
        <th>Sl no.</th>
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
                <td>'.$sl.'</td>
                <td>'.$data_fetch['Name'].'</td>
                <td>'.$data_fetch['Roll'].'</td>
                <td>'.$data_fetch['Room'].'</td>
                </tr>';
                $sl = $sl+1;
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
        window.print();
    </script>
</html>