<!-- db에서 질문 받아옴 -->
<?php
    $dbcon = mysqli_connect('localhost', 'root', '');

    mysqli_select_db($dbcon, 'devnest');

    $query = "select * from questions order by rand() limit 1";

    $result = mysqli_query($dbcon, $query);

    $qna = mysqli_fetch_assoc($result);

    //question_type이 1이면 백엔드 문제,  0이면 프론트엔드 문제
    if ($qna['question_type'] == '1') {
        $feorbe = "백엔드";
    } else {
        $feorbe = "프론트엔드";
    }

    
    mysqli_close($dbcon);  
?>