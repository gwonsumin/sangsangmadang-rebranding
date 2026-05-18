<?php
$file_name = isset($_GET["file_name"]) ? basename($_GET["file_name"]) : "";
$file_copied = isset($_GET["file_copied"]) ? basename($_GET["file_copied"]) : "";
$file_path = "./data/" . $file_copied;

if ($file_name !== "" && $file_copied !== "" && file_exists($file_path) && is_file($file_path)) {
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
