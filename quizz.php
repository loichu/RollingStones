<?php
include "Templates/headQuizz.php";

// Retrouver la question à afficher
!isset($_SESSION['quizz']) ? $_SESSION['quizz']['current'] = 0 : "";
if(isset($_GET['question'])){
    $current = $_GET['question'];
    $_SESSION['quizz']['current'] = $_GET['question'];
}
$current = !isset($_SESSION['quizz']['current']) ? 0 : $_SESSION['quizz']['current'];

// Empêcher l'utilisateur de sauter des questions
/*if ($current != 0) {
    if (empty($_SESSION['forms']['quizz0']['nom']['value']) && $current > 0) {
        $_SESSION['quizz']['current'] = 0;
        $_SESSION['forms']['quizz0']['nom']['errors'][] = "Vous ne pouvez pas laisser ce champ vide !";
        header("Location='quizz.php?question=0'");
    } elseif (empty($_SESSION['forms']['quizz1']['origin']['value']) && $current > 1) {
        $_SESSION['quizz']['current'] = 1;
        $_SESSION['forms']['quizz1']['origin']['errors'][] = "Vous ne pouvez pas laisser ce champ vide !";
        header("Location='quizz.php?question=1'");
    } elseif (empty($_SESSION['forms']['quizz2']['chanteur']['is_selected']) && $current > 2) {
        $_SESSION['quizz']['current'] = 2;
        $_SESSION['forms']['quizz2']['chanteur']['errors'][] = "Vous ne pouvez pas laisser ce champ vide !";
        header("Location='quizz.php?question=2'");
    } elseif (empty($_SESSION['forms']['quizz3']['annee']['is_selected']) && $current > 3) {
        $_SESSION['quizz']['current'] = 3;
        $_SESSION['forms']['quizz3']['annee']['errors'][] = "Vous ne pouvez pas laisser ce champ vide !";
        header("Location='quizz.php?question=3'");
    } elseif ($current > 4 && !count($_SESSION['forms']['quizz4']['ville[]']['is_selected'])) {
        $_SESSION['quizz']['current'] = 4;
        $_SESSION['forms']['quizz4']['ville']['errors'][] = "Vous ne pouvez pas laisser ce champ vide !";
        header("Location='quizz.php?question=4'");
    }
}*/

// Si le quizz est fini
if ($current === 5) {
    header("Location: validation.php");
}

