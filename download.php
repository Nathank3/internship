<?php
if (isset($_GET['file'])) {
    $fileName = $_GET['file'];
    $filePath =$fileName;

    if (file_exists($filePath)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        readfile($filePath);
        exit;
    } else {
        echo 'File not found:'. $filePath;
    }
} else {
    echo 'Invalid request.';
}
?>
