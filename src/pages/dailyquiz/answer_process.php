<!-- 답변 db로 전달 -->
<?php
    $qNum = $_POST['question_number'];
    $uAnswer = $_POST['answer'];

    $dbcon = mysqli_connect('localhost', 'root', '');

    mysqli_select_db($dbcon, 'devnest');

    $query = "insert into user_answers values(null,'$qNum', '$uAnswer', null, null)";

    $result = mysqli_query($dbcon, $query);

    if ($result) {
        echo "답변이 제출되었습니다";
    } else {
        echo "답변 제출 실패";
    }
    

    
    mysqli_close($dbcon);  
?>