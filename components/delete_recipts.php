<?php
require "dbconn.php";
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // Truncate the database table
    $del_sql = "TRUNCATE TABLE `reciepts`";
    $del_res = mysqli_query($conn, $del_sql);

    if ($del_res) {
        // Directory where files are located
        $dir_name = array('../room118-216s','../room217-227s','../room228-242s','../room243-other');
        for ($index=0; $index < 4; $index++) { 
            $directory = $dir_name[$index] . '/';

            // Check if the directory exists
            if (is_dir($directory)) {
                // Open a directory, and read its contents
                if ($handle = opendir($directory)) {
                    // Loop through each file in the directory
                    while (false !== ($file = readdir($handle))) {
                        // Exclude current directory and parent directory
                        if ($file != "." && $file != "..") {
                            // Attempt to delete the file
                            if (unlink($directory . $file)) {
                                echo "Deleted file: $file<br>";
                            } else {
                                echo "Failed to delete file: $file<br>";
                            }
                        }
                    }
                    // Close the directory handle
                    closedir($handle);
                } else {
                    echo "Failed to open directory: $directory";
                }
            } else {
                echo "Directory does not exist: $directory";
            }
        }

        echo '<script>
            if(confirm("Database table truncated!")){
                window.location.href = "../control_pages.php";
            } else {
                window.location.href = "../control_pages.php"; 
            }
            </script>';
    } 
    else {
        echo "Failed to truncate database table";
    }
} else {
    session_abort();
    echo '<script>
        if(confirm("Please login first!")){
            window.location.href = "loginPage.php";
        } else {
            window.location.href = "loginPage.php"; 
        }
        </script>';
}
?>
