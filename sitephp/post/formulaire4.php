
<?php

echo"<pre>";
print_r($_POST);
echo"</pre>";

$msg = '';

if(!empty($_post)){
	//on verifie que post ne soit pas vide avant de faire des traitements.

	if(empty($_post['email'])){
		$msg .= '<p style="background:red;color:white; padding :5px">veillez renseigner un email </p>';
	}

	if(empty($_post['pseudo'])){
		$msg .= '<p style="background:red;color:white; padding :5px">veillez renseigner un pseudo </p>';
	}

    echo $msg;


    if(empty($msg)) {
    	// Signifie que tout est OK!Les feux sont au vert , on peut effectuer Les traitements attendus (enregistrer dans la bdd par exemple).
    	echo '<p style="background:green;color:white; padding :5px">Felicitation vous etes enregistré ! </p>';
    	// traitement pour enregistrer les infos dans un fichier.txt

    	$F =  Fopen('Liste.txt', 'a');
       //fopen() est une fonction qui nous permet d'ouvrir un fichier. en mode 'a', si le fichier n'existe pas il va le creer automatiquement.
       //ici, $f va representer ce fichier

       Fwrite($f, $_post['pseudo'] . ' - ' . $_POST['email'] .    "\r\n");
       //  Fwrite()nous paermet dans un fichier : arg1 : le fichier, arg2 : l' infos a enregistrer.
    }
    else{
    	echo '<a href="formulaire3.php">Retour au formulaire</a>';
    }
}


echo $msg;

?>



<h1>Formulaire 4</h1>
