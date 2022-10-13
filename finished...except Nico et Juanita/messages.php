<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['email'])){
	header("location: index.php");
}

?>
<html>
<head>

	<title>Messages</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<style>
    body{
		background:  linear-gradient(45deg,rgb(165,92, 153),rgb(71,88,214));
        height:100vh;
        width: 100%;
	}
    #scroll_messages{
        max-height: 500px;
        overflow: scroll;
    }

#btn-msg{
    width:20%;
    height: 28px;
    border-radius: 5px;
    margin: 5px;
    border: none;
    color:#fff;
    float:right;
    background-color:#2ecc71 ;
}
#select_user{
    max-height: 500px;
        overflow: scroll;
}
#green{
    background-color: #2eec71;
    border-color: #27aa60;
    width:45%;
    padding:2.5px;
    font-size:16px;
    border-radius: 23px; 
    float:left;
    margin-bottom: 5px;

}
#blue{
    background-color: #3498db;
    border-color: #2980b9;
    width:45%;
    padding:2.5px;
    font-size:16px;
    border-radius: 23px;
    float:right;
    margin-bottom: 5px;

}

</style>
<body>
<div class="row">
   <?php
if(isset($_GET['u_id'])){
    global $conn;
    $get_id=$_GET['u_id'];
    $get_user="select * from registration where user_id = '$get_id'";
    $run_user=mysqli_query($conn,$get_user);
    $row_user = mysqli_fetch_array($run_user);
    $user_to_msg=$row_user['user_id'];
    $user_to_name=$row_user['user_name'];
}

$user=$_SESSION['email'];
$get_user="select * from registration where email='$user'";
$run_user = mysqli_query($conn, $get_user);
$row=mysqli_fetch_array($run_user);
$user_from_msg= $row['user_id'];
$user_from_name = $row['user_name'];

   ?>
   <div class="col-sm-3" id="select_user">
    <?php 
    $users = "select * from registration";
    $run_user=mysqli_query($conn,$users);
    while($row_user=mysqli_fetch_array($run_user)) {
        $user_id=$row_user['user_id'];
        $user_name=$row_user['user_name'];
        $first_name=$row_user['first_name'];
        $last_name=$row_user['last_name'];
        $image=$row_user['image'];

        echo"

        <div class='container-fluid'>
        <a style='text-decoration:none;cursor:pointer;color:#white' href='messages.php?u_id=$user_id'>
        <img src='users/$image' class='img-circle' width='90px' height='80px' title='$user_name'>
        <strong>&nbsp $first_name $last_name</strong><br><br>

        </a>
        </div>
        ";
    }
    
    ?>
   </div>
   <div class="col-sm-6">
    <div class="load_msg" style="color:#fff;" id="scroll_messages">
        <?php

        $sel_msg="SELECT * from user_messages where (user_to='$user_to_msg' and user_from='$user_from_msg') or (user_from='$user_to_msg' and user_to='$user_from_msg') order by 1 asc ";
        $run_msg=mysqli_query($conn,$sel_msg);

        while($row_msg=mysqli_fetch_array($run_msg)){
            $user_to = $row_msg['user_to'];
            $user_from = $row_msg['user_from'];
            $msg_body = $row_msg['msg_body'];
            $msg_date = $row_msg['date'];
            ?>
            <div id="loaded_msg">
               <p>
                <?php
                if($user_to==$user_to_msg AND $user_from==$user_from_msg){
                    echo"
                    <div class='imessage' id='blue' data-toggle='tooltip' title='$msg_date'>
                    $msg_body
                    </div><br><br><br>
                    ";
                }else if($user_to==$user_from_msg AND $user_from==$user_to_msg){
                    echo"
                    <div class='imessage' id='green' data-toggle='tooltip' title='$msg_date'>
                    $msg_body
                    </div><br><br><br>
                    ";
                }
                ?>
               </p>  
            </div>
            <?php
        }
        ?>
    </div>
    <?php
if(isset($_GET['u_id'])){
    $u_id=$_GET['u_id'];
    if($u_id == "new"){
        echo'
        <form>
        <center>
        <h3>Select Someone to have a conversation</h3>
        </center>
        <textarea disabled class="form-control" placeholder="Enter a message"></textarea>
        <input type="submit" class="btn btn-default" disabled value="Send">
        </form><br><br>
        ';
    }
    else{
        echo'
        <form action="" method="POST">
        <center>
        <h3>Select Someone to have a conversation</h3>
        </center>
        <textarea class="form-control" placeholder="Enter a message" name="msg_box" id="msg_textarea"></textarea>
        <input type="submit" name="send_msg" id="btn-msg" value="Send">
        </form><br><br>
        ';

    }
}

    ?>
    <?php
    if(isset($_POST['send_msg'])){
        $msg= htmlentities($_POST['msg_box']);
        if ($msg == ""){
            echo "
            <h4 style='color:red;text-align:center'>Message was unable to send</h4>
            ";
        }else if(strlen($msg)>37){
            echo "
            <h4 style='color:red;text-align:center'>Message is too long use only 37 characters</h4>
            ";
        }else{
    
            $insert ="INSERT into user_messages(user_to,user_from,msg_body,date,msg_seen) values('$user_to_msg','$user_from_msg','$msg',NOW(),'no')";
            $run_insert=mysqli_query($conn,$insert);
        }
    }

    ?>

   </div>
   <div class="col-sm-3">
    <?php
    if(isset($_GET['u_id'])){
        global $conn;
        $get_id=$_GET['u_id'];
        $get_user="select * from registration where user_id = '$get_id'";
        $run_user=mysqli_query($conn,$get_user);
        $row = mysqli_fetch_array($run_user);
        $user_id=$row['user_id'];
        $user_name=$row['user_name'];
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        $description=$row['description'];
        $country=$row['country'];
        $image=$row['image'];
        $register_date=$row['user_reg_date'];
        $gender=$row['gender'];
    }

 
    if($get_id=="new"){

    }else{
        echo "
        <div class='row'>
            <div class='col-sm-2'>
            </div>
            <center>
                <div style='background-color: #e6e6e6;' class='col-sm-9'>
                <h2>
                    Information about
                </h2>
                <img src='users/$image' width='150' height='150' class='img-circle'>
                <br><br>
                <ul class='list-group'>
                    <li class='list-group-item' title='username'><strong>$first_name $last_name</strong></li>
                    <li class='list-group-item' title='description'><strong>$description</strong></li>
                    <li class='list-group-item' title='gender'>$gender</li>
                    <li class='list-group-item' title='Country'>$country</li>
                    
                </ul>
            </div>
            <div class='col-sm-1'>
            </div>
            </center>
        </div>
        ";

    }
    ?>

   </div>
</div>
<script>
    var div= document.getElementById("scroll_messages");
    div.scrollTop = div.scrollHeight;
    </script>
</body>
</html>