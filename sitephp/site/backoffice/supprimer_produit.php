<?php
require_once('../inc/init.inc.php');
   // pas besoin de design (header, fouter, contenu) sur cette paqge car lee a seulement vocation à nous faire un traitement pius à nous rediriger vers l'affiche de tous les produits


// on veérifie quil a bien un id dans l'url et que c'est un chiffre
// on recupere les infos du produit
//on vérifie que le produit existe
// on supprime la photo si elle existe et que c'est pas default.jpg
//on supprime le produit de la bdd
//on redirige vers l'affichage des produits (gestion_produit.php)

if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){

	$resultat = $pdo -> prepare("SELECT * FROM produit WHERE id_produit= :id");
	$resultat -> bindParam(':id', $_GET['id'], pdo::PARAM_INT);
	$resultat -> execute();

    if($resultat -> rowCount() > 0){ // signifie que le produit existe
    	$produit = $resultat -> fetch(PDO::FETCH_ASSOC);
    	debug($produit);
    	//Supprime la photo du serveur :
    	$chemin_photo_a_supprimer = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . 'photo/' . $produit['photo'];
    	// On recompose le chemin ABSOLUE du fichier que l' on va supprimer.

    	if(file_exists($chemin_photo_a_supprimer) && $chemin_photo_a_supprimer != 'default.jpg'){

    		unlink($chemin_photo_a_supprimer);
    		// Unlik() permet de supprimer un fichier sur notre serveur.
    	}
        
        // supprimer le prodit de la BDD :
        $resultat = $pdo -> exec("DELETE FROM produit WHERE id_produit = $produit[id_produit]");

         if($resultat){
         	header('location:gestion_boutique.php?msg=suppr&id=' . $produit['id_produit']);
         }   



    }// fin du if $resultat -> rowCount()

} // fin du if(isset($_GET etc...

?>