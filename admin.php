<?php
include "Templates/headMain.php";
if (!$_SESSION['auth']['is_identified']) {
    $_SESSION['auth']['error'] = "Vous n'avez pas accès à la page d'adminitration";
    header("Location: index.php");
    exit();
}
$results = array();
if (($handle = fopen("resultats.txt", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $results[] = array(
                'nom' => $data[0],
                'dateInsertion' => $data[1],
                'origin' => $data[2],
                'chanteur' => $data[3],
                'date' => $data[4],
                'ville' => $data[5]
        );
    }
    fclose($handle);
}
?>
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
    <?php
    foreach ($results as $result){
        echo "<tr>";
        foreach ($result as $data){
            echo "\t<td>$data</td>";
        }
    }
    ?>
    <!-- fin des données du fichier -->
</table>
</section><!-- #contenu -->
<?php
include "Templates/footer.php";
?>