// Question 0
if ($current == 0) {
    ?>
    <section>
        <h2>Début du Quizz</h2>
        <form method="post" action="Tools/CheckForm.php">
            <table>
                <?php
                $formName = "quizz0";
                //Création du champ texte :
                $nomType = "text";
                $nomLabel = "Quel est votre nom ?";
                $nomName = "nom";
                echo PasswordOrTextOrEmail($formName, $nomType, $nomLabel, $nomName, false);

                //Création du bouton submit :
                $submitName = 'submit';
                $submitText = 'Continuer';
                echo Submit($formName, $submitName, $submitText);
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
} elseif ($current == 1) { // Question 1
    if (empty($_SESSION['forms']['quizz0']['nom']['value'])) {
        $_SESSION['quizz']['current'] = 0;
        $_SESSION['forms']['quizz0']['nom']['errors'][] = "Vous ne pouvez pas laisser ce champ vide !";
        header("Location='quizz.php?question=0'");
    }
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
                echo PasswordOrTextOrEmail($formName, $originType, $originLabel, $originName, false);

                //Création du bouton submit :
                $submitName = 'submit';
                $submitText = 'Envoyer';
                echo Submit($formName, $submitName, $submitText);
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
} elseif ($current == 2) { // Question 2
    ?>
    <section>
        <h2>Question 2</h2>
        <form method="post" action="Tools/CheckForm.php">
            <table>
                <?php
                $formName = "quizz2";
                // Création de la barre de sélection :
                $chanteurLabel = "Qui est le chanteur principal du groupe?";
                $chanteurName = "chanteur";
                // WARNING: le tableau des valeurs nécessite que la variable de nom soit préalablement définie.
                $chanteurValues = array(
                    'default' => "Veuillez sélectionner une personne",
                    'MJ' => 'Mick Jagger',
                    'BJ' => 'Brian Jones',
                    'KR' => 'Keith Richard',
                    'BW' => 'Bill Wyman',
                    'CW' => 'Charlie Watts'
                );
                // Create select: FormName, Type, Label, Name (Unique!),value, is required 
                echo Select($formName, $chanteurLabel, $chanteurName, $chanteurValues, false);

                //Création du bouton submit :
                $submitName = 'submit';
                $submitText = 'Envoyer';
                echo Submit($formName, $submitName, $submitText);
                ?>
            </table>
            <!--
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
            </p>-->
        </form>
    </section><!-- #contenu -->
    <?php
} elseif ($current == 3) { // Question 3
    ?>
    <section>
        <h2>Question 3</h2>
        <form method="post" action="Tools/CheckForm.php">
            <table>
                <?php
                $formName = "quizz3";
                //Création des boutons radio :
                $anneeValues = array(
                    '1960' => '1960',
                    '1961' => '1961',
                    '1962' => '1962',
                    '1963' => '1963',
                    '1964' => '1960'
                );
                $anneeType = "radio";
                $anneeLabel = "Radiobutton";
                $anneeName = "annee";
                // Create radiobutton: FormName, Type, Label, Name (Unique!), array of value, is required
                echo CheckboxOrRadiobutton($formName, $anneeType, $anneeLabel, $anneeName, $anneeValues, FALSE);

                //Création du bouton submit :
                $submitName = 'submit';
                $submitText = 'Envoyer';
                echo Submit($formName, $submitName, $submitText);
                ?>
            </table>
            <!--
            <p>
                En quelle  année le groupe a-t-il été créé ?<br />
                <input type="radio" name="XXXX" />1960<br />
                <input type="radio" name="XXXX" />1961<br />
                <input type="radio" name="XXXX" />1962<br />
                <input type="radio" name="XXXX" />1963<br />
                <input type="radio" name="XXXX" />1964<br />
                <input type="submit" name="XXXX" value="Envoyer" />
            </p>-->
        </form>
    </section><!-- #contenu -->
    <?php
} elseif ($current == 4) { // Question 4
    ?>
    <section>
        <h2>Question 4</h2>
        <form method="post" action="Tools/CheckForm.php">
            <table>
                <?php
                $formName = "quizz4";
                // Création des cases à cocher :
                $villeValues = array(
                    'Lausanne' => 'Lausanne',
                    'Genève' => 'Genève',
                    'Zürich' => 'Zürich',
                    'Milan' => 'Milan',
                    'Vienne' => 'Vienne',
                    'Porto' => 'Porto'
                );
                $villeType = "checkbox";
                $villeLabel = "Checkbox";
                $villeName = "ville[]";
                // Create checkbox: FormName, Type, Label, Name (Unique!), array of value, is required
                echo CheckboxOrRadiobutton($formName, $villeType, $villeLabel, $villeName, $villeValues, FALSE);


                //Création du bouton submit :
                $submitName = 'submit';
                $submitText = 'Envoyer';
                echo Submit($formName, $submitName, $submitText);
                ?>
            </table>
            <!--
            <p>Sélectionnez les villes où les concerts ont déjà eu lieu ?<br />
                <input type="checkbox" name="XXXX" />Lausanne<br />
                <input type="checkbox" name="XXXX" />Genève<br />
                <input type="checkbox" name="XXXX" />Zürich<br />
                <input type="checkbox" name="XXXX" />Milan<br />
                <input type="checkbox" name="XXXX" />Vienne<br />
                <input type="checkbox" name="XXXX" />Porto<br />
                <input type="submit" name="XXXX" value="Envoyer" />
            </p>--->
        </form>
    </section><!-- #contenu -->
    <?php
} 
debug($_SESSION);
include "Templates/footer.php";
?>

