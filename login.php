<?php

$login = 0;
$invalid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $user_name  = $_POST['user_name'];
    $pass_word  = $_POST['pass_word'];


    $query = "SELECT * FROM registration WHERE user_name = '$user_name' AND pass_word = '$pass_word'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            //echo " l'utilisateur deja existant";
            $login = 1;
            session_start();
            $_SESSION['user_name'] = $user_name;
            header("location:home.php");
        } else {
            $invalid = 1;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Login</title>

</head>

<body>




    <?php
    if ($login) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>congratulation</strong>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    };

    ?>

    <?php
    if ($invalid) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>password does not match...</strong>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    };

    ?>
    <h1 class="text-center">Login</h1>
    <form method="post" action="login.php">
        <div class="form-group">
            <label for="user_name">Name</label><br>
            <input type="text" name="user_name" class="form-control" placeholder="enter your username" required /> <br> <br>
        </div>
        <div class="form-group">
            <label for="pass_word">Password</label><br>
            <input type="password" name="pass_word" class="form-control" placeholder="enter your password" required /> <br> <br>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</body>

</html>