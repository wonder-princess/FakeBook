<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=fakebook;charset=utf8', "test", "0000");
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT name FROM userdata WHERE name LIKE (?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $_POST['createAccount'], PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbh = null;


try {
    $dbh = new PDO('mysql:host=localhost;dbname=fakebook;charset=utf8', "test", "0000");
    //動的にSQLを操作することでテーブル名を値として渡せる…？
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*
    //テーブルを増減させるのはあまりよろしくない設計？ 知っとるわ！　改善策教えてくれよ！！！
    $table_name = "test";
    $sql = sprintf(
    "CREATE TABLE `%s' ( No INT NOT NULL AUTO_INCREMENT, post TEXT NOT NULL, DateTime DATE NOT NULL, PRIMARY KEY (No));",
    str_replace(["\0", "`"], ["", "``"], $table_name));
    $stmt = $dbh->prepare($sql);
//    $stmt->bindValue(1, $str, PDO::PARAM_STR);
    $stmt->execute();
*/

	$sql = "CREATE TABLE test ( No INT NOT NULL AUTO_INCREMENT, post TEXT NOT NULL, DateTime DATE NOT NULL, PRIMARY KEY (No));";
	$stmt = $dbh->prepare($sql);
    $stmt->execute();

    $sql = "INSERT INTO testuserpost (post) VALUES (?)";
	$sql = "INSERT INTO userdata (id, name, pass, post_list) VALUES (NULL, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);

    $stmt->bindValue(1, $_POST['createAccount'], PDO::PARAM_STR);
    $stmt->bindValue(2, $_POST['createPass'], PDO::PARAM_STR);
    $stmt->bindValue(3, $_POST['createAccount'], PDO::PARAM_STR);
    $stmt->execute();


    $sql = "SELECT post_list FROM userdata WHERE post_list LIKE (?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $_POST['createAccount'], PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $dbh = null;
    print_r($result['post_list']);
    echo "\nアカウント作成";
    $_SESSION['tableName'] = $result['post_list'];

//   header("Location: home.php");
} catch (PDOException $e) {
	echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
	die();
}