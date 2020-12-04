<?php 
    session_start();
    require_once('connection.php');
if(!isset($_SESSION['name'])) {
    header('Location: index.php');
}
else {
    if(isset($_POST['postcomment'])) {
        $comment = $_POST['comment'];
        $username = $_SESSION['name'];
        $postid = $_POST['id'];
        if($comment != "") {
            $sql = "INSERT INTO comments (post_id, username, comment) VALUES ('$postid','$username', '$comment')";
            $query = $conn->query($sql);
            if($query)  {
                header('Location: view.php?id='.$postid);
            }
        }
        else {
            header('Location: view.php?id='.$postid);       
        }

    }
}




?>