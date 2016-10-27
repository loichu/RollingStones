<?php
/**
 * Cette fonction sert à créer des radioboutons ou cases à cocher.
 * @param string $frmName Nom du formulaire
 * @param string $fieldType Type du champ
 * @param string $fieldLabel Étiquette du champ
 * @param string $fieldName Nom du champ
 * @param array $fieldValues Valeurs disponibles pour le champ
 * @param bool $isRequired Si le champ est requis
 * @return string Les cases à cocher ou radioboutons (echo pour l'afficher).
 */
// Create checkbox: FormName, Type, Label, Name (Unique!), array of value, array of selected items, is required
function CheckboxOrRadiobutton($frmName, $fieldType, $fieldLabel, $fieldName, $fieldValues, $isRequired = false) {
    // Regarde s'il y a déjà une valeur sélectionnée.
    $isSelected = isset($_SESSION['forms'][$frmName][$fieldName]['is_selected']) && count($_SESSION['forms'][$frmName][$fieldName]['is_selected']) ? $_SESSION['forms'][$frmName][$fieldName]['is_selected'] : array();
    // Regarde s'il y a des erreurs à afficher.
    $errors = isset($_SESSION["forms"][$frmName][$fieldName]['errors']) ? $_SESSION["forms"][$frmName][$fieldName]['errors'] : array();
    // Crée le tableau dans la session.
    $_SESSION["forms"][$frmName][$fieldName] = array("type" => $fieldType, "label" => $fieldLabel, "name" => $fieldName, "values" => $fieldValues, "is_selected" => $isSelected, "is_required" => $isRequired, "errors" => $errors);
    // Construit la checkbox ou radiobuttons.
    $field = "<tr>\n";
    $field .= "\t<th>$fieldLabel :</th>\n";
    $field .= "\t<td>\n";
    foreach ($fieldValues as $value => $text) {
        $field .= "\t\t<label><input type='$fieldType' name='$fieldName' value='$value'";
        if($fieldType == "checkbox"){
            $field .= (is_array($isSelected) && is_int(array_search($value, $isSelected))) ? 'checked="checked"' : "";
        } else {
            $field .= $isSelected == $value ? 'checked="checked"' : "";
        }
        $field .= " />$text</label><br/>\n";
    }
    $field .= "\t</td>\n";
    // Affiche les erreurs.
    $field .= "\t<td><ul>\n";
    foreach ($errors as $error) {
        $field .= "\t\t<li><span class='erreur'>" . $error . "</span></li>\n";
    }
    $field .= "\t</ul></td>\n";
    $field .= "</tr>\n";
    // Retourne le champ
    return $field;
}

/**
 * Cette fonction sert à créer une barre de sélection.
 * @param string $frmName Nom du formulaire
 * @param string $fieldLabel Étiquette du champ
 * @param string $fieldName Nom du champ
 * @param array $fieldValues Valeurs disponibles pour le champ
 * @param bool $isRequired Si le champ est requis
 * @return string La barre de sélection (echo pour l'afficher).
 */
// Create select: FormName, Type, Label, Name (Unique!), array of value, array of selected items, is required
function Select($frmName, $fieldLabel, $fieldName, $fieldValues, $isRequired = false) {
    // Regarde s'il y a déjà une valeur sélectionnée.
    $isSelected = isset($_SESSION['forms'][$frmName][$fieldName]['is_selected']) && count($_SESSION['forms'][$frmName][$fieldName]['is_selected']) ? $_SESSION['forms'][$frmName][$fieldName]['is_selected'] : "";
    // Regarde s'il y a des erreurs à afficher.
    $errors = isset($_SESSION["forms"][$frmName][$fieldName]['errors']) ? $_SESSION["forms"][$frmName][$fieldName]['errors'] : array();
    // Crée le tableau dans la session.
    $_SESSION["forms"][$frmName][$fieldName] = array("type" => "select", "label" => $fieldLabel, "name" => $fieldName, "values" => $fieldValues, "is_selected" => $isSelected, "is_required" => $isRequired, "errors" => $errors);
    // Construit la barre de sélection
    $select = "<tr>\n";
    $select .= "\t<th><label for='$fieldName'>$fieldLabel :</label></th>\n";
    $select .= "\t<td>\n";
    $select .= "\t\t<select name='$fieldName'>\n";
    foreach ($fieldValues as $value => $displayed) {
        $select .= "\t\t\t<option value='$value' ";
        $select .= ($_SESSION["forms"][$frmName][$fieldName]['is_selected'] == $value) ? ' selected="selected"' : "";
        $select .= $value == "default" ? "disabled='disabled' selected='selected'" : "";
        $select .= ">$displayed</option>\n";
    }
    $select .= "\t\t</select>\n\t</td>\n";
    // Affiche les erreurs.
    $select .= "\t<td><ul>\n";
    foreach ($errors as $error) {
        $select .= "\t\t<li><span class='erreur'>" . $error . "</span></li>\n";
    }
    $select .= "\t</ul></td>\n";
    $select .= "</tr>\n";
    // Retourne le champ.
    return $select;
}

