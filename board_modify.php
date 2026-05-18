<?php
require_once "./define.php";
require_once "./board_branch_options.php";

$userid = isset($_SESSION["userid"]) ? trim($_SESSION["userid"]) : "";

// 추후 로그인/권한 기능이 추가되면 이 조건만 공통 권한 로직으로 교체하면 됩니다.
if ($userid !== "admin") {
    echo "
    <script>
        alert('관리자만 수정할 수 있습니다.');
        history.back();
    </script>
    ";
    exit;
}

if (!db_connected()) {
    echo "<script>alert('DB 연결이 원활하지 않습니다. 잠시 후 다시 시도해주세요.'); history.back();</script>";
    exit;
}

$num = isset($_POST["num"]) ? (int)$_POST["num"] : 0;
$page = isset($_POST["page"]) ? (int)$_POST["page"] : 1;
$subject = isset($_POST["subject"]) ? trim($_POST["subject"]) : "";
$category = isset($_POST["category"]) ? trim($_POST["category"]) : "";
$content = isset($_POST["content"]) ? trim($_POST["content"]) : "";
$old_file_name = isset($_POST["old_file_name"]) ? trim($_POST["old_file_name"]) : "";
$old_file_copied = isset($_POST["old_file_copied"]) ? trim($_POST["old_file_copied"]) : "";

if ($num <= 0) {
    echo "<script>alert('잘못된 접근입니다.'); location.href='./board_list.php';</script>";
    exit;
}

if ($subject === "") {
    echo "<script>alert('제목을 입력하세요.'); history.back();</script>";
    exit;
}

$branch_options = get_board_branch_options();
if ($category === "" || !isset($branch_options[$category])) {
    echo "<script>alert('지점을 선택하세요.'); history.back();</script>";
    exit;
}

$check_sql = "SELECT num FROM board WHERE num = $num";
$check_result = mysqli_query($conn, $check_sql);
$board_row = $check_result ? mysqli_fetch_assoc($check_result) : null;

if (!$board_row) {
    echo "<script>alert('존재하지 않는 게시글입니다.'); location.href='./board_list.php?page=$page';</script>";
    exit;
}

$file_name = $old_file_name;
$file_copied = $old_file_copied;

if (!isset($_FILES["upfile"]) || $_FILES["upfile"]["error"] === UPLOAD_ERR_NO_FILE) {
    if ($content === "" && $file_name === "") {
        echo "<script>alert('내용을 입력하거나 첨부파일을 등록해주세요.'); history.back();</script>";
        exit;
    }
} else {
    $upload_dir = "./data/";

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $upfile_name = $_FILES["upfile"]["name"];
    $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
    $upfile_error = $_FILES["upfile"]["error"];

    if ($upfile_error === UPLOAD_ERR_OK) {
        $file_ext = strtolower(pathinfo($upfile_name, PATHINFO_EXTENSION));
        $new_file_name = date("YmdHis") . "_" . uniqid() . ($file_ext !== "" ? "." . $file_ext : "");
        $dest_path = $upload_dir . $new_file_name;

        if (move_uploaded_file($upfile_tmp_name, $dest_path)) {
            $file_name = $upfile_name;
            $file_copied = $new_file_name;

            if ($old_file_copied !== "") {
                $old_path = $upload_dir . $old_file_copied;
                if (file_exists($old_path)) {
                    unlink($old_path);
                }
            }
        } else {
            echo "<script>alert('파일 업로드에 실패했습니다.'); history.back();</script>";
            exit;
        }
    } else {
        echo "<script>alert('파일 업로드 중 오류가 발생했습니다.'); history.back();</script>";
        exit;
    }
}

$safe_subject = db_escape($subject);
$safe_category = db_escape($category);
$safe_content = db_escape($content);
$safe_file_name = db_escape($file_name);
$safe_file_copied = db_escape($file_copied);

$sql = "UPDATE board SET ";
$sql .= "category = '$safe_category', ";
$sql .= "subject = '$safe_subject', ";
$sql .= "content = '$safe_content', ";
$sql .= "file_name = '$safe_file_name', ";
$sql .= "file_copied = '$safe_file_copied' ";
$sql .= "WHERE num = $num";

if (!mysqli_query($conn, $sql)) {
    echo "<script>alert('글 수정에 실패했습니다. DB 테이블/컬럼을 확인해주세요.'); history.back();</script>";
    exit;
}

echo "
<script>
    alert('글이 수정되었습니다.');
    location.href = './board_view.php?num=$num&page=$page';
</script>
";
?>
