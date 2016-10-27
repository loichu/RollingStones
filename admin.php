<?php
if(!$_SESSION['auth']['is_identified']){
    
}
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
                    Administration
                </p>

            </header><!-- #entete -->
            <nav>
                <ul>
                    <li>
                        Bonjour XXXX <!-- remplacer par le nom de l'utilisateur -->
                    </li>
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="XXXX">Déconnexion</a></li>
                </ul>
            </nav><!-- #navigation -->
            <section>

                <h2>Résultats du questionnaire sur les Rolling Stones</h2>
                <table id="tableau">
                    <tr>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Origine du nom du groupe</th>
                        <th>Quel est le chanteur principal du groupe</th>
                        <th>Date de création du groupe</th>
                        <th>Villes où les concerts ont eu lieu</th>
                    </tr>
                    <!-- Données provenant du fichier resultats.txt -->
                    <tr>
                        <td>Marie Bambelle</td>
                        <td>07.10.2015 8:21:27</td>
                        <td>Rollin Stone</td>
                        <td>Mick Jagger</td>
                        <td>1961</td>
                        <td>Zürich, Milan, Vienne, Porto</td>
                    </tr>
                    <tr>
                        <td>Elie Coptaire</td>
                        <td>11.12.2015 23:19:15</td>
                        <td>Surnom de la copine de Mick</td>
                        <td>Charlie Watts</td>
                        <td>1963</td>
                        <td>Genève, Milan</td>
                    </tr>
                    <!-- fin des données du fichier -->
                </table>

            </section><!-- #contenu -->

            <footer>
                <p id="copyright">
                    Mise en page © 2008
                    <a href="http://www.elephorm.com/">Elephorm</a> et
                    <a href="http://www.alsacreations.com/">Alsacréations</a> - 
                    <a href="http://www.alsacreations.com/static/gabarits/modele03.html">Gabarit original</a><br/>
                    Version adaptée pour ce site © 2015 Pascal Comminot / CFPT-Ecole d'informatique 
                </p>
            </footer><!-- #pied -->
        </div><!-- #global -->
    </body>
</html>