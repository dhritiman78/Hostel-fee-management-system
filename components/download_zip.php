<?php
require "dbconn.php";
if($_SERVER['REQUEST_METHOD']=='GET'){
    $Rooms = $_GET['rooms'];
    switch ($Rooms) {
        case '118-216':
            $folderName = $month_name."_".$year."_118-216";
            $folderPath = "../room118-216s";
            break;
        case '217-227':
            $folderName = $month_name."_".$year."_217-227";
            $folderPath = "../room217-227s";
            break;
        case '228-242':
            $folderName = $month_name."_".$year."_228-242";
            $folderPath = "../room228-242s";
            break;
        case '243':
            $folderName = $month_name."_".$year."_243-other";
            $folderPath = "../room243-other";
            break;
        
        default:
        $folderName = "";
        $folderPath = "";
            break;
    }

}

// Create a zip archive
$zip = new ZipArchive();
$zipFileName = $folderName . ".zip";
if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
    // Add all files from the directory to the zip archive
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($folderPath),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file) {
        // Skip directories (if any)
        if (!$file->isDir()) {
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($folderPath) + 1);
            $zip->addFile($filePath, $relativePath);
        }
    }

    $zip->close();

    // Set headers for download
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . $zipFileName . '"');
    header('Content-Length: ' . filesize($zipFileName));

    // Send the zip file to the browser
    readfile($zipFileName);

    // Clean up - delete the zip file
    unlink($zipFileName);
} else {
    echo "Failed to create zip archive.";
}
?>
