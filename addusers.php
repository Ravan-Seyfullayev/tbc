<?php
    require_once('connection.php');
         $name = '';
        $password = '';
    if(isset($_POST['save'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        
        $sql = "INSERT INTO users (name, password) VALUES ('$name', '$password')";
        mysqli_query($conn, $sql);
    } 
    $results = mysqli_query($conn, "SELECT * FROM users");
    header('Location: main.php')
?>