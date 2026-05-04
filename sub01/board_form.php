<?php
include "./define.php";
include "./board_branch_options.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$userid = isset($_SESSION["userid"]) ? $_SESSION["userid"] : "";

if ($userid !== "admin") {
    echo "
    <script>
        alert('관리자만 공지사항을 작성할 수 있습니다.');
        location.href='./board_list.php';
    </script>
    ";
    exit;
}

$fixed_id = "admin";
$branch_options = get_board_branch_options();
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상상마당 | New Notice</title>

    <script src="../js/jquery-1.9.1.min.js"></script>

    <link rel="icon" type="image/png" href="../img/favicon.png">
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
                <h2>New Notice</h2>
            </div>

            <form name="board_form" method="post" action="./board_insert.php" enctype="multipart/form-data" class="board-write-form" onsubmit="return check_input();">
                <input type="hidden" name="id" value="<?= htmlspecialchars($fixed_id) ?>">
                <input type="hidden" name="name" value="admin">

                <div class="write-row">
                    <label>ID</label>
                    <div class="fixed-id-box"><?= htmlspecialchars($fixed_id) ?></div>
                </div>

                <div class="write-row">
                    <label for="subject">Title</label>
                    <input type="text" id="subject" name="subject" class="write-input" maxlength="200">
                </div>

                <div class="write-row">
                    <fieldset class="branch-fieldset">
                        <legend>Branch</legend>
                        <select id="category" name="category" class="branch-select">
                            <option value="">Select a branch</option>
                            <?php foreach ($branch_options as $branch_key => $branch_info) { ?>
                                <option value="<?= htmlspecialchars($branch_key) ?>"><?= htmlspecialchars($branch_info["select_label"]) ?></option>
                            <?php } ?>
                        </select>
                    </fieldset>
                </div>

                <div class="write-row">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" class="write-textarea" placeholder="내용을 입력하세요."></textarea>

                    <div class="image-preview-wrap" id="imagePreviewWrap">
                        <p class="image-preview-title">본문 표시 미리보기</p>
                        <img id="imagePreview" src="" alt="이미지 미리보기">
                    </div>
                </div>

                <div class="write-row">
                    <label for="upfile">File</label>
                    <div class="file-wrap">
                        <input type="file" id="upfile" name="upfile" accept=".jpg,.jpeg,.png,.gif,.webp,.pdf,.hwp,.hwpx,.doc,.docx,.xls,.xlsx,.zip">
                        <p class="file-name" id="fileNameText">선택된 파일 없음</p>
                    </div>
                </div>

                <div class="write-btns">
                    <button type="submit" class="btn-submit">완료</button>
                    <a href="./board_list.php" class="btn-list">목록</a>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <?php include "./footer.php"; ?>
    </footer>

    <script>
        function check_input() {
            const subject = document.getElementById("subject");
            const category = document.getElementById("category");
            const content = document.getElementById("content");
            const fileInput = document.getElementById("upfile");

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
            const hasFile = fileInput.files.length > 0;

            if (!hasContent && !hasFile) {
                alert("내용을 입력하거나 첨부파일을 등록하세요.");
                content.focus();
                return false;
            }

            return true;
        }

        const fileInput = document.getElementById("upfile");
        const fileNameText = document.getElementById("fileNameText");
        const previewWrap = document.getElementById("imagePreviewWrap");
        const previewImg = document.getElementById("imagePreview");

        fileInput.addEventListener("change", function () {
            const file = this.files[0];

            if (!file) {
                fileNameText.textContent = "선택된 파일 없음";
                previewWrap.style.display = "none";
                previewImg.src = "";
                return;
            }

            fileNameText.textContent = file.name;

            if (file.type.startsWith("image/")) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    previewWrap.style.display = "block";
                };

                reader.readAsDataURL(file);
            } else {
                previewWrap.style.display = "none";
                previewImg.src = "";
            }
        });
    </script>

</body>

</html>
