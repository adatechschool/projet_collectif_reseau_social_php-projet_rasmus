<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image/" . $filename;

	$db = mysqli_connect("localhost", "root", "root", "social_network");

	// Get all the submitted data from the form
	$sql = "INSERT INTO user (image) VALUES ('$filename')";

	// Execute query
	mysqli_query($db, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Image uploaded successfully!</h3>";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
</head>
<body>
    <h1 class="text-center">Welcome <?php echo $_SESSION['user_name'] ?></h1>
    <form method="post" action="settings.php" enctype="multipart/form-data">

    <?php
     $query = " select image from user where id =(select max(id) from `user`)";
		$result = mysqli_query($db, $query);

		while ($data = mysqli_fetch_assoc($result)) {
		?>
			<img src="./image/<?php echo $data['image']; ?>"style="height:250px;width:250px">

		<?php
		}
		?> 
      
    <div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" />
			</div>
		
		

         <br>
    <label for="nickname" class="text-center">Nickname</label>
    <input type="text" name="nickname"><br>

    <div class="gender">
        How do you identify:
    <input type="radio" id="gender"  name="gender" value ="female">
        <label for="female">Female</label>
        <input type="radio" id="gender"  name="gender" value ="male">
        <label for="male">Male</label>
        <input type="radio" id="gender"  name="gender" value ="non">
        <label for="non">Non-binary</label><br></div>

        <label for="birthday" class="text-center">Birthday</label>
    <input type="date" name="birthday"><br> 
    <!-- penser a la condition d'age -->


    <label for="description" class="text-center">Description</label>
    <input type="text" name="description"><br>



        <div class="orientation">
        Sexual orientation:
    <input type="radio" id="orientation"  name="orientation" value ="female">
        <label for="female">Female</label>
        <input type="radio" id="orientation"  name="orientation" value ="male">
        <label for="male">Male</label>
        <input type="radio" id="orientation"  name="orientation" value ="non">
        <label for="non">Non-binary</label><br></div>


    <label for="country" class="text-center">Country</label>
    <input type="text" name="country"><br>

    <label for="city" class="text-center">City</label>
    <input type="text" name="city"><br>

    <div class="sports">
        <input type="checkbox" id="sports" name="basket" value="basket">
        <label for="sports">Basket</label>
        <input type="checkbox" id="sports" name="foot" value="foot">
        <label for="sports">Foot</label>
        <input type="checkbox" id="sports" name="rugby" value="rugby">
        <label for="sports">Rugby</label>
        <input type="checkbox" id="sports" name="golf" value="golf">
        <label for="sports">Golf</label>
        <input type="checkbox" id="sports" name="natation" value="natation">
        <label for="sports">Natation</label>
        </div>

        <label for="teams" class="text-center">Teams</label>
    <input type="text" name="teams"><br>
    <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
    <button class="btn btn-primary" type="submit" name="END">END</button> 
    <!-- Penser a lier le button END avec BD -->

   
      </form>
 
</body>
</html>
