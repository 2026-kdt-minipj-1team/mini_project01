<?php
session_start(); 
?>

<!DOCTYPE html>
<html>

<head>
    <title>미니프로젝트(26.01.05 ~ 26.01.07)</title>
    <meta charset="utf-8">
    
</head>

<body>
    <?php
        $email = $_POST['email'];
        $pw =  $_POST['pw'];

        //db연결
        $abcon = mysqli_connect('localhost' , 'root' , '');

       //db 선택 수정
       mysqli_select_db($abcon, 'devnest');

       //쿼리 생성 및 전송
        $query = "select * from users where email = '$email'";
        $result = mysqli_query($abcon, $query);
        $row = mysqli_fetch_array($result);

       //변환값 출력
        if ($row) {
            if ($row['pw'] === $pw) {
                $_SESSION['userid'] = $row['email'];
                echo "로그인 성공하였습니다.";
            } else {
                echo "오류가 발생했습니다.";
            }
            } else {
                echo "오류가 발생했습니다.";
        }

       //db연결 해제
       mysqli_close($abcon);
    ?>
    <meta http-equiv = "refresh" content="3; url = '../main/main.php'">
</body>

</html>