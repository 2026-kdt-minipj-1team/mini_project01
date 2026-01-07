
<?php
$dbconn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($dbconn, 'devnest');

// 북마크 추가 처리
if (isset($_POST['site'])) {
    $site = trim($_POST['site']);
    $sitename = trim($_POST['sitename']);
    $images = $_FILES['image'];

        $dir = '../../../public/images/';
        $file_name = basename($_FILES['image']['name']);
        $imagepath = $dir . $file_name;

            $query = "INSERT INTO bookmark (sitename, site, image_path) VALUES ('$sitename', '$site', '$imagepath')";
            $result = mysqli_query($dbconn, $query);

            // 이미지 업로드
            move_uploaded_file($_FILES['image']['tmp_name'], $imagepath);
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
<?php include "../dailyquiz/dailyQuestion.php" ?>
<?php include "../dailyquiz/useranswer.php" ?>
<?php
require_once __DIR__ . "/../planner/calendarCard.php";
$y = (int) date("Y");
$m = (int) date("n");
?>
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
    <link rel="stylesheet" href="../planner/planner.css" />
    <script src="./main.js" defer></script> <!-- main 페이지 전용 JS -->
    <script>
        function show() {
            document.getElementById("input").style.display = "block";
        }
    </script>
    <style>

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

        .bookmark-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
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
 
                        <div class="bookmark-container">
                    <?php
                    // DB에서 모든 북마크 출력
                    while ($row = mysqli_fetch_assoc($end)) {
                        echo "<div class='bookmark-item'>";
                        echo "<a href='{$row['site']}' target='_blank'>";
                        echo "<img src='{$row['image_path']}' alt='대표 이미지'>{$row['sitename']}</a>";
                        echo "</div>";
                    }
                    ?>
                </div>
                
                        <!-- 아이콘들 -->
                    </article> <!-- 북마크 카드 article 종료 -->
                    <article class="card" id="Quiz" aria-label="오늘의 문제"> <!-- 퀴즈 카드 article 시작 -->
                        <h2>Daily Quiz</h2>
                        <p id="Quiz-sub-title">오늘의 Daily Quiz 는??</p>
                        <div>
                            <p style="color:DodgerBlue;>">[문제종류] <strong> <?= $feorbe ?> </strong> </p>
                            <!-- questions 테이블  question_number, questions_type 출력-->
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
                    <article class="card" id="calendar"> <!-- 캘린더 카드 article  시작 -->
                        <div class="card-head">
                            <h2>달력 및 일정관리</h2>
                        </div>

                        <div class="mini-cal-wrap">
                            <?php //genCalendar($y, $m, 'mini'); ?>
                        </div>
                    </article> <!-- 캘린더 카드 article 종료 -->
                </section> <!-- row-bottom section 종료 -->
            </div>
        </main>
    </div>
</body>

</html>