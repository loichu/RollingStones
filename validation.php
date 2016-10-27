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
                <td><a href="quizz.html">Début</a></td>
                <td>Votre nom:</td>
            </tr>
            <tr>
                <td></td>
                <td><?=$_SESSION['forms']['quizz0']['nom']['value']?></td>
            </tr>
            <tr>
                <td><a href="question1.html">Question 1</a></td>
                <td>Origine du nom Rolling Stones :</td>
            </tr>
            <tr>
                <td></td>
                <td><?=$_SESSION['forms']['quizz1']['origin']['value']?></td>
            </tr>
            <tr>
                <td><a href="question2.html">Question 2</a></td>
                <td>Le chanteur principal du groupe:</td>
            </tr>
            <tr>
                <td></td>
                <td><?=$_SESSION['forms']['quizz2']['chanteur']['value']?></td>
            </tr>
            <tr>
                <td><a href="question3">Question 3</a></td>
                <td>Année de création du groupe:</td>
            </tr>
            <tr>
                <td></td>
                <td><?=$_SESSION['forms']['quizz3']['annee']['value']?></td>
            </tr>
            <tr>
                <td><a href="question4.html">Question 4</a></td>
                <td>Les villes où les concerts ont déjà eu lieu :</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <?php
                    foreach ($_SESSION['forms']['quizz4']['ville']['is_selected'] as $value) {
                        echo $value . ", ";
                    }
                    ?>
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

