<?php

session_start();// Si un fichier de session existe et est lie a notre navigateur via le cookie(PHPSESSION), alors il est ouvert, et les information a l interieur sont accessible via la superglobale $_

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
// le print r affiche un array avec la valeur yakine pourtant il a ete ouvert avec session 1 et il n'ont rien a voir l'un et l'autre et pourtant grace au fichier de session se travant dans le dossier tmp seesion2.php a accàs aux informations de session grâcea seesion_start()



?>