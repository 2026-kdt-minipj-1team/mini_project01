<?php
session_start(); 

if (!isset($_SESSION['userid'])) {
    header("Location: ../login/login.html");
    exit;
}
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
        $query = "select * from users where id = '$email'";
        $result = mysqli_query($abcon, $query);
        $row = mysqli_fetch_array($result);

       //변환값 출력
        if ($row) {
            if ($row['pw'] === $pw) {
                $_SESSION['userid'] = $row['id'];
                echo "로그인 성공하였습니다.";
                header("Location: ../main/main.php");
            } else {
                echo "오류가 발생했습니다.";
                header("Location: ../login/login.html");
            }
            } else {
                echo "오류가 발생했습니다.";
                header("Location: ../login/login.html");
                
        }

       //db연결 해제
       mysqli_close($abcon);
    ?>
    
</body>

</html>