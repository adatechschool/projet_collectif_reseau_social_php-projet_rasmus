<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Match N Set:Signup</title>
</head>
<style>
    body {
        overflow-x: hidden;
    }
    .main-content{
        width:50%;
        height:40%;
        margin:10px auto;
        background-color: #fff;
        border:2px solid #e6e6e6;
        padding:40px 50px;
    }
    .header{
        border:0px solid #000;
        margin-bottom: 5px;

    }

    .well {
        background-color: #187FAB;
    }
    #signup{
        width:60%;
        border-radius: 30px;
    }
</style>

<body>

    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <center>
                    <h1 style="color:white">Match N Set</h1>
                </center>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="main-content">
                <div class="header">
                    <h3 style="text-align: center"><strong>Join Match N Set</strong></h3><br>
                </div>
                <div class="1-part">
                    <form action="" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input type="text" class="form-control" placeholder="enter your first name" name="first_name" required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input type="text" class="form-control" placeholder="enter your last name" name="last_name" required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="pw" type="password" class="form-control" placeholder="enter your password" name="pass_word" required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="cpw" type="cpassword" class="form-control" placeholder="confirm your password" name="cpass_word" required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email"type="email" class="form-control" placeholder="enter your email" name="email" required="required">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
                            <select class="form-control" name="country" required="required" placeholder="Enter your country">
                                <option disabled> Select your country</option>
                                <option>USA</option>
                                <option>France</option>
                                <option>Germany</option>
                                <option>UK</option>
                                <option>Canada</option>
                                <option>Australia</option>
                            </select>
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            How do you identify:
                            <input type="radio" class="form-control" id="gender" name="gender" value="female">
                            <label for="female">Female</label>
                            <input type="radio" class="form-control" id="gender" name="gender" value="male">
                            <label for="male">Male</label>
                            <input type="radio" class="form-control" id="gender" name="gender" value="non">
                            <label for="non">Non-binary</label><br>

                        </div><br>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input type="date" class="form-control input-md" placeholder="enter your email" name="birthday" required="required">


                        </div>
                        <a style="text-decoration:none; float:right;color:#187FAB" data-toggle="tooltip" title="Login" href="login.php">Already have an account?</a><br><br>
                        <center><button id="signup" class="btn btn-info btn-lg" name="sign_up">Signup</button></center>
                        <?php
                        include("insert_user.php");
                        ?>
                    </form>
                </div>

            </div>
        </div>
    </div>


</body>

</html>