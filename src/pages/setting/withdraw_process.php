<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login/login.html");
    exit;
}

$email = $_SESSION['email'];
$pw = $_POST['pw'];

$conn = mysqli_connect('localhost', 'root', '', 'devnest');

// 비밀번호 확인
$sql = "SELECT pw FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (!$row || $row['pw'] !== $pw) {
    echo "<script>
        alert('비밀번호가 일치하지 않습니다.');
        history.back();
    </script>";
    exit;
}

// 회원 정보 삭제
$delete = "DELETE FROM users WHERE email='$email'";
mysqli_query($conn, $delete);

// 세션 완전 종료
session_unset();
session_destroy();

mysqli_close($conn);

echo "<script>
    alert('회원 탈퇴가 완료되었습니다.');
    location.href = '../login/login.html';
</script>";
exit;
