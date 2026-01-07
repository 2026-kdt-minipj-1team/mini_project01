<?php
require_once __DIR__ . "/calendarCard.php";

/** GET으로 year/month 받기 (없으면 오늘) */
$y = isset($_GET['y']) ? (int)$_GET['y'] : (int)date("Y");
$m = isset($_GET['m']) ? (int)$_GET['m'] : (int)date("n"); // 1~12

/** 범위 보정 */
if ($m < 1) { $m = 12; $y--; }
if ($m > 12) { $m = 1;  $y++; }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>

    <!-- -------------------- 공통 CSS (예: src/commons/기능이름.css) -------------------- -->
    <link rel="stylesheet" href="../../commons/global.css" />
    <link rel="stylesheet" href="../../commons/sidebar/sidebar.css" />
    <link rel="stylesheet" href="../../commons/topbar/topbar.css" />

    <!-- -------------------- 달력 페이지 전용 CSS -------------------- -->
    <link rel="stylesheet" href="./planner.css" /> <!-- 달력 페이지 전용 CSS -->
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
            <div class="dashboard" id="dashboard-cal" role="main">
                <div class="calendar-card">
                    <?php
                        genCalendar($y, $m);
                    ?>
                </div>
            </div>
        </main>
    </div>
</body>
</html>