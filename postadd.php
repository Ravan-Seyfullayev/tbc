<?php 
    session_start();
    require_once('connection.php'); 
    if(isset($_POST['upload'])) {
        
        $image = $_FILES['image']['name'];
        $fileType = $_FILES['file']['type'];
        $fileExt = explode('.', $image);
        $fileActualExt = strtolower(end($fileExt)); 
        $allowed = array('jpg','jpeg', 'png');
        $target = "images/".basename($_FILES['image']['name']);
        $text = $_POST['text'];
        $author = $_SESSION['name'];    
        $sql = "INSERT INTO posts (image, text, author) VALUES ('$image', '$text', '$author')";
        mysqli_query($conn, $sql);
        if(in_array($fileActualExt, $allowed)) {
            if(move_uploaded_file($_FILES['image']['tmp_name'], $target ))  {
                $msg = "Oldu";
                header('Location: main.php');
             }
            else {
                $msg = "olmadi";
            }   
        }
        }
        else {
            $msg = "Ancaq shekiller icaze verilir";
        }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TBC</title>
    <link rel="stylesheet" href="css/postadd.css">
</head>
<body>
    <div class="postAdd">
    <form action="" method="post" enctype="multipart/form-data">
    <h2>Post Əlavə et!</h2>
    <p><?php echo $msg?></p>
    <input type="hidden" name="size" value="1000000">
    <br>
    <label> Fayl qoy
    <input type="file" name="image">
    </label> 
    <br>
    <textarea name="text" cols="40" rows="4" placeholder="Yazı..."></textarea>
    <br>
    <input type="submit" name="upload" value="Post et!">
    <input type="submit" name="back" value="Geri">
    <?php 
    if(isset($_POST['back'])) {
        header('Location: main.php');
    }

?>

    </form>
    </div>    
</body>
</html>