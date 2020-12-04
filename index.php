<?php 
session_start();
require_once('connection.php');
 if(isset($_POST['submit'])) {
    if(empty($_POST['name']) || empty($_POST['password'])) {
        $error = "Username or Password is Invalid";
    }
    else {
        $name = $_POST['name'];
        $password = $_POST['password']; 
        $query = mysqli_query($conn, "SELECT * FROM users WHERE name = '$name' AND password = '$password'");
        $rows = mysqli_num_rows($query);
        if($rows == 1) {
            header("Location: main.php");
        }
        else {
            $error = "alinmadi :(";
        }
        if(mysqli_fetch_assoc($query)) {
            $_SESSION['name'] = $_POST['name'];
            if($_POST['name']  == "admin") {
                header('Location: admin.php');
            }   
            else {
                header("Location: main.php"); 
            }
           
        }
        else {
            echo "alimadi";
        }

    }
 }
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Məktəb</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js"></script>
</head>
<body>
    <form action="#" method="POST">
    <div class="signIn">
        <h2>Daxil ol</h2>
        <h1></h1>
        <label for="name">Ad: </label>
        <input type="text" name="name">
        <br>
        <label for="password">Parol: </label>
        <input type="password" name="password">
        <button name="submit">Daxil ol</button>
    </div>
    </form>
</body>
</html>