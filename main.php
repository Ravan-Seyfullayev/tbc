<?php   
    session_start();
    $name = $_SESSION['name'];
    if($_SESSION['name']=='' && $_SESSION['password']=='') {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mekteb</title>
    <link rel="stylesheet" href="css/main.css">
   
</head>

<body>
  <nav class="nav">
        <nav>
         <label class="logo">TBC</label>
         <ul>
             <li><a href="#" class="navA">Profilim</a></li>
             <li><a href="logout.php" class="navA">Çıxış</a></li>
         </ul>
         </nav>
        

        <div class="posts">
            <button class="postBtn"><a href="postadd.php?id">Post əlavə et</a></button>
            <?php 
            require_once('connection.php');
            $sql = "SELECT * FROM posts";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) { 
                $id = $row['id']; 
                echo "<div class='post'>";
                echo "<p class='author'>".$row['author']."</p>";  
                echo "<p class='text'>".$row['text']."</p>";
                echo "<img src='images/".$row['image']."' class='postimage'>";
                echo "<a href='view.php?id=$id' class='etrafli'>Ətraflı</a>";
                echo "</div>";
            }
            
            ?>
        </div>
        
  </nav> 
  <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" data-auto-replace-svg="nest"></script>
</body>
</html>