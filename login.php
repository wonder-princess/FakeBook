<?php

session_start();

try {
    $account = (string) $_POST['loginAccount'];
    $pass = (string) $_POST['loginPass'];
    $dbh = new PDO('mysql:host=localhost;dbname=fakebook;charset=utf8', "test", "0000");
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM userdata WHERE name = ?";
    $stmt = $dbh->prepare($sql); 
    $stmt->bindValue(1, $account, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    $checkPass = $result['pass'];
    if ($checkPass !== $pass | empty($account)) throw new Exception('IDかパスワードが正しくありません');
    $_SESSION['userdata'] = $result;
    header("Location: home.php");
} catch (Exception $e) {
    echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}
?>