<?php
session_start();
try {
    $dbh = new PDO('mysql:host=localhost;dbname=fakebook;charset=utf8', "test", "0000");
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO testuserpost (post) VALUES (?)";
	$stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $_POST['post'], PDO::PARAM_STR);
    $stmt->execute();
    $sql = "SELECT post FROM testuserpost ORDER BY No DESC";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;

    $_SESSION['post'][0] = $result[0]['post'];
    $_SESSION['post'][1] = $result[1]['post'];
    $_SESSION['post'][2] = $result[2]['post'];
    $_SESSION['post'][3] = $result[3]['post'];
    $_SESSION['post'][4] = $result[4]['post'];
    $_SESSION['post'][5] = $result[5]['post'];
    $_SESSION['post'][6] = $result[6]['post'];
    $_SESSION['post'][7] = $result[7]['post'];
    $_SESSION['post'][8] = $result[8]['post'];
    $_SESSION['post'][9] = $result[9]['post'];

   header("Location: home.php");
} catch (PDOException $e) {
	echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
	die();
}