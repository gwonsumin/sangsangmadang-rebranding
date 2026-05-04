<!-- http://localhost:8088/SangsangMadang/signUp_form.php -->
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | 상상마당</title>
    <link rel="stylesheet" href="./signUp/style.css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script>
        //입력과 검증 함수
        function check_input() {
            //아이디 입력 여부 확인
            if(!document.signUp_form.id.value.trim()){ 
                alert("아이디를 입력하세요!");
                document.signUp_form.rid.focus();
                return;
            }
            //이름 입력 여부 확인
            if(!document.signUp_form.name.value.trim()){ 
                alert("이름을 입력하세요!");
                document.signUp_form.name.focus();
                return;
            }
            //비밀번호 입력 여부 확인
            if(!document.signUp_form.pass.value.trim()){ 
                alert("비밀번호를 입력하세요!");
                document.signUp_form.pass.focus();
                return;
            }
            //비밀번호 확인 입력 여부 확인
            if(!document.signUp_form.confirmPw.value.trim()){ 
                alert("비밀번호 확인을 입력하세요!");
                document.signUp_form.confirmPw.focus();
                return;
            }
            
            //이메일 입력 여부 확인
            if(!document.signUp_form.userEmail.value.trim()){ 
                alert("이메일을 입력하세요!");
                document.signUp_form.userEmail.focus();
                return;
            }
            //핸드폰 번호 입력 여부 확인
            if(!document.signUp_form.tel.value.trim()){ 
                alert("핸드폰 번호를 입력하세요!");
                document.signUp_form.tel.focus();
                return;
            }

            //비밀번호와 비밀번호 확인 일치 여부
            if(document.signUp_form.password.value.trim() != document.signUp_form.confirmPw.value.trim()){
                alert("비밀번호가 일치하지 않습니다. \n 다시 입력해주세요.");
                document.signUp_form.password.focus();
                document.signUp_form.password.select();//블럭지정
                return;
            }

            //모든 검증이 완료되면 폼 전송
            document.signUp_form.submit();
        }
            //폼 초기화 함수
            function reset_form(){
                document.signUp_form.userid.value = "";
                document.signUp_form.userName.value = "";
                document.signUp_form.password.value = "";
                document.signUp_form.confirmPw.value = "";
                document.signUp_form.userEmail.value = "";
                document.signUp_form.tel.value = "";
                document.signUp_form.userid.focus(); //아이디 입력 창에 포커스
                return;
            }

            //아이디 중복함수
            function check_id() {
                 var user_id = document.getElementById('userid').value;

                if (!user_id.trim()) {
                alert("아이디를 입력하세요!");
                document.getElementById('userid').focus();
                return;
                }

                // 팝업창 사이즈 설정
                var popupWidth = 450;
                var popupHeight = 300;

                // 중앙 위치 계산
                // window.screen.width: 모니터 가로 해상도
                // window.screen.height: 모니터 세로 해상도
                var left = (window.screen.width / 2) - (popupWidth / 2);
                var top = (window.screen.height / 2) - (popupHeight / 2);

                // 팝업 옵션에 계산된 좌측(left), 상단(top) 위치 적용
                window.open(
                    "member_check_id.php?userid=" + user_id, 
                    "IDcheck", 
                    "width=" + popupWidth + ", height=" + popupHeight + ", left=" + left + ", top=" + top + ", scrollbars=no, resizable=yes"
                );
}  
    </script>

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
</head>

<body id="top">
    <!-- HEADER -->
    <header class="header">
        <?php include "./header.php" ?>
    </header>

    <main class="signup-container">
        <section class="signup-box">
            <h1>Sign Up</h1>
            <form action="member_insert.php" method="post" class="signup-form" name="signUp_form">
                <div class="input-group">
                    <label for="userid">ID</label>
                    <div class="input-wrapper">
                        <input type="text" name="id" id="userid" placeholder="아이디를 입력하세요." required>

                        <div class="checkId">
                            <a href="#" onclick="check_id()">Check</a>
                        </div>
                    </div>
                    
                </div>

                <div class="input-group">
                    <label for="userName">Name</label>
                    <div class="input-wrapper">
                        <input type="text" name="name" id="userName" placeholder="이름을 입력하세요." required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input type="password" name="pass" id="password"
                            placeholder="영문과 숫자, 특수문자 조합 10~20자리를 입력하세요." required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="confirmPw">Confirm Password</label>
                    <div class="input-wrapper">
                        <input type="password" name="confirmPw" id="confirmPw" placeholder="비밀번호를 다시 입력해주세요." required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="userEmail">Email</label>
                    <div class="input-wrapper">
                        <input type="email" id="userEmail" name="email" placeholder="example@sangnsang.com"
                            required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="tel">Phone Number</label>
                    <div class="input-wrapper">
                        <input type="tel" name="tel" id="tel" placeholder="010-1234-5678" required>
                    </div>
                </div>

                <div class="agreement-group">
                    <label class="check-item"><input type="checkbox" required> (필수) 이용약관 및 개인정보 수집 및 이용에 동의합니다.</label>
                    <label class="check-item"><input type="checkbox" required> (필수) 만 14세 이상입니다.</label>
                </div>

                <div class="button-group">
                    <button type="button" class="btn btn-signup" onclick="check_input()">Sign Up</button>
                </div>
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

</body>

</html>
