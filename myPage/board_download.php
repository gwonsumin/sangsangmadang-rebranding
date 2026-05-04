<?php
$file_name = $_GET["file_name"];
$file_copied = $_GET["file_copied"];
$file_path = "./data/" . $file_copied;

if (file_exists($file_path)) {
    header("Content-Type: application/octet-stream");
    header("Content-Length: " . filesize($file_path));
    header("Content-Disposition: attachment; filename=\"" . rawurlencode($file_name) . "\"");
    header("Content-Transfer-Encoding: binary");
    header("Pragma: no-cache");
    header("Expires: 0");

    readfile($file_path);
    exit;
}
?>