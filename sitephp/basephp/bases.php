<h2>Ecrire et affichage</h2>
<!-- premiere chose : on constate q on peut ecrire de l html dans un fichier php (l inverse n est pas possible)-->
<?php 
 echo'<br/>';// nous pouvons egalement  generer l affichage d html grace a echo.
 echo "<h2>les commentaires</h2>";
 echo'texte';/*Ceci est un commentaire sur une lignes...*/
 echo'<h2>Variables : Types, declaration ,et affectation :</h2>';
 $a = 127;//Affectation de la valeur 127 dans la variable a.
 echo gettype($a);// entier(INTEGER)
 $b = 1.5;
 echo gettype($b);// Chiffre a virgule (DOUBLE)
 $c = 'chaine de caracteres'; // Chaine de caractere (string)
 echo gettype($c); //string de caractere string
 $d = TRUE;
 echo gettype ($d); //Boleen (BOULEAN)
 //$ma-super-variable; // le '-'est utiliser pour la soustraction
 $ma_super_variable = 1; // ok !snake_case
 $maSuperVariable = 1; // ok ! camelCase
 $MaSuperVariable = 1; //ok !StreadyCase // PascaleCase
 //$prenom = 'meryem'; // pas d action dans les noms de variable 
 $prenom = 'Meryem'; // OK !
 $prenom1 = 'khalida'; // ok!
 //$2prenom = 'Adel'; // Erreur : les noms de variable ne peuvent pas commencer par un chiffre .
 echo '<h2> La concatenation </h2>';
 $x = 'bonjour';
 $y = 'tout le monde !';
 echo $x . $y . '<br/>';// on peut tradiure le '.'par 'suivi de';
 echo "$x $y <br/>"; // meme chose sans concatenation 
 echo 'hey !' . $x . $y .'<br/>';
 echo 'hey ! ' , $x , $y , '<br/>'; // La concatenation existe egalement avec ',' mais tres peu utilisee 
 echo '<h2> Concatenation Lors de l \'affectation</h2>';
 $prenom1 = 'Bruno';// Affectation de la valeur Bruno.
 $prenom1 = 'claire'; // Affectation de la valeur Claire qui remplace  Bruno.
 
 
 $prenom1 = 'nicola';// Affectation de la valeur nicola.
 $prenom1 = 'marie'; // Affectation de la valeur marie ,cela ajoute la valeur marie 
 
 echo $prenom1;
 
 echo '<h2>Guillemets et quotes</h2>';
 
 $jour = "Aujourd'hui";
 $jour = 'Aujourd\'hui';// Attention, entre quote, les apostrophes peuvent faire echapper la chiane de caracteres 
 
 $txt ='bonjour';
 
 echo $txt . 'Tout le monde !<br/>';
 echo $txt . "Tout le monde !<br/>";
 
 echo "$txt tout le monde !<br/>";
 echo '$txt tout le monde !<br/>';//entre quote, les variable ne sont pas evaluees ,mais simplement considerer comme des chaine de caracteres .
 
 echo '<h2> Constantes et constantes magiques </h2>';// Une constante,tout comme une variable , permet de conserver (stoker) une valeur.la difference se situe dans le fait qu' on ne puisse pas modifier la valeur d' une constante .Elle est ...CONSTANTE !
  define('CAPITALE','paris');
  echo CAPITALE . '<br/>';
  /*
  define() est la fonction qui nous permet de creer une constante.Elle attend deux arguments:
  1 : Le nom de la constante 
  2 : la valeur stockee
  */
  // Les constantes magiques :
  echo __DIR__ . '<br/>';
  echo __FILE__ . '<br/>';
  echo __LINE__ . '<br/>';
  
  //__FUNCTION__ , __CLASS__, __METHOD__
  
    
  // exercice :
  
    //1 :Afficher 'Bonjour Meryem Boularouk' en rouge !
  
  $prenom = 'Meryem';
  $nom = 'Boularouk';
  echo '<p style="color:red"; bonjour>' . $prenom .' ' .$nom .'<p/></br>';
  
  //2 :Afficher : 'bleu - banc - rouge' ,en utilisant 3 variables (une pour chaque couleur) et la concatenation.
  $couleur1 = 'bleu';
  $couleur2 = 'blanc';
  $couleur3 = 'rouge';
  
  echo $couleur1 . ' - ' . $couleur2 . ' - ' . $couleur3 . '<br/>';
  
  $couleur1 = 'bleu';
  $couleur2 = 'blanc';
  $couleur3 = 'rouge';
  
  echo  '<span style="background:blue">' .  $couleur1.' - '.
	      '</span>'. '<span style="background:white">' .  $couleur2.' - '.
	      '</span>'.'<span style="background:red">' .  $couleur3.'</span>';
  
  echo '<h2>Operateurs Arithmetiques : </h2>';
  
  $a = 10;
  $b = 2;
  
  
  // $cc = "10";//Chaine de caractere.
  // $chiffre1 = (int) $cc; // INTEGER 10
  // 
  // $chiffre1 = 125;
  // $mot = (string) $chiffre2; //'125'.
  // 
  // $prenom = 'Meryem';
  // $nombre = (int) $prenom;
  // echo
  
  echo $a + $b; //Affiche 12;
  $c = $a + $b;
  echo $c;
  
  echo $a - $b; //Affiche 8;
  echo $a * $b; //Affiche 20;
  echo $a / $b; //Affiche 5;
  echo $a % $b; //Affiche 0;
  
  //Operation et affectation :
  
  $a = 10;
  $b = 2;

  $a += $b; // $a = $a + $b //a : 12;
  $a -= $b; // a : 10;
  $a *= $b; // a : 20;
  $a /= $b; // a : 10;
  
  
    
  echo'<h2>Structures conditionnelles : </h2>';
  // empty() : teste si c'est vide, false, ou egale a 0 .
  // isset() : test si quelque chose existe. 
  
  $var1 = 0; //false.
  $var2 = 'mon prenom';
  $var3 = '';
    //if (/*condition a tester */){
   //instructions a executer 0 = false en informatique
    
   //if, else, elseif
   $a = 10;
   $a = 5;
   $a = 2;
   
   if($a > $b) { // si a est superieur a B
     echo 'Oui A est superieur a B <br/>';
     
   }
  else{// Sinon (A est inferieur ou egal a B)
    echo 'non A n\'est superieur a B <br/>';
  }
  if($a > $b && $b > $c) { // Si A est sup a B et que dans le meme temps B est sup a C 
     echo 'OK pour les deux conditions<br/>';
    
  }
  // true && true ===> true 
  // true && false ===> false 
  // false && true ===> false 
  //false && false ===> false 
  
  
  if($a == 9 || $b > $c) { //si A condient la valeur 9 OU que B est sup a C 
       echo 'ok pour au moins une des deux conditions <br/>';
    
  }
  
  // true || true ===> true
  // true || false ===> true
  // false || true ===> true
  // false || false ===> false 
  
  if($a == 10 xor $b == 6) { //Si A contient la valeur 10 ou SOIT B contient la valeur 6 (condition exclusive )
      echo 'OK pour seulement l\' une des deux conditions';
    
  }
  // true XOR true ===> false
  // true XOR false ===> true
  // false XOR true ===> true
  // false XOR false ===> false 
  $a = 10;
  if($a == 8){
      echo 'A contient la valeur 8<br/>';
  }
  elseif($a != 10){
      echo 'A est different de 10 <br/>';
  }
  else{
    echo 'A contient la valeur 10<br/>';
  }
  
  // =  --> affectation 
  // == --> Comparaison 
  // === --> Stricte Comparaison
  echo '<h2> Condition SWITCH :</h2>';
  $couleur = 'bleu';
  
  switch ($couleur) {
    case 'bleu':
      echo 'Vous aimez le bleu</h2>';
      break;
      case 'rouge':
        echo 'Vous aimez le rouge</h2>';
        break;
        case 'vert':
          echo 'Vous aimez le vert</h2>';
          break;
    
    default:
      echo 'Vous n\'aimez ni le bleu,ni le rouge,ni le vert </h2>';
      break;
  }
  echo '<h2> exercice:</h2>';
  //Exercice : Faire la meme chose mais avec un if, elseif(), else..
  
  $couleur = 'bleu';
  if($couleur == 'bleu'){
      echo 'Vous aimez le bleu</h2>';
  }
  elseif($couleur == 'rouge'){
      echo 'Vous aimez le rouge</h2>';
  }
  elseif($couleur == 'vert'){
      echo 'Vous aimez le vert</h2>';
  }
  else{
    echo 'Vous n\'aimez ni le bleu,ni le rouge,ni le vert </h2>';
  }
  
  echo '<h2> Fonctions predefinies</h2>';
  //les fonctions predefinies existent dans le langage et permettent d' effectuer des traitements specifique .il en existe plusieurs centaines...Doc officielle PHP :php.net 
  
  echo date('d/m/y H:i:s'); // Date() nous permet de recuperer la date du jour,et attend en argument (STRING) le format pour recuperer la date.
  
  echo '<h2>Fonctions predefinies sur les chaines de caracteres</h2>';
  
  $email = 'yakine.hamida@evogue.fr';
  
  echo strpos($email, '@'); // strops() (string position) nous retourne l emplacement d un caractere dans une CC.
  /*
  2-arguments:
      1 : la cc sur laquelle on travaille.
      2 : le ou les caractere(s) cherches.
  Valeurs de retour :
       Succes : N (INT)
        Echec : False (BOOL)  
        */
   $phrase = 'Il fait pas beau aujourd\'hui';
   
    echo strlen(utf8_decode($phrase)); // strlen() (string length) nous retourne le nombre de caracteres dans une cc.
    //plus precisement cela compte la ressource en nombre d' octets.utf8_decode() 1 caractere = 1 octet
    /*
       1 argument : la cc en question 
       Valeurs de retour :
       Succes : N (INT)
       Echec : False (Bool)
    */
      $texte = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
      echo substr($texte, 0, 40) .'...<a href="">lire la suite </a>'; // substr() (sub string) nous retourne une partie d une CC.
      /*
      3 arguments :
      1 : la cc
      2 :le point de depart.
      3 : le nombre de caracteres (optionnel)
      
      Valeurs de retour : 
        Succes : xxxxxxx (STR)
        Echec : False (Bool)*/
    echo '<h2> Les fonctions utilisateurs :</h2>';
    //les fonctions utilisateurs nous permettent d' effectuer des traitements qui ne sont pas predefinies dans le langage .Elle sont d' abord declarees puis executees .
    // 1/Fonction pour afficher'bonjour' :
    //Declaration :
    function bonjour() {
        // traittement/instruction...
        echo 'bonjour !';
    }
    //Execution :
    bonjour();
    // 2/ Fonction pour afficher 'bonjour hadi' :
    // Declaration :
    function bonjourPrenom($arg){
       echo 'bonjour '. $arg .' !<br> ';
    }
     
    // Execution :
    bonjourPrenom('Meryem');
    bonjourPrenom('Yakine');
    bonjourPrenom('Barbara');
    bonjourPrenom('Corine');
    
    $prenom = 'sara';
    bonjourPrenom($prenom);
    
    // 3 : Fonction pour afficher un titre H2 :
    
    // Declaration : 
    function titre($arg) {
      echo '<h2>' . $arg . '</h2>';
    }
    // 4 : Fonction pour appliquer la TVA a un prix HT :
    // Declaration :
    
    function appliqueTva($prixHt) {
      return $prixHt * 1.2;
      
    }
    // Execution :
    $montantHt = 164;
    echo 'Le montant de votre commande hors taxes ,'.
    $montantHt . '€HT revient à '. appliqueTva($montantHt).
    '€TTC !<br/>';
    echo "le montant de votre commande hors taxes,$montantHt €HT revient à $montantTTC !<br/>";
    
    //exercice :
     
    // Creer une fonction applique TVA 2 ,qui va nous retourne un prix TTC, converti soit avec taux de 20% (1.2) soit 10% (1.1) soit 5.5% (1.055).
    // ------> Une fonction peut recevoire un argument ou plus ..
    
    // Declaration :
    
    function appliqueTva2($prix, $taux = 1.2) {
      
       return $prix * $prix ;
      
    }
    $montantHt = 187;
    $tva = 1.055;
    
    echo appliqueTva2($montantHt);
    
    titre("Inclusions de fichier");
    
    // Les inclusions permettent d' inclure des fichiers .Exemple: On peut inclure des parties communes d' un site (compartiment_site), on peut  egalement inclure du code PHP.
    // include () : S'il y a une erreur sur le fichier inclus, cela affiche les erreurs , et continue le script.
    
    // require () : S'il y a une erreur sur le fichier inclus, cela affiche les erreurs, et stoppe l'execution du script.
    
    // include_once () : Meme include(), mais si le fichier est inclus plusieurs fois, il ne l affichera q 'une seule fois. 
    
    // require_once () : Meme require(), mais si le fichier est inclus plusieurs fois, il ne l affichera q 'une seule fois.
    
    
    titre('Structure Iterative :Les boucles');
     //While:
    
    $i = 0;
    while ($i < 3) {
      // traitements a effectuer
      echo $i . '---';
      $i ++;
      
    }
    echo '<br/>';  
    // Exercice : Faire la méme chose qui affiche : 0---1---2
    $i = 0;
    while ($i < 3) { // $i = 0 // $i = 1 // $i = 2
      
          echo $i ;
          
     if($i < 2 ) { // $i = 0 // $i = 1
          echo '---';
     }
    $i ++;  
  }    
  echo "<br/>";  
  // Exercice 1 : Afficher de 0 à 9 grace à boucle for (0123456789)
   
  // Exercice 2 : Afficher de 0 à 9 dans un tableau 
  
  // echo '<table border="1">';
  // echo '<tr>';
  // echo '<td>0</td>';
  // echo '<td>1</td>';
  // echo '<td>2</td>';
  // echo '<td>3</td>';
  // echo '<td>4</td>';
  // echo '<td>5</td>';
  // echo '<td>6</td>';
  // echo '<td>7</td>';
  // echo '<td>8</td>';
  // echo '<td>9</td>';
  // echo '</tr>';
  // echo '</table>';
  //  
   
  for($i = 0; $i < 10; $i++) {
      echo $i ;
  }
    
