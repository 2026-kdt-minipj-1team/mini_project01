<?php
session_start();

$email = $_POST['email'];
$pw    = $_POST['pw'];

// DB 연결
$abcon = mysqli_connect('localhost', 'root', '');
if (!$abcon) {
    die('DB 연결 실패');
}

// DB 선택
mysqli_select_db($abcon, 'devnest');

// 사용자 조회
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($abcon, $query);

// 쿼리 실패 방어
if (!$result) {
    die('쿼리 오류');
}

$row = mysqli_fetch_array($result);

// 로그인 판단
if ($row && $row['pw'] == $pw) {
    // ✅ 로그인 성공
    $_SESSION['email'] = $row['email'];

    header("Location: ../main/main.php");
    exit;
} else {
    // ❌ 로그인 실패
    header("Location: ../login/login.html");
    exit;
}

// DB 종료
mysqli_close($abcon);
