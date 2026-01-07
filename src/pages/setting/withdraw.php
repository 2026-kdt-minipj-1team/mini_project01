<?php
session_start();

// 로그인 안 했으면 로그인 페이지로
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
                <img class="search-icon" src="../../../public/images/iconSearch.png" alt="돋보기 아이콘" aria-hidden="true">
                <input id="search" type="search" placeholder="Search..." />
            </form>

            <div class="top-actions">
                <a href="../setting/setting.php" aria-label="메세지">✉️</a>
                <a href="../setting/setting.php" aria-label="알림">🔔</a>
                <a href="../setting/setting.php" aria-label="설정">⚙️</a>
                <a href="../setting/setting.php" aria-label="프로필">👤</a>
            </div>
        </header>

        <!-- 콘텐츠 -->
        <section class="page">
            <h1 class="page-title">설정</h1>

            <div class="card withdraw-card">
                <h2>회원 탈퇴</h2>

                <div class="warning">
                    ⚠ 회원 탈퇴 시 모든 정보가 삭제되며 복구할 수 없습니다.
                </div>

                <form method="post" action="withdraw_process.php" class="withdraw-form">
                    <div class="row">
                        <label for="pw">비밀번호 확인</label>
                        <input id="pw" type="password" name="pw" placeholder="비밀번호 입력" required>
                    </div>

                    <div class="actions">
                        <button type="button" class="btn-cancel" onclick="history.back()">취소</button>
                        <button type="submit" class="btn-danger">회원 탈퇴</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</div>
</body>
</html>
