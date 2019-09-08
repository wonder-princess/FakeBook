<?php

session_start();

$userdata = $_SESSION['userdata'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Sample1</title>
</head>
<body>
<p><?php echo $userdata['name']; ?></p>
<a href="sample1.php">sample1</a>
<a href="sample2.php">sample2</a>
<a href="logoutTest.php">ログアウト</a>
</body>
</html>