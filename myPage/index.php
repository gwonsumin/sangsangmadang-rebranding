<?php include "./define.php"; ?>
<?php include "./board_branch_options.php"; ?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>KT&G 상상마당</title>
  <link rel="stylesheet" href="./css/style.css" />

  <script src="./js/jquery-1.9.1.min.js"></script>
  <script src="./js/jquery.easing.1.3.min.js"></script>

  <!-- 스와이퍼  -->
  <script src="./js/swiper.min.js"></script>
  <link rel="stylesheet" href="./css/swiper.min.css">



  <link rel="icon" type="image/png" href="./img/favicon.png">
  <meta name="description" content="KT&G 상상마당">
  <meta name="keywords" content="KT&G 상상마당,KT&G,상상마당">
  <meta name="author" content="권수민">
  <meta name="generator" content="vsCode">
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>

<?php include "./analytics.php"; ?>
</head>

<body id="top">
    <!-- HEADER -->
    <header class="header">
        <?php include "./header.php" ?>
    </header>


  <main>
    <!-- HERO -->
    <section class="hero swiper">
      <ul class="hero-wrapper swiper-wrapper">
        <li class="hero-slide slide1 swiper-slide">
          <div class="hero-text">
            <span class="tag1">FREE</span>
            <h2>KT&G <strong>상상마당</strong></h2>
            <p>
              <span class="tag2">OPENING TIME</span> <br>
              Everyday <br>
              11:00 - 21:00 <br>
              <span class="tag3">서울 마포구 어울마당로 65상상마당빌딩</span>
            </p>
          </div>
        </li>

        <li class="hero-slide slide2 swiper-slide">
          <div class="hero-text">
            <span class="tag1">FREE</span>
            <h2>KT&G <strong>상상마당</strong></h2>
            <p>
              <span class="tag2">OPENING TIME</span> <br>
              Monday to Friday 10:00 - 18:00<br>
              Saturday and Sunday 10:00 - 21:00<br>
              <span class="tag3">충남 논산시 상월면 한천길 15-20</span>
            </p>
          </div>
        </li>

        <li class="hero-slide slide3 swiper-slide">
          <div class="hero-text">
            <span class="tag1">FREE</span>
            <h2>KT&G <strong>상상마당</strong></h2>
            <p>
              <span class="tag2">OPENING TIME</span> <br>
              Monday CLOSED<br>
              Tusday to Sunday 11:00 - 19:00<br>
              <span class="tag3">강원 춘천시 스포츠타운길399번길 25 어린이회관</span>
            </p>
          </div>
        </li>
      </ul>
      <!-- 화살표, 버튼 -->
      <div class="swiper-pagination swiper-pagination-white"></div>
      <div class="swiper-button-next swiper-button-white"></div>
      <div class="swiper-button-prev swiper-button-white"></div>
    </section>
    <!-- BRAND STATEMENT -->
    <section class="statement">
      <h2 class="statement-text">
        “예술, 일상, 그리고 청년의 <strong>상상</strong>이 만나는 곳.”</h2>
    </section>
    <!-- NOW ON -->
    <section class="now-on">
      <div class="now-on-header">
        <h2>NOW ON</h2>
        <div class="slider-control">
          <button class="btn-prev">
            <img src="./img/icon/previous.png" width="25" height="25" alt="previous">
          </button>
          <button class="btn-next">
            <img src="./img/icon/arrow.png" width="25" height="25" alt="next">
          </button>
        </div>
      </div>
      <!-- CARD LIST -->
      <ul class="card-list ">
        <li class="nowon-item">
          <figure class="poster">
            <a href="./sub_01_03.php"><img src="./img/poster/poster01.jpg" alt="poster01"></a>
          </figure>

          <div class="info">
            <span class="now-category">EXHIBITION</span>
            <h3 class="title">원정상 개인전<br>&lt;지층의 기억&gt;</h3>
            <p class="desc">
              지질학적 시간의 두께와 돌에 퇴적된<br>존재의
              흔적을 사진으로 드러내며 인간과 자연의
              시간을 마주하게 하는 원정상의 개인전
            </p>
            <div class="meta">
              <span class="place">아트갤러리 1</span>
              <span class="meta-date">Until 10 Dec 2025</span>
            </div>
          </div>
        </li>
        <li class="nowon-item">
          <figure class="poster">
            <a href="./sub_01_04.php"><img src="./img/poster/poster02.png" alt="poster02"></a>
          </figure>

          <div class="info">
            <span class="now-category">CONCERT</span>
            <h3 class="title">너트30 페스티벌 - 크라잉넛 with 10CM</h3>
            <p class="desc">크라잉넛 30주년 기념 너트30<br>페스티벌!</p>
            <div class="meta">
              <span class="place">라이브홀</span>
              <span class="meta-date">08 Dec 2025</span>
            </div>
          </div>
        </li>
        <li class="nowon-item">
          <figure class="poster">
            <a href="javascript:void(0);"><img src="./img/poster/poster03.jpg" alt="poster03"></a>
          </figure>

          <div class="info">
            <span class="now-category">EXHIBITION</span>
            <h3 class="title">복(福)이 깃든 물건들<br>Find your fortune</h3>
            <p class="desc">
              새롭게 시작할 새해를 위해,<br>오이뮤에서 제안하는
              복이 깃든<br>물건들을 만나보세요.<br>
              곁에 두고 복된 하루하루가 쌓이기를 바랍니다.
            </p>
            <div class="meta">
              <span class="place">상상마당 디자인스퀘어 1F</span>
              <span class="meta-date">Until 21 Dec 2025</span>
            </div>
          </div>
        </li>
        <li class="nowon-item">
          <figure class="poster">
            <a href="javascript:void(0);"><img src="./img/poster/poster04.png" alt="poster04"></a>
          </figure>

          <div class="info">
            <span class="now-category">CONCERT</span>
            <h3 class="title">2025 원더웍스</h3>
            <p class="desc">
              &lt;Wonder Weeks&gt;는 <br>'영아 시기에 급격한
              성장을 하는<br>성장 급등기'
            </p>
            <div class="meta">
              <span class="place">KT&G 상상마당 부산 라이브홀</span>
              <span class="meta-date">Until 12 Dec 2025</span>
            </div>
          </div>
        </li>
        <li class="nowon-item">
          <figure class="poster">
            <a href="javascript:void(0);"><img src="./img/poster/poster05.jpg" alt="청년 예술가 3인전"></a>
          </figure>

          <div class="info">
            <span class="now-category">EXHIBITION</span>
            <h3 class="title">청년 예술가 3인전<br>
              &lt;땅에 머무르는 법&gt;</h3>
            <p class="desc">
              땅에 머무르는 법을 주제로<br>회화, 설치, 영상 등
              다양한 매체를 통해 공간, 시간, 관계에 대한
              예술가들의 해석
            </p>
            <div class="meta">
              <span class="place">갤러리 4F</span>
              <span class="meta-date">Until 21 Dec 2025</span>
            </div>
          </div>
        </li>
        <li class="nowon-item">
          <figure class="poster">
            <a href="javascript:void(0);"><img src="./img/poster/poster06.jpg" alt="김종훈 개인전"></a>
          </figure>

          <div class="info">
            <span class="now-category">EXHIBITION</span>
            <h3 class="title">김종훈 개인전<br>
              &lt;흔적의 무게가 감정이 되다&gt;</h3>
            <p class="desc">
              궁극적으로 인간의 감정과 기술적 논리의<br>
              공존을 탐구하는 작가의 도전적인 여정
            </p>
            <div class="meta">
              <span class="place">아트 갤러리 2</span>
              <span class="meta-date">Until 14 Dec 2025</span>
            </div>
          </div>
        </li>
        <li class="nowon-item">
          <figure class="poster">
            <a href="javascript:void(0);"><img src="./img/poster/poster07.png" alt="고홍기 개인전"></a>
          </figure>

          <div class="info">
            <span class="now-category">EXHIBITION</span>
            <h3 class="title">김종훈 개인전<br>
              &lt;생각에 빠지는 순간&gt;</h3>
            <p class="desc">
              금속의 유동성과 굳음의 과정을 통해<br>사유가
              형상으로 머무르는 자리를<br>구축해온 고홍기의 첫 개인전
            </p>
            <div class="meta">
              <span class="place">아트 갤러리 2</span>
              <span class="meta-date">Until 29 Dec 2025</span>
            </div>
          </div>
        </li>
        <li class="nowon-item">
          <figure class="poster">
            <a href="javascript:void(0);"><img src="./img/poster/poster08.png" alt="고고학 연말 콘서트"></a>
          </figure>

          <div class="info">
            <span class="now-category">CONCERT</span>
            <h3 class="title">고고학 연말 콘서트<br>
              &lt;ISSUE NO.05 - Echoes of 2025&gt;-부산</h3>
            <p class="desc">
              본 공연은 KT&G 상상마당 부산과<br>고고학이
              함께 만들어가는 공동기획<br>프로그램 &lt;상상파트너즈&gt;입니다.
            </p>
            <div class="meta">
              <span class="place">KT&G 상상마당 부산 3F 라이브홀</span>
              <span class="meta-date">06 Dec 2025</span>
            </div>
          </div>
        </li>
      </ul>
    </section>
    <!-- PROGRAM CATEGORY -->
    <section class="category">
      <div class="category-left">
        <h2>Program<br>Category</h2>
        <a href="./sub_01.php">View the schedule</a>
      </div>

      <ul class="category-list">
        <li><a href="javascript:void(0);">Exhibition</a></li>
        <li><a href="javascript:void(0);">Performance</a></li>
        <li><a href="javascript:void(0);">Class</a></li>
        <li><a href="javascript:void(0);"> Design Square</a></li>
      </ul>
    </section>
    <!-- SPACE -->
    <section class="space">
      <div class="space-left">
        <h2>Space</h2>
        <a href="javascript:void(0);">View the location</a>
      </div>

      <div class="space-slider">
        <ul class="space-slide-list">
          <li class="space-slide visual_0 active">
            <a href="javascript:void(0);">
              <img src="./img/space/hongdae.png" alt="hongdae">
              <div class="space-info">
                <h3>Hongdae</h3>
                <span>홍대</span>
                <p>젊음의 메카! 홍대 앞에 2007년 9월 개관한 KT&G상상마당 홍대는 지하 4층 지상 7층 규모의<br>
                  대한민국 대표 복합문화예술공간입니다.</p>
              </div>
            </a>
          </li>
          <li class="space-slide visual_1">
            <a href="javascript:void(0);">
              <img src="./img/space/nonsan.png" alt="nonsan">
              <div class="space-info">
                <h3>Nonsan</h3>
                <span>논산</span>
                <p>KT&G상상마당 논산은 지역사회의 문화적 인프라를 확충하기 위해 설립됐습니다.</p>
              </div>
            </a>
          </li>
          <li class="space-slide visual_2">
            <a href="javascript:void(0);">
              <img src="./img/space/chuncheon.jpg.png" alt="chuncheon">
              <div class="space-info">
                <h3>Chuncheon</h3>
                <span>춘천</span>
                <p>KT&G상상마당 춘천은 의암호 수변에 위치하여 아름다운 경관을 가지고 있습니다.</p>
              </div>
            </a>
          </li>
          <li class="space-slide visual_3">
            <a href="javascript:void(0);">
              <img src="./img/space/daechi.jpg.png" alt="daechi">
              <div class="space-info">
                <h3>Daechi</h3>
                <span>대치</span>
                <p>2006년 422석 규모의 전문 공연장으로 개관했던 KT&G상상아트홀이 2017년 KT&G 상상마당의<br>
                  일원으로 통합되어 '대치아트홀'이 되었습니다.</p>
              </div>
            </a>
          </li>
          <li class="space-slide visual_4">
            <a href="javascript:void(0);">
              <img src="./img/space/busan.png" alt="busan">
              <div class="space-info">
                <h3>Busan</h3>
                <span>부산</span>
                <p>부산의 중심 서면에 개관한 KT&G 상상마당 부산은 지상 13층, 지하 5층에 연면적 약 20,000㎡로,<br>
                  현재 운영 중인 상상마당 중 최대규모입니다.</p>
              </div>
            </a>
          </li>
        </ul>

        <!-- DOT -->
        <div class="space-dots"></div>
      </div>
    </section>
    <!-- ARCHIVE -->
    <section class="archive">
      <h2>Archive</h2>

      <ul class="archive-list">
        <li class="archive-item">
          <a href="javascript:void(0);">
            <img src="./img/archive/arc01.png" alt="arc01">

            <div class="archive-info">
              <h3>Daechi Artist Fellowship</h3>
              <span class="sub">전시지원사업</span>
              <p>‘KT&G DAF’는 현대미술의 다양한 장르와 형식을 적극적으로 수용하고,<br>
                전시 문화 활성화에 기여하기 위해 2022년부터 시작된 전시 지원 사업입니다.</p>
            </div>
          </a>
        </li>
        <li class="archive-item">
          <a href="javascript:void(0);">
            <img src="./img/archive/arc02.png" alt="arc02">

            <div class="archive-info">
              <h3>KT&G SKOPF</h3>
              <span class="sub">사진창작지원</span>
              <p>KT&G 상상마당은 한국의 사진가를 발굴하고 후원하기 위한 상상마당<br>
                한국 사진가 지원 프로그램, 'SKOPF'를 기획하였습니다.</p>
            </div>
          </a>
        </li>
        <li class="archive-item">
          <a href="javascript:void(0);">
            <img src="./img/archive/arc03.png" alt="arc03">

            <div class="archive-info">
              <h3>Band Discovery</h3>
              <span class="sub">음악창작지원</span>
              <p>다양한 문화를 이끌어나가는 KT&G 상상마당과 함께할<br>루키 뮤지션을 찾습니다!
                KT&G 상상마당이 기획한 공연지원 프로그램<br>'밴드 디스커버리'는 활동 기반이
                확립되지 않아 상대적으로 공연 기회가<br>적은 루키 뮤지션들을
                위해 만들어졌습니다.</p>
            </div>
          </a>
        </li>
        <li class="archive-item">
          <a href="javascript:void(0);">
            <img src="./img/archive/arc04.png" alt="arc04">

            <div class="archive-info">
              <h3>Great Short Film Festival</h3>
              <span class="sub">영화창작지원</span>
              <p>2007년 9월 7일 1회를 시작으로 단편영화의 과거와 현재, 미래를 담으며<br>
                영화 생태계의 다양성을 지켜온 대단한 단편영화제는<br>
                KT&G의 대표 영화창작 지원프로그램입니다. </p>
            </div>
          </a>
        </li>
      </ul>
    </section>
