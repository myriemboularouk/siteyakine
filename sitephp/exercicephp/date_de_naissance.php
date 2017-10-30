<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
    </head>

<?php 
if (isset($_POST['submit'])){ /* Si je pousse sur le bouton 'submit' alors on continue... */  
    $jour = ($_POST['jour']);
    $mois = ($_POST['mois']);
    $annee = ($_POST['annee']);
 
if (empty($_POST['jour']) && empty($_POST['mois']) && empty($_POST['annee'])){
    echo "Veuillez entrer une date";
    }
}
 
?>
   
    <body>
        <form method="post" action="">
            <label for="date">Date :</label><br/>
        <select name="jour" id="jour">
<?php

         for($date_jour = 1; $date_jour <= 31; $date_jour++)
         
         {


?>
        <option value="<?php echo $date_jour ?>"><?php echo $date_jour?></option>
<?php
        }
?>
        </select>
 
         <select name="mois" id="mois">
<?php
        for($date_mois = 1; $date_mois <= 12; $date_mois++)
        {
    ?>
        <option value="<?php echo $date_mois ?>"><?php echo $date_mois ?></option>
<?php
        }
?>     
        </select>
 
         <select name="annee" id="annee">
<?php
         for($date_annee = 2017; $date_annee >= 1900; $date_annee--)
        {
   ?>
        <option value="<?php echo $date_annee ?>"><?php echo $date_annee ?></option>
<?php
        }
?>
         </select><br/><br/>


        <input type="submit" name="submit" value="Valider">


        </form>

        </body>
</html>