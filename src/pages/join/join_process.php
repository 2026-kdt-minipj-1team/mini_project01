<!DOCTYPE html>
<html>

<head>
    <title>미니프로젝트(26.01.05 ~ 26.01.07)</title>
    <meta charset="utf-8">
</head>

<body>
    <?php
        //전달되는 값 받기
        $email = $_POST['email'];
        $pw = $_POST['pw'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $birth = $_POST['birth'];

        //db연결
        $abcon = mysqli_connect('localhost' , 'root' , '');
        
        //db선택
        mysqli_select_db($abcon,'devnest');
        
        //쿼리 생성 및 전송(insert...)
        $query = "insert into users values(null, '$email' , '$pw' , '$name', '$phone' , '$gender' , '$birth')";
        $result = mysqli_query($abcon,$query);
        
        //파일 저장
        if($result){
            echo "$name 님, 가입이 완료되었습니다.";
        }else{
            echo "오류가 발생했습니다.";
        }
        //db연결 해제
        
        mysqli_close($abcon);
        ?>
        <!-- 가입이 완료되면 로그인 페이지로 넘어가게-->
        <meta http-equiv = "refresh" content="3; url = '/mini_project01/src/pages/login/login.html'">
</body>

</html>