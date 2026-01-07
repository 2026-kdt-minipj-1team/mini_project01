<?php
    function genCalendar(int $y, int $m, string $mode = 'large'): void {

    // 월 이동용 계산(이전/다음)
    $prevY = $y; $prevM = $m - 1;
    $nextY = $y; $nextM = $m + 1;
    if ($prevM < 1) { $prevM = 12; $prevY--; }
    if ($nextM > 12) { $nextM = 1;  $nextY++; }

    $todayY = (int)date("Y");
    $todayM = (int)date("n");
    $todayD = (int)date("j");

    $firstTs = mktime(0, 0, 0, $m, 1, $y);
    $daysInMonth = (int)date("t", $firstTs);
    $firstDow = (int)date("w", $firstTs);

    // 메인(미니)에서 버튼 누르면 planner로 이동하도록 링크 분기
    $base = ($mode === 'mini') ? '../planner/planner.php' : '';

    echo '<section class="cal cal-'.$mode.'">';

    echo '<div class="cal-head">';
    echo '  <div class="cal-head-left">';
    echo '    <h3 class="cal-title">'.$m.'월 '.$y.'</h3>';
    echo '    <a class="cal-chip" href="'.$base.'?y='.$todayY.'&m='.$todayM.'">이번달</a>';
    echo '  </div>';

    echo '  <div class="cal-nav">';
    echo '    <a class="cal-btn" href="'.$base.'?y='.$prevY.'&m='.$prevM.'" aria-label="이전 달">‹</a>';
    echo '    <a class="cal-btn" href="'.$base.'?y='.$nextY.'&m='.$nextM.'" aria-label="다음 달">›</a>';
    echo '  </div>';
    echo '</div>';

    $week = ["일","월","화","수","목","금","토"];
    echo '<div class="cal-week">';
    foreach ($week as $i => $w) {
        $cls = ($i === 0) ? "sun" : (($i === 6) ? "sat" : "");
        echo '<div class="cal-weekday '.$cls.'">'.$w.'</div>';
    }
    echo '</div>';

    echo '<div class="cal-grid">';
    for ($i=0; $i<$firstDow; $i++) echo '<div class="cal-cell muted"></div>';

    for ($d=1; $d<=$daysInMonth; $d++) {
        $isToday = ($y === $todayY && $m === $todayM && $d === $todayD);
        $cls = "cal-cell" . ($isToday ? " today" : "");

        echo '<div class="'.$cls.'">';
        echo '  <div class="cal-daynum">'.$d.'</div>';

        // mini에서는 칩(일정) 안 보여주고, large에서만 보여주기 (메인이 깔끔해짐)
        if ($mode !== 'mini') {
            if ($d % 9 === 0)  echo '<div class="chip chip-blue">팀 회의</div>';
            if ($d % 13 === 0) echo '<div class="chip chip-green">업무 등록</div>';
            if ($d % 17 === 0) echo '<div class="chip chip-red">마감</div>';
        }

        echo '</div>';
    }

    $totalCells = $firstDow + $daysInMonth;
    $tail = (7 - ($totalCells % 7)) % 7;
    for ($i=0; $i<$tail; $i++) echo '<div class="cal-cell muted"></div>';

    echo '</div>';
    echo '</section>';
    }
?>