/**
 * Cette fonction sert à créer un champ de type text, mot de passe ou email.
 * @param string $frmName Nom du formulaire
 * @param string $fieldType Type du champ (mot de passe, texte, ou email)
 * @param string $fieldLabel Étiquette du champ
 * @param string $fieldName Nom du champ
 * @param bool $isRequired Si le champ est requis
 * @param bool $isConfirm Si il s'agit d'une confirmation de mot de passe
 * @return string Retourne le champ (echo pour l'afficher).
 */
// Create password or text: FormName, Type, Label, Name (Unique!),  is required, is confirmation
function PasswordOrTextOrEmail($frmName, $fieldType, $fieldLabel, $fieldName, $isRequired = false, $isConfirm = false) {
    // Si il s'agit d'une confirmation de mot de passe mettre Confirm après le nom du champ.
    if ($isConfirm) {
        $fieldName .= "Confirm";
    }
    // Regarde s'il y a déjà une valeur pour ce champ.
    $value = isset($_SESSION['forms'][$frmName][$fieldName]['value']) ? $_SESSION['forms'][$frmName][$fieldName]['value'] : "";
    // Regarde s'il y a des erreurs à afficher.
    $errors = isset($_SESSION["forms"][$frmName][$fieldName]['errors']) ? $_SESSION["forms"][$frmName][$fieldName]['errors'] : array();
    // Crée le tableau dans la session.
    $_SESSION["forms"][$frmName][$fieldName] = array("type" => $fieldType, "label" => $fieldLabel, "name" => $fieldName, "value" => $value, "is_required" => $isRequired, "errors" => $errors, "is_confirm" => $isConfirm);
    // Construit le champ
    $field = "<tr>\n";
    $field .= "\t<th><label for='$fieldName'>$fieldLabel</label></th>\n";
    $field .= "\t<td><input type='$fieldType' name='$fieldName' value='$value' /></td>\n";
    // Affiche les erreurs
    $field .= "\t<td><ul>\n";
    foreach ($errors as $error) {
        $field .= "\t\t<li><span class='erreur'>" . $error . "</span></li>\n";
    }
    $field .= "\t</ul></td>\n";
    $field .= "</tr>\n";
    // Retourne le champ (echo pour l'afficher)
    return $field;
}

// Create text area: FormName, Type, Label, Name (Unique!),  is required
/**
 * 
 * @param type $frmName
 * @param type $fieldLabel
 * @param type $fieldName
 * @param type $isRequired
 * @return string
 */
function TextArea($frmName, $fieldLabel, $fieldName, $isRequired = false) {

    $value = isset($_SESSION['forms'][$frmName][$fieldName]['value']) ? $_SESSION['forms'][$frmName][$fieldName]['value'] : "";

    $errors = isset($_SESSION["forms"][$frmName][$fieldName]['errors']) ? $_SESSION["forms"][$frmName][$fieldName]['errors'] : array();

    $_SESSION["forms"][$frmName][$fieldName] = array("type" => "text", "label" => $fieldLabel, "name" => $fieldName, "value" => $value, "is_required" => $isRequired, "errors" => $errors);

    $textarea = "<tr>\n";
    $textarea .= "\t<th><label for='$fieldName'>$fieldLabel :</label></th>\n";
    $textarea .= "\t<td><textarea name='$fieldName'>$value</textarea></td>\n";

    $textarea .= "\t<td><ul>\n";
    foreach ($errors as $error) {
        $textarea .= "\t\t<li><span class='erreur'>" . $error . "</span></li>\n";
    }
    $textarea .= "\t</ul></td>\n";

    $textarea .= "</tr>\n";
    return $textarea;
}

/**
 * 
 * @param type $frmName
 * @param type $submitName
 * @param type $submitText
 * @return string
 */
function Submit($frmName, $submitName, $submitText){
    
    $_SESSION["forms"][$frmName][$submitName] = array("type" => "submit", "name" => $submitName, "text" => $submitText);
    
    $submit = "<tr>\n";
    $submit .= "\t<th></th>\n";
    $submit .= "\t<td><input type='submit' name='$submitName' value='$submitText' /></td>\n";
    $submit .= "</tr>\n";
    return $submit;
}

/**
 * 
 * @param type $name
 * @param type $value
 * @param type $link
 * @return string
 */
function Button($name = "", $value = "", $link = "") {
    $button = "<tr>\n";
    $button .= "\t<th></th>\n";
    $button .= "\t<td><a href='$link'><input type='button' name='$name' value='$value' /></a></td>\n";
    $button .= "</tr>\n";
    return $button;
}

/**
 * 
 * @param type $d
 * @param type $note
 */
function debug($d, $note = null) {
    echo "<pre>";
    if ($note)
        echo $note . "<br />";
    is_array($d) ? print_r($d) : printf($d);
    echo "</pre>";
}

?>
