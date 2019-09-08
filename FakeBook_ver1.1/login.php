<?php

session_start();

try {
    $name = (string) $_POST['name'];
    $pass = (string) $_POST['pass'];
    $dbh = new PDO('mysql:host=localhost;dbname=fakebook;charset=utf8', "sekai", "0000");
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM userdata WHERE name = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $name, PDO::PARAM_INT);
    $stmt->execute();
    $userdata = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    $checkPass = $result['pass'];
    if ($checkPass !== $pass & !empty($name)) throw new Exception('IDかパスワードが正しくありません');
    $_SESSION['userdata'] = $userdata;
    header("Location: home.php");
} catch (Exception $e) {
    echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}
?>