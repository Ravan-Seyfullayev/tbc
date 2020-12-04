<?php $id = $_GET['id'];
require_once('connection.php');
session_start();

?>  



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/view.css">
</head>
<body>
    <div class="all">
    <div class="content">
    <?php $id = $_GET['id'];?>  
    <?php 
        $sql = "SELECT * FROM posts WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) { 
            $id = $row['id'];

            echo "<div class='post'>";
            echo "<img src='images/".$row['image']."' class='postimage'>";  
            echo "<h2 class='authorT'>Müəllif:</h2>";
            echo  "<p class='author'>".$row['author']."</p>";  
            echo "<h2 class='textT'>Sual:</h2>"; 
            echo "<p class='text'>".$row['text']."</p>";
            echo "</div>";
        }
        
    ?>
    </div>
    <div class="commentDiv">
        <form action="comments.php" method="POST">
            <label class="commentText">Rəy Əlavə Et</label>
            <input type="hidden" name="id" value=<?php echo $id;?>>
            <br>        
            <textarea name="comment" cols="10" rows="5" class="comment"></textarea>
            <input type="submit" name="postcomment" value="Rəy Əlavə Et!" class="postcomment">
        </form>
    </div>
    <div class="allcomments">
        <h1 class="reyler">Rəylər</h1>
        <?php
        $com_query = "SELECT * FROM comments WHERE post_id = '$id'";
        $com_result = mysqli_query($conn,  $com_query);
        while ($com = mysqli_fetch_array($com_result)) { 
            ?>
            <div class='commentW'>
            <div class="commentD">
             <p class='username'><?php echo $com['username']?></p>
             </div>
             <div class="commentD">
            <p class='commentR'><?php echo $com['comment'] ?></p>
            </div>
             </div>
            <br>
        <?php } ?>
    </div>
    </div>
</body>
</html>