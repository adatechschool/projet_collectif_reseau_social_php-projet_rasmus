<?php
session_start();
error_reporting(0);


$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

    $row = $query->fetch(PDO::FETCH_ASSOC);
    $select= "select * from registration";
    $connection =mysqli_query($db, $select);
    $row=mysqli_fetch_array($connection);
    $user_id=$row['user_id'];
    echo $user_id;

    @$gender = $_POST['gender'];
    @$orientation = $_POST['orientation'];
    $description = $_POST['description'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    //$checkbox1= $_POST['sport'];
    //$sport = $_POST['sport'];
    $teams = $_POST['teams'];
    $user = $_SESSION['email'];
    // Connect to Database
    $db = mysqli_connect("localhost", "root", "root", "social_network");

    // Get all the submitted data from the form
    $sql = "UPDATE registration set (teams = '$teams',orientation = '$orientation',gender = '$gender',description='$description',country='$country',city='$city') where user_id='$user_id'";
    echo $sql;
    // Execute query
    $updated =mysqli_query($db, $sql);   
    if($updated){
        echo "yes";
    }       
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings </title>
</head>

<body>
    <form method="post" action="settings.php" enctype="multipart/form-data">
    <div class="gender">
            How do you identify:
            <input type="radio" id="gender" name="gender" value="female">
            <label for="female">Female</label>
            <input type="radio" id="gender" name="gender" value="male">
            <label for="male">Male</label>
            <input type="radio" id="gender" name="gender" value="non">
            <label for="non">Non-binary</label><br>
    </div>
        <div class="description">

            <label for="description" class="text-center">Description</label>
            <input type="text" name="description"><br>
        </div>
        <br>

        <div class="orientation">
            Sexual orientation:
            <input type="radio" id="orientation" name="orientation" value="female">
            <label for="female">Female</label>
            <input type="radio" id="orientation" name="orientation" value="male">
            <label for="male">Male</label>
            <input type="radio" id="orientation" name="orientation" value="non">
            <label for="non">Bisexual</label><br>
            
            <?php
                //Now post the radio boxes 
                if(isset($_POST['upload'])){
                    if(!empty($_POST['orientation'])) {
                        echo '  ' . $_POST['orientation'];
                    } else {
                        echo 'Please select the value.';
                    }
                    }
            ?>
        </div>
        <br>

        <div class="location">
            <label for="country" class="text-center">Country</label>
            <input type="text" name="country"><br>
            <br>
            <label for="city" class="text-center">City</label>
            <input type="text" name="city"><br>
        </div>
        <br>

        <div class="sport">
            Chose your favorite sports: 
            <br/>
            <input type="checkbox" id="sport" name="sport[]" value="basket">
            <label for="sport">Basket</label>
            <br/>
            <input type="checkbox" id="sport" name="sport[]" value="foot">
            <label for="sport">Soccer</label>
            <br/>
            <input type="checkbox" id="sport" name="sport[]" value="rugby">
            <label for="sport">Rugby</label>
            <br/>
            <input type="checkbox" id="sport" name="sport[]" value="golf">
            <label for="sport">Golf</label>
            <br/>
            <input type="checkbox" id="sport" name="sport[]" value="natation">
            <label for="sport">Natation</label>
            <br/>
            <input type="checkbox" id="sport" name="sport[]" value="tennis">
            <label for="sport">Tennis</label>
            <br/>
            <input type="checkbox" id="sport" name="sport[]" value="volleyball">
            <label for="sport">Volleyball</label>
            <br/>
            <input type="checkbox" id="sport" name="sport[]" value="horseRiding">
            <label for="sport">Horse riding</label>
            <br/>
            <input type="checkbox" id="sport" name="sport[]" value="Yoga">
            <label for="sport">Yoga</label>
            <br/>
            <input type="checkbox" id="sport" name="sport[]" value="winterSports">
            <label for="sport">Winter Sports</label>
            <br/>
            
            <br/>

            <?php
                //upload values for sports
                if(isset($_POST['upload'])){
                    if(!empty($_POST['sport'])){

                        foreach($_POST['sport'] as $checked){
                            
                            $user_id = $_SESSION['id'];
                
                            $sql2 = "INSERT INTO sports_users (id_user, sports) VALUES ('$user_id','$checked')"; 
                            
                            mysqli_query($db, $sql2);
                            
                            }
                    } else {
                        
                        echo '<div class="error">Sports checkbox is not selected!</div>';
                    }
                } 
            ?>
        </div>
        <br>

        <div class="teams">
            <label for="teams" class="text-center">Teams</label>
            <input type="text" name="teams"><br>
            <br>
        </div>

       
        <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
       
    </form>

</body>

</html>