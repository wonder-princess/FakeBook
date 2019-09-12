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
                <form method="post" action="search.php">
                <ul id="search">
                   <li><input type="text" name="search" id="search"></li>
                   <li><input type="submit" name="serchButton" id="serchButton" value="検索"></li>
                </ul>
                </form>
        </ul>
    </nav>


<article id="top_cotent">
        <form method="post" action="post.php">
            <textarea name="post" id="post" rows="10" cols="150" placeholder="今何してる？"></textarea>
            <div class="postButton">
                <input type="submit" name="postButton" id="postButton" value="投稿">
            </div>
        </form>
    <div id="system">
        <ul>         
            <ol><?php echo $postlist['post'][0]; ?></ol>
            <ol><?php echo $postlist['post'][1]; ?></ol>
            <ol><?php echo $postlist['post'][2]; ?></ol>
            <ol><?php echo $postlist['post'][3]; ?></ol>
            <ol><?php echo $postlist['post'][4]; ?></ol>
            <ol><?php echo $postlist['post'][5]; ?></ol>
            <ol><?php echo $postlist['post'][6]; ?></ol>
            <ol><?php echo $postlist['post'][7]; ?></ol>
            <ol><?php echo $postlist['post'][8]; ?></ol>
            <ol><?php echo $postlist['post'][9]; ?></ol>
        </ul>
    </div>
</article>
<p id="scrollTop"><a href="#">ページトップ</a></p>

</body>
</html>