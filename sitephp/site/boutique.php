<?php

require('inc/init.inc.php');

// Pour rendre cette page dynamique:

  // 1 On recupere toute les categorie existante dans la boutique
  // 2 On les affiche dans le "mini-menu lateral".
  // 3 On creer un lien pour chacune des categorie.
  // 4 On recupere les produits, soit en fonction de la categorie dans l'url soit tous les produits.
  // 5 On affiche les produits dynamique.
  // 6 On creer le lien pour chaque produit. 




//Traitement pour recupere toute les categories:
$resultat = $pdo -> query("SELECT DISTINCT categorie FROM produit");
$categories = $resultat -> fetchAll(PDO::FETCH_ASSOC);
//debug($categories);


// Traitement pour recuperer tous les produits :
if(isset($_GET['cat']) && !empty($_GET['cat']) && is_string($_GET['cat']) ){
	// Soit une categorie est dans L'URL....
   $resultat = $pdo -> prepare("SELECT * FROM produit WHERE categorie = :categorie");
   $resultat -> bindParam(':categorie', $_GET['cat'], PDO::PARAM_STR);
   $resultat -> execute();

   if($resultat -> rowCount() == 0){ // Si la categorie retourne aucun produit, alors on change la requete.

   	$resultat = $pdo ->query("SELECT * FROM produit");

   }


}
else{
	// Soit il n'ya pas de categorie dans l'URL (ou categorie non valide)
	$resultat = $pdo -> query("SELECT * FROM produit");
}

// On sort forcement de cette condition avec $resultat qui soit les resultats d'une requete ciblee par produit, soit tous les produits...
$produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);
//debug($produits);




$page = 'Boutique';
require('inc/header.inc.php');
?>
</h1>Boutique</h1>

<div class="boutique-gauche">
	<ul>
		<?php for($i = 0; $i < count($categories) ; $i ++) : ?>
		<li><a href="?cat=<?= $categories[$i]['categorie'] ?>"><?= $categories[$i]['categorie'] ?></a></li>	
		<?php endfor; ?>
		<!-- La boucle ci -dessus parcourt tous les resultats de la requete SELECT DISTINCT CATEGORIE FROM PRODUIT. le resultat un tableau multidimentionnel dans laquel à chaque indice (0,1,2, etc) on recupere un array, avec la categorie a l'indice 'categorie'. Donc $categorie---->
		
	</ul>
</div>

<div class="boutique-droite">

<?php foreach($produits as $pdt) : ?>
	
	<!-- Debut vignette produit -->
	<div class="boutique-produit">
		<h3><?= $pdt['titre'] ?></h3>
		<a href="fiche_produit.php?id=<?= $pdt['id_produit'] ?>"><img src="<?= RACINE_SITE ?>photo/<?= $pdt['photo'] ?>" height="100"/></a>
		<p style="font-weight: bold; font-size: 20px;"><?= $pdt['prix'] ?>€</p>

		<p style="height: 40px">Description du produit sur 40 caracteres...</p>
		<a href="fiche_produit.php?id=<?= $pdt['id_produit'] ?>" style="padding:5px 15px; background: red; color:white; text-align: center; border: 2px solid black; border-radius: 3px" >Voir la fiche</a>
		<!-- href="fiche_produit.php?id=id_du_produit" -->
	</div>
	<!-- Fin vignette produit -->
	
<?php endforeach;  ?>


	

	
	
</div>

<?php
require('inc/footer.inc.php');
?>