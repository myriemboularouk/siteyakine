<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";
if (!empty($_POST)) {
	
}

?>
      <h1>Formulaire php</h1>

 <form method="post" action="">
      <label>Nom :</label></br>
      <input type="text" name="nom" /><br/><br/>

      <label>Prenom :</label></br>
      <input type="text" name="prenom" /><br/><br/>

      <label>Adresse :</label></br>
      <input type="text" name="adresse" /><br/><br/>

      <label>Ville :</label></br>
      <input type="text" name="ville" /><br/><br/>

      <label>Code Postal :</label></br>
      <input type="text" name="code postal" /><br/><br/>

      <label>Sexe : </label><br/>
        <select name="sexe">
        <option >Homme</option>
        <option >Femme</option>   
        </select><br><br/>


      <label>Description :</label></br>
      <textarea rows="5" cols="22" name="description"></textarea><br/><br/>

      <input type="submit" value="envoi" />

</form>