<?php
header('Content-Type:text/html;charset=utf-8');

require_once 'define.php';

//사용자가 입력한 데이터 가져오기
$id = isset($_POST['id']) ? trim($_POST['id']) : "";
$name = isset($_POST['name']) ? trim($_POST['name']) : "";
$pass = isset($_POST['pass']) ? trim($_POST['pass']) : "";
$email = isset($_POST['email']) ? trim($_POST['email']) : "";
$tel = isset($_POST['tel']) ? trim($_POST['tel']) : "";

//현재 날짜와 시간 저장
$regist_day = date("Y-m-d (H:i)");

if (!db_connected()) {
    echo "<script>alert('DB 연결이 원활하지 않습니다. 잠시 후 다시 시도해주세요.'); history.go(-1);</script>";
    exit;
}

$safe_id = db_escape($id);
$safe_name = db_escape($name);
$safe_pass = db_escape($pass);
$safe_email = db_escape($email);
$safe_tel = db_escape($tel);

//아이디 중복 확인
$checkid = "SELECT * FROM members WHERE id='$safe_id'";
$result = mysqli_query($conn, $checkid);
$num_record = $result ? mysqli_num_rows($result) : 0;

//중복 아이디 처리
if($num_record){
    echo("
        <script>
            window.alert('아이디가 중복되었습니다! 다른 아이디를 사용해 주세요.');
            history.go(-1); /* 이전 페이지로 이동 */
        </script>
    ");
    exit;
}else{
    //회원정보를 members 테이블에 삽입
    $sql = "INSERT INTO members (id, pass, name, email, phone, regist_day) ";
    $sql .= "VALUES('$safe_id', '$safe_pass', '$safe_name', '$safe_email', '$safe_tel', '$regist_day')";

    $result = mysqli_query($conn, $sql); //SQL명령어 실행
    if (!$result) {
        echo "<script>alert('회원가입에 실패했습니다. DB 테이블/컬럼을 확인해주세요.'); history.go(-1);</script>";
        exit;
    }
};

//회원 가입 완료 후 로그인 페이지로 이동
echo "
    <script>
        alert('회원가입이 완료되었습니다! 로그인해 주세요.')
        location.href = 'signIn_form.php';
    </script>
"

?>
