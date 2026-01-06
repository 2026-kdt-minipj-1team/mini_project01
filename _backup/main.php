<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DevNest</title>

    <!-- -------------------- 공통 CSS (예: src/commons/기능이름.css) -------------------- -->
    <link rel="stylesheet" href="../../commons/global.css" />
    <link rel="stylesheet" href="../../commons/sidebar/sidebar.css" />
    <link rel="stylesheet" href="../../commons/topbar/topbar.css" />

    <!-- -------------------- 공통 JS (예: src/commons/common.js) -------------------- -->
    <script src="../../commons/기능이름.js" defer></script>

    <!-- -------------------- main 페이지 전용 js, CSS -------------------- -->
    <link rel="stylesheet" href="./main.css" /> <!-- main 페이지 전용 CSS -->
    <script src="./main.js" defer></script> <!-- main 페이지 전용 JS -->
</head>

<body>
    <div class="layout">
        <!-- ------------------------ 왼쪽 사이드바 ------------------------ -->
        <aside class="sidebar" aria-label="사이드 메뉴"> <!-- aside 시작 -->
            <h1 class="logo">
                <a href="../main/main.php">DevNest</a>
            </h1>

            <nav class="nav">
                <ul>
                    <li><a href="../main/main.php" aria-current="page">대시보드</a></li>
                    <li><a href="../planner/planner.html">일정관리</a></li>
                    <li><a href="../bookmark/bookmark.html">북마크</a></li>
                    <li><a href="../dailyquiz/dailyquiz.html">데일리 퀴즈</a></li>
                    <li><a href="../setting/setting.html">설정</a></li>
                </ul>
            </nav>

            <div class="sidebar-footer">
                <a href="../login/login.html">로그아웃</a>
            </div>
        </aside> <!-- aside 종료 -->

        <!-- ------------------------ 메인 콘텐츠 ------------------------ -->
        <main>
            <!-- 탑바 -->
            <header class="topbar"> <!-- header 시작 -->
                <form class="search" role="search">
                    <img class="search-icon" src="../../../public/images/iconSearch.png" alt="돋보기 아이콘"
                        aria-hidden="true">
                    <input id="search" type="search" placeholder="Search..." />
                </form>

                <div class="top-actions">
                    <a href="../setting/setting.html" aria-label="메세지">✉️</a>
                    <button type="button" aria-label="알림">🔔</button>
                    <a href="../setting/setting.html" aria-label="설정">⚙️</a>
                    <a href="../setting/setting.html" aria-label="프로필">👤</a>
                </div>
            </header> <!-- header 종료 -->
            <br>

            <!-- 대시보드 -->
            <div class="dashboard" role="main">
                <section class="row-top"> <!-- row-top section 시작 -->
                    <article class="card" id="welcome" aria-label="환영 카드"> <!-- 환영 카드 article 시작 -->
                        <div id="welcome-inner">
                            <div id="welcome-text">
                                <h1>Welcome back, Kim!</h1>
                                <p>오늘도 한 걸음씩 성장해요!!</p>
                                <div id="welcome-items">
                                    <div id="welcome-item">오늘 해야 하는 일정01 DB 에서 읽어와서 출력</div>
                                    <div id="welcome-item">오늘 해야 하는 일정02 DB 에서 읽어와서 출력</div>
                                </div>
                            </div>

                            <img id="welcome-img" src="../../../public/images/imgPenguin.png">
                        </div>
                    </article> <!-- 환영 카드 article 종료 -->
                    <article class="card" id="todo"> <!-- ToDo 카드 article 시작 -->
                        <h2>To-do list</h2>
                        <ul id="todo-list">
                            <li>
                                <label class="todo-item">
                                    <input type="checkbox" />
                                    <span>DB 속 일정에서 꺼내와서 동적 생성해야함.</span>
                                </label>
                            </li>
                            <li>
                                <label class="todo-item">
                                    <input type="checkbox" />
                                    <span>DB 속 일정에서 꺼내오기</span>
                                </label>
                            </li>
                            <li>
                                <label class="todo-item">
                                    <input type="checkbox" />
                                    <span>DB 속 일정에서 꺼내오기</span>
                                </label>
                            </li>
                            <button id="todo-add-btn" type="button">+ Add Task</button>
                        </ul>
                    </article> <!-- ToDo 카드 article 종료 -->
                </section> <!-- row-top section 종료 -->

                <section class="row-bottom"> <!-- row-bottom section 시작 -->
                    <article class="card" id="bookmark"> <!-- 북마크 카드 article 시작 -->
                        <h2>Bookmarks</h2>
                        <!-- 아이콘들 -->
                    </article> <!-- 북마크 카드 article 종료 -->
                    <article class="card" id="Quiz" aria-label="오늘의 문제"> <!-- 퀴즈 카드 article 시작 -->
                        <h2>Daily Quiz</h2>
                        <p id="Quiz-sub-title">오늘의 Daily Quiz 는??</p>
                        <div>
                            <p>[문제종류] 데이터 베이스에서 읽어와서 출력</p>
                            <p>문제에 대한 설명이 들어가는건데 이거도 DB에서 읽어와서 출력</p>
                            <button type="button">Solve Now</button>
                        </div>
                    </article> <!-- 퀴즈 카드 article 종료 -->
                    <article class="card" id="calendar"> <!-- 캘린더 카드 article 시작 -->
                        <h2>달력 및 일정관리</h2>
                        <!-- 캘린더 UI -->
                        <div id="calendar-card">
                            <form action = './calendarCard.php' method = post>
                                <span name="year">year</span>년 <span name="month">month</span>월
                                <input type="submit" value="<">
                                <input type="submit" value=">">
                            </form>
                            <?php
                                require_once 'calendarCard.php';
                                genCalendar();
                            ?>
                        </div>
                    </article> <!-- 캘린더 카드 article 종료 -->
                </section> <!-- row-bottom section 종료 -->
            </div>
        </main>
    </div>
</body>

</html>