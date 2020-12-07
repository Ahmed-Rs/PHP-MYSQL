<!-- 

Se connecter à notre table
CONNECT / OPERATIONS(LIRE / ECRIRE / MODIFIER / SUPPRIMER) /  
mysql => mySQL, vieilles, =/=
mysqli => mySQL, améliorées 
PDO => très sécurisé et très utilisé, mySQL, Oracle, PostgreSQL -->



<?php

	// JOINTURES INTERNES 
	// WHERE : moins en moins utilisée, moins claire
	// JOIN : plus en plus utilisée, plus claire

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
	// $requete = $bdd->exec('INSERT INTO users(prenom, nom, serie_preferee) 
	// 						VALUES("Jeff", "Bezos", "Stargate SG-1")')
	// 				or die(print_r($bdd->errorInfo())); // Avec exec(), on insère des données en brut, l'inconvénient c'est qu'à chaque actualisation on l'insère une fois de plus.
	// 				// On affiche les erreurs en détail avec or(print-r($bdd->errorInfo()));


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


	// $requete-> closeCursor();	// On ferme notre requête, notre connection à notre base de données.

	echo '</table>';
;







// // CONNECTION
// 	try {

// 		$bdd2 = new PDO('mysql:host=localhost;port=3308;dbname=formation_users; charset=utf8', 'root', '');

// 	} catch(Exception $e) {
// 		die('Erreur :'.$e->getMessage());
// 	}



// AJOUT UTILISATEUR

	// $requete2 = $bdd2->exec('INSERT INTO job(id_user, metier) VALUES(1, "Développeur")') or die(print_r($bdd2->errorInfo()));

	// $requete2 = $bdd2->exec('INSERT INTO job (id_user, metier) VALUES (2, "Ingénieur")') or die(print_r($bdd2->errorInfo()));

	// $requete2 = $bdd2->exec('INSERT INTO job (id_user, metier) VALUES (3, "Architecte")') or die(print_r($bdd2->errorInfo()));

	// $requete2 = $bdd2->exec('INSERT INTO job (id_user, metier) VALUES (23, "PDG")') or die(print_r($bdd2->errorInfo()));



	$requete = $bdd->query('SELECT * FROM job');

	echo '<br /><table border>
			<tr><th>Prénom</th>
				<th>Métier</th>
			</tr>';

	while ($donnees = $requete->fetch()) {

		echo '<tr><td>'.$donnees["id_user"].'</td>';
		echo '<td>'.$donnees["metier"].'</td></tr>';

	}

	// $requete-> closeCursor();

	echo '</table>';

	// // CLAUSE WHERE

	// $requete = $bdd->query('SELECT prenom, nom, serie_preferee, metier
	// 						FROM users, job
	// 						WHERE users.id = job.id_user');

	// // CLAUSE JOIN

	// $requete = $bdd->query('SELECT prenom, nom, serie_preferee, metier
	// 						FROM users
	// 						INNER JOIN job
	// 						ON users.id = job.id_user')
	// 						or die(print_r($bdd->errorInfo()));



	// echo '<br /><table border>

	// 		<tr><th>Prénom</th>
	// 			<th>Nom</th>
	// 			<th>Série Préférée</th>
	// 			<th>Métier</th>

	// 		</tr>';

	// while ($donnees = $requete->fetch()) {
	// 	echo '<tr>

	// 		  <td>'.$donnees['prenom'].'</td>';

	// 	echo '<td>'.$donnees['nom'].'</td>';

	// 	echo '<td>'.$donnees['serie_preferee'].'</td>';

	// 	echo '<td>'.$donnees["metier"].'</td>

	// 	</tr>';

	// }


// CLAUSE JOIN AVEC RENOMMER COLONNE

	// Lorsque deux tableaux partagent un même nom de colonne, on renomme dynamiquement l'une des colonnes d'un des deux tableaux
	// On appelle les noms de colonnes en les précédant du nom de la table, qui, peut lui-même être raccourci avec un AS. On peut supprimer tous les AS, le code comprendra qu'il faut les mettre.

	$requete = $bdd->query('SELECT prenom, nom, u.serie_preferee AS serie_preferee, j.serie_preferee AS metier
							FROM users AS u							
							INNER JOIN job AS j 
							ON u.id = j.id_user'); // En remplaçant INNER par LEFT ou RIGHT, même s'il n'y a pas de correspondance entre l'id de users et l'id_user de job, on aura affiché respectivement le tableau de gauche(sans le droit) ou de droite (sans le gauche), concernant uniquement les lignes où il n'y a pas de correspondance.



	 echo '<br /><table border>

	 		<tr><th>Prénom</th>
	 			<th>Nom</th>
	 			<th>Série Préférée</th>
	 			<th>Métier</th>

	 		</tr>';

	while ($donnees = $requete->fetch()) {
		echo '<tr>

			  <td>'.$donnees['prenom'].'</td>';

		echo '<td>'.$donnees['nom'].'</td>';

		echo '<td>'.$donnees['serie_preferee'].'</td>';

		echo '<td>'.$donnees['metier'].'</td>

		</tr>';

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




