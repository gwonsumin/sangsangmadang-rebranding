<!-- http://localhost:8088/SangsangMadang/signIn_form.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | 상상마당</title>
    <link rel="stylesheet" href="./signIn/style.css">
    <script src="./js/jquery-1.9.1.min.js"></script>

    <link rel="icon" type="image/png" href="./img/favicon.png">
    <meta name="description" content="KT&G 상상마당">
    <meta name="keywords" content="KT&G 상상마당,KT&G,상상마당">
    <meta name="author" content="권수민">
    <meta name="generator" content="vsCode">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
<?php include "./analytics.php"; ?>
</head>

<body id="top">
    <!-- HEADER -->
    <header class="header">
        <?php include "./header.php" ?>
    </header>

    <main class="login-container">
        <section class="login-box">
            <h1>Sign In</h1>
            <form action="login.php" method="post" class="login-form" name="signIn_form">
                <div class="input-group">
                    <label for="username" class="hidden">Enter your username</label>
                    <div class="input-wrapper"><input type="text" name="id" id="id" placeholder="Enter your ID" value="" required>
                    </div>
                    <p class="hleper-text">※ 영문 및 숫자, 6~20자리를 입력하세요.</p>
                </div>


                <div class="input-group">
                    <label for="password" class="hidden">password</label>
                    <div class="input-wrapper"><input type="password" name="pass" id="password"
                            placeholder="Password" value="" required></div>
                    <p class="hleper-text">※ 영문과 숫자, 특수문자 조합 10~20자리를 입력하세요.</p>
                </div>

                <div class="button-group">
                    <button type="button" class="btn btn-login" onclick="check_input()">Login</button>
                    <button type="button" class="btn btn-signup" onclick="location.href='./signUp_form.php'">Sign
                        Up</button>
                </div>

                <div class="form-links"><a href="javascript:void(0)">Forgot your password?</a></div>
            </form>
        </section>
    </main>

        <!-- FOTTER -->
    <footer>
        <?php include "./footer.php" ?>
    </footer>


    <!-- 페이지 위로 가는 버튼 -->
    <a href="#top" class="btn-top">
        <img src="./img/icon/arrow-up.png" alt="위로 가기">
    </a>

    <!-- 스크립트 작성 -->
    <script src="./js/header.js"></script>
    <script src="./js/weather.js"></script>
    <script>
        function check_input() {
            if (!document.signIn_form.id.value.trim()) {
                alert("아이디를 입력하세요.");
                document.signIn_form.id.focus();
                return;
        }
            if (!document.signIn_form.pass.value.trim()) {
                alert("비밀번호를 입력하세요.");
                document.signIn_form.pass.focus();
                return;
            }
    // 수정된 부분: .form 삭제
    document.signIn_form.submit(); 
}
    </script>

</body>

</html>