<?php
include "./define.php";
include "./board_branch_options.php";

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

$num = isset($_GET["num"]) ? (int)$_GET["num"] : 0;
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

if ($num <= 0) {
    echo "
    <script>
        alert('잘못된 접근입니다.');
        location.href = './board_list.php';
    </script>
    ";
    exit;
}

$sql = "SELECT * FROM board WHERE num = $num";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "
    <script>
        alert('존재하지 않는 게시글입니다.');
        location.href = './board_list.php?page=$page';
    </script>
    ";
    exit;
}

$fixed_id = "admin";
$branch_options = get_board_branch_options();
$subject = isset($row["subject"]) ? $row["subject"] : "";
$category = isset($row["category"]) ? trim($row["category"]) : "";
$content = isset($row["content"]) ? $row["content"] : "";
$file_name = isset($row["file_name"]) ? trim($row["file_name"]) : "";
$file_copied = isset($row["file_copied"]) ? trim($row["file_copied"]) : "";

$is_image_file = false;
if ($file_name !== "" && $file_copied !== "") {
    $image_extensions = ["jpg", "jpeg", "png", "gif", "webp", "bmp"];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $is_image_file = in_array($file_extension, $image_extensions, true);
}
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상상마당 | Notice Update</title>

    <script src="./js/jquery-1.9.1.min.js"></script>

    <link rel="icon" type="image/png" href="./img/favicon.png">
    <meta name="description" content="KT&G 상상마당">
    <meta name="keywords" content="KT&G 상상마당,KT&G,상상마당">
    <meta name="author" content="권수미">
    <meta name="generator" content="vsCode">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/board-new.css">

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
<?php include "./analytics.php"; ?>
</head>

