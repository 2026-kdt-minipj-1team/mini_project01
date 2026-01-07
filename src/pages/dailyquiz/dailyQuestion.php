<!-- db에서 질문 받아옴 -->
<?php
    $dbcon = mysqli_connect('localhost', 'root', '');

    mysqli_select_db($dbcon, 'devnest');

    $query = "select * from questions order by rand() limit 1";

    $result = mysqli_query($dbcon, $query);

    $qna = mysqli_fetch_assoc($result);

    if (!$qna) {
        // 오늘의 문제 없음(테이블 비었거나 조건 불일치)
        $qna = null;
        $feorbe = null;
        return; // 또는 그냥 아래 코드 실행 안 하게 처리
    }

    //question_type이 1이면 백엔드 문제,  0이면 프론트엔드 문제
    if ($qna['question_type'] == '1') {
        $feorbe = "<span style='color:MediumSeaGreen'> 백엔드 </span>";
    } else {
        $feorbe = "<span style='color:DarkOrange'> 프론트엔드 </span>";
    }

    
    mysqli_close($dbcon);  
?>