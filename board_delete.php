<?php
include "./define.php";

$userid = isset($_SESSION["userid"]) ? trim($_SESSION["userid"]) : "";

// 추후 로그인/권한 기능이 추가되면 이 조건만 공통 권한 로직으로 교체하면 됩니다.
if ($userid !== "admin") {
    echo "
    <script>
        alert('관리자만 삭제할 수 있습니다.');
        history.back();
    </script>
    ";
    exit;
}

$num = isset($_POST["num"]) ? (int)$_POST["num"] : 0;
$page = isset($_POST["page"]) ? (int)$_POST["page"] : 1;

if ($num <= 0) {
    echo "<script>alert('잘못된 접근입니다.'); location.href='./board_list.php';</script>";
    exit;
}

$sql = "SELECT file_copied FROM board WHERE num = $num";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "<script>alert('존재하지 않는 게시글입니다.'); location.href='./board_list.php?page=$page';</script>";
    exit;
}

$file_copied = isset($row["file_copied"]) ? trim($row["file_copied"]) : "";

if ($file_copied !== "") {
    $file_list = array_map("trim", explode(",", $file_copied));

    foreach ($file_list as $copied_name) {
        if ($copied_name === "") {
            continue;
        }

        $file_path = "./data/" . $copied_name;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }
}

$delete_sql = "DELETE FROM board WHERE num = $num";
mysqli_query($conn, $delete_sql);

echo "
<script>
    alert('글이 삭제되었습니다.');
    location.href = './board_list.php?page=$page';
</script>
";
?>
