<?php

session_start();
unset($_SESSION['userdata']);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Sample2</title>
</head>
<body>
<a href="checkLoginTest.php">マイページ</a>
<a href="sample1.php">sample1</a>
</body>
</html>