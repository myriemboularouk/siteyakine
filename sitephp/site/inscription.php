<?php
require_once('inc/init.inc.php');
//Traitement pour reddiger l'utilisateur s'il est deja connecte

//Traitement pour l'inscription:
// ->Verifie si le formulaire est vide
// ->Affiche avec print_r()
// ->Controle sur les champs (pseudo & mdp)
// ->Enregistrer l'utilisateur
//     --->Pseudo disponible? /Email disponible?
//     --->Iisert
//     ---> Redirection vers la connexion
if (!empty($_POST)) {

    debug($_POST);

    // Vérification pseudo :
    $verif_pseudo = preg_match('#^([a-zA-Z0-9._-]{3,20})$#', $_POST['pseudo']); // Cette fonction me permet de mettre une règle en place pour les caractères autorisés :
        // arg 1 : REGEX - EXPRESSIONS REGULIERES
        // arg 2 : La chaîne de caractère (CC)
        // Retour : TRUE (si OK) - FALSE (si pas OK)

        if (!empty($_POST['pseudo'])) {

            if (!$verif_pseudo) { // Si verif pseudo nous retourne FALSE
                $msg .= '<div class="erreur">Veuillez renseigner un pseudo comportant entre 3 et 20 caractères et sans caractères spéciaux.</div>';
            }
        }
        else {
            $msg .= '<div class="erreur">Veuillez renseigner un pseudo.</div>';
        }

        // Vérification Mot de passe :
        $verif_pwd = preg_match('#^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$#', $_POST['mdp']); // 8 caractères min, 20 max, au moins un chiffre, au moins une MAJ.

        if (!empty($_POST['mdp'])) {

            if (!$verif_pwd) {
                $msg .= '<div class="erreur">Veuillez renseigner un mot de passe comportant au minimum 8 caractères et maximum 20 caractères, avec au moins un chiffre et une majuscule.</div>';
            }
        }
        else {
            $msg .= '<div class="erreur">Veuillez renseigner un mot de passe.</div>';
        }

        // Vérification de l'email :
        $verif_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); // Vérifie que le format de l'email est OK Retourne TRUE (si OK) - FALSE (si pas OK)

        // yakine.hamide@gmail.com
        $pos = strpos($_POST['email'], '@'); // la position de @
        $ext = substr($_POST['email'], $pos +1); // 'gmail.com'

        $ext_non_autorisees = array('wimsg.com', 'yopmail.com', 'mailinator.com', 'tafmail.com', 'mvrht.net');

        if (!empty($_POST['email'])) {

            if (!$verif_email || in_array($ext, $ext_non_autorisees)) {
                $msg .= '<div class="erreur">Veuillez saisir un email valide.</div>';
            }
        }
        else {
            $msg .= '<div class="erreur">Veuillez renseigner un email.</div>';
        }

        // A ce stade, si notre variable $msg est encore vide, cela signifie qu'il n'y a pas d'erreur au moins sur email, pseudo et MDP (Pensez à faire vérifs des autres champs).

        if (empty($msg)) { // Tout est OK !!
            // enregsitrement du nouvel utilisateur :

            // Attention, le pseudo et le mail est-il disponible ?
            $resultat = $pdo -> prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
            $resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
            $resultat -> execute();

            if ($resultat -> rowCount() > 0) { // Signifie que le pseudo est déjà utilisé.

                // Nous aurions pu lui proposé 2/3 variante de son pseudo, en ayant vérifiée qu'ils sont disponibles.

                $msg .= '<div class="erreur">Le pseudo ' . $_POST['pseudo'] . ' n\'est pas disponible, veuillez choisir un autre pseudo.</div>';
            }
            else { // OK le pseudo est disponible, on va pouvoir enregistrer le membre dans la BDD... (attention, nous devrions également vérifier la disponiblité de l'email.)

                // crypte le MDP
                $mdp = md5($_POST['mdp']); // md5 va crypter le mdp selon en hashage 64o

                // requete INSERT
                    $resultat = $pdo -> prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse, '0')");

                    $resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
                    $resultat -> bindParam(':mdp', $mdp, PDO::PARAM_STR);
                    $resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
                    $resultat -> bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
                    $resultat -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
                    $resultat -> bindParam(':civilite', $_POST['civilite'], PDO::PARAM_STR);
                    $resultat -> bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);
                    $resultat -> bindParam(':code_postal', $_POST['code_postal'], PDO::PARAM_INT);
                    $resultat -> bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);

                // redirection
                if ($resultat -> execute()) { // Si la requête est OK !
                    header('location:connexion.php');
                }
            }
        }
}

// pour maintenir les infos dans le formulaire ,encas d'erreur on doit definir une variable pour chaque champs
// if (isset($_POST['pseudo'])) {
//   $pseudo = $_POST['pseudo'];
// }
// else {
//   $pseudo = '';
// }
//on peut ecrire le if else de maniere simplifé
$pseudo = (isset($_POST['pseudo'])) ? $_POST['pseudo'] : '';
$nom = (isset($_POST['nom'])) ? $_POST['nom'] : '';
$prenom = (isset($_POST['prenom'])) ? $_POST['prenom'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$civilite = (isset($_POST['civilite'])) ? $_POST['civilite'] : '';
$adresse = (isset($_POST['adresse'])) ? $_POST['adresse'] : '';
$ville = (isset($_POST['ville'])) ? $_POST['ville'] : '';
$code_postal = (isset($_POST['code_postal'])) ? $_POST['code_postal'] : '';


require_once('inc/header.inc.php');

?>

<!--contenu html-->

<h1>Inscription</h1>
<form method="post" action="" >
	<label>Pseudo :</label>
	<input type="text" name="pseudo" value="<?= $pseudo ?> " />

	<label>Mot de passe :</label>
	<input type="text" name="mdp" />


	<label>Nom :</label>
	<input type="text" name="nom" value="<?= $nom ?>" />


	<label>Prénom :</label>
	<input type="text" name="prenom" value="<?= $prenom ?>"/>

	<label>Email :</label><br/>
	<input type="text" name="email" value="<?= $email ?>" />


	<label>civilite :</label>
	<select name="civilite">
	<option value="m">homme</option>
	<option value="f" <?= ($civilite == 'f') ? 'selected' : '' ?>>femme</option>
	</select>

	<label>ville :</label><br/>
	<input type="text" name="ville" />

	<label>Code postal :</label>
	<input type="text" name="code_postal" value="<?= $code_postal ?> "/>

	<label>Adresse :</label>
	<input type="text" name="adresse" value="<?= $adresse ?> " />

	<input type="submit" value="enregister"/>
</form>




<?php

require_once('inc/footer.inc.php');


?>