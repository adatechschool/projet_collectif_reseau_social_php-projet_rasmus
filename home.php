<?php
session_start();
if(!isset($_SESSION['user_name'])){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<h1 class="text-center">Welcome <?php echo $_SESSION['user_name'] ?></h1>
    <div class="container">
        <a href="logout.php" class="btn btn-primary">Logout</a>
        <!-- a mettre lien vers le profile utilisateur et non les settings-->
        <a href="settings.php" class="btn btn-primary">Settings</a> 
        <a href="edit_account.php" class="btn btn-primary">Edit Account</a>
    </div>
</body>
</html> 