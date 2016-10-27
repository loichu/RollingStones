<?php
// Inclure mes outils
include "Tools/SessionTools.php";
include "Tools/HTMLtools.php";

// Initialiser le tableau des utilisateurs enregistrés.
$users = array();
if (($handle = fopen("pwd.txt", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $users[$data[0]] = $data[1];
    }
    fclose($handle);
}

// Véérifier les données d'authentification. Message d'erreur.
if (array_key_exists($_POST['name'], $users)) {
    $_SESSION['auth']['name'] = $_POST['name'];
    if (md5($_POST['pwd']) == $users[$_POST['name']]) {
        $_SESSION['auth']['is_identified'] = true;
        $_SESSION['auth']['error'] = false;
    } else {
        $_SESSION['auth']['is_identified'] = false;
        $_SESSION['auth']['error'] = "Mauvais mot de passe !";
    }
} else {
    $_SESSION['auth']['is_identified'] = false;
    $_SESSION['auth']['error'] = "Veuillez vérifier vos données d'identification";
}

// Rediriger.
header("Location:index.php");

debug($_SESSION);
