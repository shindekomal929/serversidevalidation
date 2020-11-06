<?php
session_start();
if(!isset($_SESSION['username'])){
header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
    <div class="container">
    <h2 class="text-center text-success">Welcome <?php echo $_SESSION['username']; ?></h2>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>