<?php

if (isset($_GET['lang'])) {//Cela signifie que l'utilisateur vient a l' instant de cliquer sur un des liens pour choisir une langue.
	$langue = $_GET['lang'];
}
elseif (isset($_COOKIE['lang'])) {//cela signifie que l'utilisateur ete deja venu, et j'avais deja enregistre son choix dans un cookie.
	
	$langue = $_COOKIE['lang'];
}

else{// Je n'ai ni cookies, ni get precisant la langue, il est possible que l'utilisateur vienne pour la premiere fois et que la langue par defaut lui convienne tres bien.
    $langue = 'dz';
}



$an = 365 * 24 * 60 * 60;

setCookie('lang', $langue, time() + $an); //SetCookie() nous permet de creer un cookie,La fonction attend 3 arguments :

/*
1: le nom du cookie.
2: la valeur du cookie.
3: la date d expiration(timestamp).
*/
switch ($langue) {
	case 'dz':
		echo 'salam Alikoum';
		break;

	case 'fr':
		echo 'bnjour, bienvenue !';
		break;

	case 'es':
		echo 'hola, bienvenido !';
		break;

	case 'en':
		echo 'salam Alikoum';
		break;

	case 'it':
		echo 'salam Alikoum';
		break;
	
	default:
		echo 'Veuillez choisir une langue dans la liste presente !';
		break;
}
?>

<html>	
<ul>
	<li><a href="?lang=dz">Algerie</a></li>
	<li><a href="?lang=fr">France</a></li>
	<li><a href="?lang=it">Italie</a></li>
	<li><a href="?lang=an">Angleterre</a></li>
	<li><a href="?lang=es">Espaniol</a></li>
</ul><hr/>
</html>