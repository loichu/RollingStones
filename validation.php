<?php
include "Templates/headQuizz.php";
debug($_SESSION);
?>
<section>
    <h2>Validation de vos réponses</h2>
    <form method="post" action='enregistrement.php'>
        <p>Vous avez donné les réponses suivantes. Si vous désirez 
            modifier vos réponses, c'est le dernier moment...</p>
        <table>
            <tr>
                <td><a href="quizz.php?question=0">Début</a></td>
                <td>Votre nom:</td>
            </tr>
            <tr>
                <td></td>
                <td><?=$_SESSION['forms']['quizz0']['nom']['value']?></td>
            </tr>
            <tr>
                <td><a href="quizz.php?question=1">Question 1</a></td>
                <td>Origine du nom Rolling Stones :</td>
            </tr>
            <tr>
                <td></td>
                <td><?=$_SESSION['forms']['quizz1']['origin']['value']?></td>
            </tr>
            <tr>
                <td><a href="quizz.php?question=2">Question 2</a></td>
                <td>Le chanteur principal du groupe:</td>
            </tr>
            <tr>
                <td></td>
                <td><?=$_SESSION['forms']['quizz2']['chanteur']['values'][$_SESSION['forms']['quizz2']['chanteur']['is_selected']]?></td>
            </tr>
            <tr>
                <td><a href="quizz.php?question=3">Question 3</a></td>
                <td>Année de création du groupe:</td>
            </tr>
            <tr>
                <td></td>
                <td><?=$_SESSION['forms']['quizz3']['annee']['is_selected']?></td>
            </tr>
            <tr>
                <td><a href="quizz.php?question=4">Question 4</a></td>
                <td>Les villes où les concerts ont déjà eu lieu :</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <?=implode(", ", $_SESSION['forms']['quizz4']['ville[]']['is_selected']);?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Enregistrer" /></td>
            </tr>
        </table>
    </form>

</section><!-- #contenu -->
<?php
include "Templates/footer.php";
?>

