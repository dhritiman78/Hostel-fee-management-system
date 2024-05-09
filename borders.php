<?php
include "components/dbconn.php";
$sql_fetch = "SELECT * FROM `borders`;";
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
<?php
    require "components/nav.php";
    require "components/adminNav.php";
?>
<div class="container">
    <div class="my-3">
    <button class="btn btn-danger" onclick="print_border()" id="deleteButton">Print border list</button>
        <!-- Add a form to submit selected values -->
        <form action="components/delete_records.php" method="post" id="deleteForm">
            <button type="submit" class="btn btn-danger" id="deleteButton">Delete Selected</button>
            <table id="myTable" class="table my-3">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAllCheckbox"></th>
                        <th>Name</th>
                        <th>Roll no.</th>
                        <th>Room no.</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($num_rows == 0) {
                        echo "No records found";
                    } else {
                        for ($i = 0; $i < $num_rows; $i++) {
                            $data_fetch = mysqli_fetch_assoc($res_fetch);
                            echo '<tr>
                                <td><input type="checkbox" name="selectedcheckedValues[]" class="selectCheckbox" value="'.$data_fetch['Sl no.'].'"></td>
                                <td>'.$data_fetch['Name'].'</td>
                                <td>'.$data_fetch['Roll'].'</td>
                                <td>'.$data_fetch['Room'].'</td>
                                <td><a class="btn" onclick="gotoedit('.$data_fetch['Sl no.'].')">Edit</a></td>
                            </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();

        $('#selectAllCheckbox').on('change', function() {
            $('.selectCheckbox').prop('checked', $(this).prop('checked'));
        });

     });

    function gotoedit(sln) {
        window.location.href = 'borderdetails.php?sln=' + sln;
    }
    function print_border() {
        window.open("print_pages/borders_print.php","_blank");
    }
</script>
</html>
