<?php

session_start();

try {
    $dbh = new PDO('mysql:host=localhost;dbname=fakebook;charset=utf8', "test", "0000");
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO testuserpost (post)* VALUES (?)";
	$stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $_POST['post'], PDO::PARAM_STR);
    $stmt->execute();
    $sql = "SELECT post FROM testuserpost ORDER BY No DESC FETCH FIRST 10 ROWS ONLY";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $postlist[] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION = $postlist;
    $dbh = null;

    header("Location: home.php");
} catch (PDOException $e) {
	echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
	die();
}
