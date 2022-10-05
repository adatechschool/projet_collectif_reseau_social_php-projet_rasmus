<?php
if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
   $tailleMax = 2097152;
   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
   if($_FILES['avatar']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "membres/avatars/".$_SESSION['id'].".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
         if($resultat) {
            $updateavatar = $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id');
            $updateavatar->execute(array(
               'avatar' => $_SESSION['id'].".".$extensionUpload,
               'id' => $_SESSION['id']
               ));
            header('Location: profil.php?id='.$_SESSION['id']);
         } else {
            $msg = "Erreur durant l'importation de votre photo de profil";
         }
      } else {
         $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
      }
   } else {
      $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
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
    <form method="post" action="home.php">

    <input type="file">


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





    
</body>
</html>
