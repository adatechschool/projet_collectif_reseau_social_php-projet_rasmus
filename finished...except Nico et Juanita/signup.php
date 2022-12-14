<!DOCTYPE html>
<html>

<head>
	<title>Signup</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
	body {
		overflow-x: hidden;
		background:  linear-gradient(45deg,rgb(165,92, 153),rgb(71,88,214));


	}

	.main-content {
		width: 50%;
		height: 40%;
		margin: 10px auto;
		background-color: #fff;
		border: 2px solid #e6e6e6;
		padding: 40px 50px;
	}

	.header {
		border: 0px solid #000;
		margin-bottom: 5px;
	}

	.well {
		background-color: #187FAB;
	}

	#signup {
		width: 60%;
		border-radius: 30px;
	}
</style>

<body>
	<div class="row">
		<div class="col-sm-12">
			
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="main-content">
				<div class="header">
					<h3 style="text-align: center;"><strong> Join MATCH N SET</strong></h3>
					<hr>
				</div>
				<div class="l-part">
					<form action="" method="post">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<input type="text" class="form-control" placeholder="First Name" name="first_name" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<input type="text" class="form-control" placeholder="Last Name" name="last_name" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input id="password" type="password" class="form-control" placeholder="Password" name="pass_word" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input id="email" type="email" class="form-control" placeholder="Email" name="email" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
							<select class="form-control" name="country" required="required">
								<option disabled>Select your Country</option>
								<option>Pakistan</option>
								<option>United States of America</option>
								<option>India</option>
								<option>Japan</option>
								<option>UK</option>
								<option>France</option>
								<option>Germany</option>
							</select>
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
							<input id="city" type="text" class="form-control" placeholder="City" name="city" required="required">
						</div><br>

						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
							<select class="form-control input-md" name="gender" required="required">
								<option disabled>Select your Gender</option>
								<option>Male</option>
								<option>Female</option>
								<option>Others</option>
							</select>
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
							<select class="form-control input-md" name="orientation" required="required">
								<option disabled>Select your Orientation</option>
								<option>Male</option>
								<option>Female</option>
								<option>Bisexual/pan</option>
							</select>
						</div><br>
					
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input type="date" class="form-control input-md" placeholder="Email" name="birthday" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-bullhorn"></i></span>
							<input type="teams" class="form-control input-md" placeholder="Teams" name="teams" required="required">
						</div><br>
						<a style="text-decoration: none;float: right;color: #187FAB;" data-toggle="tooltip" title="Signin" href="login.php">Already have an account?</a><br><br>

						<center><button id="signup" class="btn btn-info btn-lg" name="sign_up">Signup</button></center>
						<?php include("insert_user.php"); ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>