<!-- NOTICE -->
<section class="notice">
  <div class="notice-left">
    <h2>Notice</h2>
    <a href="./board_list.php">See More</a>
  </div>

  <ul>
    <?php
      $sql = "SELECT * FROM board ORDER BY num DESC LIMIT 4";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_array($result)) {
        $num = $row["num"];
        $subject = $row["subject"];
        $name = $row["name"];
        $category = isset($row["category"]) ? trim($row["category"]) : "";
        $branch_badge = get_board_branch_badge_label($category);
        $regist_day = date("Y.m.d", strtotime($row["regist_day"]));
    ?>
      <li class="notice-info">
        <a href="./board_view.php?num=<?= $num ?>">
          <span class="notice-branch-badge"><?= htmlspecialchars($branch_badge !== "" ? $branch_badge : $name) ?></span>
          <p class="info-title"><?= htmlspecialchars($subject) ?></p>
          <p class="info-date"><?= $regist_day ?></p>
        </a>
      </li>
    <?php } ?>
  </ul>
</section>  
</main>

  <!-- 페이지 위로 가는 버튼 -->
  <a href="#top" class="btn-top">
    <img src="./img/icon/arrow-up.png" alt="위로 가기">
  </a>


    <!-- FOTTER -->
    <footer>
        <?php include "./footer.php" ?>
    </footer>

  <!-- POPUP -->
  <div id="modal-layer" class="modal-overlay">
    <div class="modal-content">
      <div class="modal-body">
        <a href="./sub_popup.php"><img src="./img/popup/popupIMG.png" alt="신제품 기획전 [캐릭터 파크]"></a>
      </div>

      <div class="modal-footer">
        <label>
          <input type="checkbox" id="chk_today">오늘 하루 보지 않기
        </label>
        <button onclick="closeModal()" class="close-btn">닫기</button>
      </div>
    </div>
  </div>

  <!-- 스크립트 작성 -->
  <script src="./js/header.js"></script>
  <script src="./js/weather.js"></script>
  <script src="./js/hero_banner.js"></script>

  <script src="./js/nowon_slide.js"></script>
  <script src="./js/space_slide.js"></script>

  <script src="./js/popup.js"></script>


</body>

</html>
