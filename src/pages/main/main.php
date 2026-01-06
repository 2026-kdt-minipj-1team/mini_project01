<?php include "../dailyquiz/dailyQuestion.php" ?>
<?php include "../dailyquiz/useranswer.php" ?>

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
    <script>
        function show() {
            document.getElementById("input").style.display = "block";
        }
    </script>
</head>

<body>
    <div class="layout">
        <!-- ------------------------ 왼쪽 사이드바 ------------------------ -->
        <aside class="sidebar" aria-label="사이드 메뉴"> <!-- aside 시작 -->
            <h1 class="logo">
                <a href="../main/main.html">DevNest</a>
            </h1>

            <nav class="nav">
                <ul>
                    <li><a href="../main/main.html" aria-current="page">대시보드</a></li>
                    <li><a href="../planner/planner.html">일정관리</a></li>
                    <li><a href="../bookmark/bookmark.html">북마크</a></li>
                    <li><a href="../dailyquiz/dailyquiz.php">데일리 퀴즈</a></li>
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
                            <p style="color:DodgerBlue;>">[문제종류] <strong> <?= $feorbe ?> </strong> </p> <!-- questions 테이블  question_number, questions_type 출력-->
                            <p> <strong> <?= $qna['question'] ?> <strong> </p> <!-- questions 테이블 question 출력 -->
                            <form action="../dailyquiz/answer_process.php" method="post">

                                <input type="hidden" name="question_number" value="<?= $qna['question_number'] ?>">
                                <!-- 처음에는 숨겨진 입력창 -->
                                <div id="input" style="display:none;">
                                    <input type="text" name="answer" placeholder="답을 입력하세요">
                                    <button type="submit">제출하기</button>
                                </div>

                                <!-- Solve Now 버튼 -->
                                <button type="button" onclick="show()">답변하기</button>
                            </form>



                        </div>
                    </article> <!-- 퀴즈 카드 article 종료 -->
                    <article class="card" id="calendar"> <!-- 캘린더 카드 article 시작 -->
                        <h2>달력 및 일정관리</h2>
                        <!-- 캘린더 UI -->
                    </article> <!-- 캘린더 카드 article 종료 -->
                </section> <!-- row-bottom section 종료 -->
            </div>
        </main>
    </div>
</body>

</html>