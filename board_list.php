<?php require_once "./define.php"; ?>
<?php require_once "./board_branch_options.php"; ?>

<?php
$scale = 8;
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
$page = $page > 0 ? $page : 1;
$search = isset($_GET["search"]) ? trim($_GET["search"]) : "";
$userid = isset($_SESSION["userid"]) ? trim($_SESSION["userid"]) : "";
$is_admin = ($userid === "admin");
$where = "";

if ($search !== "" && db_connected()) {
    $safe_search = db_escape($search);
    $where = "WHERE subject LIKE '%$safe_search%'";
}

$count_sql = "SELECT COUNT(*) AS cnt FROM board $where";
$count_result = db_connected() ? mysqli_query($conn, $count_sql) : false;
$count_row = $count_result ? mysqli_fetch_assoc($count_result) : null;
$total_record = $count_row ? (int)$count_row["cnt"] : 0;

$total_page = ($total_record % $scale == 0)
    ? ($total_record / $scale)
    : ceil($total_record / $scale);

if ($total_page > 0 && $page > $total_page) {
    $page = $total_page;
}

$start = ($page - 1) * $scale;
$number = $total_record - $start;

$sql = "SELECT * FROM board $where ORDER BY num DESC LIMIT $start, $scale";
$result = db_connected() ? mysqli_query($conn, $sql) : false;
?>

<!DOCTYPE html>
<html lang="ko">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>상상마당 | Notice</title>
<script src="./js/jquery-1.9.1.min.js"></script>

<link rel="icon" type="image/png" href="./img/favicon.png">
<?php $page_meta_title = '상상마당 | Notice'; include './meta_sangsangmadang.php'; ?>

<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/board.css">

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

</head>

<body class="notice-body">

<header class="header">
<?php include "./header.php"; ?>
</header>

<main>

<section class="notice-page">
    <div class="notice-inner">
        <div class="notice-title-wrap">
            <h2>Notice</h2>
            <p>상상마당의 <span>새로운 소식</span>을 안내해드립니다.</p>
        </div>

        <div class="notice-toolbar">
            <?php if ($is_admin) { ?>
                <a href="./board_form.php" class="notice-write-btn">글 작성</a>
            <?php } else { ?>
                <button type="button" class="notice-write-btn is-disabled" aria-disabled="true">관리자 전용</button>
            <?php } ?>

            <form class="notice-search" method="get" action="board_list.php">
                <input
                    type="text"
                    name="search"
                    value="<?= htmlspecialchars($search) ?>"
                    placeholder="검색어를 입력하세요."
                >
                <button type="submit" aria-label="검색"></button>
            </form>
        </div>

        <div class="notice-table-wrap">
            <table class="notice-table">
                <colgroup>
                    <col style="width: 12%;">
                    <col style="width: 13%;">
                    <col style="width: 45%;">
                    <col style="width: 10%;">
                    <col style="width: 20%;">
                </colgroup>

                <thead>
                    <tr>
                        <th>Num</th>
                        <th>Branch</th>
                        <th>Title</th>
                        <th>File</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if ($total_record === 0) { ?>
                    <tr>
                        <td class="td-empty" colspan="5">
                            <?= $search !== "" ? "검색 결과가 없습니다." : "등록된 공지사항이 없습니다." ?>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php
                    for ($i = 0; $result && $i < $scale; $i++) {
                        $row = mysqli_fetch_array($result);
                        if (!$row) {
                            break;
                        }

                        $num = $row["num"];
                        $subject = $row["subject"];
                        $category = isset($row["category"]) ? trim($row["category"]) : "";
                        $branch_badge = get_board_branch_badge_label($category);
                        $regist_day = date("Y.m.d", strtotime($row["regist_day"]));
                        $file_name = $row["file_name"];
                    ?>
                    <tr>
                        <td class="td-num"><?= $number ?></td>

                        <td class="td-branch">
                            <?php if ($branch_badge !== "") { ?>
                                <span class="board-branch-badge"><?= htmlspecialchars($branch_badge) ?></span>
                            <?php } ?>
                        </td>

                        <td class="td-subject">
                            <a href="./board_view.php?num=<?= $num ?>&page=<?= $page ?>">
                                <span class="subject-text"><?= htmlspecialchars($subject) ?></span>
                            </a>
                        </td>

                        <td class="td-file">
                            <?php if ($file_name) { ?>
                                <img src="./img/icon/fileIcon.png" alt="첨부파일">
                            <?php } ?>
                        </td>

                        <td class="td-date"><?= htmlspecialchars($regist_day) ?></td>
                    </tr>
                    <?php
                        $number--;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <?php if ($total_page >= 2 && $page >= 2) {
                $new_page = $page - 1; ?>
                <a class="page-arrow" href="board_list.php?page=<?= $new_page ?>&search=<?= urlencode($search) ?>">&lt;</a>
            <?php } ?>

            <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                <?php if ($page == $i) { ?>
                    <span class="current"><strong><?= $i ?></strong></span>
                <?php } else { ?>
                    <a class="page-num" href="board_list.php?page=<?= $i ?>&search=<?= urlencode($search) ?>"><?= $i ?></a>
                <?php } ?>
            <?php } ?>

            <?php if ($total_page >= 2 && $page != $total_page) {
                $new_page = $page + 1; ?>
                <a class="page-arrow" href="board_list.php?page=<?= $new_page ?>&search=<?= urlencode($search) ?>">&gt;</a>
            <?php } ?>
        </div>
    </div>
</section>

</main>

<footer>
<?php include "./footer.php"; ?>
</footer>

</body>
</html>
