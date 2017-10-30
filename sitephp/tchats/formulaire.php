<?php
$pdo = new PDO('mysql:host=localhost;dbname=tchats', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

$msg = '';

if(!empty($_POST)){
    
    if (!empty($_FILES['photo']['name'])) {
         $nom_photo = time() . ' - ' . rand(0, 5000) . ' - ' . $_FILES['photo']['name'];
         echo $nom_photo;
         
         if ($_FILES['photo']['type'] == 'image/jpeg'||$_FILES['photo']['type'] == 'image/gif'|| $_FILES['photo']['type'] == ' image/png' )
          {
            if ($_FILES['photo']['size'] < 1000000) {
             copy($_FILES['photo']['tmp_name'], __DIR__ . '/photo/' . $nom_photo);
         
            }
    
         }
         
    }
    else {
        $nom_photo = 'default.jpg';
    }
    
    
    if(empty($_POST['pseudo'])){
        echo'<p style="color: white; background: red; padding: 5px">Veuillez renseigner un pseudo</p>';
    }
    if(empty($_POST['mdp'])){
        echo'<p style="color: white; background: red; padding: 5px">Veuillez renseigner un mot de passe</p>';
    }
    if(empty($_POST['email'])){
        echo'<p style="color: white; background: red; padding: 5px">Veuillez renseigner un email</p>';
    }


if(empty($msg)){
    
    echo '<pre>';
    print_r($_POST);
    print_r($_FILES);
    echo '</pre>';
    
    $resultat = $pdo -> prepare("INSERT INTO membre (pseudo, mdp, email, photo, statut) VALUES (:pseudo, :mdp, :email,:photo, '1')");
    
    $resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $resultat -> bindParam(':mdp', $_POST['mdp'], PDO::PARAM_STR);
    $resultat -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $resultat -> bindParam(':photo', $nom_photo, PDO::PARAM_STR);
    
    $resultat -> execute();
}
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <?= $msg ?>
    <input type="text" name="pseudo" placeholder="pseudo"><br><br>
    
    <input type="password" name="mdp" placeholder="mot de passe"><br><br>
    
    <label>Votre avatar: </label>
    <input name="photo" type="file"></input><br><br>
    
    <input name="email" type="text" placeholder="email"></input><br><br>
    
    <input type="submit" value="Envoyer">
    
</form>