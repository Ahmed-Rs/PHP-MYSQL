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
	// CONNECTION
	try {
		$bdd = new PDO('mysql:host=localhost;port=3308;dbname=formation_users;charset=utf8', 'root', '');
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}


	// LIRE DES INFORMATIONS
	$requete = $bdd->query('SELECT * 
							FROM users
							-- WHERE prenom = "Tolstoi" &&
								  -- nom = "Leon"
							ORDER BY id DESC
							LIMIT 0, 1'); // Sélectionne toute la table users, avec la clause WHERE, on n'attrape que la ligne dont le prenom est Tolstoi et nom Leon, avec ORDER id DESC, on inverse l'ordre d'affichage. Avec LIMIT, le 1er chfr donne le début et le 2e chfr donne le nombre de ligne à afficher à partir de ce début. Il faut impérativement respecter l'order d'écriture des clauses. Si on ne voulait sélectionner que les prénoms de cette table on pourrait rajouter prenom a côté de SELECT à la place de l'étoile.

	echo '<table border>

		<tr><th>Prénom</th>
			<th>Nom</th>
			<th>Série Préférée</th>
		</tr>';

		
	while ($donnees = $requete->fetch()) { // Tant qu'il y'a des entrées à lire, on exécute le code entre accolades. fetch() permet de récupérer une entrée. La var $donnees va récupérer chacune des lignes de notre tableau. Elle sera en qq sortes un tableau constitué de plusieurs valeurs différentes liées à une seule ligne à la fois de la table.
		
		echo '<tr>
			<td>'.$donnees['prenom'].'</td>'; // Le code lit le prenom d'une ligne puis ensuite se réexécute pour en lire une autre.

			echo '<td>'.$donnees['nom'].'</td>';

			echo '<td>'.$donnees['serie_preferee'].'</td>

			</tr>';

	}


	echo '</table>';
;



















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

































