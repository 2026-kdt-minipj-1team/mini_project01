<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// 현재 uri에 특정 경로/파일이 포함되면 aria-current="page" 반환
function aria_current($needles, $uri) {
  foreach ((array)$needles as $n) {
    if (strpos($uri, $n) !== false) return 'aria-current="page"';
  }
  return '';
}
?>

<aside class="sidebar" aria-label="사이드 메뉴">
  <h1 class="logo">
    <a href="../main/main.php">DevNest</a>
  </h1>

  <nav class="nav">
    <ul>
      <li>
        <a href="../main/main.php"
           <?= aria_current(['/pages/main/', '/pages/dashboard/','/main/main.php'], $uri) ?>>
          대시보드
        </a>
      </li>

      <li>
        <a href="../planner/planner.php"
           <?= aria_current(['/pages/planner/','/planner/planner.php'], $uri) ?>>
          일정관리
        </a>
      </li>

      <li>
        <a href="../bookmark/bookmark.php"
           <?= aria_current(['/pages/bookmark/','/bookmark/bookmark.php'], $uri) ?>>
          북마크
        </a>
      </li>

      <li>
        <a href="../dailyquiz/dailyquiz.php"
           <?= aria_current(['/pages/dailyquiz/','/dailyquiz/dailyquiz.php'], $uri) ?>>
          데일리 퀴즈
        </a>
      </li>

      <li>
        <a href="../setting/setting.php"
           <?= aria_current(['/pages/setting/','/setting/setting.php'], $uri) ?>>
          설정
        </a>
      </li>
    </ul>
  </nav>

  <div class="sidebar-footer">
    <a href="../login/login.html">로그아웃</a>
  </div>
</aside>
