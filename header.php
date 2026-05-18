<?php
if (session_status() == PHP_SESSION_NONE && !headers_sent()) {
    session_start();
}

echo '<script async src="https://www.googletagmanager.com/gtag/js?id=G-V54276FK9T"></script>';
echo '<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
  gtag("js", new Date());
  gtag("config", "G-V54276FK9T");
</script>';
?>

<?php
	 //로그인 여부 확인 (login.php에서 저장한 세션 변수명 기준)
	 $userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "";?>
        
<div id="headerWrap">
    <h1 class="header-left">
        <a href="./index.php" class="logo"><span class="blind">KT&G 상상마당</span>
        </a>
    </h1>
    <div class="header-util">
        <div class="api">
            <div class="api_wrap">
                <div class="date"></div>
                <div class="cicon"></div>
                <div class="ctemp"></div>
            </div>
        </div>

       
        <div class="m-menu-btn">
            <span></span><span></span><span></span>
        </div>
         <?php 
        if(!$userid) { ?>
        <a href="signIn_form.php" class="membership">Membership</a>
        <?php } else { ?>
        <div class="logout-wrap">
            <a href="logout.php" class="membership logout">Logout</a>
            <span class="bar">|</span>
            <a href="member_modify_form.php" class="membership">My Page</a>
        </div>
        <?php } ?>
    </div>
</div>

<!-- GNB -->
<nav class="gnb">
    <ul>
        <li>
            <a href="javascript:void(0);">SangsangMadang</a>
            <ul class="depth2">
                <li><a href="javascript:void(0);">홍대</a></li>
                <li><a href="javascript:void(0);">논산</a></li>
                <li><a href="javascript:void(0);">춘천</a></li>
                <li><a href="javascript:void(0);">대치</a></li>
                <li><a href="javascript:void(0);">부산</a></li>
            </ul>
        </li>
        <li>
            <a href="./sub_01.php">Program</a>
            <ul class="depth2">
                <li><a href="javascript:void(0);">공연</a></li>
                <li><a href="javascript:void(0);">영화</a></li>
                <li><a href="javascript:void(0);">전시</a></li>
                <li><a href="javascript:void(0);">교육</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);">Stay & Rental</a>
            <ul class="depth2">
                <li><a href="javascript:void(0);">대관안내</a></li>
                <li><a href="javascript:void(0);">춘천스테이</a></li>
                <li><a href="javascript:void(0);">부산스테이</a></li>
                <li><a href="javascript:void(0);">아트캠핑빌리지</a></li>
                <li><a href="javascript:void(0);">문화예술교육센터</a></li>
                <li><a href="javascript:void(0);">부산 플레잉룸</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);">F&B</a>
            <ul class="depth2">
                <li><a href="javascript:void(0);">댄싱 카페인</a></li>
                <li><a href="javascript:void(0);">세인트콕스</a></li>
            </ul>
        </li>
        <li><a href="javascript:void(0);">Design Shop</a></li>
        <li>
            <a href="board_list.php">News</a>
            <ul class="depth2">
                <li><a href="javascript:void(0);">공모/지원사업</a></li>
                <li><a href="javascript:void(0);">소식/이벤트</a></li>
                <li><a href="javascript:void(0);">웹진</a></li>
                <li><a href="board_list.php">공지사항</a></li>
                <li><a href="javascript:void(0);">문의처</a></li>
            </ul>
        </li>

    </ul>
    <form action="#" id="searchBox">
        <input type="search" name="searchBox">
        <button type="submit" class="search-btn"><span class="blind">검색</span></button>
    </form>

</nav>
