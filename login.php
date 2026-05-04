<!-- 아이디와 비밀번호가 일치하지 않을때 띄우는 창 -->
 <?php

session_start();

header('Content-Type:text/html;charset=utf-8');

include 'define.php';

//MySQL 서버 연결
$con = mysqli_connect(DBhost, DBuser, DBpass, DBname);

$id = $_POST["id"];
$pass = $_POST["pass"];

//아이디 중복 확인
$sql = "SELECT * FROM members WHERE id='$id'";
$result = mysqli_query($con, $sql);
$num_record = mysqli_num_rows($result);

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

     mysqli_close($con);

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