<!-- 유저 답변을 db에 저장 -->
<?php
    $dbcon = mysqli_connect('localhost', 'root', '');

    mysqli_select_db($dbcon, 'devnest');

    $query = ($dbcon, "저장하는 명령어");

    $result = my_sqli_query($dbcon, $query);

    $row = mysqli_fetch_array($result);


    mysqli_close($dbcon);
    
?>