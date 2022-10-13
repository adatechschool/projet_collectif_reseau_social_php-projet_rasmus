<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['email'])){
	header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<style>
    .news{
        margin:0px;
        margin-bottom: 12px;
        margin-left:10px;
    }
    .news h2{
        margin-left: 700px;
        background:linear-gradient(45deg,rgb(225,131,210),rgb(123,71,214));

    }
    .news h3{
        margin-left: 700px;

    }
    body{
		background:  linear-gradient(45deg,rgb(165,92, 153),rgb(71,88,214));
	}

    .header{
        height:200px;
        width: 980px;
        margin-left: 200px;
        font-size: 7vw;
        background:linear-gradient(45deg,rgb(225,131,210),rgb(123,71,214));
        position:center;
        text-align:center;
    }
    </style>
<body >
    <h1 class="header"><center>Todays Sports News</center></h1>

<div class="news">
<h2>In the world of sports PSG loses again</h2>

<iframe width="560" height="315" src="https://www.youtube.com/embed/CGFgHjeEkbY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    
</div>

<div class="news">
<h2>In the world of sports PSG loses again</h2>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/5TESaDL2Qao" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="news">
    <h2>In the world of sports PSG loses again</h2>

        <iframe width="560" height="315" src="https://www.youtube.com/embed/cHxA84byNhE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    </div>
    <div class="news">
    <h2>In the world of sports PSG loses again</h2>

            <iframe width="560" height="315" src="https://www.youtube.com/embed/YIl5lymLmqI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    </div>
</body>
</html>