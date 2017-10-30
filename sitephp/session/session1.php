<?php
session_start();
//est une fonction qui va creer un fichier de session.S'il exisite déja ,elle va simplement l'ouvrir,
$_SESSION['pseudo'] = 'yakine';

echo '<pre>';
print_r($_SESSION);
echo '</pre>';





?>