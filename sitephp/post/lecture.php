<?php 
//dans le fichier formulaire4.php , nous avons vu comment enregistrer des donnée dzns un fichier ; ici nous azllons avoir comment les recupèrer .

$fichier = file ('list.txt');//la fontion file()fait tout le travail, elle nous retourne toutes les infos de notre fichier sous forme d'array. chaque ligne de notre fichier correspond à un indice dans l'array .

echo "<pre>";
print_r($fichier);
echo "</pre>";


//afficher : 

foreach ($fichier as $indice => $value) {
	
	$position = strpos($value, '-');

	$pseudo = substr($value,0 ,$position);
	$email = substr($value, $position+1);

	echo '<h5>inscrit N°'.($indice+1).'</h5>';
	echo "pseudo : " .$pseudo.'<br/>';
	echo "email:" .$email . '<hr/>';

}


 ?>