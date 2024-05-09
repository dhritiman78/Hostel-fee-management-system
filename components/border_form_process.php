<?php
require "dbconn.php";
if ($isNewBorderTrue == 1) {
    echo '<script>
    if(confirm("This page has been temporarily closed!")){
        window.location.href = "../index.php";

    }
    else{
        window.location.href = "../index.php"; 
    }
    </script>';
}
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $Name = strtoupper($_POST['name']);
    $Roll = strtoupper(trim($_POST['rollno']));
    $Room = $_POST['roomno'];
    $Phno = $_POST['phno'];
    $Dept = urlencode($_POST['dept']);
    $Prog = urlencode($_POST['prog']);
}
$sql_check_duplicate = "SELECT * FROM `borders` WHERE `Roll` = '$Roll';";
$res_check_duplicate = mysqli_query($conn,$sql_check_duplicate);
if (mysqli_num_rows($res_check_duplicate)==0 && $Roll != "" && $Room!=0) {
    $save_names = "INSERT INTO `borders` (`Sl no.`, `Name`, `Roll`, `Room`, `Phone`, `Department`, `Programme`) VALUES ('NULL', '$Name', '$Roll', '$Room', '$Phno', '$Dept', '$Prog');";
        $res_save_names = mysqli_query($conn,$save_names);
        if ($res_save_names) {
            echo '<script>
            if(confirm("Successfully submitted!")){
                window.location.href = "../index.php";
            }
            else{
                window.location.href = "../index.php";
            }
            </script>';
        }
        else {
            echo '<script>
            if(confirm("Something went wrong!")){
                window.location.href = "../boardersform.php";
            }
            else{
                window.location.href = "../boardersform.php";
            }
            </script>';
        }
}
else {
    echo '<script>
            if(confirm("Duplicate entries are not allowed!")){
                window.location.href = "../index.php";
            }
            else{
                window.location.href = "../index.php";
            }
            </script>';
}
?>