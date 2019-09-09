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
        <h2>test</h2>
        <ul>
            <ol><?php echo $postlist[0]['post']; ?></ol>
            <ol><?php echo $postlist[1]['post']; ?></ol>
            <ol><?php echo $postlist[2]['post']; ?></ol>
            <ol><?php echo $postlist[3]['post']; ?></ol>
            <ol><?php echo $postlist[4]['post']; ?></ol>
            <ol><?php echo $postlist[5]['post']; ?></ol>
            <ol><?php echo $postlist[6]['post']; ?></ol>
            <ol><?php echo $postlist[7]['post']; ?></ol>
            <ol><?php echo $postlist[8]['post']; ?></ol>
            <ol><?php echo $postlist[9]['post']; ?></ol>
        </ul>
    </div>
</article>
<p id="scrollTop"><a href="#">ページトップ</a></p>

</body>
</html>
