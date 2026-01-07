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
        <?php include __DIR__ . "/../../commons/sidebar/sidebar.php"; ?>

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
                    <a href="" aria-label="메세지">✉️</a>
                    <button type="button" aria-label="알림">🔔</button>
                    <a href="" aria-label="설정">⚙️</a>
                    <a href="" aria-label="프로필">👤</a>
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
                                <p>오늘도 한 걸음씩 성장해요!!</p> <br><br>
                                <div>
                                    <?php
                                    $dbcon = mysqli_connect('localhost', 'root', '', 'devnest');

                                    $query = "
                                                SELECT 
                                                    q.question_number,
                                                    q.question_type,
                                                    q.question,
                                                    q.official_answer,
                                                    ua.user_answer
                                                FROM questions q
                                                LEFT JOIN user_answers ua
                                                    ON q.question_number = ua.question_number
                                                ";

                                    $result = mysqli_query($dbcon, $query);

                                    while ($row = mysqli_fetch_assoc($result)) {

                                        echo "<span style='color:DodgerBlue;'> <strong> 문제번호:  " . $row['question_number'] . "</strong></span> <br>";

                                        if ((int) $row['question_type'] === 1) {
                                            echo "<span style='color:MediumSeaGreen'>백엔드</span> <br>";
                                        } else {
                                            echo "<span style='color:DarkOrange'>프론트엔드</span> <br>";
                                        }

                                        echo "<strong>" . $row['question'] . "</strong><br>";

                                        if ($row['official_answer'] !== null) {
                                            echo "<span style='color:#6A89EC;'>  공식 답변: <strong> " . $row['official_answer'] . "</strong> </span> <br>";
                                        } else {
                                            echo "<span style='color:#666666'>공식 답변 없음 </span> <br>";
                                        }

                                        if ($row['user_answer'] !== null) {
                                            echo "<span style='color:RoyalBlue;'>  내 답변: <strong> " . $row['user_answer'] . "</strong> </span> <br>";
                                        } else {
                                            echo "<span style='color:#666666'>아직 답변 없음 </span> <br>";
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