<?php
require_once "./define.php";
require_once "./board_branch_options.php";

$subject = isset($_POST["subject"]) ? trim($_POST["subject"]) : "";
$category = isset($_POST["category"]) ? trim($_POST["category"]) : "";
$content = isset($_POST["content"]) ? trim($_POST["content"]) : "";
$name = "관리자";
$id = "admin";
$regist_day = date("Y-m-d H:i:s");
$hit = 0;

$file_name = "";
$file_copied = "";

if ($subject === "") {
    echo "<script>alert('제목을 입력하세요.'); history.back();</script>";
    exit;
}

if (!db_connected()) {
    echo "<script>alert('DB 연결이 원활하지 않습니다. 잠시 후 다시 시도해주세요.'); history.back();</script>";
    exit;
}

$branch_options = get_board_branch_options();
if ($category === "" || !isset($branch_options[$category])) {
    echo "<script>alert('지점을 선택하세요.'); history.back();</script>";
    exit;
}

if (isset($_FILES["upfile"]) && $_FILES["upfile"]["name"] != "") {
    $upload_dir = "./data/";

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $upfile_name = $_FILES["upfile"]["name"];
    $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
    $upfile_error = $_FILES["upfile"]["error"];

    if ($upfile_error === 0) {
        $file_ext = strtolower(pathinfo($upfile_name, PATHINFO_EXTENSION));
        $new_file_name = date("YmdHis") . "_" . uniqid() . ($file_ext !== "" ? "." . $file_ext : "");
        $dest_path = $upload_dir . $new_file_name;

        if (move_uploaded_file($upfile_tmp_name, $dest_path)) {
            $file_name = $upfile_name;
            $file_copied = $new_file_name;
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
$safe_name = db_escape($name);
$safe_id = db_escape($id);
$safe_file_name = db_escape($file_name);
$safe_file_copied = db_escape($file_copied);

$sql = "INSERT INTO board (id, name, category, subject, content, regist_day, hit, file_name, file_copied)
        VALUES ('$safe_id', '$safe_name', '$safe_category', '$safe_subject', '$safe_content', '$regist_day', $hit, '$safe_file_name', '$safe_file_copied')";

if (!mysqli_query($conn, $sql)) {
    echo "<script>alert('글 등록에 실패했습니다. DB 테이블/컬럼을 확인해주세요.'); history.back();</script>";
    exit;
}

echo "<script>
    alert('글이 등록되었습니다.');
    location.href='./board_list.php';
</script>";
?>
