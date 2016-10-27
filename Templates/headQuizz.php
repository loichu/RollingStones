<?php
include "Tools/SessionTools.php";
include "Tools/HTMLtools.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Examen Blanc M133 - Site de fan's des Rolling Stones</title>
        <!-- La feuille de styles "base.css" doit être appelée en premier. -->
        <link rel="stylesheet" type="text/css" href="css/base.css" media="all" />
        <link rel="stylesheet" type="text/css" href="css/modele03.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
    </head>

    <body>

        <div id="global">

            <header>
                <h1>
                    <img alt="" src="images/tongue.png" />
                    Site de fan's des Rolling Stones
                </h1>
                <p class="sous-titre">
                    Quiizz
                </p>
            </header><!-- #entete -->

            <nav>
                <ul>
                    <li><a href="index.html">Accueil</a></li>
<!-- si l'utilisateur est identifié -->
                    <?php
                    if(($_SESSION['auth']['is_identified'])){
                        echo "<li><a href='admin.php'>Administration</a></li>";
                    }
                    ?>
<!-- ++++++++++++++++++++++++++++++ -->

                </ul>
            </nav><!-- #navigation -->
