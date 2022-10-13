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

	<title>Find New People</title>
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
	}
</style>
<body style="background-color:#cd9ee5;">
<div class="row">
    <div class="col-sm-12">
        <center>
            <h2>
                Find new People
            </h2>
        </center>
        <br><br>
        <div class="row">
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-4">
                <form class="search-form" action="">
                    <input type="text" name="search_user">
                    <button class="btn btn-info" type="submit" name="search_user_btn">
                        Search
                    </button>

                </form>

            </div>
            <div class="col-sm-4">

            </div><br><br>
            <?php
            search_user();
            ?>
        </div>
    </div>

</div>
</body>
</html>