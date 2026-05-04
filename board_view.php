<?php
include "./define.php";
include "./board_branch_options.php";

$num = isset($_GET["num"]) ? (int)$_GET["num"] : 0;
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

// 추후 로그인/권한 기능이 추가되면 이 조건만 공통 권한 로직으로 바꾸면 됩니다.
$userid = isset($_SESSION["userid"]) ? trim($_SESSION["userid"]) : "";
$is_admin = ($userid === "admin");

if ($num <= 0) {
    echo "<script>alert('잘못된 접근입니다.'); location.href='./board_list.php';</script>";
    exit;
}

/* 조회수 증가 */
$sql = "UPDATE board SET hit = hit + 1 WHERE num = $num";
mysqli_query($conn, $sql);

/* 현재 글 조회 */
$sql = "SELECT * FROM board WHERE num = $num";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "<script>alert('존재하지 않는 게시글입니다.'); location.href='./board_list.php';</script>";
    exit;
}

$subject = isset($row["subject"]) ? $row["subject"] : "";
$category = isset($row["category"]) ? trim($row["category"]) : "";
$branch_badge = get_board_branch_badge_label($category);
$content_raw = isset($row["content"]) ? $row["content"] : "";
$content = nl2br(htmlspecialchars($content_raw));
$regist_day = date("Y.m.d", strtotime($row["regist_day"]));

$file_name_raw = isset($row["file_name"]) ? trim($row["file_name"]) : "";
$file_copied_raw = isset($row["file_copied"]) ? trim($row["file_copied"]) : "";

/* 여러 첨부파일도 대비할 수 있도록 콤마 기준으로 분리 */
$file_names = [];
$file_copieds = [];

if ($file_name_raw !== "" && $file_copied_raw !== "") {
    $file_names = array_map("trim", explode(",", $file_name_raw));
    $file_copieds = array_map("trim", explode(",", $file_copied_raw));
}

$files = [];
$file_count = min(count($file_names), count($file_copieds));

for ($i = 0; $i < $file_count; $i++) {
    if ($file_names[$i] !== "" && $file_copieds[$i] !== "") {
        $ext = strtolower(pathinfo($file_names[$i], PATHINFO_EXTENSION));
        $is_image = in_array($ext, ["jpg", "jpeg", "png", "gif", "webp", "bmp"], true);

        $files[] = [
            "name" => $file_names[$i],
            "copied" => $file_copieds[$i],
            "is_image" => $is_image,
        ];
    }
}

/* 첨부파일 중 첫 번째 이미지 1개를 본문 대표 이미지로 사용 */
$main_image = null;
foreach ($files as $file) {
    if ($file["is_image"]) {
        $main_image = $file;
        break;
    }
}

/* 이전 글 */
$prev_sql = "SELECT num, subject FROM board WHERE num < $num ORDER BY num DESC LIMIT 1";
$prev_result = mysqli_query($conn, $prev_sql);
$prev_row = mysqli_fetch_assoc($prev_result);

/* 다음 글 */
$next_sql = "SELECT num, subject FROM board WHERE num > $num ORDER BY num ASC LIMIT 1";
$next_result = mysqli_query($conn, $next_sql);
$next_row = mysqli_fetch_assoc($next_result);
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상상마당 | Notice Detail</title>

    <script src="./js/jquery-1.9.1.min.js"></script>

    <link rel="icon" type="image/png" href="./img/favicon.png">
    <meta name="description" content="KT&G 상상마당">
    <meta name="keywords" content="KT&G 상상마당,KT&G,상상마당">
    <meta name="author" content="권수미">
    <meta name="generator" content="vsCode">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/board-detail.css">

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="notice-view-body">
    <header class="header">
        <?php include "./header.php"; ?>
    </header>

    <main>
        <section class="notice-view-page">
            <div class="notice-view-inner">
                <div class="notice-view-title">
                    <h2>Notice</h2>
                </div>

                <div class="notice-view-top">
                    <?php if ($branch_badge !== "") { ?>
                        <div class="view-branch-badge"><?= htmlspecialchars($branch_badge) ?></div>
                    <?php } ?>

                    <div class="view-subject">
                        <?= htmlspecialchars($subject) ?>
                    </div>

                    <div class="view-meta-row">
                        <div class="view-date">
                            <span>Date |</span> <?= htmlspecialchars($regist_day) ?>
                        </div>

                        <?php if (!empty($files)) { ?>
                            <div class="view-files">
                                <span class="file-label">File |</span>
                                <div class="file-list">
                                    <?php foreach ($files as $file) { ?>
                                        <a href="./board_download.php?file_name=<?= urlencode($file["name"]) ?>&file_copied=<?= urlencode($file["copied"]) ?>">
                                            <?= htmlspecialchars($file["name"]) ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <?php if ($main_image) { ?>
                    <div class="view-image-box">
                        <img src="./data/<?= htmlspecialchars($main_image["copied"]) ?>" alt="<?= htmlspecialchars($main_image["name"]) ?>">
                    </div>
                <?php } ?>

                <?php if (!empty(trim($content_raw))) { ?>
                    <div class="view-content">
                        <?= $content ?>
                    </div>
                <?php } ?>

                <div class="view-bottom-nav">
                    <div class="nav-arrow nav-prev">
                        <?php if ($prev_row) { ?>
                            <a href="./board_view.php?num=<?= (int)$prev_row["num"] ?>&page=<?= $page ?>" aria-label="이전 글">
                                <img src="./img/icon/down-arrow.png" alt="이전">
                            </a>
                        <?php } else { ?>
                            <span class="arrow-disabled">
                                <img src="./img/icon/down-arrow.png" alt="이전">
                            </span>
                        <?php } ?>
                    </div>

                    <div class="nav-center-actions">
                        <div class="nav-list-btn">
                            <a href="./board_list.php?page=<?= $page ?>">목록</a>
                        </div>

                        <?php if ($is_admin) { ?>
                            <div class="nav-modify-btn">
                                <a href="./board_modify_form.php?num=<?= $num ?>&page=<?= $page ?>">수정하기</a>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="nav-arrow nav-next">
                        <?php if ($next_row) { ?>
                            <a href="./board_view.php?num=<?= (int)$next_row["num"] ?>&page=<?= $page ?>" aria-label="다음 글">
                                <img src="./img/icon/down-arrow.png" alt="다음">
                            </a>
                        <?php } else { ?>
                            <span class="arrow-disabled">
                                <img src="./img/icon/down-arrow.png" alt="다음">
                            </span>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php include "./footer.php"; ?>
    </footer>
</body>

</html>
