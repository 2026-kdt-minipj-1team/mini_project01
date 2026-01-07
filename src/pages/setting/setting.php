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

    <!-- -------------------- setting 페이지 전용 js, CSS -------------------- -->
    <link rel="stylesheet" href="./setting.css" /> <!-- main 페이지 전용 CSS -->
    <script>
        function show() {
            document.getElementById("input").style.display = "block";
        }
    </script>
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
                    <a href="l" aria-label="설정">⚙️</a>
                    <a href="" aria-label="프로필">👤</a>
                </div>
            </header> <!-- header 종료 -->
            <br>

            <!-- 대시보드 -->
            <div class="dashboard" id="dashboard-setting" role="main">

            </div>
        </main>
    </div>
</body>

</html>