<?php 
session_start();
$postlist = $_SESSION;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<title>home</title>
</head>
<body>   
    <nav id="headBar">
        <ul>
            <form method="post" action="search.php">
                    <input type="text" name="search" id="search">
                    <input type="submit" name="serchButton" id="serchButton" value="検索">
                </form>
            <li class="myPage"><a href="home.php">HOME</a></li>
        </ul>
    </nav>


<article id="top_cotent">
    <div id="system">
        <ul>         
            <ol><?php echo $postlist['search'][0]; ?></ol>
            <ol><?php echo $postlist['search'][1]; ?></ol>
            <ol><?php echo $postlist['search'][2]; ?></ol>
            <ol><?php echo $postlist['search'][3]; ?></ol>
            <ol><?php echo $postlist['search'][4]; ?></ol>
            <ol><?php echo $postlist['search'][5]; ?></ol>
            <ol><?php echo $postlist['search'][6]; ?></ol>
            <ol><?php echo $postlist['search'][7]; ?></ol>
            <ol><?php echo $postlist['search'][8]; ?></ol>
            <ol><?php echo $postlist['search'][9]; ?></ol>
        </ul>
    </div>
</article>
<p id="scrollTop"><a href="#">ページトップ</a></p>

</body>
</html>