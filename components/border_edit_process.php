<?php
require "dbconn.php";
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $operation = $_POST['operation'];
    $Slno = $_POST['Sln'];
if ($operation == 0) {
    $Name = strtoupper($_POST['name']);
    $Roll = strtoupper(trim($_POST['rollno']));
    $Room = $_POST['roomno'];
    $Phno = $_POST['phno'];
    $Dept = urlencode($_POST['dept']);
    $Prog = urlencode($_POST['prog']);
    $edit_names = "UPDATE `borders` SET `Name`='$Name',`Roll`='$Roll',`Room`='$Room',`Phone`='$Phno',`Department`='$Dept',`Programme`='$Prog' WHERE `Sl no.` = '$Slno';";
    $res_edit_names = mysqli_query($conn,$edit_names);
    if ($res_edit_names) {
        echo '<script>
        if(confirm("Successfully edited!")){
            window.location.href = "../borders.php";
        }
        else{
            window.location.href = "../borders.php";
        }
        </script>';
    }
    else {
        echo '<script>
        if(confirm("Something went wrong!")){
            window.location.href = "../borderdetails.php";
        }
        else{
            window.location.href = "../borderdetails.php";
        }
        </script>';
    }
}
elseif ($operation == 1) {
    $delete_names = "DELETE FROM `borders` WHERE `Sl no.` = '$Slno';";
    $res_delete_names = mysqli_query($conn,$delete_names);
    if ($res_delete_names) {
        echo '<script>
        if(confirm("Successfully deleted!")){
            window.location.href = "../borders.php";
        }
        else{
            window.location.href = "../borders.php";
        }
        </script>';
    }
    else {
        echo '<script>
        if(confirm("Something went wrong!")){
            window.location.href = "../borderdetails.php";
        }
        else{
            window.location.href = "../borderdetails.php";
        }
        </script>';
    }
}
elseif ($operation == 2 and isset($_POST['imagedetails'])) {
    $imgaddrs = "../".$_POST['imagedetails'];
    $delete_reciept = "DELETE FROM `reciepts` WHERE `Sl no.` = '$Slno';";
    $res_delete_reciept = mysqli_query($conn,$delete_reciept);
    if ($res_delete_reciept && unlink(urldecode($imgaddrs))) {
        echo '<script>
        if(confirm("Successfully deleted!")){
            window.location.href = "../paidlist.php";
        }
        else{
            window.location.href = "../paidlist.php";
        }
        </script>';
    }
    else {
        echo '<script>
        if(confirm("Something went wrong!")){
            window.location.href = "../paidlist.php";
        }
        else{
            window.location.href = "../paidlist.php";
        }
        </script>';
    }
}
}