<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Check | 상상마당</title>
    <?php $page_meta_title = 'ID Check | 상상마당'; include './meta_sangsangmadang.php'; ?>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Pretendard:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Pretendard', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #fff;
            text-align: center;
        }
        .container {
            width: 90%;
            border: 2px solid #000;
            padding: 30px 20px;
            box-sizing: border-box;
        }
        h3 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;
            color: #F40159; /* 상상마당 메인 핑크 */
            margin-top: 0;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .result-msg {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 25px;
            color: #333;
        }
        .id-highlight {
            font-weight: 700;
            color: #000;
            text-decoration: underline;
        }
        .btn-area {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .btn {
            padding: 10px 20px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: 0.3s;
            text-decoration: none;
        }
        /* 사용하기 버튼 (블랙) */
        .btn-use {
            background-color: #000;
            color: #fff;
        }
        .btn-use:hover {
            background-color: #333;
        }
        /* 닫기 버튼 (회색) */
        .btn-close {
            background-color: #eee;
            color: #666;
        }
        .btn-close:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>ID Check</h3>
    <div class="result-msg">
        <?php
        require_once 'define.php';
        $id = isset($_GET['userid']) ? trim($_GET['userid']) : "";
        $num_record = 0;

        if(!$id) {
            echo "아이디를 입력해주세요.";
        } elseif (!db_connected()) {
            echo "DB 연결이 원활하지 않습니다. 잠시 후 다시 시도해주세요.";
        } else {
            $safe_id = db_escape($id);
            $safe_id_text = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
            $sql = "SELECT * FROM members WHERE id='$safe_id'";
            $result = mysqli_query($conn, $sql);
            $num_record = $result ? mysqli_num_rows($result) : 0;

            if($num_record) {
                echo "<span class='id-highlight'>$safe_id_text</span>은(는) 이미 사용 중입니다.<br>다른 아이디를 입력해주세요.";
            } else {
                echo "<span class='id-highlight'>$safe_id_text</span>은(는) 사용 가능합니다.";
                // 사용 가능할 때만 '사용하기' 버튼이 나타나도록 처리할 수 있습니다.
            }
        }
        ?>
    </div>

    <div class="btn-area">
        <?php if(!$num_record && $id && db_connected()): ?>
            <a href="javascript:void(0)" onclick="use_id('<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8') ?>')" class="btn btn-use">Use ID</a>
        <?php endif; ?>
        <a href="javascript:self.close()" class="btn btn-close">Close</a>
    </div>
</div>

<script>
    function use_id(id) {
        // 부모 창(signUp_form.php)의 userid 입력칸에 값을 넣음
        opener.document.getElementById('userid').value = id;
        window.close();
    }
</script>

</body>
</html>
