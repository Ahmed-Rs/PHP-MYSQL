<?php

// FONCTION NATIVES


// FONCTION NATIVES MATHS

// ABS
echo abs(-76)."<br />";

// MAX
echo max(56, -78, 99)."<br />";

// MIN
echo min(56, -78, 99)."<br />";

// RAND
echo rand(0, 25)."<br />";

// ROUND
echo round(55.968, 2)."<br />";







// FONCTION NATIVES STRING

$string = "Bienvenue à La Formation.";
echo "$string <br />";

// STRLEN
echo "Le nombre de caractères : ".strlen($string).". <br />";

// STR_REPLACE
echo "La string transformée : ".str_replace("Bienvenue", "Venez", $string)."<br />";


// STR_TOLOWER
echo strtolower($string)."<br />";

// STR_TOUPPER
echo strtoupper($string)."<br />";


// SUBSTR
echo substr($string, 0, 9)."<br />";





?>

