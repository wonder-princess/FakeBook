<?php

session_start();

try {
    $mail = (string) $_POST['mail'];
    $pass = (string) $_POST['pass'];
    $dbh = new PDO('mysql:host=localhost;dbname=test;charset=utf8', "test", "0000");
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM userdata WHERE mail = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $mail, PDO::PARAM_INT);
    $stmt->execute();
    $userdata = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    $checkPass = $result['pass'];
    if ($checkPass !== $pass & !empty($name)) throw new Exception('IDかパスワードが正しくありません');
    $_SESSION['userdata'] = $userdata;
    header("Location: mypageTest.php");
} catch (Exception $e) {
    echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}
?>