<!DOCTYPE html>
<html lang="ko">

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
    <style>
        body {
            background: #f4f7fb;
            font-family: "Noto Sans KR", sans-serif;
        }

        .page-wrap {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .password-card {
            width: 100%;
            max-width: 640px;
            background: #eaf4ff;
            border-radius: 28px;
            padding: 48px 56px;
            box-shadow: 0 20px 40px rgba(30, 60, 120, 0.15);
        }

        .password-card h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 14px;
            border: 1px solid #cfd9e6;
            font-size: 15px;
        }

        .btn-area {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 32px;
        }

        .btn-cancel {
            padding: 12px 26px;
            border-radius: 999px;
            background: #f1f1f1;
            border: none;
            cursor: pointer;
        }

        .btn-submit {
            padding: 12px 28px;
            border-radius: 999px;
            background: #5b7cff;
            color: #fff;
            border: none;
            font-weight: 600;
            cursor: pointer;
        }
    </style>


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

            <!-- 비밀번호 변경 모달 -->
             
            <div class="modal-overlay" id="passwordModal">
                <div class="modal">
                    <h3>비밀번호 변경</h3>

                    <div class="modal-row">
                        <label>현재 비밀번호</label>
                        <input type="password" placeholder="현재 비밀번호 입력">
                    </div>

                    <div class="modal-row">
                        <label>새 비밀번호</label>
                        <input type="password" placeholder="새 비밀번호 입력">
                    </div>

                    <div class="modal-row">
                        <label>새 비밀번호 확인</label>
                        <input type="password" placeholder="한 번 더 입력">
                    </div>

                    <div class="modal-actions">
                        <button class="btn-secondary" onclick="closePasswordModal()">취소</button>
                        <button class="btn-primary">변경하기</button>
                    </div>
                </div>
            </div>


            </section>

        </main>

    </div>

</body>

</html>