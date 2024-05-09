<?php
require "dbconn.php";
// Toggling the switches
function toggleValue($val,$Sln){
    global $conn;
    $sql_toggle = "UPDATE `controls` SET `Value` = '$val' WHERE `controls`.`Sl no.` = '$Sln';
    ;";
    $res_toggle = mysqli_query($conn,$sql_toggle);
    if ($res_toggle) {
        return true;
    }
    else {
        return false;
    }
}
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $Slno = $_POST['Sln'];
    $Value = $_POST['control_value'];
    switch ($Slno) {
        case '1':
            if(toggleValue($Value,$Slno)){
                echo '<script>
                if(confirm("Successfully toggled!")){
                    window.location.href = "../control_pages.php";
                }
                else{
                    window.location.href = "../control_pages.php";
                }
                </script>';
            }
            break;
        case '2':
            if(toggleValue($Value,$Slno)){
                echo '<script>
                if(confirm("Successfully toggled!")){
                    window.location.href = "../control_pages.php";
                }
                else{
                    window.location.href = "../control_pages.php";
                }
                </script>';
            }
            break;
        case '3':
            if(toggleValue($Value,$Slno)){
                echo '<script>
                if(confirm("Successfully changed!")){
                    window.location.href = "../control_pages.php";
                }
                else{
                    window.location.href = "../control_pages.php";
                }
                </script>';
            }
            break;
        case '4':
            if(toggleValue($Value,$Slno)){
                echo '<script>
                if(confirm("Successfully changed!")){
                    window.location.href = "../control_pages.php";
                }
                else{
                    window.location.href = "../control_pages.php";
                }
                </script>';
            }
            else {
                echo '<script>
                if(confirm("Something went wrong!")){
                    window.location.href = "../control_pages.php";
                }
                else{
                    window.location.href = "../control_pages.php";
                }
                </script>';
            }
        break;
        
        default:
        echo '<script>
        if(confirm("Something went wrong!")){
            window.location.href = "../control_pages.php";
        }
        else{
            window.location.href = "../control_pages.php";
        }
        </script>';
            break;
    }
}
?>