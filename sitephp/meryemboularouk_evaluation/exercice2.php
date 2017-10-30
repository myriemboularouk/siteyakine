

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>convert1</title>
    <meta name="description" content="">
  </head>
     <body>

   <?php

    if(isset($_POST['validate'])) {
 
         $valeur = ['valeur'];
 

    echo $valeur;
 } 

   ?>

      <h3>convertisseur de dollar en euros</h3>

    <form action="convert.php" method="POST" name="form1">    
         <input type="text" name="valeur" id="valeur">
         <input type="submit" name="validate" value="Envoyer">
    </form>

     </body>
</html>