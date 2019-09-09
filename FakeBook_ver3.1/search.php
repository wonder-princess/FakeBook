<?php
session_start();
try {
    $dbh = new PDO('mysql:host=localhost;dbname=fakebook;charset=utf8', "test", "0000");
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT post FROM testuserpost WHERE post LIKE '%aa%' ORDER BY No DESC";

	$stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $_POST['serch'], PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;

    print_r($result);

    $_SESSION['serch'][0] = $result[0]['post'];
    $_SESSION['serch'][1] = $result[1]['post'];
    $_SESSION['serch'][2] = $result[2]['post'];
    $_SESSION['serch'][3] = $result[3]['post'];
    $_SESSION['serch'][4] = $result[4]['post'];
    $_SESSION['serch'][5] = $result[5]['post'];
    $_SESSION['serch'][6] = $result[6]['post'];
    $_SESSION['serch'][7] = $result[7]['post'];
    $_SESSION['serch'][8] = $result[8]['post'];
    $_SESSION['serch'][9] = $result[9]['post'];

//   header("Location: serchResult.php");
} catch (PDOException $e) {
	echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
	die();
}