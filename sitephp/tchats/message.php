
<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=tchat', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

if (isset($_POST['envoi'])) {

	if (!empty($_POST['message'])) {

		echo "<pre>";
		print_r($_POST);
		echo "</pre>";

		$resultat = $pdo -> prepare("INSERT INTO message (id_membre, content, date_enregistrement) VALUES ($_SESSION[id_membre], :message, NOW())");

		$resultat -> bindParam(':message', $_POST['message'], PDO::PARAM_STR);
	
		$resultat -> execute();
	}

}    
$resultat = $pdo -> query("
      SELECT membre.*,message.*
      FROM message
      LEFT JOIN membre
      ON message.id_membre = membre.id_membre


	");
$commentaire = $resultat -> fetchAll(PDO::FETCH_ASSOC);

echo"<pre>";
print_r($_POST);
echo"</pre>";




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
			<a class="btn" href="?action=deconnexion">Deconnexion</a>
		</nav>
		<main>
			<h1>Message</h1>

			<h2>Bonjour <?= $_SESSION['pseudo']; ?> </h2>
			<p>Bienvue sur le tchat Fonderie, n'hésitez pas à communiquer avec nous :) </p>

			        <?php foreach ($commentaires as $valeur) : ?>
			        	<?php if($_SESSION['pseudo'] !)?>
						<div class="comment">
							<div class="triangle"></div>
							<div class="comment_in">
								<div class="img">
									<img src="photo/bics.png" height="25px" />
									<p class="auteur">Par Yakine, le 26/09/2017 à 9:30:20</p>
								</div>
								<div class="content">

									<p class="message">Voici le commentaire, voici le commentaire, voici le commentaire</p>
								</div>
							</div>
						</div>

						<div class="comment user_connecte">

							<div class="comment_in">
								<div class="img">
									<img src="photo/image/bics.png" height="25px" />
									<p class="auteur">Par Yakine, le 26/09/2017 à 9:30:20</p>
								</div>
								<div class="content">

									<p class="message">Voici le commentaire, voici le commentaire, voici le commentaire</p>
								</div>
							</div>

							<div class="triangle"></div>
						</div>



			<hr/>
			<h4>Nouveau message : </h4>
			<form method="post" action="" class="tchat">
				<textarea name="message" placeholder="Votre Message"></textarea>
				<input type="submit" name="envoi" value="Envoyer" />
			</form>

		</main>
	</body>
</html>