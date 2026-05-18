<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KT&G 상상마당 | Program</title>
    <link rel="stylesheet" href="./sub01/style.css">
    <script src="./js/jquery-1.9.1.min.js"></script>

    <link rel="icon" type="image/png" href="./img/favicon.png">
    <?php $page_meta_title = 'KT&G 상상마당 | Program'; include './meta_sangsangmadang.php'; ?>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

</head>

<body id="top">
    <!-- HEADER -->
    <header class="header">
        <?php include "./header.php" ?>
    </header>

    <main>
        <!-- Program Title -->
        <div class="title">
            <h1>Program</h1>
            <p>앞으로 진행될 <span>전시 · 상영 · 워크숍</span> 안내</p>

        </div>

        <!-- Search filter -->
        <form action="javascript:void(0);" method="get">
            <fieldset class="search-filter">
                <legend class="screen-reader-only">공연 검색 필터</legend>
                <div class="filter-container">
                    <div class="filter-item">
                        <select name="event">
                            <option value="Performance">Performance</option>
                            <option value="Movie">Movie</option>
                            <option value="Exhibition">Exhibition</option>
                            <option value="Education">Education</option>
                        </select>
                    </div>

                    <div class="filter-item">
                        <input type="date" name="date" value="2025-01-02">
                    </div>
                    <div class="filter-item">
                        <select name="location">
                            <option value="Hongdae">Hongdae</option>
                            <option value="Nonsan">Nonsan</option>
                            <option value="Chuncheon">Chuncheon</option>
                            <option value="Daechi">Daechi</option>
                            <option value="Busan">Busan</option>
                        </select>
                    </div>
                </div>
            </fieldset>
        </form>
        <!-- Program -->
        <section class="program-list">
            <article class="program-group">
                <div class="date-side">
                    <h2>2026.01.02</h2>
                </div>
                <div class="content-side">
                    <a href="./sub_01_01.php" class="program-card">
                        <div class="card-info">
                            <h3>RP TOUR : 김수영 EP [Antiguo Trunk] 발매 기념 쇼케이스</h3>
                            <p>8:00 p.m.</p>
                            <p>KT&G 상상마당 홍대 라이브홀</p>
                            <span class="category">Performance</span>
                        </div>
                        <div class="card-poster">
                            <img src="./img/poster/concert01.jpg" alt="김수영 EP [Antiguo Trunk] 발매 기념 쇼케이스">
                        </div>
                    </a>
                    <a href="./sub_01_02.php" class="program-card">
                        <div class="card-info">
                            <h3>2025 오지은 연말 콘서트 &lt;겨울의 빛&gt;</h3>
                            <p>6:00 p.m.</p>
                            <p>KT&G 상상마당 홍대 라이브홀</p>
                            <span class="category">Performance</span>
                        </div>
                        <div class="card-poster">
                            <img src="./img/poster/concert02.jpg" alt="오지은 연말 콘서트">
                        </div>
                    </a>
                </div>
            </article>
            <article class="program-group">
                <div class="date-side">
                    <h2>2025.12.26</h2>
                </div>
                <div class="content-side">
                    <a href="javascript:void(0);" class="program-card">
                        <div class="card-info">
                            <h3>오이스터 연말 단독공연 : Into the Shell</h3>
                            <p>8:00 p.m.</p>
                            <p>KT&G 상상마당 홍대 라이브홀</p>
                            <span class="category">Performance</span>
                        </div>
                        <div class="card-poster">
                            <img src="./img/poster/concert03.png" alt="오이스터 연말 단독공연">
                        </div>
                    </a>
                </div>
            </article>
            <article class="program-group">
                <div class="date-side">
                    <h2>2025.12.25</h2>
                </div>
                <div class="content-side">
                    <a href="javascript:void(0);" class="program-card">
                        <div class="card-info">
                            <h3>2025 엔분의 일</h3>
                            <p>3:30 p.m.</p>
                            <p>KT&G 상상마당 홍대 라이브홀</p>
                            <span class="category">Performance</span>
                        </div>
                        <div class="card-poster">
                            <img src="./img/poster/concert04.png" alt="2025 엔분의 일">
                        </div>
                    </a>
                </div>
            </article>
            <article class="program-group">
                <div class="date-side">
                    <h2>2025.12.21</h2>
                </div>
                <div class="content-side">
                    <a href="javascript:void(0);" class="program-card">
                        <div class="card-info">
                            <h3>너트30 페스티벌-크라잉넛 어쿠스틱 단독콘서트</h3>
                            <p>6:00 p.m.</p>
                            <p>KT&G 상상마당 홍대 라이브홀</p>
                            <span class="category">Performance</span>
                        </div>
                        <div class="card-poster">
                            <img src="./img/poster/concert05.png" alt="너트30 페스티벌-크라잉넛">
                        </div>
                    </a>
                </div>
            </article>
            <article class="program-group">
                <div class="date-side">
                    <h2>2025.12.20</h2>
                </div>
                <div class="content-side">
                    <a href="javascript:void(0);" class="program-card">
                        <div class="card-info">
                            <h3>너트30 페스티벌-크라잉넛 어쿠스틱 단독콘서트</h3>
                            <p>6:00 p.m.</p>
                            <p>KT&G 상상마당 홍대 라이브홀</p>
                            <span class="category">Performance</span>
                        </div>
                        <div class="card-poster">
                            <img src="./img/poster/concert05.png" alt="너트30 페스티벌-크라잉넛">
                        </div>
                    </a>
                </div>
            </article>
            <article class="program-group">
                <div class="date-side">
                    <h2>2025.12.15</h2>
                </div>
                <div class="content-side">
                    <a href="javascript:void(0);" class="program-card">
                        <div class="card-info">
                            <h3>너트30 페스티벌-몽키갱워 | 레이지본 |극동아시아타이거즈<br>
                                Curated by 크라잉넛</h3>
                            <p>8:00 p.m.</p>
                            <p>KT&G 상상마당 홍대 라이브홀</p>
                            <span class="category">Performance</span>
                        </div>
                        <div class="card-poster">
                            <img src="./img/poster/concert06.png" alt="너트30 페스티벌">
                        </div>
                    </a>
                </div>
            </article>
            <article class="program-group">
                <div class="date-side">
                    <h2>2025.12.08</h2>
                </div>
                <div class="content-side">
                    <a href="javascript:void(0);" class="program-card">
                        <div class="card-info">
                            <h3>너트30 페스티벌 - 크라잉넛 with 10CM</h3>
                            <p>8:00 p.m.</p>
                            <p>KT&G 상상마당 홍대 라이브홀</p>
                            <span class="category">Performance</span>
                        </div>
                        <div class="card-poster">
                            <img src="./img/poster/poster02.png" alt="너트30 페스티벌">
                        </div>
                    </a>
                </div>
            </article>
            <article class="program-group">
                <div class="date-side">
                    <h2>2025.12.05</h2>
                </div>
                <div class="content-side">
                    <a href="javascript:void(0);" class="program-card">

                        <div class="card-info">
                            <h3>Brandy Senki ONE - MAN LIVE in KOREA</h3>
                            <p>8:00 p.m.</p>
                            <p>KT&G 상상마당 홍대 라이브홀</p>
                            <span class="category">Performance</span>
                        </div>
                        <div class="card-poster">
                            <img src="./img/poster/concert07.jpg" alt="Brandy Senki ONE">
                        </div>

                    </a>
                </div>
            </article>
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

    <!-- 스크립트 작성 -->
    <script src="./js/header.js"></script>
    <script src="./js/weather.js"></script>


</body>

</html>