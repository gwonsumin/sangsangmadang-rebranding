<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('DBhost', 'localhost');
define('DBuser', 'gsumin8327');
define('DBpass', 'sumin8238@');
define('DBname', 'gsumin8327');

$conn = mysqli_connect(DBhost, DBuser, DBpass, DBname);

if (!$conn) {
    die("DB 연결 실패: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
