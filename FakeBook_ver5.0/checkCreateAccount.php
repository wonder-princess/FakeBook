<?php

if ($_POST['createPass'] !== $_POST['checkPass'] | empty($_POST['checkPass']) | empty($_POST['createAccount'])) 
throw new Exception('IDかパスワードが正しくありません');

try {
    $dbh = new PDO('mysql:host=localhost;dbname=fakebook;charset=utf8', "test", "0000");
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT name FROM userdata WHERE name LIKE (?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $_POST['createAccount'], PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();
    $dbh = null;
    if($result > 0){
        print_r($result['name']);
        throw new Exception('このアカウント名は既に存在しています');
    }
    header("addAccount.php");
} catch (PDOException $e) {
	echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
	die();
}
