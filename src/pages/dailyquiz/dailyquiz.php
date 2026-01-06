<?php include "../dailyquiz/dailyQuestion.php" ?>

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
    <style>
        #green {
            color: green;
        }
    </style>
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
                    <li><a href="../main/main.php">대시보드</a></li>
                    <li><a href="../planner/planner.html">일정관리</a></li>
                    <li><a href="../bookmark/bookmark.html">북마크</a></li>
                    <li><a href="../dailyquiz/dailyquiz.html" aria-current="page">데일리 퀴즈</a></li>
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
                                <h1>데일리 퀴즈 모음</h1>
                                <p>오늘도 한 걸음씩 성장해요!!</p>
                                <div>
                                    <?php
                                    $dbcon = mysqli_connect('localhost', 'root', '', 'devnest');

                                    $query = "
                                                SELECT 
                                                    q.question_number,
                                                    q.question_type,
                                                    q.question,
                                                    ua.user_answer
                                                FROM questions q
                                                LEFT JOIN user_answers ua
                                                    ON q.question_number = ua.question_number
                                                ";

                                    $result = mysqli_query($dbcon, $query);

                                    while ($row = mysqli_fetch_assoc($result)) {

                                        echo "문제번호: " . $row['question_number'] . "<br>";

                                        if ((int) $row['question_type'] === 1) {
                                            echo "백엔드<br>";
                                        } else {
                                            echo "프론트엔드<br>";
                                        }

                                        echo "<strong>" . $row['question'] . "</strong><br>";

                                        if ($row['user_answer'] !== null) {
                                            echo "내 답변: " . $row['user_answer'] . "<br>";
                                        } else {
                                            echo "아직 답변 없음<br>";
                                        }

                                        echo "<hr>";
                                    }

                                    mysqli_close($dbcon);
                                    ?>

                                </div>
                            </div>
                        </div>
                    </article>
                </section>
            </div>
        </main>
    </div>
</body>

</html>