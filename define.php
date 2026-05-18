<?php

mysqli_report(MYSQLI_REPORT_OFF);

if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    session_start();
}

if (!defined('DBhost')) {
    define('DBhost', 'localhost');
    define('DBuser', 'gsumin8327');
    define('DBpass', 'sumin8238@');
    define('DBname', 'gsumin8327');
}

$conn = @mysqli_connect(DBhost, DBuser, DBpass, DBname);

if ($conn) {
    mysqli_set_charset($conn, "utf8");
}

function db_connected()
{
    global $conn;
    return $conn instanceof mysqli;
}

function db_escape($value)
{
    global $conn;
    return db_connected() ? mysqli_real_escape_string($conn, $value) : "";
}
