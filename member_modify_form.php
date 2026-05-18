<?php
require_once "./define.php";

$userid = isset($_SESSION['userid']) ? trim($_SESSION['userid']) : "";

if ($userid === "") {
    echo "
    <script>
        alert('먼저 로그인해주세요.');
        location.href = 'signIn_form.php';
    </script>
    ";
    exit;
}

if (!db_connected()) {
    echo "
    <script>
        alert('DB 연결이 원활하지 않습니다. 잠시 후 다시 시도해주세요.');
        location.href = 'index.php';
    </script>
    ";
    exit;
}

$safe_userid = db_escape($userid);
$sql = "SELECT name, pass, email, phone FROM members WHERE id='$safe_userid'";
$result = mysqli_query($conn, $sql);
$row = $result ? mysqli_fetch_assoc($result) : null;

if (!$row) {
    echo "
    <script>
        alert('멤버 정보를 찾을 수 없습니다. 먼저 로그인해주세요.');
        location.href = 'logout.php';
    </script>
    ";
    exit;
}

$name = $row['name'] ?? "";
$password = $row['pass'] ?? "";
$userEmail = $row['email'] ?? "";
$tel = $row['phone'] ?? "";
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <link rel="stylesheet" href="./myPage/style.css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/member_modify.js"></script>

    <link rel="icon" type="image/png" href="./img/favicon.png">
    <?php
    $page_meta_title = 'My Page';
    $page_meta_description = 'KT&G 상상마당 회원 정보 확인·수정을 위한 마이페이지입니다.';
    include './meta_sangsangmadang.php';
    ?>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body id="top">
    <header class="header">
        <?php include "./header.php" ?>
    </header>

    <main class="mypage-container">
        <section class="mypage-box">
            <h1>Edit My Info</h1>
            <form action="member_modify.php" method="post" class="mypage-form" name="signUp_form">
                <div class="input-group">
                    <label for="userid">ID</label>
                    <div class="input-wrapper">
                        <div id="userid"><?= htmlspecialchars($userid, ENT_QUOTES, 'UTF-8') ?></div>
                    </div>
                </div>

                <div class="input-group">
                    <label for="userName">Name</label>
                    <div class="input-wrapper">
                        <input type="text" name="name" id="userName" placeholder="Enter your name" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>">
                    </div>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input type="password" name="pass" id="password" placeholder="Enter your password" value="<?= htmlspecialchars($password, ENT_QUOTES, 'UTF-8') ?>">
                    </div>
                </div>

                <div class="input-group">
                    <label for="confirmPw">Confirm Password</label>
                    <div class="input-wrapper">
                        <input type="password" name="confirmPw" id="confirmPw" placeholder="Confirm your password" value="<?= htmlspecialchars($password, ENT_QUOTES, 'UTF-8') ?>">
                    </div>
                </div>

                <div class="input-group">
                    <label for="userEmail">Email</label>
                    <div class="input-wrapper">
                        <input type="email" id="userEmail" name="email" placeholder="example@sangsang.com" value="<?= htmlspecialchars($userEmail, ENT_QUOTES, 'UTF-8') ?>">
                    </div>
                </div>

                <div class="input-group">
                    <label for="tel">Phone Number</label>
                    <div class="input-wrapper">
                        <input type="tel" name="tel" id="tel" placeholder="010-1234-5678" value="<?= htmlspecialchars($tel, ENT_QUOTES, 'UTF-8') ?>">
                    </div>
                </div>

                <div class="button-group">
                    <button type="button" class="btn btn-mypage" onclick="check_input()">Save</button>
                </div>
            </form>
        </section>
    </main>

    <footer>
        <?php include "./footer.php" ?>
    </footer>

    <a href="#top" class="btn-top">
        <img src="./img/icon/arrow-up.png" alt="Back to top">
    </a>

    <script src="./js/header.js"></script>
    <script src="./js/weather.js"></script>
</body>

</html>
