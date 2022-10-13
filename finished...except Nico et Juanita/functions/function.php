<?php

$conn = mysqli_connect("localhost","root","root","social_network") or die("Connection was not established");

//function for inserting post

function insertPost(){
	if(isset($_POST['sub'])){
		global $conn;
		global $user_id;

		$conntent = htmlentities($_POST['post_content']);
		$upload_image = $_FILES['upload_image']['name'];
		$image_tmp = $_FILES['upload_image']['tmp_name'];
		$random_number = rand(1, 100);

		if(strlen($conntent) > 250){
			echo "<script>alert('Please Use 250 or less than 250 words!')</script>";
			echo "<script>window.open('home.php', '_self')</script>";
		}else{
			if(strlen($upload_image) >= 1 && strlen($conntent) >= 1){
				move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
				$insert = "INSERT into post (user_id, post_content, upload_image, post_date) values('$user_id', '$conntent', '$upload_image.$random_number', NOW())";

				$run = mysqli_query($conn, $insert);

				if($run){
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";

					$update = "UPDATE registration set posts='yes' where user_id='$user_id'";
					$run_update = mysqli_query($conn, $update);
				}

				exit();
			}else{
				if($upload_image=='' && $conntent == ''){
					echo "<script>alert('Error Occured while uploading!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}else{
					if($conntent==''){
						move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
						$insert = "INSERT into post (user_id,post_content,upload_image,post_date) values ('$user_id','No','$upload_image.$random_number',NOW())";
						$run = mysqli_query($conn, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";

							$update = "UPDATE registration set posts='yes' where user_id='$user_id'";
							$run_update = mysqli_query($conn, $update);
						}

						exit();
					}else{
						$insert = "INSERT into post (user_id, post_content, post_date) values('$user_id', '$conntent', NOW())";
						$run = mysqli_query($conn, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";

							$update = "update registration set posts='yes' where user_id='$user_id'";
							$run_update = mysqli_query($conn, $update);
						}
					}
				}
			}
		}
	}
}

function get_posts(){
	global $conn;
	$per_page = 4;

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page=1;
	}

	$start_from = ($page-1) * $per_page;

	$get_posts = "SELECT * from post ORDER by 1 DESC LIMIT $start_from, $per_page";

	$run_posts = mysqli_query($conn, $get_posts);

	while($row_posts = mysqli_fetch_array($run_posts)){

		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$upload_image = $row_posts['upload_image'];
		$conntent = substr($row_posts['post_content'], 0,40);
		$post_date = $row_posts['post_date'];

		$user = "SELECT * from registration where user_id='$user_id' AND posts='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_user['user_name'];
		$user_image = $row_user['image'];


		//now displaying posts from database

		if($conntent=="No" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
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
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($conntent) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
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
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
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
							<h3><p>$conntent</p></h3>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}
	}

	include("pagination.php");
}
function single_post(){
	if(isset($_GET['post_id'])){
	    global $conn;
		$get_id=$_GET['post_id'];
		$get_posts="SELECT * from post where post_id = '$get_id'";
		$run_posts= mysqli_query($conn,$get_posts);
		$row_posts= mysqli_fetch_array($run_posts);
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$upload_image = $row_posts['upload_image'];
		$conntent = substr($row_posts['post_content'], 0,40);
		$post_date = $row_posts['post_date'];
		$user = "SELECT * FROM registration WHERE user_id='$user_id' AND posts='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image = $row_user['image'];
		$user_com = $_SESSION['email'];
		$get_com="SELECT * FROM registration WHERE email='$user_com'";
		$run_com=mysqli_query($conn,$get_com);
		$row_com = mysqli_fetch_array($run_com);
		$user_com_id = $row_posts['user_id'];
		$user_com_name = $row_posts['user_name'];
		if(isset($_GET['post_id'])){
			$post_id=$_GET['post_id'];
		}


}
}
function search_user(){
	global $conn;
	if(isset($_GET['search_user_btn'])){
		$search_query=htmlentities($_GET['search_user']);
		$get_user= "SELECT * from registration where first_name like '%$search_query%' OR last_name like '%$search_query%' OR user_name like '%$search_query%' ";
	}else{
		$get_user= "SELECT * FROM registration";
	}
	$run_user=mysqli_query($conn, $get_user);
	while($row_user=mysqli_fetch_array($run_user)){
		$user_id=$row_user["user_id"];
		$first_name=$row_user["first_name"];
		$last_name=$row_user["last_name"];
		$user_name=$row_user["user_name"];
		$image=$row_user["image"];
		echo"
		<div class='row'>
		   <div class='col-sm-3'>
		    </div>
		    <div class='col-sm-6'>
		        <div class='row' id='find_people'>
		            <div class='col-sm-4'>
		                <a href='user_profile.php?u_id=$user_id'>
		                    <img src='users/$image' style='float:left;margin:1px'title='$user_name' width='150px' height='140px'/>
		                </a>
		            </div><br><br>
		        <div class='col-sm-6'>
		            <a style='text-decoration:none; cursor:pointer;color:#3897f0'  href='user_profile.php?u_id=$user_id'>
                       <strong><h2>$first_name $last_name
		            </h2></strong></a>
		    </div>
		    <div class='col-sm-3'>
		</div>
		</div> 
		</div>
		<div class='col-sm-4'>
		</div>
		</div>
		";
	}
}
function random_user(){
	global $conn;
	if(isset($_GET['search_user_btn'])){
		$search_query=htmlentities($_GET['search_user']);
		$get_user= "SELECT * from registration where first_name like '%$search_query%' OR last_name like '%$search_query%' OR user_name like '%$search_query%' ";
	}else{
		$get_user= "SELECT * FROM registration";
	}
	$run_user=mysqli_query($conn, $get_user);
	while($row_user=mysqli_fetch_array($run_user)){
		$user_id=$row_user["user_id"];
		$first_name=$row_user["first_name"];
		$last_name=$row_user["last_name"];
		$user_name=$row_user["user_name"];
		$image=$row_user["image"];
		echo"
		<div class='row'>
		   <div class='col-sm-3'>
		    </div>
		    <div class='col-sm-6'>
		        <div class='row' id='find_people'>
		            <div class='col-sm-4'>
		                <a href='user_profile.php?u_id=$user_id'>
		                    <img src='users/$image' style='float:left;margin:1px'title='$user_name' width='150px' height='140px'/>
		                </a>
		            </div><br><br>
		        <div class='col-sm-6'>
		</div>
		";
	}
}

?>