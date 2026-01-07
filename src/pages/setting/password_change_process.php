<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login/login.html");
    exit;
}

$email = $_SESSION['email'];
$current_pw = $_POST['current_pw'];
$new_pw = $_POST['new_pw'];
$new_pw_confirm = $_POST['new_pw_confirm'];

// 새 비밀번호 확인
if ($new_pw !== $new_pw_confirm) {
    echo "<script>
        alert('새 비밀번호가 일치하지 않습니다.');
        history.back();
    </script>";
    exit;
}

// DB 연결
$conn = mysqli_connect("localhost", "root", "", "devnest");

// 현재 비밀번호 확인
$query = "SELECT pw FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!$row || $row['pw'] !== $current_pw) {
    echo "<script>
        alert('현재 비밀번호가 틀렸습니다.');
        history.back();
    </script>";
    exit;
}

// 비밀번호 변경
$update = "UPDATE users SET pw='$new_pw' WHERE email='$email'";
mysqli_query($conn, $update);

mysqli_close($conn);

// 성공 후 이동
echo "<script>
    alert('비밀번호가 변경되었습니다.');
    location.href='../main/main.php';
</script>";
