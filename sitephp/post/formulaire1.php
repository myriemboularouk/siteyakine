<?php

//$_POST represente les informations postees via un formulaire(method='post'). C'est une superglobale, et comme toute les superglobales , C'est un tableau de donne ARRAY .
// attention chaque champs doit avoire un attribut name qui permet de creer l indice (cle)dans notre ARRAY $_post

echo"<pre>";
print_r($_POST);
echo"</pre>";


?>
prenom (input text)
description (textarea)

<h1>Formulaire 1	</h1>
 <form method ="post" action="">
   <label>	Prenom :</label></br>
   <input type="text" name="prenom" /><br/><br/>

   <label>	Description :</label></br>
   <textarea rows="5" cols="22" name="description"></textarea><br/><br/>

   <input type="submit" value="valider" />








</form>