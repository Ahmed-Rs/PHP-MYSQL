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

	// $requete = $bdd->exec('UPDATE users SET serie_preferee="Stargate SG-1" WHERE prenom = "Jeff"'); // Toujours utiliser WHERE afin de ne pas affecter les autres lignes que celle que l'on veut modifer.


// SUPPRIMER UN UTILISATEUR
	// $requete = $bdd->exec('DELETE FROM users WHERE prenom="Jeff"')



// AJOUT UTILISATEUR

	// $requete2 = $bdd2->exec('INSERT INTO job(id_user, metier) VALUES(1, "Développeur")') or die(print_r($bdd2->errorInfo()));




// CLAUSE JOIN AVEC RENOMMER COLONNE

// ENCRYPTAGE DE DONNEES, USAGE DU SHA1 PLUS GRAIN DE SEL


	// $prenom = '" OR 1=1#';
	$prenom = 'Alain';
	$nom = 'Stendhal';

	// Autrement, on utilise prepare() à la place de query pour faire une requête. Cela permet de préparer une requête avant de l'exécuter.

	$requete = $bdd->prepare('SELECT prenom, nom, u.serie_preferee AS serie_preferee, j.serie_preferee AS metier
							FROM users AS u							
							LEFT JOIN job AS j 
							ON u.id = j.id_user');

	// EXECUTION DE LA REQUETE

	$requete->execute(array($prenom, $nom));


	 echo '<br /><table border>

	 		<tr><th>Pseudo</th>
	 			<th>Nom</th>
	 			<th>Série Préférée</th>
	 			<th>Mot de passe</th>

	 		</tr>';

	while ($donnees = $requete->fetch()) {
		echo '<tr>

			  <td>'.$donnees['prenom'].'</td>';

		echo '<td>'.$donnees['nom'].'</td>';

		echo '<td>'.$donnees['serie_preferee'].'</td>';

		echo '<td>'.sha1($donnees['metier'].'5465jk').'</td> 

		</tr>';

	}


	// $requete-> closeCursor();






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




