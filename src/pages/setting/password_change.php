<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login/login.html");
    exit;
}
?>

<!DOCTYPE html>
    <html lang="ko">

    <head>
        <meta charset="UTF-8" />
        <title>DevNest - 회원 탈퇴</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- 공통 -->
        <link rel="stylesheet" href="../../commons/global.css" />
        <link rel="stylesheet" href="../../commons/sidebar/sidebar.css" />
        <link rel="stylesheet" href="../../commons/topbar/topbar.css" />

        <!-- 설정 공통(있으면 유지) -->
        <link rel="stylesheet" href="./setting.css" />

        <!-- 이 페이지 전용 -->
        <link rel="stylesheet" href="./withdraw.css" />
    </head>

    <body class="setting-page">
        <div class="layout">
            <!-- 왼쪽 사이드바 -->
            <?php include __DIR__ . "/../../commons/sidebar/sidebar.php"; ?>

            <!-- 메인 -->
            <main>
                <!-- 탑바 -->
                <header class="topbar">
                    <form class="search" role="search">
                        <img class="search-icon" src="../../../public/images/iconSearch.png" alt="돋보기 아이콘"
                            aria-hidden="true">
                        <input id="search" type="search" placeholder="Search..." />
                    </form>

                    <div class="top-actions">
                        <a href="../setting/setting.php" aria-label="메세지">✉️</a>
                        <a href="../setting/setting.php" aria-label="알림">🔔</a>
                        <a href="../setting/setting.php" aria-label="설정">⚙️</a>
                        <a href="../setting/setting.php" aria-label="프로필">👤</a>
                    </div>
                </header>

                <div class="content">
                    <div class="card">
                        <h2>비밀번호 변경</h2>

                        <form action="password_change_process.php" method="post">
                            <div class="row">
                                <label>현재 비밀번호</label>
                                <input type="password" name="current_pw" required>
                            </div>

                            <div class="row">
                                <label>새 비밀번호</label>
                                <input type="password" name="new_pw" required>
                            </div>

                            <div class="row">
                                <label>새 비밀번호 확인</label>
                                <input type="password" name="new_pw_confirm" required>
                            </div>

                            <div class="actions">
                                <button type="button" class="btn-cancel"
                                    onclick="location.href='setting.php'">취소</button>
                                <button type="submit">변경하기</button>
                            </div>
                        </form>
                    </div>
                </div>

    </body>

    </html>