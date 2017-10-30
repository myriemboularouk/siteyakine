<?php

 // Fonction pour afficher les debug (print_r())

function debug($tab){
	echo '<div style="color: white; padding: 20px; font-weight: bold; background:#' . rand(111111, 999999) . '">';

	$trace = debug_backtrace(); // Retourne les infos sur l'emplace ou est executee une fonction
	echo 'Le debug a ete demande dans le fichier : ' . $trace[0]['file'] . ' à la ligne : ' . $trace[0]['line'] . '</hr>';





    echo '<pre>';
    print_r($tab);
    echo '</pre>';


    echo '</div>';

}
 // fonction pour voir si un utilisateur est connecte:
function userConnecte(){
	if(isset($_SESSION['membre'])){
		return TRUE;
	}
	else{
		return FALSE;
	}
}
 // Cette fonction nous retourne TRUE si l'utilisateur est connecte et false s'il ne l'est pas.
 // Fonction pour voir si l'utilisateur est admin:
function userAdmin(){
	if(userConnecte() && $_SESSION['membre']['statut'] == 1){
		return TRUE;
	}
	else{
		return FALSE;
	}
}
//Si l'utilisateur est connecté...et en plus si son statut c'est 1 alors il a les les droits d'admin et pourra acceder au backoffice.


// fonction pour creer un panier.
function creationPanier(){
	if(!isset($_SESSION['panier'])){

		$_SESSION['panier'] = array();
		$_SESSION['panier']['id_produit'] = array();
		$_SESSION['panier']['quantite'] = array();
		$_SESSION['panier']['prix'] = array();
		$_SESSION['panier']['titre'] = array();
		$_SESSION['panier']['photo'] = array();
// moi= regarde le shema dans le chaier bleu.

	}
}

// Fonction pour ajouter un produit au panier
function ajouterProduit($id_produit, $quantite, $photo, $titre, $prix){

	creationPanier();

	    $_SESSION['panier']['id_produit'][] = $id_produit; 
	    $_SESSION['panier']['quantite'] [] = $id_quantite;
		$_SESSION['panier']['produit'] [] = $id_produit;
		$_SESSION['panier']['prix'][] = $id_prix;
		$_SESSION['panier']['titre'][] = $id_titre;
		$_SESSION['panier']['photo'][] = $id_photo;
// le crochet vide permet de stocker la valeur au prochain indice disponible...
}

?>