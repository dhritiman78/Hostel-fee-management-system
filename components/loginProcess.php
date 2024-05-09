<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pass = $_POST['pass'];
    if ($pass == "") {
        session_start();
        $_SESSION['logged_in'] = true;
        echo '<script>
                if(confirm("Successfully logged in!")){
                    window.location.href = "../borders.php";
                }
                else{
                    window.location.href = "../borders.php";
                }
                </script>';
    }
    else {
        echo '<script>
                if(confirm("Incorrect Password!")){
                    window.location.href = "../loginPage.php";
                }
                else{
                    window.location.href = "../loginPage.php";
                }
                </script>';
    }
}
?>