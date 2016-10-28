<?php
include "Tools/SessionTools.php";
include "Tools/HTMLtools.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Examen Blanc M133 - Site de fan's des Rolling Stones</title>
        <!-- La feuille de styles "base.css" doit être appelée en premier. -->
        <link rel="stylesheet" type="text/css" href="./css/base.css" media="all" />
        <link rel="stylesheet" type="text/css" href="./css/modele03.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="./css/styles.css" media="screen" />
    </head>

    <body>

        <div id="global">

            <header>
                <h1>
                    <img alt="" src="images/tongue.png" />
                    Site de fan's des Rolling Stones
                </h1>
                <p class="sous-titre">
                    <a href="index.php">Accueil</a>
                </p>
            </header><!-- #entete -->
<!-- debut du menu -->
            <nav>
 <!-- menu si l'utilisateur n'est pas identifié -->
                <?php
                if(!($_SESSION['auth']['is_identified'])){
                    $name = isset($_SESSION['auth']['name']) ? $_SESSION['auth']['name'] : "";
                    if(isset($_SESSION['auth']['error'])){
                        echo $_SESSION['auth']['error'] ? $_SESSION['auth']['error'] : "";
                    }
                ?>
                <!-- afficher un message d'erreur si l'identification n'est pas correcte -->
                <ul>
                    <form method="post" action="CheckAuth.php">
                        <li>Identification</li>
                        <li><strong>Nom</strong> <input type="text" name="name" value="<?=$name?>"/></li>
                        <li><strong>Mot de passe</strong> <input type="password" name="pwd" /></li>
                        <li><input type="submit" name="submit" value="Connexion" /></li>
                    </form>    
                </ul>
                <?php
                } else {
                ?>
 <!-- menu si l'utilisateur est identifié -->
                <ul>
                    <li>
                        Bonjour <?= $_SESSION['auth']['name']; ?>
                    </li>
                    <li><a href="admin.php">Administration</a></li>
                    <li><a href="disconnect.php">Déconnexion</a></li>
                </ul>
                <?php
                }
                ?>
            </nav><!-- #navigation -->

