<?php 
session_start();
$postlist = $_SESSION;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">
<title>home</title>
</head>
<body>   
    <nav id="always_navi">
        <ul>
            <form method="post" action="search.php">
                <li class="search">検索<input type="text" name="search" id="search"></li>
            </form>
            <li class="myPage"><a href="myPage.php">マイページ</a></li>
            <li class="myPage"><a href="home.php">HOME</a></li>
        </ul>
    </nav>


<article id="top_cotent">
        <form method="post" action="post.php">
            <textarea name="post" id="post" rows="10" cols="50"></textarea>
            <div class="submit_button">
                <input type="submit" name="submitButton" id="submitButton" value="投稿">
            </div>
        </form>
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