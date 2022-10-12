<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if (!isset($_SESSION['email'])) {
    header("location: index.php");
}
?>
<html>

<head>

    <title>Find People</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<style>

#ownposts {
		border: 5px solid #e6e6e6;
		padding: 40px 50px;

	}
</style>
<body>
    <div class="row">
        <?php
        if (isset($_GET['u_id'])) {
            $u_id = $_GET['u_id'];
        }
        if ($u_id < 0 || $u_id == "") {
            echo "<script>window.open('home.php','_self')</script>";
        } else {
        }

        ?>
        <div class="col-sm-12">
            <?php
            if (isset($_GET['u_id'])) {
                global $conn;
                $user_id = $_GET['u_id'];
                $select = "select * from registration where user_id = $user_id";
                $run = mysqli_query($conn, $select);
                $row = mysqli_fetch_array($run);
                $name = $row['user_name'];
            }
            ?>
            <?php
            if (isset($_GET['u_id'])) {
                global $conn;
                $user_id = $_GET['u_id'];
                $select = "select * from registration where user_id = $user_id";
                $run = mysqli_query($conn, $select);
                $row = mysqli_fetch_array($run);
                $id = $row['user_id'];
                $image = $row['image'];
                $name = $row['user_name'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $description = $row['description'];
                $country = $row['country'];
                $gender = $row['gender'];
                $register_date = $row['user_reg_date'];

                echo "
            <div class='test' >
            <div class='row' >
                <div class='col-sm-1' style='color:pink'></div>
                    <center>
                    <div style='background-color:#e6e6e6; height:100% ' class='col-sm-3'>
                        <h2 style='color:grey'>Information About</h2>
                        <img class='img-circle' src='users/$image' width='150'  height='150'><br><br>
                        <ul class='list-group'>
                            <li class='list-group' title='username'>
                            <strong style='color:grey'>$description</strong></li>
                            <li class='list-group' title='Gender'><strong style='color:grey'>$gender</strong></li>
                            <li class='list-group' title='Country'><strong style='color:grey'>$country</strong></li>
                        </ul>";
                $user = $_SESSION['email'];
                $get_user = "SELECT * from registration where email='$user'";
                $run_user = mysqli_query($conn, $get_user);
                $row = mysqli_fetch_array($run_user);
                $userown_id = $row['user_id'];
                echo "
                    </div>
                    </center>
                    ";
            }


            ?>
            <div class="col-sm-8">
                <center>
                    <h1><strong><?php
                                echo "$first_name $last_name";
                                ?></strong></h1>
                </center>
                <?php
                global $conn;
                if (isset($_GET['u_id'])) {
                    $u_id = $_GET['u_id'];
                }
                $get_posts = "SELECT * from post where user_id= '$u_id' ORDER by 1 DESC LIMIT 5";

                $run_posts = mysqli_query($conn, $get_posts);

                while ($row_posts = mysqli_fetch_array($run_posts)) {

                    $post_id = $row_posts['post_id'];
                    $user_id = $row_posts['user_id'];
                    $upload_image = $row_posts['upload_image'];
                    $conntent = substr($row_posts['post_content'], 0, 40);
                    $post_date = $row_posts['post_date'];

                    $user = "SELECT * from registration where user_id='$user_id' AND posts='yes'";
                    $run_user = mysqli_query($conn, $user);
                    $row_user = mysqli_fetch_array($run_user);

                    $user_name = $row_user['user_name'];
                    $first_name = $row_user['first_name'];
                    $last_name = $row_user['last_name'];
                    $user_image = $row_user['image'];
                    if ($conntent == "No" && strlen($upload_image) >= 1) {
                        echo "
            <div id='own_posts'>
            <div class='row'>
            <div class='col-sm-2'>
            <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>

            </div>
            <div class='col-sm-6'>
            <h3>
            <a style='text-decoration:none;cursor:pointer;color:#3897f0;'href='user_profile.php?u_id=$user_id'>$user_name</a>
            </h3>
            <h4>
            <small style='color:black;'> Updated a post on<strong>$post_date</strong></small>
            </h4>
            </div>
            <div class='col-sm-4'>
            </div>
            </div>
            <div class='row'>
            <div class='col-sm-12'>
            <img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>

            </div>
            </div><br>
            <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a><br>

            </div><br><br>
            ";
                    } 
                    else if (strlen($conntent) >= 1 && strlen($upload_image) >= 1) {

                        echo "
                       <div id='ownposts'>
                        <div class='row'>
                       <div class='col-sm-2'>
                      <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                        </div>
                         <div class='col-sm-6'>
                        <h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                         <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                       </div>
                      <div class='col-sm-4'>
                           </div>
                              </div>
                             <div class='row'>
                             <div class='col-sm-12'>
                               <p>$conntent</p>
                             <img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>						</div>
                        </div><br>
                          <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a><br>

                             </div>
                              </div>
                             ";
                    }
                    else {
                        echo "
                <div id='ownposts'>
                <div class='row'>
                            <div class='col-sm-2'>
                            <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                            </div>
                            <div class='col-sm-6'>
                                <h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                         
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                            <p>$conntent</p>
                        </div>
                        <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a><br>
    
                </div>
                </div><br><br>
                ";
                    }
                }
                ?>
            </div>


        </div>
    </div>
   
</body>

</html>