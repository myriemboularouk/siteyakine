<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=tchats', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

$msg = '';


// TAITEMENTS POUR LA CONNEXION:
if(isset($_POST['connexion'])) { // Si le formulaire de connexion est activè.

   if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
       //Si les 2 champs sont remlis, on va verifier:
   	       //1: Que le nembre existe.
   	       //2: Que le mdp est le bon.

           //1: Est-ce que le nombre existe :
           $resultat = $pdo -> prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
           $resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
           $resultat -> execute();

           if($resultat -> rowCount() > 0){
           	 // cela signifie qu' il existe bien un membre avec ce pseudo.
           	  $membre = $resultat -> fetch(PDO::FETCH_ASSOC);

           	 //2 : Est-ce que le MDP en BDD correspond au MDP dans le formulaire ?

           	if($membre['mdp'] === $_POST['mdp']) {
           	  	 //Cela signfie que tout est OK, le pseudo existe, le MDP concorde bien... Donc on connecte le membre :

                // la meme dans un foreach :
           	  	foreach ($membre as $indice => $valeur) {
           	  		$SESSION[$indice] = $valeur;
           	  	// on recupere toutes les infos du membre pour les stocker dans le fichier de session .Normalement il est preferable d'exclure le MDP.
           	  	header('location:message.php');

           	  	}


           	}
            else {
            	$msg .= "erreur de mdp";
            }

	   	  }
	   	  else{
	   	  	$msg .= "erreur de pseudo";
	   	  }
    } 
}




// TRAITEMENTS POUR L INSCRIPTION:
if(isset($_POST['inscription'])) { // Si le formulaire de inscription est activè.
    
    if (!empty($_FILES['photo']['name'])) {
         $nom_photo = time() . ' - ' . rand(0, 5000) . ' - ' . $_FILES['photo']['name'];
         echo $nom_photo;
         
         if ($_FILES['photo']['type'] == 'image/jpeg'||
         $_FILES['photo']['type'] == 'image/gif'||
         $_FILES['photo']['type'] == 'image/png' ) {
             
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





<!DOCTYPE html>
<html>
	<head>
		<title>Tchat Fonderie</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" />
	</head>
	<body>
		<header>
		</header>
		<nav>
		</nav>
		<main>
			<h1>Accueil</h1>

			<?= $msg ?>
			
			<div class="inscription">
				<h2>Inscription</h2>	
				
				<form method="post" action="" enctype="multipart/form-data">
					<input type="text" name="pseudo" placeholder="Pseudo" />

					<input type="mdp" name="mdp" placeholder="Mot de passe" />
					
					<label>Votre avatar : </label>
					<input type="file" name="photo"/>	
					
					<input type="text" name="email" placeholder="email" />
					
					<input type="submit" value="inscription" name="inscription" />

				</form>
				
				
				
				
			</div>
			
			<div class="connexion">
				<h2>Connexion</h2>
				<p>Si vous avez déjà un compte, connectez-vous :</p>
				<form method="post" action="">
					<input type="text" name="pseudo" placeholder="pseudo" />
					<input type="mdp" name="mdp" placeholder="Mot de passe" />
					<input type="submit" name="connexion" value="Connexion" />
				</form>
			</div>
		</main>
	</body>
</html>