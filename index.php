<!-- 

Se connecter à notre table
CONNECT / OPERATIONS(LIRE / ECRIRE / MODIFIER / SUPPRIMER) /  
mysql => mySQL, vieilles, =/=
mysqli => mySQL, améliorées 
PDO => très sécurisé et très utilisé, mySQL, Oracle, PostgreSQL -->



<?php

	// Création de la connection à notre base de données
	// HOTE : localhost (serveur)
	// NOM DE LA BASE : formation_users
	// LOGIN : root
	// MDP : root

	// On force l'affichage d'une erreur si un problème survient. Le catch va récupérer l'erreur qui se serait produite dans le try
	try {
		$bdd = new PDO('mysql:host=localhost;port=3308;dbname=formation_users;charset=utf8', 'root', '');
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}



?>




<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<title>PHP</title>
	</head>

	<body>




	</body>

</html>














