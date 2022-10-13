<?php
    //include("includes/header.php");
    session_start();
    include 'connect.php';
    $id_registration = $_SESSION['id'];
    

    // Connecting to user table
    $sql_user = "SELECT * FROM social_network.user WHERE id_registration = '$id_registration'";
    $result_user = mysqli_query($conn, $sql_user);
    $row = mysqli_fetch_row($result_user);

    $nickname = $row[1];
    $gender = $row[2];
    $description = $row[4];
    $orientation = $row[5];
    $country = $row[6];
    $city = $row[7];
    $teams = $row[8];
    $img = "./image/" . $row[9];
    
    //to upload modifications;
    if (isset($_POST['settings'])) {

        $nickname = $_POST['nickname'];
        @$orientation = $_POST['orientation'];
        $description = $_POST['description'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $teams = $_POST['teams'];
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./image/" . $filename;

        // Connect to Database
         $db = mysqli_connect("localhost", "root", "root", "social_network");

        // submitted data modifications
        $sql_mofication = "UPDATE social_network.user SET teams = '$teams') WHERE id = '$id_registration'";
        //UPDATE social_network.user SET teams = '$teams' WHERE id_registration = '46'

        // Execute query
        mysqli_query($db, $sql_mofication);

    } else{
       // echo "Unable to change your settings. Please try later";
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="edit-account.css" rel="stylesheet">

    <title>EDIT ACCOUNT INFORMATION</title>
</head>
    <div class="header">
        <h1 >Welcome <?php echo $nickname ?></h1>
        <img src="./image/<?php echo $row[9]; ?>" style="height:(150)px;width:150px">
    </div>

    <center><h4><strong>YOUR PROFILE INFO</strong></strong></h4></center>

    <div class="profile_info">



        <?php
            echo "
            <p><strong>Your nickname: $nickname</strong><p><strong>";
        ?>
        <br>
        <div class="nickname">
            <label for="nickname" class="text-center">New nickname?</label>
            <br>
            <input type="text" name="nickname"><br>
        </div>
        <br>
        <?php
            echo "
            <p><strong> A little bit about yourself : $description</i></strong></p><br>";
        ?>
        <br>
        <div class="description">
            <label for="description" class="text-center">Change something ?</label>
            <br>
            <input type="text" name="description"><br>
        </div>

        <br>

        <?php
            echo "
            <p><strong>You live in: </strong> $country, $city</p><br>"
        ?>
         <div class="location">
            <label for="country" class="text-center">Country modification ?</label>
            <br>
            <input type="text" name="country"><br>
            <br>
            <label for="city" class="text-center">City modification?</label>
            <br>
            <input type="text" name="city"><br>
        </div>
        <br>

        <?php
            echo "
            <p><strong>Your interested in: </strong> $orientation</p><br>";
        ?>
        
        <div class="orientation">
             Select any chages:
            <input type="radio" id="orientation" name="orientation" value="female">
            <label for="female">Women</label>
            <input type="radio" id="orientation" name="orientation" value="male">
            <label for="male">Man</label>
            <input type="radio" id="orientation" name="orientation" value="non">
            <label for="non">Both</label>
            <br>
        </div>


        <br>
        <?php
            echo "
            <p><strong>Your favorite team(s): </strong> $teams</p><br>";
        ?>
        <div class="teams">
            <label for="teams" class="text-center">New teams you want to add</label>
            <br>
            <input type="text" name="teams"><br>
            <br>
        </div>
        <br>
        <br>  
        <div class="buttons">
            <a href="logout.php" class="btn btn-primary">Logout</a>
            <button class="btn btn-primary" type="submit" name="settings">Modify Settings</button>
        </div>
    </div>

</body>
</html>