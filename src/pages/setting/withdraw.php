<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>DevNest - 설정</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


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

<body class="setting-page">


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
                    <a href="../setting/setting.php" aria-label="메세지">✉️</a>
                    <a href="../setting/setting.php" aria-label="알림">🔔</button>
                        <a href="../setting/setting.php" aria-label="설정">⚙️</a>
                        <a href="../setting/setting.php" aria-label="프로필">👤</a>
                </div>
            </header> <!-- header 종료 -->
            <br>

            <link rel="stylesheet" href="./setting.css">
           
            </section>

        </main>

    </div>

</body>

</html>