echo "<br/>";

echo "<table border='1'>";
echo "<tr>";
for ($i=0; $i <10 ; $i++) { 
	echo "<td>".$i."</td>";
}
echo "<tr>";
echo "<table >";

//Exercice 3 : Afficher un tableau avec 10 lignes allant de 0 à 99 (chaque ligne 0-9 // 10-19...90 à 99)

echo"<table border='1'>";
    for ($x=0; $x <= 99; $x++){
        if($x%10 ==0) {
            echo "</tr><tr>";
        }
        echo "<td>" . $x . "</td>" ;
    }
echo"</table>";


echo "<br/>";
echo "<table border='1'>";
echo "<tr>";
for ($i=0; $i <10 ; $i++) { 
	echo "<td>".$i."</td>";
}
echo "<table >";
echo "<tr>";
for ($i=11; $i <10 ; $i++) { 
	echo "<td>".$i."</td>";
}

titre('Tableaux de donnees ARRAY');
// un tableau de donnees array , est declare un peu comme une variable amelioree , car on ne conserve pas qu'une seule valeur mais plusieurs .les valeurs seront classees....

$Liste = array('Yakine', 'Hadi', 'Meryem', 'Corine', 'Pascal');

//echo $Liste; // ERREUR : On ne pas faire un echo sur un array.

