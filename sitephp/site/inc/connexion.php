

<?php
require_once('inc/init.inc.php');
//Traitement pour l'inscription:
// ->Verifie si le formulaire est vide
//on connecte le membre en enregistrant ses infos dans la seesion
// ->le membre existe til en bdd
// ->es ce que le mot de passe saisi correspond a celui en bdd
// ->enregistrement en session
// ->redirection vers le profil






require('inc/header.inc.php');
?>
<h1>connexion</h1>
<?= $msg?>

<form method="post" action="" >
  <?= $msg?>
  <label>pseudo</label>
  <input type="text" name="pseudo" />
  <label>Mot de passe :</label>
  <input type="password" name="mdp"  />
  <input type="submit" value="enregister"/>
</form>


<?php require_once('inc/footer.inc.php');  ?>