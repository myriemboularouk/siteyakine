<?php 
	 $pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION
));
// le traitement des erreurs :
//echo"<pre>";
//print_r($_POST);
//echo"</pre>";

//$msg = '';

//if(!empty($_post)){
	//on verifie que post ne soit pas vide avant de faire des traitements.

	//if(empty($_post['Title'])){
		//$msg .= '<p style="background:red;color:white; padding :5px">veillez renseigner un Title </p>';
	//}

	//if(empty($_post['Director'])){
		//$msg .= '<p style="background:red;color:white; padding :5px">veillez renseigner le nom du realisateur </p>';
	//}
    
    //if(empty($_post['producer'])){
		//$msg .= '<p style="background:red;color:white; padding :5px">veillez renseigner le nom du producteur </p>';
	//}

	 //if(empty($_post['year_of_prod'])){
		//$msg .= '<p style="background:red;color:white; padding :5px">veillez renseigner  l’année de productionla langue du film </p>';
	//}

	 //if(empty($_post['year_of_prod'])){
		//$msg .= '<p style="background:red;color:white; padding :5px">veillez renseigner l’année de production  </p>';
	//}

	 //if(empty($_post['category'])){
		//$msg .= '<p style="background:red;color:white; padding :5px">veillez renseigner la catégorie du film  </p>';
	//}

    

    //echo $msg;


    //if(empty($msg)) {
    	// Signifie que tout est OK!Les feux sont au vert , on peut effectuer Les traitements attendus (enregistrer dans la bdd par exemple).
    	//echo '<p style="background:green;color:white; padding :5px">Felicitation vous etes enregistré ! </p>';
    	// traitement pour enregistrer les infos dans un fichier.txt


 ?>
 
   <!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8">
       <title>Exercice 3</title>
   </head>
   <body>
       
   </body>
    <form method="post" action="">
    
        <fieldset>
            <legend>Informations</legend>
           
            <label for="title">Title *</label><br>
            <input type="text" name="title" value=""><br><br>

            <label for="director">Director *</label><br>
            <input type="text" name="director" value=""><br><br>

            <label for="producer">Producer*</label><br>
            <input type="text" name="producer" value=""><br><br>

           <label for="Year_of_old"></label><br>
           <select name="Year_of_old">
               <?php for($i = date("Y"); $i >= 1930; $i--)
                    {

                        if($i == $_POST['annee']){
                            $sel = 'selected';
                        }
                        else{
                            $sel ='';
                        }
                        echo '<option ' . $sel .  ' >' .  $i . '</option>';




                    } 

                       ?>
           </select><br><br>

            <label for="language">Language</label><br>
           <select name="language">
                <option value="français">Français</option>
                <option value="anglais">Anglais</option>
                <option value="espaniol">Espagnol</option>
                <option value="italien">Italien</option>
           </select><br><br>

            <label for="category">Category</label><br>
           <select name="category">
                <option value="horreur">Dessin annime</option>
                <option value="romantique">Romantique</option>
                <option value="documentaire">Documentaire</option>
                <option value="action">Action</option>
           </select><br><br>

           <label for="storyline">Storyline</label><br>
            <textarea name="storyline" cols="16"></textarea><br><br>

            <label for="actor">Actor</label><br>
            <input type="text" name="actor"><br><br>

            <input type="submit" name="envoyer" value="Envoyer">
        </fieldset>
    </form>
</html>