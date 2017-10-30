<?php
// ILl y a plusieurs manières d'effectuer des requetes Avec pdo query(), exec(), prepare(), execute() a été vu dans le fichier pdo.php.
// la methode exec() :
// en pratique il est préferable de faire troute les requêtes insert delete update et replace avec exec().
// valeurs de retours
// succès : N (INT) : nombres de lignes affectée
// echec : False
// methode prepare() puis execute() :
//La requête prepare() peut être utilise pour toute les requête (SELECT SHOW INSERT DELETE UPDATE REPLACE)
// on utilise la requête preparare() lorsque l'on a des données sensibles à l'intéreir de notre requete (données sensibles : $_POST $_GET). on prepare la requete puis on l'execute().
// les valeurs d retours:
// prepare():
    // Succes : PDOStatement
    //  echec  PDOStatement
// execute():
    // Succes : True
    //  echec : False

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION
));

try {



    //ERREUR volantaire de requete :
    // $resultat = $pdo -> exec("gfjjgghjgjgjghhh");

    // 1  // INSERT avec exec()
    $resultat = $pdo -> exec("INSERT INTO employes (prenom, nom, sevice, sexe, salaire, date_embauche) VALUES ('toto', 'tata', 'informatique','m', 1500, CURDATE())");

    echo 'Nombre de ligne affecte : ' . $resultat . '<br/>';
    echo 'Dernier enregistrement : ' . $pdo -> lastInsertId();


    // 2 // prepare() + excute() + passage d'argument
    // 2.1 : Marqueur '?'

    $prenom ='Amandine'; //donnes sencible.
    $resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = ?");
    $resltat -> execute(array($prenom));

    $nom ='Thoyer';

    $resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = ? AND nom = ?");
    $resultat -> execute(array($prenom,$nom));

    // le marqueur '?', dit marqueur non nominatif, permet de transmetre les valeurs sensible lors de l'execution d'une requete preparee.
    //Attention la methode execute() appartient a notre objet PDOStatement ($e)  
    // Le marquer ':' dit marqueur nominatif, donne un "nom" a chaque valeur sensible.


}
catch (PDOException $e) {

    echo '<div style= "padding: 10px; background: red; color:black; font-weight: bold">';
    echo '<p>Erreur sql : </p>';
    echo '<p>code : ' . $e -> getcode() . '</p>';
    echo '<p>Message : ' . $e -> getMessage() . '</p>';
    echo '<p>Fichier : ' . $e -> getFile() . '</p>';
    echo '<p>Line : ' . $e -> getLine() . '</p>';
    echo '</div>';


    $f = fopen('error_log.txt', 'a');
    $erreur = $e -> getTrace();
    fwrite($f, date('d/m/Y') . ' - ' . $erreur[0] ['file'] . ' - ' . $erreur[0] ['args'] [0] . "\r\n");

    // exit;

}





 ?>