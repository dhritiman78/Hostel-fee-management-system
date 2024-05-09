<?php
include "dbconn.php";
session_start();
if ($_SESSION['logged_in'] != true) {
    session_abort();
    echo '<script>
    if(confirm("Please login first!")){
        window.location.href = "../loginPage.php";
    }
    else{
        window.location.href = "../loginPage.php"; 
    }
    </script>';
}
if (isset($_POST['selectedcheckedValues'])) {
    $selectedcheckedValues = $_POST['selectedcheckedValues'];
    foreach ($selectedcheckedValues as $slNo) {
        // Delete the borders with the specified Sl no. from the database
        $sql = "DELETE FROM `borders` WHERE `Sl no.` = $slNo";
        mysqli_query($conn, $sql);
    }
    // Redirect back to the adminPage2.php after deletion
   echo '<script>if (confirm("Successfully deleted!")) {
        window.location.href = "../borders.php";
        }
        else{
        window.location.href = "../borders.php";
        }
        </script>';
    exit;
} else {
    // No confessions were selected for deletion
    echo '<script>if (confirm("No borders were selected for deletion!")) {
        window.location.href = "../borders.php";
        }
        else{
        window.location.href = "../borders.php";
        }
        </script>';
    // header("location: ../adminPage.php");
    exit;
}
?>