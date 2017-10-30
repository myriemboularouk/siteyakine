
<?php
/*
Une injection SQL, permet de detourner le comportement initialement prevue d' une requete.
-----------------
Exemple 1 :
     pseudo : juju'#
     mdp :

     Requte : SELECT * FROM membre WHERE pseudo = 'juju'#'&& mdp = ''
 Explication : le diese permet de mettre la suite de la equete en commentaire. donc demmande , le user dont le pseudo est juju.le MDP n'a plus aucune importance.

 ---------------
  exemple 2 : 
     pseudo :
     mdp : 'OR id_membre = '2'
     requete :SELECT * FROM membre WHERE pseudo = ''&& mdp = '' OR id_membre est 2.

 Explications : On demande le membre ayant un pseudo vide et le MDP vide (   ' existe pas) ou alors le membre dont l' id _membre est 2.


----------------
Exemple 3 : 
     pseudo : 
     mdp : 'OR 1='1
     Requte : 
 Explication : on demande le membre ayant un le pseudo vide et le MDP vide (n existe pas ) ou alors 1=1 0_0

 ----------------
 Autre exemple faille xss :
     pseudo
  

*/
session_start();// creation du fichier de session
$pdo = new PDO('mysql:host=localhost;dbname=securite', 'root', '');// connection a la bdd

if (!empty($_POST)) {

   echo 'Pseudo : ' . $_POST['pseudo'] . '<br/>';
   echo 'Mot de passe : ' . $_POST['mdp'] . '<hr/>';//pour prodejet ton site tu rajoute deux lignes de cotde:
$_POST['pseudo'] = htmlentities(addslashes($_POST['pseudo']));
$_POST['mdp'] = htmlentities(addslashes($_POST['mdp']));

   echo 'apres netuyage : <br/>';
   echo 'pseudo : ' . $_POST['pseudo'] . '<br/>';
   echo 'mot de passe : ' . $_POST['mdp'] . '<hr/>';


$req = "SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' && mdp = '$_POST[mdp]'";

   echo $req . '<hr/>'; 

$resultat = $pdo -> query($req);

if($resultat -> rowCount() > 0) { // Signifie que mon utilisateur existe, que le MDP et PSEUDO correspondent .on peut le connecter !!

  $membre = $resultat -> fetch(PDO::FETCH_ASSOC);

  foreach ($membre as $indice => $valeur) {// Ce foreach permet d' enregistrer toutes les infos du menmbre en session
  	 $_SESSION[$indice] = $valeur;
  }
  echo '<div style="padding:5px;background: green; color: white">';
  echo 'Felicitation, vous etes connecte, voici vos infos de profil :';
  echo '<ul>';
  echo '<li>pseudo : ' . $membre['pseudo'] . '</li>';
  echo '<li>prenom : ' . $membre['prenom'] . '</li>';
  echo '<li>nom : ' . $membre['nom'] . '</li>';
  echo '<li>email : ' . $membre['email'] . '</li>';
  echo '</ul>';
  echo '</div>';
}
else{
	echo '<p style="background: red; color: white; padding:5px">Erreur d\'identifiants !</p>';
} 

   
}

 ?>
<html>

<h1>Connexion</h1>
    <form action="" method="post">
        <input type="text" name="pseudo" placeholder="votre pseudo"><br/>
        <input type="text" name="mdp" placeholder="votre mot de passe"/><br/>
        <input type="submit" value="connection" />
    </form>
</html>
