<?php
include("includes/connection.php");
if(isset($_POST['sign_up'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $pass_word = $_POST['pass_word'];
    $cpass_word = $_POST['cpass_word'];
    $email = $_POST['email'];
    $birthday = htmlentities(mysqli_real_escape_string($connn,$_POST['birthday']));
    $status="verified";
    $posts="no";
    $city="city";
    $orientation="female";
    $teams= "teams";
    $country= "country";
    $gender="gender";
    $image="profile.png";
    $newgid=sprintf('%05d',rand(0,999999));
    
    echo $username;
    $query = "SELECT * FROM registration WHERE email = '$email'";
    $result = mysqli_query($connn, $query);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            echo "<script>alert('this email is already registered');</script>";
            
        } else {
            if ($pass_word == $cpass_word) {
                $username=strtolower($first_name."_".$last_name."_".$newgid);
                if($username != NULL){
                    $profile_pic="alzheimer.png";
                $query = "INSERT INTO registration(first_name,last_name,user_name,pass_word,country,gender,email,birthday,image,cover,user_reg_date,status,posts,description,city,teams,orientation) VALUES ('$first_name','$last_name','$username','$pass_word','$country','$gender','$email','$birthday','$profile_pic','default_cover.jpg',NOW(),'$status','$posts','Hello, this is my default description','$city','$teams','$orientation')";
                $result = mysqli_query($connn, $query);
                if ($result) {
                 
                  ;                 
                    
                
                };
            }
            } else {
                echo '<script>alert("your passwords dont match ")</script>';
                
                
            }
        }
    }
   

}

?>