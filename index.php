<?php

// FONCTION

// DEFINIR UNE FCT : LES RACINES D'UNE EQUATION
// ax²+bx+c


$a;
$b;
$c;


function delta($a, $b, $c) {
	$resultat = pow($b, 2) - (4 * $a * $c);
	return "$resultat";
	
}


function racine($a, $b, $c) {
	$del = delta($a, $b, $c);
	if ($a == 0) {
		echo "La division par 0 n'est pas autorisée.";
		exit;
	}

	if ($del < 0) {
		echo "Pas de solutions réelles pour cette équation";	

	} elseif ($del == 0) {
		$s0 = (-(($b) / (2 * $a)));
		echo "La solution de cette équation est S = ".$s0.".";

	} elseif ($del > 0) {		
		$s1 = (-($b - sqrt($del)) / (2 * $a));
		$s2 = (-($b + sqrt($del)) / (2 * $a));
		echo "Les solutions de cette équation sont S1 = : ".$s1." et S2 = ".$s2.".";
	}


}

racine(5, -1, 7);






?>

