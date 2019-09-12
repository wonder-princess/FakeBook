<?php
session_start();
try {
    $dbh = new PDO('mysql:host=localhost;dbname=fakebook;charset=utf8', "test", "0000");
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT post FROM testuserpost WHERE post LIKE (?) ORDER BY No DESC";
    $stmt = $dbh->prepare($sql);
    $str = "%" . $_POST['search'] ."%";
    $stmt->bindValue(1, $str, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;

    $_SESSION['search'][0] = $result[0]['post'];
    $_SESSION['search'][1] = $result[1]['post'];
    $_SESSION['search'][2] = $result[2]['post'];
    $_SESSION['search'][3] = $result[3]['post'];
    $_SESSION['search'][4] = $result[4]['post'];
    $_SESSION['search'][5] = $result[5]['post'];
    $_SESSION['search'][6] = $result[6]['post'];
    $_SESSION['search'][7] = $result[7]['post'];
    $_SESSION['search'][8] = $result[8]['post'];
    $_SESSION['search'][9] = $result[9]['post'];

   header("Location: serchResult.php");
} catch (PDOException $e) {
	echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
	die();
}