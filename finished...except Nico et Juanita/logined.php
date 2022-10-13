<?php

include("includes/connection.php");

	if (isset($_POST['login'])) {

		$email = htmlentities(mysqli_real_escape_string($connn, $_POST['email']));
		$pass_word = htmlentities(mysqli_real_escape_string($connn, $_POST['pass']));

		$select_user = "select * from registration where email='$email' AND pass_word='$pass_word' AND status='verified'";
		$query= mysqli_query($connn, $select_user);
		$check_user = mysqli_num_rows($query);

		if($check_user == 1){
			session_start();

			$_SESSION['email'] = $email;

			echo "<script>window.open('home.php', '_self')</script>";
		}
	}
?>