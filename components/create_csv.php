<?php
require "dbconn.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM `reciepts` ORDER BY `reciepts`.`Room` ASC;"; // Replace 'your_table' with your actual table name
$result = $conn->query($sql);

// Create CSV file
$filename = $month_name."_".$year.".csv";
$file = fopen($filename, 'w');

// Write column headers
$columnHeaders = array("Slno.", "Name", "Roll no.","Room no.", "Phone no.", "Amount Paid", "Transaction ID", "Time", "Date", "Image"); // Adjust column headers as needed
fputcsv($file, $columnHeaders);

// Write data rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($file, $row);
    }
}

// Close file
fclose($file);

// Download CSV file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');
readfile($filename);

// Clean up
unlink($filename);

$conn->close();
?>
