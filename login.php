<?php
header('Content-Type:text/html;charset=utf-8');

require_once 'define.php';

$id = isset($_POST["id"]) ? trim($_POST["id"]) : "";
$pass = isset($_POST["pass"]) ? trim($_POST["pass"]) : "";

// 테스트 전용 관리자 계정 (test / 1234)
if ($id === "test" && $pass === "1234") {
    $_SESSION['userid'] = 'admin';
    $_SESSION['username'] = 'test';

    echo("
        <script>
            location.href = 'index.php'
        </script>
    ");
    exit;
}

if (!db_connected()) {
    echo "<script>alert('DB 연결이 원활하지 않습니다. 잠시 후 다시 시도해주세요.'); history.go(-1);</script>";
    exit;
}

//아이디 중복 확인
$safe_id = db_escape($id);
$sql = "SELECT * FROM members WHERE id='$safe_id'";
$result = mysqli_query($conn, $sql);
$num_record = $result ? mysqli_num_rows($result) : 0;

//아이디가 존재하는지 여부
if(!$num_record){ //db에 아이디가 존재하지 않는다면
    echo ("
    <script>
        window.alert('등록되지 않는 아이디입니다.')
        history.go(-1)
    </script>
    ");
} else { //db에 아이디가 존재한다면
    //db에서 비밀번호 가져오기
    $row = mysqli_fetch_array($result);
    $db_pass = $row['pass'];

    if($pass != $db_pass){
        //비밀번호가 다를 경우에
        echo("
            <script>
            window.alert('비밀번호가 틀립니다!')
            history.go(-1)
            </script>
        ");
        exit;
    } else{
        //비밀번호가 같을 경우
        $_SESSION['userid'] = $row['id'];
        $_SESSION['username'] = $row['name'];

        echo("
            <script>
                location.href = 'index.php'
            </script>
        ");
    }
}

?>
