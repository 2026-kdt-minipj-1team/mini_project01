<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>미니프로젝트(26.01.05 ~ 26.01.07)</title>
    <meta charset="utf-8">

</head>

<?php
$dbcon = mysqli_connect('localhost', 'root', '', 'devnest');

mysqli_select_db($abcon, 'devnest');
mysqli_set_charset($dbcon, 'utf8mb4');

$userId = $_SESSION['user_id'];

$language = $_POST['language'];
$fontSize = $_POST['font_size'];
$notify = isset($_POST['notify_enabled']) ? 1 : 0;
$quizTime = $_POST['quiz_notify_time'] ?: null;
$scheduleTime = $_POST['schedule_notify_time'] ?: null;

//DB업데이트
$sql = "
UPDATE user_settings
SET language=?, font_size=?, notify_enabled=?,
    quiz_notify_time=?, schedule_notify_time=?
WHERE user_id=?
";

$stmt = mysqli_prepare($dbcon, $sql);
mysqli_stmt_bind_param(
    $stmt,
    "ssissi",
    $language,
    $fontSize,
    $notify,
    $quizTime,
    $scheduleTime,
    $userId
);

mysqli_stmt_execute($stmt);

echo "설정 저장 완료";
?>
</body>

</html>