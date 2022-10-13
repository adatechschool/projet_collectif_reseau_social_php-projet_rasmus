<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['email'])){
	header("location: index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
    <link rel="stylesheet" type="text/css" href="match.css">

    <title>Document</title>
</head>
<style>
  body{
    background:  linear-gradient(45deg,rgb(165,92, 153),rgb(71,88,214));

  }
</style>
<body>
<div class="tinder">
  <div class="tinder--status">
    <i class="fa fa-remove"></i>
    <i class="fa fa-heart"></i>
  </div>

  <div class="tinder--cards">
    <div class="tinder--card">
      <img src="https://placeimg.com/600/300/people">
      <h3>Demie</h3>
      <p>Software Developer</p>
      <p>5 Mutual Connections</p>
    </div>
    <div class="tinder--card">
      <img src="https://placeimg.com/600/300/animals">
      <h3>Quacker</h3>
      <p>Student</p>
      <p>12 Mutual Connections</p>
    </div>
    <div class="tinder--card">
      <img src="https://placeimg.com/600/300/nature">
      <h3>Neha</h3>
      <p>Manager</p>
      <p>9 Mutual Connections</p>
    </div>
    <div class="tinder--card">
      <img src="https://placeimg.com/600/300/tech">
      <h3>Alex</h3>
      <p>Programmer</p>
      <p>2 Mutual Connection</p>
    </div>
    <div class="tinder--card">
      <img src="https://placeimg.com/600/300/arch">
      <h3>Kim</h3>
      <p>Teacher</p>
      <p>4 Mutual Connections</p>
    </div>
  </div>

  <div class="tinder--buttons">
    <button id="nope"><i class="fa fa-remove"></i></button>
    <button id="love"><i class="fa fa-heart"></i></button>
  </div>
</div>
    <script src="match.js"></script>
</body>
</html>