<?php
include "../components/dbconn.php";
$sql_fetch = "SELECT * FROM `borders` ORDER BY `borders`.`Room` ASC;";
$res_fetch = mysqli_query($conn,$sql_fetch);
$num_rows = mysqli_num_rows($res_fetch);
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borders List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        .btn {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
            margin: 2px 2px;
        }

        /* Increase checkbox size */
        .selectCheckbox {
            transform: scale(1.5);
            margin: 0 auto;
        }
        #selectAllCheckbox {
            transform: scale(1.5);
            margin: 0 auto;
        }
        .buttons{
            display: flex;
        }
        .head{
            margin-bottom: 30px;
        }
        .head h1{
            text-decoration: underline;
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
    </style>
</head>
<body>
<div class="container">
    <div class="my-3">
        <div class="head">
            <h1>Current Borders List</h1>
        </div>
            <table id="myTable" class="table my-3">
                <thead>
                    <tr>
                        <th>Sl no.</th>
                        <th>Name</th>
                        <th>Roll no.</th>
                        <th>Room no.</th>
                        <th>Phone no.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($num_rows == 0) {
                        echo "No records found";
                    } else {
                        for ($i = 0; $i < $num_rows; $i++) {
                            $sl = $i+1;
                            $data_fetch = mysqli_fetch_assoc($res_fetch);
                            echo '<tr>
                                <td>'.$sl.'</td>
                                <td>'.$data_fetch['Name'].'</td>
                                <td>'.$data_fetch['Roll'].'</td>
                                <td>'.$data_fetch['Room'].'</td>
                                <td>'.$data_fetch['Phone'].'</td>
                            </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    window.print();
</script>
</html>
