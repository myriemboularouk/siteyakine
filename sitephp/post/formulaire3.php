<!--  1 : Dans formulaire 3 : creer un formulaire avec :
  -> pseudo (input)
  ->Adresse email (input)
  ->submit

2 : Dans formulaire 4 : recuperer les informations du formulaire 3 (action=''), et les afficher avec un print_r.

3 : Verifier que les champs ne soit pas vides .si les champs sont vides mettre un message d'erreur dans $msg -->


<h1>Formulaire 3</h1>
 <form method ="post" action="formulaire4.php">
   <label>	Pseudo :</label></form></br>
   <input type="text" name="pseudo" /><br/><br/>

   <label>	Adresse email :</label></form></br>
   <input type="text" name="adresse email" /><br/><br/>

   <input type="submit" value="valider" />








</form>
