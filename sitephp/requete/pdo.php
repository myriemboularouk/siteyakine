<?php
 //PDO : php DATA objet 
$pdo = new PDO ('mysql:host=localhost;dbname=entreprise','root', '', array(
	 /*PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING*/
	));

/*
$pdo represente un objet de la classe PDO .il "contient"notre connexion a la base de donnees.
La classe PDO contient plusieurs methodes (fonctions) pour effectuer des requetes aupres de notre BDD.Dans ce fichier nous allons voir la methode QUERY(). Et exec(), prepare() et execute() seront vues dans le fichier pdo_avance.php

Query() :
Valeurs de retour : 
     ->SELECT -SHOW :
          -Succes :TRUE (bool)
          -Echec :False (bool)
 */
 
 // 0 :ERREUR volantaire de reqete:
//$pdo -> query("wcwcwhbbbhbjhb,b,nb");
 // par default, les erreurs SQL ne s'affiche pas. pour les afficher on ajoute le mode d'erreur WARNING au moment de la connexion a la BDD.Ceci est une option de PDO.         

 // 1 :DLETE

 $pdo -> query("DELETE FROM employes WHERE prenom = 'toto");
          
 //2 :SELECT (un seul resultat)

 $resultat = $pdo -> query("SELECT * FROM employes WHERE id_employes = 780");

 var_dump($resultat);
 //$resultat est un objet issu de la classe PDOStatement, INEXPLOITABLE en l'etat.

 $employe = $resultat -> fetch(PDO::FETCH_ASSOC);

 echo '<pre>';
 print_r($employe);
 echo '</pre>';   

 echo 'prenom : ' . $employe['prenom']; 

// $resultat, notre objet PDOStatement Inexploitable,contient une fonction fetch() qui retourne les resulats de la requete sous forme d' un array.

// la fonction (methode) fetch() prend plusieurs arguments possibles:
   // - PDO::FETCH_ASSOC : indexation assosiative (les nom champs deviennent les indices dans notre array)

  // - PDO::FETCH_NUM : indexation numerique (les indices sont chiffres de 0 à N)

  // - PDO::FETCH_OBJ : indexation sous forme d' objet (les noms des champs deviennent les proprietes de l' objet)

  // - 0 argument : indexation NUM et ASSOC par default,mais cela est reglable dans les options PDO.

// 3 : SELECT (plusieurs resultats)

 $resultet = $pdo -> query("SELECT * FROM employes");
 echo '<br/>'Nombre d\'employes : ' . $resultat -> rowCount()
.'<br/>'; // rowCount() nous retourne le nombre de resultats de notre requete.
 // $resultat ==> PDOStatement ==> INEXPLOITABLE

 // la requete nous retourne plusieurs resultats donc on fait le fetch()

while($employes = $resultat -> fetch(PDO::FETCH_ASSOC)){
echo '<pre>';
print_r($employes);
 echo '<pre>';
 }

//3.2 SELECT (plusieurs resultats + fecthAll())

$resultat = $pdo  -> query("SELECT * FROM employes");

// $resultat ==> OBJ PDOstatement ==> inexploitable  (est 
//inexploitable dans l'état).

$employes = $resultat -> fecthAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($employes);
echo '</pre>';

// fecthAll() est pratique car permet de recuperer directement un tableau multidimentionnel contenant tout les resultats de la requete .Cela evite de faire un fectch() dans une boucle.

// fecthAll() reçoit les meme arguments que fectch() ==> PDO::FETCH_ASSOC /PDO::_FETCH_NUM / PDO::FETCH_OBJ / 0 argument.

// 4: Dupliquer une table SQL en tableau HTML

$resultat = $pdo -> query("SELECT * FROM employes");
$employes = $resultat -> fecthAll(PDO::FETCH_ASSOC);
echo 'Nombre de resultats : '
.$resultat -> rowCount() .'<br/><hr/>';


echo '<table border="1">';
echo '<tr>'; // ligne des titres


for ($i=0; $i < $resultat -> columnCount(); $i++) { 
 	$colonne = $resultat -> getColumnMeta($i);
 	echo '<th>'. $colonne['name'] . '</th>';
 } 


echo '</tr>'; // fin ligne des titres 

foreach ($employes as $valeur) { // parcourt tous les enregistrements
	
	echo '<tr>'; // ligne pour chaque enregistrement
	 foreach ($valeur as $valeur2) { // parcourt toutes les infos de chaque enregistrement

	 	echo '<td>' . $valeur2. '</td>';
	 }
	echo '</tr>';
}
echo '</table>';

?>