<!-- 

Se connecter à notre table
CONNECT / OPERATIONS(LIRE / ECRIRE / MODIFIER / SUPPRIMER) /  
mysql => mySQL, vieilles, =/=
mysqli => mySQL, améliorées 
PDO => très sécurisé et très utilisé, mySQL, Oracle, PostgreSQL -->


<?php

// RECEVOIR DES DONNEES VIA UN FORMULAIRE

	// CONNECTION
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=formation_users;charset=utf8;port=3308', 'root', '');
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}


	// AJOUTE UN NOUVEL UTILISATEUR

	if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['serie'])) {		
		$prenom = $_POST['prenom'];
		$nom    = $_POST['nom'];
		$serie  = $_POST['serie'];


		$requete = $bdd->prepare('INSERT INTO users(prenom, nom, serie_preferee)
		VALUES(?, ?, ?)')
		or die(print_r($bdd->errorInfo()));
	
		$requete->execute(array($prenom, $nom, $serie));
								
	}
	

	// AFFICHE LES INFORMATIONS
	$requete = $bdd->query('SELECT prenom, nom, serie_preferee
							  FROM users');

	// EXECUTION DE LA REQUETE


	 echo '<table border>	 
	 		<tr>
	 			<th>Pseudo</th>
	 			<th>Nom</th>
	 			<th>Série Préférée</th>
	 		</tr>';

	while ($donnees = $requete->fetch()) {
		echo '<tr>
		        <td>'.$donnees['prenom'].'</td>
				<td>'.$donnees['nom'].'</td>
				<td>'.$donnees['serie_preferee'].'</td>
			  </tr>';

	}


	echo '</table>';

	$requete-> closeCursor();


?>




<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<title>PHP</title>
	</head>

	<body>
		<h1>Ajouter un utilisateur</h1>

		<form method="post" action="index.php">
			<table>
				<tr>
					<td>Prénom</td>
					<td><input type="text" name="prenom"></td>
				</tr>
				<tr>
					<td>Nom</td>
					<td><input type="text" name="nom"></td>
				</tr>
				<tr>
					<td>Série préférée</td>
					<td><input type="text" name="serie"></td>
				</tr>
			</table>

			<button type="submit">Ajouter</button>


		</form>

	</body>

</html>


