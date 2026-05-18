<?php
require_once 'define.php';

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

if (!db_connected()) {
    echo "
    <script>
        alert('DB 연결이 원활하지 않습니다. 잠시 후 다시 시도해주세요.');
        history.back();
    </script>
    ";
    exit;
}

$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$pass = isset($_POST['pass']) ? trim($_POST['pass']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$tel = isset($_POST['tel']) ? trim($_POST['tel']) : '';

$safe_userid = db_escape($userid);
$safe_name = db_escape($name);
$safe_pass = db_escape($pass);
$safe_email = db_escape($email);
$safe_tel = db_escape($tel);

$sql = "UPDATE members SET ";
$sql .= "pass='$safe_pass', ";
$sql .= "name='$safe_name', ";
$sql .= "email='$safe_email', ";
$sql .= "phone='$safe_tel' ";
$sql .= "WHERE id='$safe_userid'";

if (!mysqli_query($conn, $sql)) {
    echo "
    <script>
        alert('계정 정보 수정에 실패했습니다. DB 테이블/컬럼을 확인해주세요.');
        history.back();
    </script>
    ";
    exit;
}

echo "
    <script>
        alert('계정 정보가 업데이트되었습니다.');
        location.href = 'index.php';
    </script>
";
?>
