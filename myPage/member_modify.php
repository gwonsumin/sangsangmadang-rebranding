<?php
include 'define.php';

$userid = isset($_SESSION['userid']) ? trim($_SESSION['userid']) : '';

if ($userid === '') {
    echo "
    <script>
        alert('Please sign in first.');
        location.href = 'signIn_form.php';
    </script>
    ";
    exit;
}

$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$pass = isset($_POST['pass']) ? trim($_POST['pass']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$tel = isset($_POST['tel']) ? trim($_POST['tel']) : '';

$safe_userid = mysqli_real_escape_string($conn, $userid);
$safe_name = mysqli_real_escape_string($conn, $name);
$safe_pass = mysqli_real_escape_string($conn, $pass);
$safe_email = mysqli_real_escape_string($conn, $email);
$safe_tel = mysqli_real_escape_string($conn, $tel);

$sql = "UPDATE members SET ";
$sql .= "pass='$safe_pass', ";
$sql .= "name='$safe_name', ";
$sql .= "email='$safe_email', ";
$sql .= "phone='$safe_tel' ";
$sql .= "WHERE id='$safe_userid'";

mysqli_query($conn, $sql);

echo "
    <script>
        alert('계정 정보가 업데이트되었습니다.');
        location.href = 'index.php';
    </script>
";
?>
