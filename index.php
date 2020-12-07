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


// AJOUTER UN UTILISATEUR 
	$requete = $bdd->exec('INSERT INTO users(prenom, nom, serie_preferee) 
							VALUES("Jeff", "Bezos", "Stargate SG-1")')
					or die(print_r($bdd->errorInfo())); // Avec exec(), on insère des données en brut, l'inconvénient c'est qu'à chaque actualisation on l'insère une fois de plus.
					// On affiche les erreurs en détail avec or(print-r($bdd->errorInfo()));


// MODIFIER UN UTILISATEUR

	// $requete = $bdd->exec('UPDATE users SET serie_preferee="Stargate SG-1" WHERE prenom = "Jeff"'); // Toujours utiliser WHER afin de ne pas affecter les autres lignes que celle que l'on veut modifer.


// SUPPRIMER UN UTILISATEUR
	// $requete = $bdd->exec('DELETE FROM users WHERE prenom="Jeff"');




// LIRE DES INFORMATIONS
	$requete = $bdd->query('SELECT * 
							FROM users');
							

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


	$requete-> closeCursor();	// On ferme notre requête, notre connection à notre base de données.

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




