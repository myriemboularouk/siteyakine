<?php
// $_GET rrepresente les parametres dans l URL.Il s' agit d' une superglobale, elle doit OBLIGATOIREMENT etre ecrite en MAJ, et? L'_' est  important.
// Comme toutes les superglobales, $_GET fait partie du langage et est un tableau de donnees ARRAY.
if( !empty($_GET)){ // S' il y a des informations dans $_GET alors je peux faire des traitements :


echo "<pre>";

print_r($_GET);
echo "</pre>";

echo 'Parametre 1 : '. $_GET['article'] . '</br>';
echo 'Parametre 2 : '. $_GET['couleur'] . '</br>';
echo 'Parametre 3 : '. $_GET['prix'] . '€</br>';

}
/*
? article=jean   &  couleur=bleau   &  prix=10
? cle=valeur   &  cle=valeur  &  cle=valeur 
*/

?>

<h1>Page 2 </h1>
<a href="page1.php"> Retoure vers la Page1</a>