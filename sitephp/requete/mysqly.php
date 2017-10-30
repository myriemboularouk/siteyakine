<?php
$mysqli = new mysqli('localhost','root','','entreprise');

echo '<pre>';
//var_dump($mysqli);
echo '</pre>';

/*
$mysqli represente un objet de la class Mysqli. on parle d' intance de la classe Mysqli. Ce que l' on vient de faire c' est une instanciation.

l' instance de Mysqli necessite 4 arguments :
  1/ serveur de BDD
  2/ login
  3/ MDP
  4/ Nom de la BDD

 la methode (fonction) query : la methode query() de l objet $mysqli permet d'effectuer des requete aupres de la base de donnes est comme une clee.
    arg : la formulation de notre requete (STR)

    Valeurs de retour :

         ->SELECT - SHOW :
            Succes : Mysqli_result (obj)
            Echec : Flse (BOOL)

         ->UPDATE -INSERT - REPLACE - DELATE :
           Succes : TRUE (BOOL)
           Echec : FALSE (bool)

*/
  

 // 0 : Erreur volantaire de requete:
    $mysqli -> query("qsfgsdghdfhhgh");
    //les erreur SQL ne sont pas affichees par default.
    //echo $mysqli -> query error; //permet d afficher les erreurs SQL.       
 

 // 1 : Requete INSERT (UPDATE, DELETE,REPLACE)
    $mysqli -> query("INSERT INTO employes(prenom, nom, sex, salaire, service, date_embauche) VALUUE('toto', 'tata', 'm', 1200, 'informatique', CURDATE())");


 // 2 :requete SELECT (plusieur resultat)

 $resultat = $mysqli -> query("SELECT * FROM employes WHERE id_employes = 780");
 // une requete nous retourne un (ou plusieurs) resultat(s), il faut donc stocker le resultat de la requete.

echo '<pre>';
print_r($resultat);
echo '</pre>';
// le resultat de notre requete est un objet de la classe Mysqli_result.
// En l'etat $resultat est INEXPLOITABLE!!!!! comme sa.

$employe = $resultat -> fetch_assoc();

echo '<pre>';
print_r($employe);
echo '</pre>';

echo 'prenom : ' . $employe['prenom'];
// La methode ou (la fonction) fetch_assoc() de l' objet $resultat (Mysqli_result) nous permet de creer un array ou les indices sont les noms des champls dans la table. on parle d'indexation associative.
// fech_row : indexation numerique
// fech_array : 



 // 3 : Requete SELECT (plusieurs resultat)

$resultat = $mysqli -> query("SELECT * FROM employes");
//$resultat est un objet de Mysqli_resultat.
// INEXPLOITABLE en l 'etat'

while($employes = $resultat -> fetch_assoc()){// on rajoute une boocle while por q il nous donne tout les employes 

echo '<pre>';
print_r($employes);
echo '</pre>';

}
// Fetch_assoc() nous fait un array PAR ENREGISTREMENT, et non un array avec tous les enregistrements. Je suis donc OBLIGE DE LE FAIRE DANS 
// UNE BOUCLE lorsque ma requete me retourne plusieurs resultats!!
// La boucle WHILE se comporte comme un curseur qui parcourt chaque enregistrement, pendant que fetch_assoc, les indexe....

// Un seul resultat : PAS DE BOUCLE !!

// Plusieurs resultats : UNE BOUCLE !!

// Si normalement un seul resultat, mais potentiellement plusieurs resultats : UNE BOUCLE.


 // 4 : Dupliquer une table SQL en tableau HTML        

$resultat = $mysqli -> query("SELECT * FROM employes");

// $resultat ==> OBJ Mysqli_resultat ==> INEXPLOITABLE

    echo '<table border = "1">';

    echo '<tr>';

while ($colonnes = $resultat -> fetch_field()) {
	// var_dump($colonnes);

	echo '<th>'. $colonnes -> name.'</th>';

}

echo '</tr>';

while($ligne = $resultat -> fetch_assoc()){

	echo '<tr>';

   foreach ($ligne as $valeur => $value) {

	   echo '<td>' . $valeur . '</td>';

	}

    echo '</tr>';
}
    echo '</table>';



?>