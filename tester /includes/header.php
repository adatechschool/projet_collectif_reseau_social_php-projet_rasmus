<?php
include("connection.php");
include("./functions/function.php");
include("./logined.php");

?>
<nav class="navbar navbar-default" >
	<div class="container-fluid" style="margin-bottom:0px">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home.php">Match N Set</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	
	      	<?php 
            $user = $_SESSION['email'];
            $get_user ="SELECT * FROM registration WHERE email='$user'";
            $run_user=mysqli_query($connn,$get_user);
            $row=mysqli_fetch_array($run_user);
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $pass_word = $row['pass_word'];
            $description = $row['description'];
            $register_date= $row['user_reg_date'];
            $email= $row['email'];
            $country = $row['country'];
            $gender = $row['gender'];
            $birthday = $row['birthday'];
            $image= $row['image'];
            $cover= $row['cover'];

            $user_posts= "SELECT * FROM registration WHERE user_id='$user_id'";
            $run_posts= mysqli_query($connn,$user_posts);
            $posts=mysqli_num_rows($run_posts);
			?>

	        <li><a href='profile.php?<?php echo "u_id=$user_id" ?>'><?php echo "$first_name"; ?></a></li>
	       	<li><a href="home.php">Home</a></li>
			<li><a href="members.php">Find People</a></li>
			<li><a href="messages.php?u_id=new">Messages</a></li>
			


					<?php
						echo"

						<li class='dropdown'>
							<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span><i class='glyphicon glyphicon-chevron-down'></i></span></a>
							<ul class='dropdown-menu'>
								<li>
									<a href='my_post.php?u_id=$user_id'>My Posts <span class='badge badge-secondary'>$posts</span></a>
								</li>
								<li>
									<a href='edit_profile.php?u_id=$user_id'>Edit Account</a>
								</li>
								<li role='separator' class='divider'></li>
								<li>
									<a href='logout.php'>Logout</a>
								</li>
							</ul>
						</li>
						";
					?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<form class="navbar-form navbar-left" method="get" action="results.php">
						<div class="form-group">
							<input type="text" class="form-control" name="user_query" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-info" name="search">Search</button>
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav> 