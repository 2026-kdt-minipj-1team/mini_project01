<!-- 유저 답변을 db에서 불러옴 -->
<?php


    $dbcon = mysqli_connect('localhost', 'root', '');

    mysqli_select_db($dbcon, 'devnest');

    $query = "select * from user_answers";

    $result = mysqli_query($dbcon, $query);

    $row = mysqli_fetch_array($result);


    mysqli_close($dbcon);
    
?>