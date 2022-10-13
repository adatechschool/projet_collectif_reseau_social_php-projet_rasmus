<?php
session_start();
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

    $nickname = $_POST['nickname'];
    @$gender = $_POST['gender'];
    @$orientation = $_POST['orientation'];
    $birthday = $_POST['birthday'];
    $description = $_POST['description'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    //$checkbox1= $_POST['sport'];
    //$sport = $_POST['sport'];
    $teams = $_POST['teams'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;
    $id_registration = $_SESSION['id'];

    // Connect to Database
    $db = mysqli_connect("localhost", "root", "root", "social_network");

    // Get all the submitted data from the form
    $sql = "INSERT INTO social_network.user (id_registration,teams,orientation,gender,image,nickname,birthday,description,country,city) VALUES ('$id_registration','$teams','$orientation','$gender','$filename','$nickname','$birthday','$description','$country','$city')";
    
    // Execute query
    mysqli_query($db, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3> Hello $nickname. Your profile has been uploaded successfully!</h2>";
    } else {
        echo "<h3> Failed to upload your image!</h2>";
    } 
    header("location:edit_account.php");          
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
</head>

<body>
    <h1 class="text-center">Welcome <?php echo $_SESSION['user_name'] ?></h1>
    <form method="post" action="settings.php" enctype="multipart/form-data">
    
    <div class="form-group">
        <div class="nickname">
            <label for="nickname" class="text-center">Nickname</label>
            <input type="text" name="nickname"><br>
        </div>
            <br>

        <div class="gender">
            How do you identify:
            <input type="radio" id="gender" name="gender" value="female">
            <label for="female">Female</label>
            <input type="radio" id="gender" name="gender" value="male">
            <label for="male">Male</label>
            <input type="radio" id="gender" name="gender" value="non">
            <label for="non">Non-binary</label><br>

                <?php
                    //Now post the radio boxes 

                    if(isset($_POST['upload'])){
                        if(!empty($_POST['gender'])) {
                            echo '  ' . $_POST['gender'];
                        } else {
                            echo 'Please select the value.';
                        }
                        }
                ?>
        </div>
        <br>

        <div class="birthday">

            <label for="birthday" class="text-center">Birthday</label>
            <input type="date" name="birthday"><br>
            <!-- penser a la condition d'age -->
        
        </div>
        <br>

        <div class="description">

            <label for="description" class="text-center">Description</label>
            <input type="text" name="description"><br>
        </div>
        <br>

        <div class="orientation">
            What are you looking for:
            <input type="radio" id="orientation" name="orientation" value="female">
            <label for="female">Women</label>
            <input type="radio" id="orientation" name="orientation" value="male">
            <label for="male">Man</label>
            <input type="radio" id="orientation" name="orientation" value="non">
            <label for="non">Both</label><br>
            
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

        <div class="image_upload">
            <input class="form-control" type="file" name="uploadfile" value="" />
            <br>
            <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            <br>
            <?php
                $query = " select image from user where id =(select max(id) from `user`)";
                $result = mysqli_query($db, $query);

                while ($data = mysqli_fetch_assoc($result)) {
                ?>
                    <img src="./image/<?php echo $data['image']; ?>" style="height:250px;width:250px">;

                    

                <?php
                }
            ?>
            <a href="logout.php" class="btn btn-primary">Logout</a>
            </div>    
        </div>

    </form>

</body>

</html>