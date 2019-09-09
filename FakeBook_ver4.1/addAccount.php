<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=fakebook;charset=utf8', "test", "0000");
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	$sql = "CREATE TABLE fakebook.test ( No INT NOT NULL AUTO_INCREMENT, post TEXT NOT NULL, DateTime DATE NOT NULL, PRIMARY KEY (No));";
	$stmt = $dbh->prepare($sql);
    $stmt->execute();

    $sql = "INSERT INTO testuserpost (post) VALUES (?)";
	$sql = "INSERT INTO userdata (id, name, pass, post_list) VALUES (NULL, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);

    $str = "test";
    $stmt->bindValue(1, $str, PDO::PARAM_STR);
    $stmt->bindValue(2, $str, PDO::PARAM_STR);
    $stmt->bindValue(3, $str, PDO::PARAM_STR);
    $stmt->execute();


    $sql = "SELECT post_list FROM userdata WHERE post_list LIKE 'test'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
/*
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/
    $dbh = null;
    print_r($result['post_list']);
    echo "アカウント作成";

//   header("Location: home.php");
} catch (PDOException $e) {
	echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
	die();
}