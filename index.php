
<?php

// L'UTILISATEUR A-T-IL AJOUTE SON PSEUDO

// REQUETE GET VIA URL , POST VIA PHP


$pseudo = (!empty($_GET['pseudo'])) ? $_GET['pseudo'] : 'Unknown User';

echo 'Hello '.$pseudo.' !';



?>


<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>PHP</title>
	</head>
	<body>

		<h1>L'utilisateur a-t-il ajouté son pseudo?</h1>

		<form method="get" action="index.php">
			<table>
				<tr>
					<td style="border: solid black 1px;">Pseudo</td>
					<td><input type="text" name="pseudo"></td>
				</tr>
				<tr>
					<td><button type="submit">Envoyer</button></td>
				</tr>
			</table>
		</form>

	</body>
</html>


