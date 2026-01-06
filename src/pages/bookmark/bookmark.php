<?php
header("Location: bookmark.php");
exit;?>
<!DOCTYPE html>
<html>
<head>
    <title>북마크</title>
    <meta charset = 'utf8'>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <!-- -------------------- 공통 CSS (예: src/commons/기능이름.css) -------------------- -->
    <link rel="stylesheet" href="../../commons/global.css" />
    <link rel="stylesheet" href="../../commons/sidebar/sidebar.css" />
    <link rel="stylesheet" href="../../commons/topbar/topbar.css" />

     <link rel="stylesheet" href="./dashboard-bookmark.css" /> <!-- main 페이지 전용 CSS -->
   
 <style>
.bookmark-container {
    display: flex;       
    flex-wrap: wrap;     
    gap: 20px;          
    align-items: center; 
}

.bookmark-item {
    display: flex;
    flex-direction: column; /* 이미지 위, 텍스트 아래 */
    align-items: center;    /* 가운데 정렬 */
}
</style>
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
    padding: 15px 500px;
    border-radius: 15px;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
  }

.bookmark-main {
    display: inline-block;
    background-color: #e0f0ff;
    padding: 20px 20px;
    border-radius: 15px;
    width: 1000px;   /* 박스 가로 길이 */
    height: 450px;
    margin-bottom: 20px;
  }
  

  /* 링크 컨테이너 */
  .bookmark-links {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  /* 각 링크 */
  .bookmark-link {
    display: block;
    background-color: #ffffff;
    padding: 12px 20px;
    border-radius: 12px;
    text-decoration: none;
    color: #0073e6;
    border: 1px solid #cce0ff;
    transition: background-color 0.2s, transform 0.2s;
  }

  .bookmark-link:hover {
    background-color: #d0e7ff;
    transform: translateY(-2px);
  }
</style>
<style>
    a {text-decoration: none;}
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
                    <li><a href="../main/main.html" >대시보드</a></li>
                    <li><a href="../planner/planner.html">일정관리</a></li>
                    <li><a href="../bookmark/bookmark.php" aria-current="page">북마크</a></li>
                    <li><a href="../dailyquiz/dailyquiz.html">데일리 퀴즈</a></li>
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

            <div class="bookmark-title">북마크</div>

            <!-- 대시보드 -->
   <div class="dashboard" id="dashboard-bookmark" role="main">
   <!-- 확인을 누르면 데베에 ㅈ저장 후에 사이트에 내용보이게 하기 -->
    
   <form action="./book.html" enctype = multipart/form-data method = 'post'>
    <input type = 'submit' name = 'plus' value = '+'> &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
   </form>

   <from>
      <input type = 'submit' name = '삭제' value = '-'> <br> <br> <br>
      </form>


   <div class="bookmark-main">
    <div class="bookmark-container">
<?php
   $dbconn = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($dbconn, 'book');

if(isset($_POST['site'])){

    $site = trim($_POST['site']);       // 앞뒤 공백 제거
    $sitename = trim($_POST['sitename']);
    $images = $_FILES['image'];

    // 공백일 경우 처리
    if($site == '' || $sitename == ''){
        echo "<p style='color:red;'>사이트 주소와 이름을 입력해주세요.</p>";
    } else {
        $dir = '../../../public/images/';
        $file_name = basename($_FILES['image']['name']);
        $imagepath = $dir.$file_name;

        // 중복 체크
        $check_query = "SELECT * FROM bookmark WHERE site='$site'";
        $check_result = mysqli_query($dbconn, $check_query);

        if(mysqli_num_rows($check_result) > 0){
            echo "<p style='color:red;'>이미 등록된 사이트입니다.</p>";
        } else {
            // DB 삽입
            $query = "INSERT INTO bookmark VALUES ('$sitename', '$site', '$imagepath')";
            $result = mysqli_query($dbconn, $query);

            // 이미지 업로드
            move_uploaded_file($_FILES['image']['tmp_name'], $imagepath);
        }
    }

   $delete_query = "DELETE FROM bookmark"; 

    // DB에서 모든 북마크 출력
    $end = mysqli_query($dbconn, "SELECT * FROM bookmark");
    while ($row = mysqli_fetch_assoc($end)) {
        echo "<div class='bookmark-links'>";
        echo "<div class='bookmark-item'>";

        echo "<a href='{$row['site']}' target='_blank'>
        <img src='{$row['image_path']}' width='80'>{$row['sitename']} </a>";
        echo "</div>";
        echo "</div>";
    }
}
?>
   </div>
   </div>
   </div>
    </div>
    </main>
    </div>
    </body>
    
    </html>