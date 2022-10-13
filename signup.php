<?php
$user = 0;
$success = 0;
$invalid = 0;
//$mail=0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

include 'connect.php';
$user_name  = $_POST['user_name'];
$pass_word  = $_POST['pass_word'];
$cpassword  = $_POST['cpassword'];
$mail  = $_POST['mail'];



    $query = "SELECT * FROM registration WHERE user_name = '$user_name'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
   
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            echo " l'utilisateur deja existant";
            $user = 1;
        } else {
            if ($pass_word == $cpassword) {
                $query1 = "INSERT INTO registration(user_name,pass_word,mail) VALUES ('$user_name','$pass_word','$mail')";
                $result2 = mysqli_query($conn, $query1);
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_row($result);
                session_start();
                $_SESSION['id'] = $row[0];
                $_SESSION['user_name'] = $row[1];

                var_dump(($row));
            
                if ($result) {
                    //echo " signup successful";
                    $success = 1;
                    header("location:settings.php");
                };
            } else {
                $invalid = 1;
            }
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
    <title>Signup</title>

</head>

<body>

    <?php
    if ($user) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>sorry about you!</strong>the user exist.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    };

    ?>


    <?php
    if ($success) {
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
    <h1 class="text-center">Signup</h1>
    <form method="post" action="signup.php">
        <div class="form-group">
            <label for="user_name">Name</label><br>
            <input type="text" name="user_name" class="form-control" placeholder="enter your username" required /> <br> <br>
        </div>
        <div class="form-group">
            <label for="pass_word">Password</label><br>
            <input type="password" name="pass_word" class="form-control" placeholder="enter your password" required /> <br> <br>
        </div>
        <div class="form-group">
            <label for="pass_word">Confirm Password</label><br>
            <input type="password" name="cpassword" class="form-control" placeholder="confirm your password" required /> <br> <br>
        </div>
        <div class="form-group">
            <label for="mail">Mail</label><br>
            <input type="email" name="mail" class="form-control" placeholder="enter your mail" required /> <br> <br>
        </div>


        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</body>

</html>