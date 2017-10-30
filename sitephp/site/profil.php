<?php
require_once('inc/init.inc.php');


//Traitement pour rediriger l'utilisateur s'il n'est pas connecté:

if(!userConnecte()){
  header('location:connexion.php');
}

extract($_SESSION['membre']);
$page = 'profil';
require('inc/header.inc.php');
?>
<h1>profil de <?= $pseudo ?></h1>
<div class="profil">
<p>Bonjour <?= $pseudo ?>!!</p></br>

<div class="profil_img"><img src="img/default.png" />
  
</div>
<div class="profil_infos">
   <ul>
      <li>Pseudo : <b><?= $pseudo ?></br></li>
      <li>Prenom : <b><?= $prenom ?></br></li>
      <li>Nom : <b><?= $nom?></br></li>
      <li>Email : <b><?= $email ?></br></li>
   </ul>
</div>
<div class="profil_adresse">
  <ul>
    <li>Adresse: <b><?= $adresse ?></br></li>
    <li>Code Postal: <b><?= $code_postal ?></br></li>
    <li>Ville: <b><?= $ville ?></br></li>
  </ul>
</div>
</div>

<div class="profil">
 <h2>Detail des commandes</h2>
 <p>Vous n'avez pas encore passe de commande !<br/>Venez visiter <a href=""boutique.php><u>notre boutique</u></a></p>
  
</div>


<?php require_once('inc/footer.inc.php');  ?>
