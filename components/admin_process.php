<?php
include "dbconn.php";

if($_SERVER['REQUEST_METHOD']=='POST') {
    $oprn = $_POST['oprn'];
    
    // Add new admin
    if($oprn == 0) {
        if(isset($_POST['adminroll'])) {
            $adminroll = $_POST['adminroll'];
            $sql_add_admin = "INSERT INTO `adminbody`(`Sl no.`, `Roll`) VALUES ('NULL','$adminroll');";
            $res_add_admin = mysqli_query($conn, $sql_add_admin);
            if ($res_add_admin) {
                echo '<script>
                if(confirm("Successfully added!")){
                    window.location.href = "../adminBody.php";
                }
                else{
                    window.location.href = "../adminBody.php";
                }
                </script>';
            }
            else {
                echo '<script>
                if(confirm("Something went wrong!")){
                    window.location.href = "../adminBody.php";
                }
                else{
                    window.location.href = "../adminBody.php";
                }
                </script>';
            }
        }
    }
    
    // Delete admin
    elseif($oprn == 1) {
        if(isset($_POST['adminroll'])) {
            $adminroll = $_POST['adminroll'];
            $sql_delete_admin = "DELETE FROM `adminbody` WHERE `Roll` = '$adminroll'";
            $res_delete_admin = mysqli_query($conn, $sql_delete_admin);
            if ($res_delete_admin) {
                echo '<script>
                if(confirm("Successfully deleted!")){
                    window.location.href = "../adminBody.php";
                }
                else{
                    window.location.href = "../adminBody.php";
                }
                </script>';
            }
            else {
                echo '<script>
                if(confirm("Something went wrong!")){
                    window.location.href = "../adminBody.php";
                }
                else{
                    window.location.href = "../adminBody.php";
                }
                </script>';
            }
        }
    }
}
?>
