<?php
$dbconn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($dbconn, 'book');

// 북마크 추가 처리
if (isset($_POST['site'])) {
    $site = trim($_POST['site']);
    $sitename = trim($_POST['sitename']);
    $images = $_FILES['image'];

    if ($site == '' || $sitename == '') {
        echo "<p style='color:red;'>사이트 주소와 이름을 입력해주세요.</p>";
    } else {
        $dir = '../../../public/images/';
        $file_name = basename($_FILES['image']['name']);
        $imagepath = $dir . $file_name;

        // 중복 체크
        $check_query = "SELECT * FROM bookmark WHERE site='$site'";
        $check_result = mysqli_query($dbconn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            echo "<p style='color:red;'>이미 등록된 사이트입니다.</p>";
        } else {
            // DB 삽입
            $query = "INSERT INTO bookmark (sitename, site, image_path) VALUES ('$sitename', '$site', '$imagepath')";
            $result = mysqli_query($dbconn, $query);

            // 이미지 업로드
            move_uploaded_file($_FILES['image']['tmp_name'], $imagepath);
        }
    }
}

// 북마크 삭제 처리
if (isset($_POST['delete_site'])) {
    $delete_site = $_POST['delete_site'];

    // DB에서 해당 사이트 삭제
    $delete_query = "DELETE FROM bookmark WHERE site = '$delete_site'";
    mysqli_query($dbconn, $delete_query);
}

// DB에서 모든 북마크 출력
$end = mysqli_query($dbconn, "SELECT * FROM bookmark");
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>북마크 관리</title>

    <link rel="stylesheet" href="../../commons/global.css" />
    <link rel="stylesheet" href="../../commons/sidebar/sidebar.css" />
    <link rel="stylesheet" href="../../commons/topbar/topbar.css" />
    <link rel="stylesheet" href="./dashboard-bookmark.css" />

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
            padding: 20px;
        }

        /* 북마크 제목 */
        .bookmark-title {
            display: inline-block;
            background-color: #e0f0ff;
            padding: 15px;
            border-radius: 15px;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .bookmark-main {
            background-color: #e0f0ff;
            padding: 20px;
            border-radius: 15px;
            max-width: 1200px;
            margin: 0 auto;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .bookmark-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-bottom: 20px;
        }

        .bookmark-actions button {
            padding: 10px 15px;
            border: none;
            background-color: #4a90e2;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .bookmark-actions button:hover {
            background-color: #357ac8;
        }

        .bookmark-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .bookmark-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 250px;
            padding: 15px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .bookmark-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .bookmark-item a {
            text-decoration: none;
            color: #0073e6;
            font-weight: bold;
        }

        .bookmark-item a:hover {
            text-decoration: underline;
        }

        .delete-button {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #ff4d4d;
        }
    </style>
</head>
<body>
    <div class="layout">
        <!-- ------------------------ 왼쪽 사이드바 ------------------------ -->
        <aside class="sidebar" aria-label="사이드 메뉴">
            <h1 class="logo">
                <a href="../main/main.html">DevNest</a>
            </h1>

            <nav class="nav">
                <ul>
                    <li><a href="../main/main.html">대시보드</a></li>
                    <li><a href="../planner/planner.html">일정관리</a></li>
                    <li><a href="../bookmark/bookmark.php" aria-current="page">북마크</a></li>
                    <li><a href="../dailyquiz/dailyquiz.html">데일리 퀴즈</a></li>
                    <li><a href="../setting/setting.html">설정</a></li>
                </ul>
            </nav>

            <div class="sidebar-footer">
                <a href="../login/login.html">로그아웃</a>
            </div>
        </aside>

        <!-- ------------------------ 메인 콘텐츠 ------------------------ -->
        <main>
            <header class="topbar">
                <form class="search" role="search">
                    <img class="search-icon" src="../../../public/images/iconSearch.png" alt="돋보기 아이콘" aria-hidden="true">
                    <input id="search" type="search" placeholder="Search..." />
                </form>
                <div class="top-actions">
                    <a href="../setting/setting.html" aria-label="메세지">✉️</a>
                    <button type="button" aria-label="알림">🔔</button>
                    <a href="../setting/setting.html" aria-label="설정">⚙️</a>
                    <a href="../setting/setting.html" aria-label="프로필">👤</a>
                </div>
            </header>

            <div class="bookmark-title">🔖 북마크</div>

            <div class="bookmark-main">
                <div class="bookmark-actions">
                    <form action="./book.html" enctype="multipart/form-data" method="post">
                        <button type="submit" name="plus">+ 북마크 추가</button>
                    </form>
                </div>

                <div class="bookmark-container">
                    <?php
                    // DB에서 모든 북마크 출력
                    while ($row = mysqli_fetch_assoc($end)) {
                        echo "<div class='bookmark-item'>";
                        echo "<a href='{$row['site']}' target='_blank'>";
                        echo "<img src='{$row['image_path']}' alt='대표 이미지'>{$row['sitename']}</a>";
                        // 삭제 버튼 추가
                        echo "<form action='./bookmark.php' method='post'>";
                        echo "<input type='hidden' name='delete_site' value='{$row['site']}'>";
                        echo "<button type='submit' class='delete-button'>삭제</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </main>
    </div>
</body>
</html>