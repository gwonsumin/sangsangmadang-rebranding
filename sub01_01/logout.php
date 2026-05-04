<?php
    session_start();

    //unset()은 세션 변수를 삭제
    unset($_SESSION['userid']);
    unset($_SESSION['username']);

    echo("
        <script>
            location.href = 'index.php';
        </script>
    ");


?>