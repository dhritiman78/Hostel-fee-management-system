<?php
require "dbconn.php";
if ($isNewMessRecieptTrue == 1) {
    echo '<script>
    if(confirm("This page has been temporarily closed!")){
        window.location.href = "index.php";
    }
    else{
        window.location.href = "index.php"; 
    }
    </script>';
}
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $Name = strtoupper($_POST['name']);
    $Roll = strtoupper($_POST['rollno']);
    $Room = $_POST['roomno'];
    $Phno = $_POST['phno'];
    $Amount = urlencode($_POST['amount']);
    $Transaction = urlencode($_POST['transno']);
    $Img = $_FILES['reciept'];
    $Img_name = $Img['name'];
    $Img_error = $Img['error'];
    $temp_name = $Img['tmp_name'];
    $newfilename = strtolower($Roll)."_". strtolower($month_name)."_".$year.".jpg";
    //Setting the image path
    if ($Room>= 118 && $Room<=216) {
        $img_path = "room118-216s/";
    }
    else if ($Room>= 217 && $Room<=227) {
        $img_path = "room217-227s/";
    }
    else if ($Room>= 228 && $Room<=242) {
        $img_path = "room228-242s/";
    }
    else {
        $img_path = "room243-other/";
    }
    // $destination = "../assets/reciepts/".$Img_name;
    // $pic = urlencode("assets/reciepts/".$Img_name);
    $destination = "../".$img_path.$newfilename;
    $pic = urlencode($img_path.$newfilename);
    // Set the default timezone to your timezone
date_default_timezone_set('Asia/Kolkata'); // Change this to your timezone

// Get current date
$currentDate = date('M d Y');

// Get current time
$currentTime = date('g:i A');
}
$sql_check_duplicate = "SELECT * FROM `reciepts` WHERE `Roll` = '$Roll';";
$res_check_duplicate = mysqli_query($conn,$sql_check_duplicate);
if (mysqli_num_rows($res_check_duplicate)==0) {
    if (move_uploaded_file($temp_name,$destination)) {
        $save_names = "INSERT INTO `reciepts` (`Sl no.`, `Name`, `Roll`, `Room`, `Phone`, `Amount`, `Transaction`, `Time`, `Date`, `Reciept`) VALUES ('NULL', '$Name', '$Roll', '$Room', '$Phno', '$Amount', '$Transaction', '$currentTime', '$currentDate', '$pic');";
        $res_save_names = mysqli_query($conn,$save_names);
        if ($res_save_names) {
            echo '<script>
            if(confirm("Successfully submitted!")){
                window.location.href = "../viewdetails.php?roll="+"'.strtolower($Roll).'";

            }
            else{
                window.location.href = "../viewdetails.php?roll="+"'.strtolower($Roll).'";
            }
            </script>';
        }
        else {
            echo '<script>
            if(confirm("Something went wrong!")){
                window.location.href = "../index.php";
            }
            else{
                window.location.href = "../index.php";
            }
            </script>';
        }
    }
    // this
    else {
        echo '<script>
            if(confirm("Something went wrong!")){
                window.location.href = "../index.php";
            }
            else{
                window.location.href = "../index.php";
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