echo '<pre>';
print_r($Liste);
echo '</pre>';



titre('Les boucles forach pour les ARRAY');
// Les boucles foreach sont un moyen simple de passer en revue un tableau de donnees ARRAY. 
//foreach fonctionne UNIQUEMENT avec les arrays (et les objets )

$tab[] = "Algerie";
$tab[] = "France";
$tab[] = "Espagne";
$tab[] = "Portugal";
$tab[] = "Angletaire";

echo '<pre>';
print_r($tab);
echo '</pre>';

echo $tab[2];
$tab[4] = "suisse";
$tab[] = "Allemagne";

echo '<pre>';
print_r($tab);
echo '</pre>';

 echo 'Boucle foreach :<br/>';
 foreach($tab as $valeur){// le foreach se comporte comme un curseur qui va parcourir tous les elements d'un array.Le mot AS  fait partie du langage et est OBLIGATOIRE.$valeur va contenir a chaque tour de boucle la valeurs trouvee dans l array.
   
   echo $valeur . '<br/>';
 }
 foreach($tab as $indice => $valeur) {// Sil y a deux variables ($indice =>$valeur) dans les parametres de la boucle foreach, le premier parcourt les indices et le second parcourt les valeurs
   echo 'A l\'indice : '. $indice .' se trouve la valeur : '. $valeur . '<br/>';
      
 }
 //Creation d' un array avec indices choisis :
 $couleur = array(
   "couleur1" => 'jaune',
   "couleur2" => 'rouge',
   "couleur3" => 'Vert'
 );
 
 echo '<pre>';
 print_r($couleur);
 echo '</pre>';
 
 titre('Tableau multimdimentionnel');
 $tab_multi = array(
   0 => array(
     'prenom'=> 'hadi',
     'nom'=> 'smail',
     
   ),
   1 => array(
     'prenom'=> 'meryem',
     'nom'=> 'boularouk',
   )
 );
 echo '<pre>';
 print_r($tab_multi);
 echo '</pre>';


 //exercice du tableau avec d autre solutions:
 // Modulo : 
 echo '<br/>';
 echo '<tableau border='1'>';
 echo '<tr>';
 for($i = 0 ; $i <= 99; $i++){
     
     if($i%10 == 0){
         echo '</tr><tr>';
     }
     
 }







  

    
      
    
    
    
    
        
    
    
    
    
    
    
       
           
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

  
 
 
 
 
 
 








 ?>