<?php
    session_start();
    require_once('connection.php');
    $results = mysqli_query($conn, "SELECT * FROM users");
    if($_SESSION['name'] == 'admin') {
       
    }   
    else {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Password</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
             <?php 
            while($row = mysqli_fetch_array($results)) { ?>
                <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['password'] ?></td>
                <td>
                    <a href="#">Edit</a>
                </td>
                <td>
                    <a href="#">Delete</a>
                </td>
            </tr>
            
        <?php   }  ?>
            </tbody>
        </table>
        <form method="post" action="addusers.php">
            <div class="input">
                <label>Ad:</label>
                <input type="text" name="name">
            </div>
            <div class="input">
                <label>Parol:</label>
                <input type="password" name="password">
            </div>
            <div class="input">
                <button type="submit" name="save" class="btn">Əlavə Et</button>
            </div>
        </form>
    </div>

</body>
</html>