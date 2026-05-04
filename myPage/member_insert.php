<!-- 사용자가 입력한 데이터를 DB에 저장 -->
 <?php
header('Content-Type:text/html;charset=utf-8');

include 'define.php';

//사용자가 입력한 데이터 가져오기
$id = $_POST['id'];
$name = $_POST['name'];
$pass = $_POST['pass'];
$email = $_POST['email'];
$tel = $_POST['tel'];

//현재 날짜와 시간 저장
$regist_day = date("Y-m-d (H:i)");

//MySQL 서버 연결
$con = mysqli_connect(DBhost, DBuser, DBpass, DBname);

//아이디 중복 확인
$checkid = "SELECT * FROM members WHERE id='$id'";
$result = mysqli_query($con, $checkid);
$num_record = mysqli_num_rows($result);

//중복 아이디 처리
if($num_record){
    echo("
        <script>
            window.alert('아이디가 중복되었습니다! 다른 아이디를 사용해 주세요.');
            history.go(-1); /* 이전 페이지로 이동 */
        </script>
    ");
}else{
    //회원정보를 members 테이블에 삽입
    $sql = "INSERT INTO members (id, pass, name, email, phone, regist_day) ";
    $sql .= "VALUES('$id', '$pass', '$name', '$email', '$tel', '$regist_day')";

    $result = mysqli_query($con, $sql); //SQL명령어 실행
};

//MySQL 연결 종료
mysqli_close($con);

//회원 가입 완료 후 로그인 페이지로 이동
echo "
    <script>
        alert('회원가입이 완료되었습니다! 로그인해 주세요.')
        location.href = 'signIn_form.php';
    </script>
"

?>