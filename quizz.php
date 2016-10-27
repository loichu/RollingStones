<?php
include "Templates/headQuizz.php";
!isset($_SESSION['quizz']) ? $_SESSION['quizz']['current'] = 0 : "";
$current = $_SESSION['quizz']['current'];
//debug($_SESSION);
//killSession();
?>
<?php
if ($current === 0) {
    ?>
    <section>
        <h2>Début du Quizz</h2>
        <form method="post" action="Tools/CheckForm.php">
            <table border='1'>
                <?php
                $formName = "quizz0";
                //Création du champ texte :
                $nomType = "text";
                $nomLabel = "Quel est votre nom ?";
                $nomName = "nom";
                echo PasswordOrTextOrEmail($formName, $nomType, $nomLabel, $nomName, true);

                //Création du bouton submit :
                $submitName = 'submit';
                $submitText = 'Continuer';
                echo Submit($formName, $submitName, $submitText)
                ?>
            </table>
            <!--
            <p>
                Quel est votre nom ?<br/>
                <input type="text" name="XXXX" />
                <input type="submit" name="XXXX" value="Continuer" />
            </p>-->
        </form>
    </section><!-- #contenu -->
    <?php
} elseif ($current === 1) {
    ?>
    <section>
        <h2>Question 1</h2>
        <form method="post" action="Tools/CheckForm.php">
            <table>
                <?php
                $formName = "quizz1";
                //Création du champ texte :
                $originType = "text";
                $originLabel = "Quel est l'origine du nom Rolling Stones (C'est le nom d'une chanson) ?";
                $originName = "origin";
                echo PasswordOrTextOrEmail($formName, $originType, $originLabel, $originName, true);

                //Création du bouton submit :
                $submitName = 'submit';
                $submitText = 'Envoyer';
                echo Submit($formName, $submitName, $submitText)
                ?>
                <!--
                <p>
                Quel est l'origine du nom Rolling Stones (C'est le nom d'une chanson) ?<br/>
                <input type="text" name="XXXX" />
                <input type="submit" name="XXXX" value="Envoyer" />
                </p>-->
            </table>
        </form>
    </section><!-- #contenu -->
    <?php
} elseif ($current === 2) {
    ?>
    <section>
        <h2>Question 2</h2>
        <form method="post" action="Tools/CheckForm.php">
            <p>Qui est le chanteur principal du groupe?<br/>
                <select size="1" name="XXXX">
                    <option></option>
                    <option>Mick Jagger</option>
                    <option>Brian Jones</option>
                    <option>Keith Richard</option>
                    <option>Bill Wyman</option>
                    <option>Charlie Watts</option>
                </select>

                <input type="submit" name="XXXX" value="Envoyer" />
            </p>
        </form>
    </section><!-- #contenu -->
    <?php
} elseif ($current === 3) {
    ?>
    <section>
        <h2>Question 3</h2>
        <form method="post" action="Tools/CheckForm.php">
            <p>
                En quelle  année le groupe a-t-il été créé ?<br />
                <input type="radio" name="XXXX" />1960<br />
                <input type="radio" name="XXXX" />1961<br />
                <input type="radio" name="XXXX" />1962<br />
                <input type="radio" name="XXXX" />1963<br />
                <input type="radio" name="XXXX" />1964<br />
                <input type="submit" name="XXXX" value="Envoyer" />
            </p>
        </form>
    </section><!-- #contenu -->
    <?php
} elseif ($current === 4) {
    ?>
    <section>
        <h2>Question 4</h2>
        <form method="post" action="Tools/CheckForm.php">
            <p>Sélectionnez les villes où les concerts ont déjà eu lieu ?<br />
                <input type="checkbox" name="XXXX" />Lausanne<br />
                <input type="checkbox" name="XXXX" />Genève<br />
                <input type="checkbox" name="XXXX" />Zürich<br />
                <input type="checkbox" name="XXXX" />Milan<br />
                <input type="checkbox" name="XXXX" />Vienne<br />
                <input type="checkbox" name="XXXX" />Porto<br />
                <input type="submit" name="XXXX" value="Envoyer" />
            </p>
        </form>
    </section><!-- #contenu -->
    <?php
} elseif ($current === 5) {
    header("Location:validation.php");
}
?>

<?php
debug($_SESSION);
include "Templates/footer.php";
?>