<body>
    <?php include "./header.php"; ?>

    <main class="board-write-page">
        <div class="board-write-inner">
            <div class="board-write-title">
                <h2>Notice Update</h2>
            </div>

            <form name="board_modify_form" method="post" action="./board_modify.php" enctype="multipart/form-data" class="board-write-form" onsubmit="return check_modify_input();">
                <input type="hidden" name="num" value="<?= $num ?>">
                <input type="hidden" name="page" value="<?= $page ?>">
                <input type="hidden" name="id" value="<?= htmlspecialchars($fixed_id) ?>">
                <input type="hidden" name="name" value="admin">
                <input type="hidden" name="old_file_name" value="<?= htmlspecialchars($file_name) ?>">
                <input type="hidden" name="old_file_copied" value="<?= htmlspecialchars($file_copied) ?>">

                <div class="write-row">
                    <label>ID</label>
                    <div class="fixed-id-box"><?= htmlspecialchars($fixed_id) ?></div>
                </div>

                <div class="write-row">
                    <label for="subject">Title</label>
                    <input type="text" id="subject" name="subject" class="write-input" maxlength="200" value="<?= htmlspecialchars($subject) ?>">
                </div>

                <div class="write-row">
                    <fieldset class="branch-fieldset">
                        <legend>Branch</legend>
                        <select id="category" name="category" class="branch-select">
                            <option value="">Select a branch</option>
                            <?php foreach ($branch_options as $branch_key => $branch_info) { ?>
                                <option value="<?= htmlspecialchars($branch_key) ?>" <?= $category === $branch_key ? "selected" : "" ?>>
                                    <?= htmlspecialchars($branch_info["select_label"]) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </fieldset>
                </div>

                <div class="write-row">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" class="write-textarea"><?= htmlspecialchars($content) ?></textarea>

                    <div class="image-preview-wrap" id="imagePreviewWrap" style="<?= $is_image_file ? "display:block;" : "display:none;" ?>">
                        <p class="image-preview-title">본문 표시 미리보기</p>
                        <img id="imagePreview" src="<?= $is_image_file ? "./data/" . htmlspecialchars($file_copied) : "" ?>" alt="<?= $is_image_file ? htmlspecialchars($file_name) : "이미지 미리보기" ?>">
                    </div>
                </div>

                <div class="write-row">
                    <label for="upfile">File</label>
                    <div class="file-wrap">
                        <input type="file" id="upfile" name="upfile" accept=".jpg,.jpeg,.png,.gif,.webp,.pdf,.hwp,.hwpx,.doc,.docx,.xls,.xlsx,.zip">
                        <p class="file-name" id="fileNameText"><?= $file_name !== "" ? htmlspecialchars($file_name) : "선택된 파일 없음" ?></p>

                        <?php if ($file_name !== "") { ?>
                            <p class="current-file-text">현재 파일 : <span><?= htmlspecialchars($file_name) ?></span></p>
                        <?php } else { ?>
                            <p class="current-file-empty">현재 첨부파일이 없습니다.</p>
                        <?php } ?>

                        <p class="write-guide">새 파일을 선택하지 않으면 기존 첨부파일이 그대로 유지됩니다.</p>
                    </div>
                </div>

                <div class="write-btns">
                    <button type="submit" class="btn-delete" formaction="./board_delete.php" formmethod="post" formnovalidate onclick="return confirm_delete();">삭제하기</button>
                    <button type="submit" class="btn-submit">수정완료</button>
                    <a href="./board_view.php?num=<?= $num ?>&page=<?= $page ?>" class="btn-list">취소</a>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <?php include "./footer.php"; ?>
    </footer>

    <script>
        let isDeleteMode = false;

        function check_modify_input() {
            if (isDeleteMode) {
                return true;
            }

            const subject = document.getElementById("subject");
            const category = document.getElementById("category");
            const content = document.getElementById("content");
            const fileInput = document.getElementById("upfile");
            const oldFileName = document.querySelector('input[name="old_file_name"]').value;

            if (!subject.value.trim()) {
                alert("제목을 입력하세요.");
                subject.focus();
                return false;
            }

            if (!category.value) {
                alert("지점을 선택하세요.");
                category.focus();
                return false;
            }

            const hasContent = content.value.trim() !== "";
            const hasNewFile = fileInput.files.length > 0;
            const hasOldFile = oldFileName.trim() !== "";

            if (!hasContent && !hasNewFile && !hasOldFile) {
                alert("내용을 입력하거나 첨부파일을 유지 또는 등록해주세요.");
                content.focus();
                return false;
            }

            return true;
        }

        function confirm_delete() {
            const isConfirmed = confirm("정말 삭제하시겠습니까?");
            isDeleteMode = isConfirmed;
            return isConfirmed;
        }

        const fileInput = document.getElementById("upfile");
        const fileNameText = document.getElementById("fileNameText");
        const previewWrap = document.getElementById("imagePreviewWrap");
        const previewImg = document.getElementById("imagePreview");
        const initialFileName = <?= json_encode($file_name !== "" ? $file_name : "선택된 파일 없음", JSON_UNESCAPED_UNICODE) ?>;
        const initialPreviewSrc = <?= json_encode($is_image_file ? "./data/" . $file_copied : "", JSON_UNESCAPED_UNICODE) ?>;
        const initialPreviewAlt = <?= json_encode($file_name !== "" ? $file_name : "이미지 미리보기", JSON_UNESCAPED_UNICODE) ?>;
        const hasInitialPreview = <?= $is_image_file ? "true" : "false" ?>;

        fileInput.addEventListener("change", function () {
            const file = this.files[0];

            if (!file) {
                fileNameText.textContent = initialFileName;
                previewImg.src = initialPreviewSrc;
                previewImg.alt = initialPreviewAlt;
                previewWrap.style.display = hasInitialPreview ? "block" : "none";
                return;
            }

            fileNameText.textContent = file.name;

            if (file.type.startsWith("image/")) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    previewImg.alt = file.name;
                    previewWrap.style.display = "block";
                };

                reader.readAsDataURL(file);
            } else {
                previewImg.src = "";
                previewImg.alt = "이미지 미리보기";
                previewWrap.style.display = "none";
            }
        });
    </script>
</body>

</html>
