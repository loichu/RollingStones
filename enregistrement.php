<?php
include "Templates/headQuizz.php";
$name = $_SESSION['forms']['quizz0']['nom']['value'];
$reponse1 = $_SESSION['forms']['quizz1']['origin']['value'];
$reponse2 = $_SESSION['forms']['quizz2']['chanteur']['is_selected'];
$reponse2Text = $_SESSION['forms']['quizz2']['chanteur']['values'][$reponse2];
$reponse3 = $_SESSION['forms']['quizz3']['annee']['is_selected'];
$reponse4 = $_SESSION['forms']['quizz4']['ville[]']['is_selected'];
$reponse4Juste = array('Zürich', 'Milan', 'Vienne');
$reponses4 = implode(", ", $reponse4);
$score = 0;
$reponses = array($name, date("d.m.Y H:i:s"), $reponse1, $reponse2, $reponse3, $reponses4);
if (($handle = fopen("resultats.txt", "a")) !== FALSE) {
    fputcsv($handle, $reponses, ";");
    fclose($handle);
}
?>
<section>

    <!-- Utiliser le nom de l'utilisateur dans le texte ci-dessous -->
    <h2>Merci, <?= $name ?>, d'avoir participé à ce questionnaire</h2>
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

    <p>Vous avez répondu: </p>

    <h3>Question 1: Origine du nom "The Rolling Stones"</h3>
    <!-- Afficher la réponse à la question 1 et indiquer si elle est juste ou fausse -->
    <p>Votre réponse <strong><?= $reponse1 ?></strong> est 
        <?php
        if (strtolower($reponse1) == "rollin stone") { // Si la réponse est juste (insensible à la case)
            echo "juste.<br/>\n";
            $score ++;
        } else { // Si la réponse est fausse
            echo "fausse.<br/>\n";
            echo "La bonne réponse était <strong>Rollin Stone</strong></p><br/>\n";
        }
        ?>
        <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

    <h3>Question 2: Nom du chanteur principal</h3>
    <!-- Afficher la réponse à la question 2 et indiquer si elle est juste ou fausse -->
    <p>Votre réponse <strong><?= $reponse2Text ?></strong> est 
        <?php
        if ($reponse2 == "MJ") { // Si la réponse est juste
            echo "juste.<br/>\n";
            $score ++;
        } else { // Si la réponse est fausse
            echo "fausse.<br/>\n";
            echo "La bonne réponse était <strong>Mick Jagger</strong></p><br/>\n";
        }
        ?>
        <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

    <h3>Question 3: Date de création du groupe</h3>
    <!-- Afficher la réponse à la question 3 et indiquer si elle est juste ou fausse-->
    <p>Votre réponse <strong><?= $reponse3; ?></strong> est 
        <?php
        if ($reponse3 == "1961") { // Si la réponse est juste
            echo "juste.<br/>\n";
            $score ++;
        } else { // Si la réponse est fausse
            echo "fausse.<br/>\n";
            echo "La bonne réponse était <strong>1961</strong></p><br/>\n";
        }
        ?>
    </p>
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

    <h3>Question 4: Villes où les concerts ont déjà eu lieu</h3>
    <!-- Afficher la réponse à la question 4 et indiquer si elle est juste ou fausse-->
    <p>Votre réponse <strong><?=$reponses4?></strong> est
        <?php
        if (count($reponse4) < 3) {
            echo "incomplète";
            foreach ($reponse4 as $reponse) {
                $correct = array_search($reponse, $reponse4Juste);
            }
            echo $correct ? ".<br/>\n" : " et fausse.<br/>\n";
        } elseif (count($reponse4) == 3) {
            foreach ($reponse4 as $reponse) {
                $correct = array_search($reponse, $reponse4Juste);
            }
            echo $correct ? "juste.<br/>\n" : "fausse.<br/>\n";
        } elseif (count($reponse4) > 3) {
            echo "surcomplète";
            foreach ($reponse4 as $reponse) {
                $correct = array_search($reponse, $reponse4Juste);
            }
            echo $correct ? ".<br/>\n" : " et fausse.<br/>\n";
        }
        if (!$correct) {
            echo "la bonne réponse est <strong>Zürich, Milan et Vienne</strong>";
        } else {
            $score ++;
        }
        ?>
    </p> 
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->


    <!-- Indiquer le score, et le niveau (voir énoncé) -->
    <h3>Votre score: <?= $score ?> réponse(s) juste(s) sur 4.</h3>
    <?php
    if ($score <= 1) {
        echo "<p>Vous avez le niveau pour vous présenter au maillon faible</p>\n";
    } elseif ($score <= 3) {
        echo "<p>Vous êtes prêt pour affronter le Mur !</p>\n";
    } elseif ($score >= 4) {
        echo "<p>Quand est-ce que vous vous présentez à Question pour un Champion ?</p>\n";
    }
    ?>
    <!--<p>Vous avez le niveau pour vous présenter au maillon faible</p>-->
    <!-- Autres réponses possibles -->
    <!-- Vous êtes prêt pour affronter le Mur ! -->
    <!-- Quand est-ce que vous vous présentez à Question pour un Champion ? -->
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
</section><!-- #contenu -->
<?php
include "Templates/footer.php";
unset($_SESSION['forms']);
unset($_SESSION['quizz']);
?>



