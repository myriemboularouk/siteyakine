
       <h1>On se presente :</h1>

<?php 
   
$table = array (
	'Nom'=>'Boularouk',
 	'Prenom'=>'Meryem',
 	'Adresse'=>'14,rue chaillon',
 	 'Codepostale'=> 92390,
 	 'ville'=> 'Villeneuve la garenne',
 	 'Email'=> 'meryem21isaac@gmx.fr',
 	 'Telephone'=> '07.55.10.21.36',
 	 'Date de naissance'=> ' (1982-12-28)'
 	 );

//ce tableau, utilisons la boucle foreach
   echo "<ul>"; 
foreach($table as $cle=>$valeur) 
    { 
    echo '<li>'.$cle.' : '.$valeur.'</li><br/>'; 
    } 

echo "</ul>";


 ?>
