<!Doctype html>
<html>
    <head>
        <title>Mon Site - <?= $page ?></title>
        <link rel="stylesheet" href="<?= RACINE_SITE ?>css/style.css"/>
    </head>
    <body>    
       
        <section>
			<div class="conteneur">       	

        <header>
			<div class="conteneur">                      
				<span>
					<a href="" title="Mon Site">MonSite.com</a>
                </span>
				<nav>
				<?php if(userConnecte()) : ?>
					<a class="<?=  ($page == 'profil') ? 'active' : '' ?>"href="<?= RACINE_SITE ?>profil.php">Profil</a>
					<a href="<?= RACINE_SITE ?>connexion.php?action=deconnexion">deconnexion</a>
                <?php else : ?>
					<a class="<?=  ($page == 'inscription') ? 'active' : '' ?>"href="<?= RACINE_SITE ?>inscription.php">Inscription</a>
					<a class="<?=  ($page == 'connexion') ? 'active' : '' ?>"href="<?= RACINE_SITE ?>connexion.php">Connexion</a>
                <?php endif; ?> 
					<a class="<?=  ($page == 'boutique') ? 'active' : '' ?>"href="<?= RACINE_SITE ?>boutique.php">Boutique</a>
					<a class="<?=  ($page == 'panier') ? 'active' : '' ?>"href="<?= RACINE_SITE ?>panier.php">Panier</a>

                <?php if(userAdmin()) : ?>
                    <a class="<?=  ($page == 'Gestion boutique') ? 'active' : '' ?>"href="<?= RACINE_SITE ?>backoffice/gestion_boutique.php">Gestion boutique</a>
                    <a class="<?=  ($page == 'gestion_membre') ? 'active' : '' ?>"href="<?= RACINE_SITE ?>backoffice/gestion_membre.php">Gestion membre</a> 
                    <a class="<?=  ($page == 'gestion_commandes') ? 'active' : '' ?>"href="<?= RACINE_SITE ?>backoffice/gestion_commandes.php">Gestion commandes</a> 
                                 

                <?php endif; ?>






				</nav>
			</div>
        </header>
        <section>
        <div class="conteneur">