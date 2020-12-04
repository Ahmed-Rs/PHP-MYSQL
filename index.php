<?php

// FONCTIONS TABLEAUX


$tableau = array("Stendhal", "Arnold", "Michel");

// INVERSER INDEX ET VALEUR
// array_flip

// $tableau_2 = array_flip($tableau);
// echo $tableau_2["Stendhal"];


// array_key_exists

if(array_key_exists(0, $tableau)) {

echo "YES ! <br />";
}


// count

echo count($tableau)."<br />";

// sort

sort($tableau); // Ranger dans l'ordre alphabétique

foreach ($tableau as $name) {
	echo $name."<br />";
}








?>

